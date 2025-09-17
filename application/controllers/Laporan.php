<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->model('Buku_model');
        $this->load->model('Laporan_model');
        $this->load->model('User_model'); // Tambahkan ini untuk memuat User_model
        $this->load->library('session');
        $this->load->helper('url');

        // Cek login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index() {
        $data['judul'] = "Laporan Transaksi";
        $data['anggota'] = $this->Anggota_model->get();
        $data['buku'] = $this->Buku_model->get();
        $data['tb_pengguna'] = $this->User_model->getUserByUsername($this->session->userdata('username'));

        // Tambahkan $data sebagai parameter di load->view untuk header
        $this->load->view("layout/header", $data);
        $this->load->view("layout/vm_laporan", $data);
        $this->load->view("layout/footer");
    }

    public function update_denda_cron() {
        $this->load->model('Laporan_model');
        $this->Laporan_model->update_denda();
    }

    public function pinjam() {
        $tanggal_peminjaman = $this->input->post('tanggal_peminjaman');
        $id_anggota = $this->input->post('id_anggota');
        $book_ids = $this->input->post('id_buku'); // Array of book IDs
        $kode_bukus = $this->input->post('kode_buku'); // Array of kode_buku corresponding to book_ids
    
        $transaction_data = []; // Array to store transaction data for each book
        
        // Check if book_ids and kode_bukus are valid and have the same length
        if ($book_ids && is_array($book_ids) && $kode_bukus && is_array($kode_bukus) && count($book_ids) === count($kode_bukus)) {
            foreach ($book_ids as $index => $book_id) {
                $kode_buku = $kode_bukus[$index] ?? NULL;
                // Validate kode_buku to ensure it is not null
                if ($kode_buku === NULL) {
                    $this->session->set_flashdata('pesan', 'Kode buku tidak boleh kosong untuk ID buku: ' . $book_id);
                    redirect('Laporan');
                    return;
                }
        
                $transaction_data[] = [
                    'nama_anggota' => $id_anggota,
                    'tanggal_peminjaman' => $tanggal_peminjaman,
                    'tanggal_jatuhtempo' => date('Y-m-d', strtotime($tanggal_peminjaman . ' + 14 days')),
                    'buku' => $book_id,
                    'kode_buku' => $kode_buku,
                    'denda' => 0,
                    'status_buku' => 'Dipinjam',
                ];
            }
        
            // Save transaction data for each book
            foreach ($transaction_data as $data) {
                if ($this->Laporan_model->pinjam_buku($data)) {
                    $this->Buku_model->update_book_availability($data['buku'], 0);
                } else {
                    $this->session->set_flashdata('pesan', 'Peminjaman gagal.');
                    redirect('Laporan');
                    return;
                }
            }
        
            // Display success message for borrowing multiple books
            $this->session->set_flashdata('pesan', 'Peminjaman Berhasil');
        } else {
            $this->session->set_flashdata('pesan', 'Tidak ada buku yang dipilih untuk dipinjam atau kode buku tidak lengkap.');
        }
        
        // Redirect to transaction page
        redirect('Laporan');
    }         
        
    public function kembalikan()
    {
        $buku_ids = $this->input->post('buku_ids');
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $denda = $this->input->post('denda');
        $status_denda = $this->input->post('status_denda');
        $status_buku = $this->input->post('status_buku');

        if (!empty($buku_ids)) {
            foreach ($buku_ids as $id) {
                $data = [
                    'tanggal_pengembalian' => $tanggal_pengembalian,
                    'denda' => $denda,
                    'status_denda' => $status_denda,
                    'status_buku' => $status_buku,
                ];
                $this->Laporan_model->update_transaksi($id, $data);
            }
        }

        // Redirect ke halaman transaksi setelah pengembalian
        redirect('TransaksiKembali');
    }

    /*public function kembali() {
        $data['judul'] = "Data Pengembalian Buku";
        // Dapatkan data transaksi yang sudah dikembalikan
        $data['transaksi'] = $this->Transaksi_model->getTransaksiKembali();
        
        // Load view dan kirim data transaksi
        $this->load->view("admin/header");
        $this->load->view("layout/vm_transaksiKembali", $data);
        $this->load->view("admin/footer");
    }*/
        

    public function hapus($id_transaksi) {
        $this->load->model('Laporan_model');
        $result = $this->Laporan_model->delete($id_transaksi);
        if ($result) {
            $this->session->set_flashdata('message', 'Berhasil menghapus data.');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus data.');
        }
        redirect('Laporan');
    }
        
    public function searchBooks() {
        $searchText = $this->input->post('searchText');
        $books = $this->Buku_model->searchBooks($searchText);
        echo json_encode($books);
    }

    // Di dalam controller Anda
    public function tampilkan_detail_peminjaman() {
         // Panggil metode tampilkanDetailPeminjaman dari model
        $data['transaksi'] = $this->Laporan_model->tampilkanDetailPeminjaman();
            
        // Kemudian kirim data ke view untuk ditampilkan
        $this->load->view('vm_Laporan', $data);
    }

    public function get_detail() {
        $id_transaksi = $this->input->post('id_transaksi');
        $data['transaksi'] = $this->Laporan_model->getDetailPeminjaman($id_transaksi);
        $this->load->view('vm_transaksi', $data);
    }

    public function printDetailTransaksi($id_transaksi)
    {
        $data['transaksi'] = $this->Laporan_model->getById($id_transaksi);
        $this->load->view("layout/vm_printdetailpinjam", $data);
    }
    
    public function tgl_pinjam() {
        $data['judul'] = "Laporan Peminjaman Buku Berdasarkan Tanggal Peminjaman";
        $tanggal_peminjaman = $this->input->post('tanggal_peminjaman');
    
        if ($tanggal_peminjaman) {
            $data['transaksi'] = $this->Laporan_model->getLaporanByTanggalPinjam($tanggal_peminjaman);
            $data['judul'] = "Laporan Transaksi berdasarkan Tanggal Peminjaman";
            $this->load->view('layout/laporan_hasil', $data);
        } else {
            show_error('Tanggal peminjaman harus diisi.');
        }
    }
    
    public function tgl_kembali() {
        $data['judul'] = "Laporan Peminjaman Buku Berdasarkan Tanggal Pengembalian";
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
    
        if ($tanggal_pengembalian) {
            $data['transaksi'] = $this->Laporan_model->getLaporanByTanggalKembali($tanggal_pengembalian);
            $data['judul'] = "Laporan Transaksi berdasarkan Tanggal Pengembalian";
            $this->load->view('layout/laporan_hasil', $data);
        } else {
            show_error('Tanggal pengembalian harus diisi.');
        }
    }

    public function nama_anggota() {
        $data['judul'] = "Laporan Peminjaman Buku Berdasarkan Nama Anggota";
        $nama_anggota = $this->input->post('nama_anggota');
        
        if ($nama_anggota) {
            $data['transaksi'] = $this->Laporan_model->getLaporanByNamaAnggota($nama_anggota);
            if (empty($data['transaksi'])) {
                $data['message'] = "Tidak ada data transaksi untuk nama anggota tersebut.";
            }
            $this->load->view('layout/laporan_hasil', $data);
        } else {
            show_error('Nama Anggota harus diisi.');
        }
    }    
}
