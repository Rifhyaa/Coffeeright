<?php defined('BASEPATH') or exit('No direct script access allowed');

class Subkategori_model extends CI_Model
{
    // Nama Table
    private $_table = "mssubkategori";

    public function rules()
    {
        return [
            [
                'field' => 'deskripsi_subkategori',
                'label' => 'Deskripsi',
                'rules' => 'required'
            ],
			[
                'field' => 'id_kategori',
                'label' => 'Sub Kategori',
                'rules' => 'required'
            ]
        ];
    }

    /**
     * Mengembalikan tabel data sub kategori
     * Berstatus aktif
     */
    public function getAll()
    {
        return $this->db->get_where($this->_table, ["status" => 1])->result();
    }

    /**
     * Mengembalikan data sub kategori
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_subkategori" => $id])->row();
    }

    /**
     * Simpan data sub kategori di db
     */
    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();
		
        $this->deskripsi_subkategori = $post["deskripsi_subkategori"];
        $this->id_kategori = $post["id_kategori"];
        $this->status = 1;
        $this->creaby = $user_session;
        $this->creadate = date('Y-m-d H:i:s');

        return $this->db->insert($this->_table, $this);
    }

    /**
     * Ubah data sub kategori di db
     */
    public function update()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->id_subkategori = $post["id"];
        $this->deskripsi_subkategori = $post["deskripsi_subkategori"];
        $this->id_kategori = $post["id_kategori"];

        $this->modiby = $user_session;
        $this->modidate = date('Y-m-d H:i:s');

        return $this->db->update($this->_table, $this, array('id_subkategori' => $this->id_subkategori));
    }

    /**
     * Ubah data sub kategori di db
     * Status sub kategori menjadi 0
     */
    public function delete($id)
    {
        $user_session = $this->session->userdata('pengguna');

        $this->status = 0;
        $this->modiby = $user_session;
        $this->modidate = date('Y-m-d H:i:s');

        return $this->db->update($this->_table, $this, array('id_subkategori' => $id));
    }

	/**
     * Mengembalikan tabel data fk sub kategori
     * Berstatus aktif
     */
    public function getAllKategori()
    {
        return $this->db->get_where("mskategori", ["status" => 1])->result();
    }
}
