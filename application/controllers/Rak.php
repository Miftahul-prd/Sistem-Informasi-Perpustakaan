<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rak_model');
        $this->load->model('User_model', 'userrole');
        $this->load->library('session');
        $this->load->helper('url');

        // Cek login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    function index()
    {
        $username = $this->session->userdata('username');
        $data['tb_pengguna'] = $this->userrole->getUserByUsername($username);
        $data['judul'] = "Data Rak";

        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['rak'] = $this->Rak_model->search($keyword);
        } else {
            $data['rak'] = $this->Rak_model->get();
        }

        $this->load->view("layout/header", $data);
        $this->load->view("layout/vm_rak", $data);
        $this->load->view("layout/footer");
    }


    public function tambah()
    {
        $data = [
            'rak_buku' => $this->input->post('rak_buku'),
        ];
        // Tambahkan data anggota ke database
        $this->Rak_model->insert($data);  

        // Set flashdata
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan.');

        // Redirect kembali ke halaman yang sesuai
        redirect('Rak');
        return;
    }
    public function edit($id_rak)
    {
        $data = [
            'id_rak' => $id_rak,
            'rak_buku' => $this->input->post('rak_buku'),
        ];
        
        $this->Rak_model->update($id_rak, $data);
        $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
        redirect('Rak');
    }
    public function hapus($id_rak)
    {
        $this->Rak_model->delete($id_rak);
        redirect('Rak');
    }
}