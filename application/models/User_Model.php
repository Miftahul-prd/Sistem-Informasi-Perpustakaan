<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {
    public $table = 'tb_pengguna';

    public function __construct() {
        parent::__construct();
    }

    public function getUserByUsername($username) {
        $this->db->from($this->table);
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get() {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBy() {
        $this->db->from($this->table);
        $this->db->where('username', $this->session->userdata('username'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id) {
        $this->db->where('id_pengguna', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
