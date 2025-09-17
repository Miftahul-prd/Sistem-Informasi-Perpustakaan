<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalogbuku_model extends CI_Model
{
    public $table = 'buku';
    public $id_buku = 'buku.id_buku';
    
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->select('b.*, k.nama_kategori as kategori, r.rak_buku as rak');
        $this->db->from($this->table . ' b');
        $this->db->join('kategori k', 'k.id_kategori = b.kategori', 'left');
        $this->db->join('rak r', 'r.id_rak = b.rak', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id_buku)
    {
        $this->db->select('b.*, k.nama_kategori as kategori, r.rak_buku as rak');
        $this->db->from('buku b');
        $this->db->join('kategori k', 'k.id_kategori = b.kategori', 'left');
        $this->db->join('rak r', 'r.id_rak = b.rak', 'left');
        $this->db->where('b.id_buku', $id_buku);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($id_buku, $data)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id_buku)
    {
        $this->db->where($this->id_buku, $id_buku);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    
    public function check_book_availability($id_buku) {
        $this->db->where('id_buku', $id_buku);
        $this->db->where('status', 'Tersedia');
        $query = $this->db->get('buku');
        return $query->num_rows();
    }

    public function update_book_availability($book_id, $status) {
        // Check stok buku sebelum memperbarui status
        if ($status == true) {
            $available_books = $this->check_book_availability($book_id);
            if ($available_books > 0) {
                // Jika masih ada stok tersedia, biarkan status tetap "Tersedia"
                return true;
            }
        }
    
        // Jika stok habis atau status diubah secara eksplisit, lakukan pembaruan
        $this->db->where('id_buku', $book_id);
        $this->db->where('stok', 0);
        $this->db->update('buku', ['status' => $status ? 'Tersedia' : 'Tidak Tersedia']);
    
        // Debug: Periksa kesalahan database
        if ($this->db->affected_rows() == 0) {
            // Update gagal, tampilkan pesan kesalahan
            log_message('error', 'Update failed: ' . $this->db->last_query());
            return false;
        }
    
        return true;
    }
    

    public function searchBooks($searchText) {
        $this->db->like('judul_buku', $searchText);
        $query = $this->db->get('buku');
        return $query->result_array();
    } 

    public function search($keyword)
    {
        $this->db->like('judul_buku', $keyword);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

}
