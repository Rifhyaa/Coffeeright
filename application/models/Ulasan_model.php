<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan_model extends CI_Model
{
    // Nama Table
    private $_table = "msulasan";
    private $_table2 = "mspengguna";
    private $_table3 = "msproduk";

    public function rules()
    {
        return [
            [
                'field' => 'deskripsi_ulasan',
                'label' => 'Deskripsi',
                'rules' => 'required'
            ]
            // [
            //     'field' => 'id_pengguna',
            //     'label' => 'Pengguna',
            //     'rules' => 'required'
            // ],
            // [
            //     'field' => 'id_produk',
            //     'label' => 'Produk',
            //     'rules' => 'required'
            // ]
        ];
    }

    /**
     * Mengembalikan tabel data ulasan
     * Berstatus aktif
     */
    public function getAll()
    {
        // return $this->db->get_where($this->_table)->result();
        return $this->db->query("SELECT u.id_ulasan, u.deskripsi_ulasan, p.nama_pengguna, pr.nama_produk 
        FROM msulasan u JOIN mspengguna p ON u.id_pengguna = p.id_pengguna 
        JOIN msproduk pr ON u.id_produk = pr.id_produk")->result_array();
    }

    /**
     * Mengembalikan data kategori
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_ulasan" => $id])->row();
    }

    /**
     * Mengembalikan data pengguna
     */
    public function getAllPengguna()
    {
        return $this->db->get_where($this->_table2, ["status" => 1])->result();
    }

    /**
     * Mengembalikan data produk
     */
    public function getAllProduk()
    {
        return $this->db->get_where($this->_table3, ["status" => 1])->result();
    }

    public function getUlasanByProduk($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->result();
    }

    public function getTotalUlasanByProduk($id)
    {
        $data = $this->db->query("SELECT COUNT(id_ulasan) AS total FROM msulasan WHERE id_produk = $id")->row();
        return $data->total;
    }

    /**
     * Simpan data kategori di db
     */
    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->deskripsi_ulasan = $post["deskripsi_ulasan"];
        $this->id_pengguna = $this->session->userdata('id_pengguna');
        $this->id_produk = $post["id_produk"];

        return $this->db->insert($this->_table, $this);
    }

    /**
     * Ubah data kategori di db
     */
    public function update()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->id_ulasan = $post["id"];
        $this->deskripsi_ulasan = $post["deskripsi_ulasan"];
        $this->id_pengguna = $post["id_pengguna"];
        $this->id_produk = $post["id_produk"];

        return $this->db->update($this->_table, $this, array('id_ulasan' => $this->id_ulasan));
    }

    /**
     * Ubah data kategori di db
     */
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_ulasan" => $id));
    }
}
