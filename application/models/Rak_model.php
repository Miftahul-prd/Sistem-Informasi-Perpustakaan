<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak_model extends CI_Model
{
    public $table = 'rak';
    public $id_rak = 'rak.id_rak';
    
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

    public function getById($id_rak)
    {
        return $this->db->get_where('rak', array('id_rak' => $id_rak))->row_array();
    }
    public function update($id_rak, $data)
    {
        $this->db->where('id_rak', $id_rak);
        $this->db->update('rak', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id_rak)
    {
        $this->db->where($this->id_rak, $id_rak);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function search($keyword)
    {
        $this->db->like('rak_buku', $keyword);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}
