<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    // Nama Table
    private $_table = "mskategori";

    public function rules()
    {
        return [
            [
                'field' => 'deskripsi_kategori',
                'label' => 'Deskripsi',
                'rules' => 'required'
            ]
        ];
    }

    /**
     * Mengembalikan tabel data kategori
     * Berstatus aktif
     */
    public function getAll()
    {
        return $this->db->get_where($this->_table, ["status" => 1])->result();
    }

    /**
     * Mengembalikan data kategori
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
    }

    /**
     * Simpan data kategori di db
     */
    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->deskripsi_kategori = $post["deskripsi_kategori"];
        $this->status = 1;
        $this->creaby = $user_session;
        $this->creadate = date('Y-m-d H:i:s');

        return $this->db->insert($this->_table, $this);
    }

    /**
     * Ubah data kategori di db
     */
    public function update()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->id_kategori = $post["id"];
        $this->deskripsi_kategori = $post["deskripsi_kategori"];

        $this->modiby = $user_session;
        $this->modidate = date('Y-m-d H:i:s');

        return $this->db->update($this->_table, $this, array('id_kategori' => $this->id_kategori));
    }

    /**
     * Ubah data kategori di db
     */
    public function delete($id)
    {
        $user_session = $this->session->userdata('pengguna');

        $this->status = 0;
        $this->modiby = $user_session;

        return $this->db->update($this->_table, $this, array('id_kategori' => $id));
    }
}
