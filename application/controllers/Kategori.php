<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('User_model'); // Tambahkan ini untuk memuat User_model
        $this->load->library('session');
        $this->load->helper('url');

        // Cek login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    function index() {
        $data['judul'] = "Data Kategori Buku";
        $data['tb_pengguna'] = $this->User_model->getUserByUsername($this->session->userdata('username'));
        
        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['kategori'] = $this->Kategori_model->search($keyword);
        } else {
            $data['kategori'] = $this->Kategori_model->get();
        }
        // Tambahkan $data sebagai parameter di load->view untuk header
        $this->load->view("layout/header", $data);
        $this->load->view("layout/vm_kategori", $data);
        $this->load->view("layout/footer");
    }
    
    public function tambah()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];
        // Tambahkan data anggota ke database
        $this->Kategori_model->insert($data);  

        // Set flashdata
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan.');

        // Redirect kembali ke halaman yang sesuai
        redirect('Kategori');
        return;
    }
    public function edit($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];
        
        $this->Kategori_model->update($id_kategori, $data);
        $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
        redirect('Kategori');
    }
    public function hapus($id_kategori)
    {
        $this->Kategori_model->delete($id_kategori);
        redirect('Kategori');
    }
}