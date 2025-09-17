<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public $table = 'anggota';
    public $id_anggota = 'anggota.id_anggota';
    
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

    public function getById($id_anggota)
    {
        return $this->db->get_where('anggota', array('id_anggota' => $id_anggota))->row_array();
    }
    public function update($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id_anggota)
    {
        $this->db->where($this->id_anggota, $id_anggota);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function get_last_member() {
        // Ambil anggota terakhir dari database berdasarkan id
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->order_by('kode_anggota', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        // Periksa apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_total_anggota() {
        $query = $this->db->query('SELECT COUNT(*) as total FROM anggota');
        return $query->row()->total;
    }

    public function search($keyword)
    {
        $this->db->like('nama', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('kelas', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('alamat', $keyword);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}
