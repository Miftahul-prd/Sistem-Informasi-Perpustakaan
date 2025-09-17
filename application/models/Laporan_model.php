<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model {

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
    
    public function kembalikan($id_transaksi) {
        // Memanggil model Transaksi_model
        $this->load->model('Transaksi_model');
    
        // Memanggil metode kembalikanBuku() dari model dengan memberikan id_transaksi sebagai argumen
        if ($this->Transaksi_model->kembalikanBuku($id_transaksi)) {
            // Jika proses pengembalian berhasil, tampilkan pesan sukses
            $this->session->set_flashdata('pesan', 'Buku berhasil dikembalikan.');
        } else {
            // Jika transaksi tidak ditemukan, tampilkan pesan error
            $this->session->set_flashdata('message', 'Transaksi tidak ditemukan.');
        }
    
        // Redirect kembali ke halaman transaksi atau halaman lain yang sesuai
        redirect('transaksi');
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
        // Lakukan update data transaksi
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);

        // Periksa apakah transaksi berhasil dikembalikan
        if (isset($data['tanggal_pengembalian']) && $data['tanggal_pengembalian'] != null) {
            // Ambil informasi transaksi yang diubah
            $transaksi = $this->getById($id);

            if (!empty($transaksi)) {
                // Kembalikan jumlah buku yang dipinjam ke stok buku
                foreach ($transaksi as $trx) {
                    $this->tambah_stok_buku($trx['buku']);
                }
            }
        }

        return "Transaksi berhasil diperbarui";
    }

    /*public function getLaporanByTanggalPinjam($tanggal) {
        $this->db->where('tanggal_peminjaman', $tanggal);
        $query = $this->db->get('transaksi');
        return $query->result();
    }*/

    public function getLaporanByTanggalPinjam($tanggal_peminjaman) {
        $this->db->select('t.*, a.nama AS nama_anggota, t.tanggal_peminjaman, t.tanggal_jatuhtempo, b.judul_buku AS buku');
        $this->db->from('transaksi t');
        $this->db->join('anggota a', 'a.id_anggota = t.nama_anggota', 'left');
        $this->db->join('buku b', 'b.id_buku = t.buku', 'left');
        $this->db->where('t.tanggal_peminjaman', $tanggal_peminjaman);
        $query = $this->db->get();
        return $query->result_array();
    }        

    public function getLaporanByTanggalKembali($tanggal_pengembalian) {
        $this->db->select('t.*, a.nama AS nama_anggota, t.tanggal_pengembalian, t.tanggal_jatuhtempo, b.judul_buku AS buku');
        $this->db->from('transaksi t');
        $this->db->join('anggota a', 'a.id_anggota = t.nama_anggota', 'left');
        $this->db->join('buku b', 'b.id_buku = t.buku', 'left');
        $this->db->where('t.tanggal_pengembalian', $tanggal_pengembalian);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLaporanByNamaAnggota($nama_anggota) {
        $this->db->select('t.*, a.nama AS nama_anggota, t.tanggal_pengembalian, t.tanggal_jatuhtempo, b.judul_buku AS buku');
        $this->db->from('transaksi t');
        $this->db->join('anggota a', 'a.id_anggota = t.nama_anggota', 'left');
        $this->db->join('buku b', 'b.id_buku = t.buku', 'left');
        $this->db->like('a.nama', $nama_anggota);
        $query = $this->db->get();
        return $query->result_array();
    }    
    
}
