<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    // Nama Table
    private $_table = "mspengguna";

    public function rules()
    {
        return [
            [
                'field' => 'nama_pengguna',
                'label' => 'Nama Pengguna',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],

            [
                'field' => 'telp',
                'label' => 'Telepon',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],

            [
                'field' => 'conpassword',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]'
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
        return $this->db->get_where($this->_table, ["id_pengguna" => $id])->row();
    }

    /**
     * Simpan data kategori di db
     */
    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();

        $this->nama_pengguna = $post["nama_pengguna"];
        $this->email = $post["email"];
        $this->telp = $post["telp"];
        $this->alamat = $post["alamat"];
        $this->id_role = 1;
        $this->foto = 'default.png';
        $this->password = $post["password"];

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

        $this->id_pengguna = $post["id"];
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->email = $post["email"];
        $this->telp = $post["telp"];
        $this->alamat = $post["alamat"];

        $this->modiby = $user_session;
        $this->modidate = date('Y-m-d H:i:s');

        return $this->db->update($this->_table, $this, array('id_pengguna' => $this->id_pengguna));
    }

    /**
     * Ubah data kategori di db
     */
    public function delete($id)
    {
        $user_session = $this->session->userdata('pengguna');

        $this->status = 0;
        $this->modiby = $user_session;

        return $this->db->update($this->_table, $this, array('id_pengguna' => $id));
    }
}
