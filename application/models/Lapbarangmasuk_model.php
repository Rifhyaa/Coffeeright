<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapbarangmasuk_model extends CI_Model
{
    // Nama Table
    private $_table = "trbarangmasuk";
    private $_table2 = "detail_trbarangmasuk";

    /**
     * Mengembalikan tabel data produk
     * Berstatus aktif
     */
    public function getAll()
    {
        return $this->db->query('SELECT * FROM view_laporanbarangmasuk')->result();
    }

    /**
     * Mengembalikan data produk
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_trmasuk" => $id])->row();
    }

    public function getProductCart($table_name, $id)
    {
        $this->db->where('id_produk', $id);
        $getData = $this->db->get($table_name);
        return $getData->row();
    }

    public function getAllDetail()
    {
        return $this->db->get_where($this->_table2)->result();
    }
}
