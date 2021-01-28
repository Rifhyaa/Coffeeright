<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kota_model");
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
        $data['title'] = 'List Kota';

        $data["mskota"] = $this->Kota_model->getAll();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kota/list', $data);
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
        $data['title'] = 'Tambah Kota';

        $kota = $this->Kota_model;
        $validation = $this->form_validation;
        $validation->set_rules($kota->rules());

        if ($validation->run()) {
            $kota->save();
            redirect('kota');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kota/add', $data);
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
        $data['title'] = 'Edit Kota';

        if (!isset($id)) redirect('kota');

        $kota = $this->Kota_model;
        $validation = $this->form_validation;
        $validation->set_rules($kota->rules());

        if ($validation->run()) {
            $kota->update();
            redirect('kota');
        }

        $data["kota"] = $kota->getById($id);
        if (!$data["kota"]) show_404();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kota/edit', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Hapus Data Kategori
     */
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Kota_model->delete($id)) {
            redirect(site_url('kota'));
        }
    }
}
