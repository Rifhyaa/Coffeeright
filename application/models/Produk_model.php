<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    // Nama Table
    private $_table = "msproduk";

    public function rules()
    {
        return [
            [
                'field' => 'nama_produk',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'deskripsi_produk',
                'label' => 'Deskripsi',
                'rules' => 'required'
            ],
            [
                'field' => 'id_subkategori',
                'label' => 'Sub Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'harga_produk',
                'label' => 'Harga',
                'rules' => 'required|min_length[4]'
            ],
            [
                'field' => 'stok_produk',
                'label' => 'Stok',
                'rules' => 'required|max_length[3]'
            ]
        ];
    }

    /**
     * Mengembalikan tabel data produk
     * Berstatus aktif
     */
    public function getAll()
    {
        return $this->db->get_where($this->_table, ["status" => 1])->result();
    }

    /**
     * Mengembalikan data produk
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->row();
    }

    /**
     * Simpan data produk di db
     */
    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->nama_produk = $post["nama_produk"];
        $this->deskripsi_produk = $post["deskripsi_produk"];
        $this->id_subkategori = $post["id_subkategori"];
        $this->harga_produk = $post["harga_produk"];
        $this->stok_produk = $post["stok_produk"];
        $this->status = 1;

        $this->creaby = $user_session;
        $this->creadate = date('Y-m-d H:i:s');

        return $this->db->insert($this->_table, $this);
    }

    /**
     * Ubah data produk di db
     */
    public function update()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->id_produk = $post["id"];
        $this->nama_produk = $post["nama_produk"];
        $this->deskripsi_produk = $post["deskripsi_produk"];
        $this->id_subkategori = $post["id_subkategori"];
        $this->harga_produk = $post["harga_produk"];
        $this->stok_produk = $post["stok_produk"];

        $this->modiby = $user_session;
        $this->modidate = date('Y-m-d H:i:s');

        return $this->db->update($this->_table, $this, array('id_produk' => $this->id_produk));
    }

    /**
     * Ubah data produk di db
     * Status produk menjadi 0
     */
    public function delete($id)
    {
        $user_session = $this->session->userdata('pengguna');

        $this->status = 0;
        $this->modiby = $user_session;

        return $this->db->update($this->_table, $this, array('id_produk' => $id));
    }

    /**
     * Mengembalikan tabel data fk sub kategori
     * Berstatus aktif
     */
    public function getAllSubKategori()
    {
        return $this->db->get_where("mssubkategori", ["status" => 1])->result();
    }
}
