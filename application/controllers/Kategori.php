<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model");
        $this->load->library('form_validation');

        // Cek User sudah login belum
        is_logged_in();
    }

    /**
     * View Data Kategori
     */
    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Kategori';

        $data["mskategori"] = $this->Kategori_model->getAll();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kategori/list', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Tambah Data Kategori
     */
    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Kategori';

        $kategori = $this->Kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->save();
            redirect('kategori');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kategori/add', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Ubah Data Kategori
     */
    public function edit($id = null)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Edit Kategori';

        if (!isset($id)) redirect('kategori');

        $kategori = $this->Kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update();
            redirect('kategori');
        }

        $data["kategori"] = $kategori->getById($id);
        if (!$data["kategori"]) show_404();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kategori/edit', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Hapus Data Kategori
     */
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Kategori_model->delete($id)) {
            redirect(site_url('kategori'));
        }
    }
}
