<?php defined('BASEPATH') or exit('No direct script access allowed');

class TrKasir_model extends CI_Model
{
    // Nama Table
    private $_table = "trkasir";

    public function rules()
    {
        return [
            [
                'field' => 'id_pengguna',
                'label' => 'Pengguna',
                'rules' => 'required'
            ],
            [
                'field' => 'total_harga',
                'label' => 'Total Harga',
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
        return $this->db->get_where($this->_table, ["id_trkasir" => $id])->row();
    }

    public function getProductCart($table_name, $id)
    {
        $this->db->where('id_produk', $id);
        $getData = $this->db->get($table_name);
        return $getData->row();
    }

    public function getnumber($string)
    {
        return intval(preg_replace('/[^0-9]+/', '', $string), 10);
    }
    /**
     * Simpan data produk di db
     */
    public function save($id_trkasir, $total_harga)
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $userid = $this->session->id_pengguna;
        
        $aksitabel = array(
            'id_trkasir' => $id_trkasir,
            'id_pengguna' => $userid,
            'total_harga' => $total_harga,
            'total_bayar' => $this->getnumber($post['total_bayar']),
            'creadate' => date('Y-m-d H:i:s')
        );

        $this->db->insert('trkasir', $aksitabel);
    }

    public function cobasave($data, $id_trkasir)
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $aksi_data = array(
            'id_trkasir' => $id_trkasir,
            'id_produk' => $data['id'],
            'price' => $data['price'],
            'qty' => $data['qty']);

        $this->db->insert('detail_trkasir', $aksi_data);
    }
}
