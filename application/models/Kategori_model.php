<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public $table = 'kategori';
    public $id_kategori = 'kategori.id_kategori';
    
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

    public function getById($id_kategori)
    {
        return $this->db->get_where('kategori', array('id_kategori' => $id_kategori))->row_array();
    }
    public function update($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id_kategori)
    {
        $this->db->where($this->id_kategori, $id_kategori);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function search($keyword)
    {
        $this->db->like('nama_kategori', $keyword);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}
