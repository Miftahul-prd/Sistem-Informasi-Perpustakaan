<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller {
        
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('Anggota_model');
        $this->load->model('Buku_model');
        $this->load->model('User_model', 'userrole');
        $this->load->library('session');
        $this->load->helper('url');

        // Cek login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index() 
    {
        $data['judul'] = "Data Peminjaman Buku";
        $data['anggota'] = $this->Anggota_model->get();
        $data['buku'] = $this->Buku_model->get();
        $data['tb_pengguna'] = $this->userrole->getUserByUsername($this->session->userdata('username'));

        $keyword = $this->input->get('keyword');

        // Jika ada keyword, lakukan pencarian
        if ($keyword) {
            $data['transaksi'] = $this->Transaksi_model->search($keyword);
        } else {
            $data['transaksi'] = $this->Transaksi_model->get();
        }

        $this->load->view("layout/header", $data);
        $this->load->view("layout/vm_transaksi", $data);
        $this->load->view("layout/footer");
    }


    public function update_denda_cron() {
        $this->load->model('Transaksi_model');
        $this->Transaksi_model->update_denda();
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
                    redirect('Transaksi');
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
                if ($this->Transaksi_model->pinjam_buku($data)) {
                    $this->Buku_model->update_book_availability($data['buku'], 0);
                } else {
                    $this->session->set_flashdata('pesan', 'Peminjaman gagal.');
                    redirect('Transaksi');
                    return;
                }
            }
        
            // Display success message for borrowing multiple books
            $this->session->set_flashdata('pesan', 'Peminjaman Berhasil');
        } else {
            $this->session->set_flashdata('pesan', 'Tidak ada buku yang dipilih untuk dipinjam atau kode buku tidak lengkap.');
        }
        
        // Redirect to transaction page
        redirect('Transaksi');
    }         
        
    public function kembalikan($id_transaksi) {
        if ($this->Transaksi_model->kembalikan($id_transaksi)) {
            $this->session->set_flashdata('pesan', 'Buku berhasil dikembalikan.');
        } else {
            $this->session->set_flashdata('message', 'Transaksi tidak ditemukan atau buku sudah dikembalikan.');
        }
        redirect('TransaksiKembali');
    }

    /*public function kembali() {
        $data['judul'] = "Data Pengembalian Buku";
        // Dapatkan data transaksi yang sudah dikembalikan
        $data['transaksi'] = $this->Transaksi_model->getTransaksiKembali();
        
        // Load view dan kirim data transaksi
        $this->load->view("layout/header");
        $this->load->view("layout/vm_transaksiKembali", $data);
        $this->load->view("layout/footer");
    }*/
        

    public function hapus($id_transaksi) {
        $this->load->model('Transaksi_model');
        $result = $this->Transaksi_model->delete($id_transaksi);
        if ($result) {
            $this->session->set_flashdata('message', 'Berhasil menghapus data.');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus data.');
        }
        redirect('transaksi');
    }
        
    public function searchBooks() {
        $searchText = $this->input->post('searchText');
        $books = $this->Buku_model->searchBooks($searchText);
        echo json_encode($books);
    }

    // Di dalam controller Anda
    public function tampilkan_detail_peminjaman() {
         // Panggil metode tampilkanDetailPeminjaman dari model
        $data['transaksi'] = $this->Transaksi_model->tampilkanDetailPeminjaman();
            
        // Kemudian kirim data ke view untuk ditampilkan
        $this->load->view('vm_transaksi', $data);
    }

    public function get_detail() {
        $id_transaksi = $this->input->post('id_transaksi');
        $data['transaksi'] = $this->Transaksi_model->getDetailPeminjaman($id_transaksi);
        $this->load->view('vm_transaksi', $data);
    }

    public function printDetailTransaksi($id_transaksi)
    {
        $data['transaksi'] = $this->Transaksi_model->getById($id_transaksi);
        $this->load->view("layout/vm_printdetailpinjam", $data);
    }

}
