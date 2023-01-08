<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengeluaran_model extends CI_Model
{
    public $table = 'pengeluaran';
    public $id = 'pengeluaran.id';
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
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function join()
    {
        $this->db->select('du.*, r.*');
        $this->db->from('donasi_uang du');
        $this->db->join('user r', 'du.id_user = r.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function joinid($id)
    {
        $this->db->select('du.*, r.*');
        $this->db->from('donasi_uang du');
        $this->db->join('user r', 'du.id_user = r.id');
        $this->db->where('du.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function count_p()
    {
        $data = $this->db
            ->select_sum('nominal')
            ->from('pengeluaran')
            ->get();
        return $data->result_array();
    }

    function get_total()
    {
        $query = $this->db->query("SELECT SUM(nominal) as total FROM donasi_uang");
        return $query->result();
    }
}
