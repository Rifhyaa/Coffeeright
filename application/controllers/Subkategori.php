<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Subkategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Subkategori_model");
        $this->load->library('form_validation');

        // Cek User sudah login belum
        is_logged_in();
    }

    /**
     * View Data Subkategori
     */
    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Subkategori';

        $data["mssubkategori"] = $this->Subkategori_model->getAll();
		
		$kategori = $this->Subkategori_model->getAllKategori();
		$data['kategori'] = $kategori;

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('subkategori/list', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Tambah Data Subkategori
     */
    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Subkategori';

		// Set ddl fk dari mskategori
		$kategori = $this->Subkategori_model->getAllKategori();
		$data['kategori'] = $kategori;

        $subkategori = $this->Subkategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($subkategori->rules());

        if ($validation->run()) {
            $subkategori->save();
            redirect('subkategori');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('subkategori/add', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Ubah Data Subkategori
     */
    public function edit($id = null)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Edit Subkategori';

        if (!isset($id)) redirect('subkategori');

		
		// Set ddl fk dari mssubkategori
		$kategori = $this->Subkategori_model->getAllKategori();
		$data['kategori'] = $kategori;

        $subkategori = $this->Subkategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($subkategori->rules());

        if ($validation->run()) {
            $subkategori->update();
            redirect('subkategori');
        }

        $data["subkategori"] = $subkategori->getById($id);
        if (!$data["subkategori"]) show_404();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('subkategori/edit', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Hapus Data Subkategori
     */
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Subkategori_model->delete($id)) {
            redirect(site_url('subkategori'));
        }
    }
}
