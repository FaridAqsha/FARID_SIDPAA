<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Donasi_Barang_model extends CI_Model
{
    public $table = 'donasi_barang';
    public $id = 'donasi_barang.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function join()
    {
        $this->db->select('db.*, r.*');
        $this->db->from('donasi_barang db');
        $this->db->join('user r', 'db.id_user = r.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function joinid($id)
    {
        $this->db->select('db.*, r.*');
        $this->db->from('donasi_barang db');
        $this->db->join('user r', 'db.id_user = r.id');
        $this->db->where('db.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function count_barang()
    {
        $this->db->select('*');
        $this->db->from('donasi_barang');
        return $this->db->get()->num_rows();
    }
}
