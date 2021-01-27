<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Ulasan_model");
        $this->load->library('form_validation');
    }

    /**
     * View Data Ulasan
     */
    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Ulasan';

        $data["msulasan"] = $this->Ulasan_model->getAll();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('ulasan/list', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Tambah Data Ulasan
     */
    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Ulasan';
        $data['id_pengguna'] = $this->Ulasan_model->getAllPengguna();
        $data['id_produk'] = $this->Ulasan_model->getAllProduk();

        $ulasan = $this->Ulasan_model;
        $validation = $this->form_validation;
        $validation->set_rules($ulasan->rules());

        if ($validation->run()) {
            $ulasan->save();
            redirect('ulasan');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('ulasan/add', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Ubah Data Ulasan
     */
    public function edit($id = null)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Edit Ulasan';

        $data['pengguna'] = $this->Ulasan_model->getAllPengguna();
        $data['produk'] = $this->Ulasan_model->getAllProduk();


        if (!isset($id)) redirect('ulasan');

        $ulasan = $this->Ulasan_model;
        $validation = $this->form_validation;
        $validation->set_rules($ulasan->rules());

        if ($validation->run()) {
            $ulasan->update();
            redirect('ulasan');
        }

        $data["ulasan"] = $ulasan->getById($id);
        if (!$data["ulasan"]) show_404();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('ulasan/edit', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Hapus Data Kategori
     */
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Ulasan_model->delete($id)) {
            redirect(site_url('ulasan'));
        }
    }
}
