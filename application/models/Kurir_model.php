<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kurir_model extends CI_Model
{
    // Nama Table
    private $_table = "mskota";

    public function rules()
    {
        return [
            [
                'field' => 'nama_kota',
                'label' => 'Kota',
                'rules' => 'required'
            ]
        ];
    }

    /**
     * Mengembalikan tabel data kota
     * Berstatus aktif
     */
    public function getAll()
    {
        return $this->db->get_where($this->_table, ["status" => 1])->result();
    }

    /**
     * Mengembalikan data kota
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kota" => $id])->row();
    }

    /**
     * Simpan data kota di db
     */
    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->nama_kota = $post["nama_kota"];
        $this->status = 1;
        $this->creaby = $user_session;
        $this->creadate = date('Y-m-d H:i:s');

        return $this->db->insert($this->_table, $this);
    }

    /**
     * Ubah data kota di db
     */
    public function update()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->id_kota = $post["id"];
        $this->nama_kota = $post["nama_kota"];

        $this->modiby = $user_session;
        $this->modidate = date('Y-m-d H:i:s');

        return $this->db->update($this->_table, $this, array('id_kota' => $this->id_kota));
    }

    /**
     * Ubah data kota di db
     * Status kota menjadi 0
     */
    public function delete($id)
    {
        $user_session = $this->session->userdata('pengguna');

        $this->status = 0;
        $this->modiby = $user_session;

        return $this->db->update($this->_table, $this, array('id_kota' => $id));
    }
}
