<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
        $this->load->model('User_model', 'userrole');
        $this->load->library('session');
        $this->load->helper('url');

        // Cek login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index() {
        $username = $this->session->userdata('username');
        $data['tb_pengguna'] = $this->userrole->getUserByUsername($username);
        $data['judul'] = "Data Pengguna";

        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['tb_pengguna_list'] = $this->Pengguna_model->search($keyword);
        } else {
            $data['tb_pengguna_list'] = $this->Pengguna_model->get();
        }

        $this->load->view("layout/header", $data);
        $this->load->view("layout/vm_pengguna", $data);
        $this->load->view("layout/footer");
    }

    public function tambah()
    {
        // Konfigurasi untuk library upload
        $config['upload_path'] = './uploads_foto/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB (ukuran dalam kilobita)

        // Load library upload dan inisialisasi dengan konfigurasi
        $this->load->library('upload', $config);

        // Lakukan proses upload
        if (!$this->upload->do_upload('foto')) {
            // Jika upload gagal, tangani kesalahan
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('pesan', 'Gagal mengunggah file: ' . $error);
            redirect('Pengguna');
            return;
        } else {
            // Jika upload berhasil, dapatkan informasi file yang diunggah
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Data anggota dari form
            $data = [
                'nama_pengguna' => $this->input->post('nama_pengguna'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level'),
                'foto' => $file_name, // Simpan nama file foto di database
            ];
            // Tambahkan data anggota ke database
            $this->Pengguna_model->insert($data);  

            // Set flashdata
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan.');

            // Redirect kembali ke halaman yang sesuai
            redirect('Pengguna');
            return;
        }
    }
    public function edit($id_pengguna)
    {
        $config['upload_path'] = './uploads_foto/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB (ukuran dalam kilobita)

        // Load library upload dan inisialisasi dengan konfigurasi
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            // Jika unggahan foto berhasil, dapatkan informasi file yang diunggah
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
    
            // Data anggota dari formulir, termasuk foto yang baru (jika ada)
            $data = [
                'id_pengguna' => $id_pengguna,
                'nama_pengguna' => $this->input->post('nama_pengguna'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level'),
                'foto' => $file_name, // Simpan nama file foto di database
            ];
        } else {
            // Jika unggahan foto gagal, tetap gunakan foto yang sudah ada
            $data = [
                'id_pengguna' => $id_pengguna,
                'nama_pengguna' => $this->input->post('nama_pengguna'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level'),
            ];
        }
        
        // Memperbarui data anggota bersama dengan foto (jika ada perubahan)
        $this->Pengguna_model->update($id_pengguna, $data);
        $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
        redirect('Pengguna');
    }
    public function hapus($id_pengguna)
    {
        $this->Pengguna_model->delete($id_pengguna);
        redirect('Pengguna');
    }
}