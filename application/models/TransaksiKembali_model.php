<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiKembali_model extends CI_Model {

    public $table = 'transaksi';
    public $id_transaksi = 'transaksi.id_transaksi';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get() {
        $this->db->select('t.*, a.nama AS nama_anggota, b.judul_buku');
        $this->db->from('transaksi t');
        $this->db->join('anggota a', 'a.id_anggota = t.nama_anggota', 'left');
        $this->db->join('buku b', 'b.id_buku = t.buku', 'left');
        $this->db->order_by('tanggal_pengembalian', 'DESC');
        $query = $this->db->get();
        
        // Simpan hasil query ke variabel $result
        $result = $query->result_array();
        
        // Tambahkan logika foreach sebelum return
        foreach ($result as &$transaksi) {
            $transaksi['denda'] = $this->calculate_denda($transaksi['tanggal_jatuhtempo']);
        }

        // Return hasil akhir
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
    
    private function calculate_denda($tanggal_jatuhtempo) {
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
        // Mengurangi stok buku
        $this->db->set('stok', 'stok - 1', FALSE);
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku');
    }
    
    public function pinjam_buku($data) {
        $id_buku = $data['buku'];
    
        if ($this->cek_ketersediaan_buku($data['buku'])) {
            // Tambahkan data peminjaman ke tabel transaksi
            $this->db->insert('transaksi', $data);

            // Kurangi stok buku
            $this->db->set('stok', 'stok-1', FALSE);
            $this->db->where('id_buku', $data['buku']);
            $this->db->update('buku');

            // Jika stok mencapai 0, ubah status menjadi 'Tidak Tersedia'
            $this->db->where('id_buku', $data['buku']);
            $this->db->where('stok', 0);
            $this->db->set('status', 'Tidak Tersedia');
            $this->db->update('buku');

            return "Peminjaman berhasil";
        } else {
            return "Buku tidak tersedia";
        }
    }

    /*public function update_denda() {
        $this->db->select('id_transaksi, tanggal_jatuhtempo, tanggal_pengembalian');
        $this->db->from('transaksi');
        $this->db->where('tanggal_pengembalian', NULL);
        $query = $this->db->get();
        $transaksi = $query->result_array();

        foreach ($transaksi as $t) {
            $denda = $this->hitung_denda($t['tanggal_jatuhtempo'], date('Y-m-d'));
            $this->db->set('denda', $denda);
            $this->db->where('id_transaksi', $t['id_transaksi']);
            $this->db->update('transaksi');
        }
    }*/
    
    public function kembalikan_buku($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
        $query = $this->db->get('transaksi');
        $transaksi = $query->row();

        if ($transaksi) {
            $tanggal_pengembalian = date('Y-m-d');
            $denda = 0;
            if ($tanggal_pengembalian > $transaksi->tanggal_jatuhtempo) {
                $keterlambatan = (strtotime($tanggal_pengembalian) - strtotime($transaksi->tanggal_jatuhtempo)) / (60 * 60 * 24);
                $denda = $this->hitung_denda($keterlambatan);
            }
            $this->db->set('tanggal_pengembalian', $tanggal_pengembalian);
            $this->db->set('denda', $denda);
            $this->db->set('status_denda', $denda > 0 ? 'Belum Dibayar' : 'Dibayar');
            $this->db->set('status_buku', 'Dikembalikan');
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi');

            $this->update_status_buku($transaksi->id_buku, 'Tersedia');
            return $denda > 0 ? "Pengembalian berhasil. Denda: Rp{$denda}" : "Pengembalian berhasil";
        } else {
            return "Transaksi tidak ditemukan";
        }
    }

    public function cek_ketersediaan_buku($id_buku) {
        $this->db->where('id_buku', $id_buku);
        $this->db->where('stok >', 0);  // Pastikan stok lebih dari 0
        $query = $this->db->get('buku');
        return $query->num_rows() > 0;
    }

    private function update_status_buku($id_buku, $status) {
        $this->db->set('status', $status);
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku');
    }

    public function hitung_denda($tanggal_jatuhtempo, $tanggal_pengembalian) {
        $datetime1 = new DateTime($tanggal_jatuhtempo);
        $datetime2 = new DateTime($tanggal_pengembalian);
        if ($datetime2 > $datetime1) {
            $interval = $datetime1->diff($datetime2);
            $days = $interval->days;
            return 'Rp. ' . number_format($denda, 0, ',', '.') . ',-';
        } else {
            return 'Rp. 0,-';
        }
    }

    public function delete($id_transaksi) {
        // Ambil informasi transaksi yang akan dihapus
        $transaksi = $this->getById($id_transaksi);
    
        if (!empty($transaksi)) {
            // Hapus transaksi dari tabel
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->delete('transaksi');
    
            // Kembalikan jumlah buku yang dipinjam ke stok buku
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
        // Kemudian kirim data ke view
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
    }

    // Di dalam model Transaksi_model
    public function getTransaksiKembali() {
        // Query untuk mengambil data transaksi yang sudah dikembalikan
        $this->db->where('status_buku', 'Dikembalikan');
        $query = $this->db->get('transaksi'); // Ganti 'nama_tabel_transaksi' dengan nama tabel transaksi Anda
        
        // Kembalikan hasil query
        return $query->result();
    }

    public function search($keyword)
    {
        // Deteksi dan konversi format tanggal
        $date_keyword = false;
        if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $keyword)) {
            // Mengubah format tanggal dari dd-mm-yyyy ke yyyy-mm-dd
            $date = DateTime::createFromFormat('d-m-Y', $keyword);
            if ($date) {
                $date_keyword = $date->format('Y-m-d');
                log_message('debug', 'Converted date (d-m-Y to Y-m-d): ' . $date_keyword);
            }
        } elseif (preg_match('/^\d{2}-\d{4}$/', $keyword)) {
            // Menambahkan hari pertama bulan untuk format mm-yyyy
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
            $this->db->or_like('transaksi.tanggal_pengembalian', $date_keyword);
        } else {
            $this->db->like('anggota.nama', $keyword);
            $this->db->or_like('transaksi.tanggal_peminjaman', $keyword);
            $this->db->or_like('transaksi.tanggal_pengembalian', $keyword);
        }
        $this->db->group_end();

        $query = $this->db->get();

        // Debugging: Cetak query terakhir
        log_message('debug', $this->db->last_query());

        return $query->result_array();
    }

}
