<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Vendor_model");
        $this->load->library('form_validation');

        // Cek User sudah login belum
        is_logged_in();
    }

    /**
     * View Data Vendor
     */
    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Vendor';

        $data["msvendor"] = $this->Vendor_model->getAll();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('vendor/list', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Tambah Data Vendor
     */
    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Vendor';

        $vendor = $this->Vendor_model;
        $validation = $this->form_validation;
        $validation->set_rules($vendor->rules());

        if ($validation->run()) {
            $vendor->save();
            redirect('vendor');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('vendor/add', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Ubah Data Vendor
     */
    public function edit($id = null)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Edit Vendor';

        if (!isset($id)) redirect('vendor');

        $vendor = $this->Vendor_model;
        $validation = $this->form_validation;
        $validation->set_rules($vendor->rules());

        if ($validation->run()) {
            $vendor->update();
            redirect('vendor');
        }

        $data["vendor"] = $vendor->getById($id);
        if (!$data["vendor"]) show_404();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('vendor/edit', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Hapus Data Vendor
     */
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Vendor_model->delete($id)) {
            redirect(site_url('vendor'));
        }
    }
}
