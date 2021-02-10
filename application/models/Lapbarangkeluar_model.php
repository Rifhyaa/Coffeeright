<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapbarangkeluar_model extends CI_Model
{
    // Nama Table
    private $_table = "trbarangkeluar";
    private $_table2 = "detail_trbarangkeluar";

    public function getAll()
    {
        return $this->db->get_where($this->_table)->result();
    }

    /**
     * Mengembalikan data produk
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_trkeluar" => $id])->row();
    }

    public function getAllDetail()
    {
        return $this->db->get_where($this->_table2)->result();
    }
}
