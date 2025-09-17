<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public $table = 'transaksi';
    public $id_transaksi = 'transaksi.id_transaksi';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get() {
        $sql = "
            SELECT t.*, a.nama AS nama_anggota, a.role, b.judul_buku
            FROM transaksi t
            LEFT JOIN anggota a ON a.id_anggota = t.nama_anggota
            LEFT JOIN buku b ON b.id_buku = t.buku
            ORDER BY
                IF(t.status_buku = 'Dipinjam', 1, 2) ASC,
                t.tanggal_jatuhtempo DESC,
                t.created_at DESC
        ";
    
        $query = $this->db->query($sql);
        $result = $query->result_array();
    
        foreach ($result as &$transaksi) {
            $transaksi['denda'] = $this->calculate_denda($transaksi['tanggal_jatuhtempo'], $transaksi['role']);
        }
    
        return $result;
    }
      
    public function getById($id_transaksi) {
        $this->db->select('t.*, a.nama AS nama_anggota, b.judul_buku');
        $this->db->from('transaksi t');
        $this->db->join('anggota a', 'a.id_anggota = t.nama_anggota', 'left');
        $this->db->join('buku b', 'b.id_buku = t.buku', 'left');
        $this->db->where('t.id_transaksi', $id_transaksi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_transaksi_by_id($id_transaksi) {
        return $this->db->get_where('transaksi', array('id_transaksi' => $id_transaksi))->row_array();
    }    
    
    private function calculate_denda($tanggal_jatuhtempo, $role) {
        // Jika role adalah guru, denda selalu Rp 0
        if ($role == 'guru') {
            return 'Rp. 0,-';
        }
    
        // Hitung denda jika role bukan guru
        $today = date('Y-m-d');
        if ($today > $tanggal_jatuhtempo) {
            $keterlambatan = (strtotime($today) - strtotime($tanggal_jatuhtempo)) / (60 * 60 * 24);
            $denda = $keterlambatan * 1000; // Misal denda Rp1000 per hari
            return 'Rp. ' . number_format($denda, 0, ',', '.') . ',-';
        } else {
            return 'Rp. 0,-';
        }
    }
    
    
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    public function kurangi_stok_buku($id_buku) {
        $this->db->set('stok', 'stok - 1', FALSE);
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku');
    }
    
    public function pinjam_buku($data) {
        $id_buku = $data['buku'];
    
        if ($this->cek_ketersediaan_buku($data['buku'])) {
            $this->db->insert('transaksi', $data);
            $this->kurangi_stok_buku($data['buku']);

            $this->db->where('id_buku', $data['buku']);
            $this->db->where('stok', 0);
            $this->db->set('status', 'Tidak Tersedia');
            $this->db->update('buku');

            return "Peminjaman berhasil";
        } else {
            return "Buku tidak tersedia";
        }
    }

    public function kembalikan($id_transaksi) {
        // Ambil data transaksi berdasarkan ID
        $transaksi = $this->getById($id_transaksi);
    
        if ($transaksi) {
            $tanggal_pengembalian = date('Y-m-d');
            $role = $transaksi[0]['role'];  // Asumsikan role ada di transaksi
            
            // Hitung denda berdasarkan tanggal jatuh tempo dan role pengguna
            $denda = $this->calculate_denda($transaksi[0]['tanggal_jatuhtempo'], $role);
    
            // Data yang akan diupdate
            $data = [
                'tanggal_pengembalian' => $tanggal_pengembalian,
                'denda' => $denda,
                'status_denda' => 'Lunas',
                'status_buku' => 'Dikembalikan',
            ];
    
            // Update status transaksi
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi', $data);
    
            // Tambah stok buku yang dikembalikan
            $this->tambah_stok_buku($transaksi[0]['buku']);
    
            $this->session->set_flashdata('pesan', 'Buku berhasil dikembalikan.');
        } else {
            $this->session->set_flashdata('message', 'Transaksi tidak ditemukan.');
        }
    
        redirect('TransaksiKembali');
    }    
    
    public function cek_ketersediaan_buku($id_buku) {
        $this->db->where('id_buku', $id_buku);
        $this->db->where('stok >', 0);
        $query = $this->db->get('buku');
        return $query->num_rows() > 0;
    }

    public function update_status_buku($id_transaksi) {
        // Ambil transaksi berdasarkan ID
        $this->db->select('buku');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $transaksi = $this->db->get()->row_array();
    
        if ($transaksi) {
            // Update status buku menjadi "Dikembalikan"
            $this->db->set('status_buku', 'Dikembalikan');
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi');
    
            // Tambahkan kembali stok buku
            $this->tambah_stok_buku($transaksi['buku']);
    
            return true;
        }
    
        return false;
    }    

    public function hitung_denda($tanggal_jatuhtempo, $tanggal_pengembalian) {
        $datetime1 = new DateTime($tanggal_jatuhtempo);
        $datetime2 = new DateTime($tanggal_pengembalian);
        if ($datetime2 > $datetime1) {
            $interval = $datetime1->diff($datetime2);
            $days = $interval->days;
            $denda = $days * 1000; // Misal denda Rp1000 per hari
            return 'Rp. ' . number_format($denda, 0, ',', '.') . ',-';
        } else {
            return 'Rp. 0,-';
        }
    }

    public function delete($id_transaksi) {
        $transaksi = $this->getById($id_transaksi);
    
        if (!empty($transaksi)) {
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->delete('transaksi');
    
            foreach ($transaksi as $trx) {
                $this->tambah_stok_buku($trx['buku']);
            }
    
            return "Transaksi berhasil dihapus";
        } else {
            return "Transaksi tidak ditemukan";
        }
    }
    
    public function tambah_stok_buku($id_buku) {
        $this->db->set('stok', 'stok + 1', FALSE);
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku');
    }

    public function tampilkanDetailPeminjaman() {
        $id_anggota = 'nama_anggota'; // Ganti dengan nilai yang sesuai
        $tanggal_peminjaman = 'tanggal_peminjaman'; // Ganti dengan tanggal yang sesuai
        $this->load->model('Transaksi_model');
        $data['transaksi'] = $this->Transaksi_model->getDetailPeminjaman($id_anggota, $tanggal_peminjaman);
        $this->load->view('vm_transaksi', $data);
    }
    
    public function getDetailPeminjaman($id_anggota, $tanggal_peminjaman) {
        $this->db->select('t.*, a.nama AS nama_anggota');
        $this->db->from('transaksi t');
        $this->db->join('anggota a', "a.id_anggota = t.$id_anggota", 'left');
        $this->db->where("$tanggal_peminjaman BETWEEN t.tanggal_peminjaman AND t.tanggal_pengembalian", NULL, FALSE);
        $query = $this->db->get();
        $transaksi = $query->result_array();
    
        foreach ($transaksi as &$trx) {
            $this->db->select('b.judul_buku');
            $this->db->from('buku b');
            $this->db->join('transaksi tb', 'tb.id_buku = b.id_buku', 'left');
            $this->db->where('tb.id_transaksi', $trx['id_transaksi']);
            $query = $this->db->get();
            $trx['buku'] = $query->result_array();
        }
    
        return $transaksi;
    }

    public function get_by_anggota_and_date($id_anggota, $tanggal_peminjaman) {
        $this->db->select('id_transaksi, id_anggota, tanggal_peminjaman, tanggal_jatuhtempo, GROUP_CONCAT(buku SEPARATOR ",") AS buku');
        $this->db->from('transaksi');
        $this->db->where('id_anggota', $id_anggota);
        $this->db->where('tanggal_peminjaman', $tanggal_peminjaman);
        $this->db->group_by('id_anggota, tanggal_peminjaman, tanggal_jatuhtempo');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_transaksi($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);

        if (isset($data['tanggal_pengembalian']) && $data['tanggal_pengembalian'] != null) {
            $transaksi = $this->getById($id);

            if (!empty($transaksi)) {
                foreach ($transaksi as $trx) {
                    $this->tambah_stok_buku($trx['buku']);
                }
            }
        }

        return "Transaksi berhasil diperbarui";
    }

    public function get_total_peminjaman() {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM transaksi WHERE status_buku = 'Dipinjam';");
        return $query->row()->total;
    }    

    public function get_total_pengembalian() {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM transaksi WHERE status_buku = 'Dikembalikan';");
        return $query->row()->total;
    }

    public function search($keyword)
    {
        $date_keyword = false;
        if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $keyword)) {
            $date = DateTime::createFromFormat('d-m-Y', $keyword);
            if ($date) {
                $date_keyword = $date->format('Y-m-d');
                log_message('debug', 'Converted date (d-m-Y to Y-m-d): ' . $date_keyword);
            }
        } elseif (preg_match('/^\d{2}-\d{4}$/', $keyword)) {
            $date = DateTime::createFromFormat('d-m-Y', '01-' . $keyword);
            if ($date) {
                $date_keyword = $date->format('Y-m-d');
                log_message('debug', 'Converted date (01-mm-yyyy to Y-m-d): ' . $date_keyword);
            }
        } else {
            log_message('debug', 'Keyword: ' . $keyword);
        }

        $this->db->select('transaksi.*, anggota.nama as nama_anggota');
        $this->db->from($this->table);
        $this->db->join('anggota', 'transaksi.nama_anggota = anggota.id_anggota', 'left');

        $this->db->group_start();
        if ($date_keyword) {
            $this->db->or_like('transaksi.tanggal_peminjaman', $date_keyword);
            $this->db->or_like('transaksi.tanggal_jatuhtempo', $date_keyword);
        } else {
            $this->db->like('anggota.nama', $keyword);
            $this->db->or_like('transaksi.tanggal_peminjaman', $keyword);
            $this->db->or_like('transaksi.tanggal_jatuhtempo', $keyword);
        }
        $this->db->group_end();

        $query = $this->db->get();
        log_message('debug', $this->db->last_query());

        return $query->result_array();
    }
}
