<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk_model extends CI_Model
{
    // Nama Table
    private $_table = "trbarangmasuk";
    private $_table2 = "msvendor";

    public function rules()
    {
        return [
            [
                'field' => 'id_pengguna',
                'label' => 'Pengguna',
                'rules' => 'required'
            ],
            [
                'field' => 'total_produk',
                'label' => 'Total Produk',
                'rules' => 'required'
            ],
            [
                'field' => 'id_vendor',
                'label' => 'Vendor',
                'rules' => 'required'
            ]
        ];
    }

    /**
     * Mengembalikan tabel data produk
     * Berstatus aktif
     */
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
        return $this->db->get_where($this->_table, ["id_trmasuk" => $id])->row();
    }

    public function getProductCart($table_name, $id)
    {
        $this->db->where('id_produk', $id);
        $getData = $this->db->get($table_name);
        return $getData->row();
    }

    public function getAllVendor()
    {
        return $this->db->get_where($this->_table2, ["status" => 1])->result();
    }


    /**
     * Simpan data barang masuk di db
     */
    public function save($id_trmasuk, $total_produk)
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $userid = $this->session->id_pengguna;

        $trmasuk = array(
            'id_trmasuk' => $id_trmasuk,
            'id_pengguna' => $userid,
            'total_produk' => $total_produk,
            'id_vendor' => $post['id_vendor'],
            'creadate' => date('Y-m-d H:i:s')
        );

        $this->db->insert('trbarangmasuk', $trmasuk);
    }

    public function saveDetail($data, $id_trmasuk)
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $dtlmasuk = array(
            'id_trmasuk' => $id_trmasuk,
            'id_produk' => $data['id'],
            'qty' => $data['qty']
        );

        // $produk = $this->Produk_model;
        // $stok = $produk['stok'];
        // $total = $stok + $data['qty'];

        $this->db->insert('detail_trbarangmasuk', $dtlmasuk);
    }
}
