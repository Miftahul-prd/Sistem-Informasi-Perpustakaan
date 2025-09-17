<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->model('User_model'); // Pastikan model User_model sudah dimuat
        $this->load->library('session');
        $this->load->helper('url');

        // Cek login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index() {
        $data['judul'] = "Data Anggota";
        //$data['anggota'] = $this->Anggota_model->get();
        $data['tb_pengguna'] = $this->User_model->getUserByUsername($this->session->userdata('username')); // Inisialisasi variabel tb_pengguna
        
        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['anggota'] = $this->Anggota_model->search($keyword);
        } else {
            $data['anggota'] = $this->Anggota_model->get();
        }

        $this->load->view("layout/header", $data);
        $this->load->view("layout/vm_anggota", $data);
        $this->load->view("layout/footer");
    }
    
    public function tambah()
    {
        // Konfigurasi untuk library upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB (ukuran dalam kilobita)

        // Load library upload dan inisialisasi dengan konfigurasi
        $this->load->library('upload', $config);

        // Lakukan proses upload
        if (!$this->upload->do_upload('pas_foto')) {
            // Jika upload gagal, tangani kesalahan
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('pesan', 'Gagal mengunggah file: ' . $error);
            redirect('Anggota');
            return;
        } else {
            // Jika upload berhasil, dapatkan informasi file yang diunggah
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Data anggota dari form
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'kelas' => $this->input->post('kelas'),
                'jurusan' => $this->input->post('jurusan'),
                'role' => $this->input->post('role'),
                'mapel' => $this->input->post('mapel'),
                'alamat' => $this->input->post('alamat'),
                'pas_foto' => $file_name, // Simpan nama file foto di database
            ];
            // Tambahkan data anggota ke database
            $this->Anggota_model->insert($data);  

            // Set flashdata
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan.');

            // Redirect kembali ke halaman yang sesuai
            redirect('Anggota');
            return;
        }
    }
    
    public function edit($id_anggota)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB (ukuran dalam kilobita)

        // Load library upload dan inisialisasi dengan konfigurasi
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('pas_foto')) {
            // Jika unggahan foto berhasil, dapatkan informasi file yang diunggah
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
    
            // Data anggota dari formulir, termasuk foto yang baru (jika ada)
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'kelas' => $this->input->post('kelas'),
                'jurusan' => $this->input->post('jurusan'),
                'alamat' => $this->input->post('alamat'),
                'pas_foto' => $file_name, // Simpan nama file foto di database
            ];
        } else {
            // Jika unggahan foto gagal, tetap gunakan foto yang sudah ada
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'kelas' => $this->input->post('kelas'),
                'jurusan' => $this->input->post('jurusan'),
                'alamat' => $this->input->post('alamat'),
            ];
        }
        
        // Memperbarui data anggota bersama dengan foto (jika ada perubahan)
        $this->Anggota_model->update($id_anggota, $data);
        $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
        redirect('Anggota');
    }

    public function detail($id_anggota)
    {
        // Mendapatkan data anggota berdasarkan ID
        $data['anggota'] = $this->Anggota_model->getById($id_anggota);
        $this->load->view("layout/vm_anggota", $data);
    }
    public function hapus($id_anggota)
    {
        $this->Anggota_model->delete($id_anggota);
        redirect('Anggota');
    }

    public function printAnggota($id_anggota)
    {
        $data['anggota'] = $this->Anggota_model->getById($id_anggota);
        $this->load->view("layout/vm_print", $data);
    }
}