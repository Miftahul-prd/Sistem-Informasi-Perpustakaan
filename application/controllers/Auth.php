<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view("layout/auth_header");
        $this->load->view("auth/login");
        $this->load->view("layout/auth_footer");
    }  

    public function cek_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->userrole->getUserByUsername($username);

        if ($user) {
            // Bandingkan password yang diinput dengan password di database
            if ($password === $user['password']) { 
                $data = [
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'id_pengguna' => $user['id_pengguna'],
                ];
                $this->session->set_userdata($data);

                if ($user['level'] == 'Administrator') {
                    redirect('dashboard');
                } else {
                    redirect('dashboard'); // Sesuaikan jika ada halaman berbeda untuk level lain
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Ditemukan!</div>');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('auth');
    }
}
