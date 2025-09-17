<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalogbuku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Katalogbuku_model');
        $this->load->model('Kategori_model');
        $this->load->model('Rak_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['judul'] = "Data Buku";
        //$data['buku'] = $this->Katalogbuku_model->get();
        $data['kategori'] = $this->Kategori_model->get();

        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['buku'] = $this->Katalogbuku_model->search($keyword);
        } else {
            $data['buku'] = $this->Katalogbuku_model->get();
        }

        $data['rak'] = $this->Rak_model->get();
        $this->load->view("home/header");
        $this->load->view("layout/vm_katalog", $data);
        //$this->load->view("layout/footer");
    }

    public function tambah()
    {
        // Konfigurasi untuk library upload
        $config['upload_path'] = './uploads/cover/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB (ukuran dalam kilobita)

        // Load library upload dan inisialisasi dengan konfigurasi
        $this->load->library('upload', $config);

        // Lakukan proses upload
        if (!$this->upload->do_upload('cover')) {
            // Jika upload gagal, tangani kesalahan
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('pesan', 'Gagal mengunggah file: ' . $error);
            redirect('Buku');
            return;
        } else {
            // Jika upload berhasil, dapatkan informasi file yang diunggah
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Data buku dari form
            $data = [
                'judul_buku' => $this->input->post('judul_buku'),
                'eksemplar' => $this->input->post('eksemplar'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tempat_terbit' => $this->input->post('tempat_terbit'),
                'edisi' => $this->input->post('edisi'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'asal' => $this->input->post('asal'),
                'harga' => $this->input->post('harga'),
                'jenis_buku' => $this->input->post('jenis_buku'),
                'kategori' => $this->input->post('id_kategori'), // Ubah menjadi id_kategori
                'rak' => $this->input->post('id_rak'), // Ubah menjadi id_rak
                'klasifikasi' => $this->input->post('klasifikasi'),
                'no_panggil' => $this->input->post('no_panggil'),
                'stok' => $this->input->post('stok'),
                'status' => $this->input->post('status'),
                'cover' => $file_name, // Simpan nama file foto di database
            ];
            
            // Tambahkan data buku ke database
            $this->Buku_model->insert($data);  

            // Set flashdata
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan.');

            // Redirect kembali ke halaman yang sesuai
            redirect('Buku');
            return;
        }
    }
    
    public function edit($id_buku)
    {
        $config['upload_path'] = './uploads/cover/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB (ukuran dalam kilobita)

        // Load library upload dan inisialisasi dengan konfigurasi
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('cover')) {
            // Jika unggahan foto berhasil, dapatkan informasi file yang diunggah
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
    
            // Data buku dari formulir, termasuk foto yang baru (jika ada)
            $data = [
                'judul_buku' => $this->input->post('judul_buku'),
                'eksemplar' => $this->input->post('eksemplar'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tempat_terbit' => $this->input->post('tempat_terbit'),
                'edisi' => $this->input->post('edisi'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'asal' => $this->input->post('asal'),
                'harga' => $this->input->post('harga'),
                'jenis_buku' => $this->input->post('jenis_buku'),
                'kategori' => $this->input->post('id_kategori'),
                'rak' => $this->input->post('id_rak'),
                'klasifikasi' => $this->input->post('klasifikasi'),
                'no_panggil' => $this->input->post('no_panggil'),
                'stok' => $this->input->post('stok'),
                'status' => $this->input->post('status'),
                'cover' => $file_name, // Simpan nama file foto di database
            ];
        } else {
            // Jika unggahan foto gagal, tetap gunakan foto yang sudah ada
            $data = [
                'judul_buku' => $this->input->post('judul_buku'),
                'eksemplar' => $this->input->post('eksemplar'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tempat_terbit' => $this->input->post('tempat_terbit'),
                'edisi' => $this->input->post('edisi'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'asal' => $this->input->post('asal'),
                'harga' => $this->input->post('harga'),
                'jenis_buku' => $this->input->post('jenis_buku'),
                'kategori' => $this->input->post('id_kategori'),
                'rak' => $this->input->post('id_rak'),
                'klasifikasi' => $this->input->post('klasifikasi'),
                'no_panggil' => $this->input->post('no_panggil'),
                'stok' => $this->input->post('stok'),
                'status' => $this->input->post('status'),
            ];
        }
        
        // Memperbarui data buku bersama dengan foto (jika ada perubahan)
        $this->Buku_model->update($id_buku, $data);
        $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
        redirect('Buku');
    }

    public function hapus($id_buku)
    {
        $this->Buku_model->delete($id_buku);
        redirect('Buku');
    }
    
    
}