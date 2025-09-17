<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Anggota_model');
        $this->load->model('Buku_model');
        $this->load->model('Transaksi_model');
    }

    public function index() {
        $username = $this->session->userdata('username');
        //var_dump($this->session->all_userdata()); // Tambahkan ini untuk debugging
        $data['tb_pengguna'] = $this->userrole->getUserByUsername($username);
        $data['total_anggota'] = $this->Anggota_model->get_total_anggota();
        $data['total_buku'] = $this->Buku_model->get_total_buku();
        $data['total_peminjaman'] = $this->Transaksi_model->get_total_peminjaman();
        $data['total_pengembalian'] = $this->Transaksi_model->get_total_pengembalian();
        $data['judul'] = "Dashboard";
        $this->load->view('layout/header', $data);
        $this->load->view('layout/vm_dashboard'); // Sesuaikan dengan view dashboard Anda
        $this->load->view('layout/footer');
    }
    
    
}