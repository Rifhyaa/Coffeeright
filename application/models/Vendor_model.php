<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_model extends CI_Model
{
    private $_table = "msvendor";

    public function rules()
    {
        return [
            [
                'field' => 'nama_vendor',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat_vendor',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'email_vendor',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[msvendor.email_vendor]',
                'errors' => array(
                    'is_unique' => 'This email has already registered',
                )
            ],

            [
                'field' => 'telp_vendor',
                'label' => 'Telepon',
                'rules' => 'required|min_length[10]|max_length[13]'
            ]
        ];
    }

    /**
     * Mengembalikan tabel data vendor
     * Berstatus aktif
     */
    public function getAll()
    {
        return $this->db->get_where($this->_table, ["status" => 1])->result();
    }

    /**
     * Mengembalikan data vendor
     * Dengan parameter id
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_vendor" => $id])->row();
    }

    /**
     * Simpan data vendor di db
     */
    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->nama_vendor = $post["nama_vendor"];
        $this->alamat_vendor = $post["alamat_vendor"];
        $this->email_vendor = $post["email_vendor"];
        $this->telp_vendor = $post["telp_vendor"];
        $this->status = 1;
        $this->creaby = $user_session;
        $this->creadate = date('Y-m-d H:i:s');

        return $this->db->insert($this->_table, $this);
    }

    /**
     * Ubah data vendor di db
     */
    public function update()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->id_vendor = $post["id"];
        $this->nama_vendor = $post["nama_vendor"];
        $this->alamat_vendor = $post["alamat_vendor"];
        $this->email_vendor = $post["email_vendor"];
        $this->telp_vendor = $post["telp_vendor"];

        $this->modiby = $user_session;
        $this->modidate = date('Y-m-d H:i:s');

        return $this->db->update($this->_table, $this, array('id_vendor' => $this->id_vendor));
    }

    /**
     * Delete data vendor di db
     * Mengganti statusnya menjadi 0 (tidak aktif)
     */
    public function delete($id)
    {
        $user_session = $this->session->userdata('pengguna');

        $this->status = 0;
        $this->modiby = $user_session;

        return $this->db->update($this->_table, $this, array('id_vendor' => $id));
    }
}
