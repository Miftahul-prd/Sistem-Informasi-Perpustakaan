<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    public $table = 'tb_pengguna';
    public $id_pengguna = 'tb_pengguna.id_pengguna';
    
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $this->db->order_by('created_at', 'DESC'); // Mengurutkan berdasarkan created_at secara menurun
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id_pengguna)
    {
        return $this->db->get_where('tb_pengguna', array('id_pengguna' => $id_pengguna))->row_array();
    }
    public function update($id_pengguna, $data)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('tb_pengguna', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id_pengguna)
    {
        $this->db->where($this->id_pengguna, $id_pengguna);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function search($keyword)
    {
        $this->db->like('nama_pengguna', $keyword);
        $this->db->or_like('username', $keyword);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}
