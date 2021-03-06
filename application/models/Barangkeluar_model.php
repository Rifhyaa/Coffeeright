<?php defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar_model extends CI_Model
{
    // Nama Table
    private $_table = "trbarangkeluar";

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
                'field' => 'keterangan',
                'label' => 'Keterangan',
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
        return $this->db->get_where($this->_table, ["id_trkeluar" => $id])->row();
    }

    public function getProductCart($table_name, $id)
    {
        $this->db->where('id_produk', $id);
        $getData = $this->db->get($table_name);
        return $getData->row();
    }


    /**
     * Simpan data transaksi di db
     */
    public function save($id_trkeluar, $total_produk)
    {
        $post = $this->input->post();
        $userid = $this->session->userdata('id_pengguna');

        $aksitabel = array(
            'id_trkeluar' => $id_trkeluar,
            'id_pengguna' => $userid,
            'total_produk' => $total_produk,
            'keterangan' => $post["keterangan"],
            'creadate' => date('Y-m-d H:i:s')
        );

        $this->db->insert('trbarangkeluar', $aksitabel);
    }

    /**
     * Simpan data detail transaksi di db
     */
    public function saveDetail($data, $id_trkeluar)
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $aksi_data = array(
            'id_trkeluar' => $id_trkeluar,
            'id_produk' => $data['id'],
            'qty' => $data['qty']
        );

        $this->db->insert('detail_trbarangkeluar', $aksi_data);

        /* 
            mengurangi stok
        */

        //$produk = $this->Produk_model->getById($id_produk);
        // foreach ($this->cart->contents() as $items) {
        //     $barangmasuk = $this->Produk_model;
        //     $this->cart->update(array('rowid' => $items['id'], 'qty' => 0));
        // }
        // $produk = $barangmasuk['id_produk'] + $aksidata['id_produk'];

        // return $this->db->update($this->_table, $this, array('id_pengguna' => $id));
    }
}
