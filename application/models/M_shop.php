<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_shop extends CI_Model {

    public function get_all() {
        return $this->db->order_by('created_at','DESC')->get('barang')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('barang', ['id' => $id])->row();
    }

    public function get_by_kategori($kategori) {
        $this->db->where('kategori', $kategori);
        $this->db->order_by('created_at','DESC');
        return $this->db->get('barang')->result();
    }

    public function get_kategori_list() {
        $this->db->select('kategori, COUNT(*) as total');
        $this->db->group_by('kategori');
        $this->db->order_by('kategori','ASC');
        return $this->db->get('barang')->result();
    }

    public function count_all()       { return $this->db->count_all('barang'); }
    public function count_new()       { return $this->db->where('created_at >=', date('Y-m-d', strtotime('-7 days')))->count_all_results('barang'); }

    public function insert($data)     { return $this->db->insert('barang', $data); }

    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('barang', $data);
    }

    public function delete($id)       { $this->db->where('id',$id); return $this->db->delete('barang'); }
    public function delete_all()      { return $this->db->empty_table('barang'); }

    public function search($keyword) {
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->order_by('created_at','DESC');
        return $this->db->get('barang')->result();
    }
}
