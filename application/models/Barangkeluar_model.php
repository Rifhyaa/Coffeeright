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
     * Simpan data produk di db
     */
    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->id_pengguna = $post["id_pengguna"];
        $this->total_produk = $post["total_produk"];
        $this->keterangan = $post["keterangan"];

        $this->creadate = date('Y-m-d H:i:s');

        return $this->db->insert($this->_table, $this);
    }

    public function cobasave($data)
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->id_trkeluar = '1';
        $this->id_produk = $data['id'];
        $this->qty = $data['qty'];

        return $this->db->insert('detail_trbarangkeluar', $this);
    }
}
