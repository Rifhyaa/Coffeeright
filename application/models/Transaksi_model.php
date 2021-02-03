<?php defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    // Nama Table
    private $_table = "trpembelian";

    /**
     * Mengembalikan tabel data transaksi
     * Berstatus aktif
     */
    public function getAll($status)
    {
        /**
         * 0 Belum dipickup
         * 1 Sudah dipickup
         * 2 Sedang dalam pengiriman
         * 3 Selesai
         */
        return $this->db->get_where($this->_table, ["status_pengiriman" => $status])->result();
    }

    /**
     * Mengembalikan data transaksi
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_trpembelian" => $id])->row();
    }

    public function insertPengiriman($data)
    {
        return $this->db->insert('trpengiriman', $data);
    }

    public function changeKurir($kurir, $id_transaksi)
    {
        $this->id_kurir = $kurir;
        $this->status_pengiriman = 1;
        return $this->db->update($this->_table, $this, array('id_trpembelian' => $id_transaksi));
    }

    public function changeStatus($status, $id_transaksi)
    {
        $this->status_pengiriman = $status;
        return $this->db->update($this->_table, $this, array('id_trpembelian' => $id_transaksi));
    }
}
