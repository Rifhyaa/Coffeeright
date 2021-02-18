<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Catalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Produk_model");
        $this->load->model("Ulasan_model");
        $this->load->model("Pengguna_model");
        $this->load->model("TransBeli_model");
        $this->load->library('form_validation');

        // Cek User sudah login belum
        is_logged_in();
    }

    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Produk';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        // Menampilkan tampilan
        $this->load->view('layout/cust_header', $data);
        $this->load->view('layout/cust_breadcrumb', $data);
        $this->load->view('catalog/list', $data);
        $this->load->view('layout/cust_footer');
    }

    public function detail($id)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Detail Produk';

        $data["produk"] = $this->Produk_model->getById($id);

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $data["ulasan"] = $this->Ulasan_model->getUlasanByProduk($id);

        $data["totalUlasan"] = $this->Ulasan_model->getTotalUlasanByProduk($id);

        $data["pengguna"] = $this->Pengguna_model->getAll();

        $data["penjualan"] = $this->TransBeli_model->getTotalJualProduk($id);

        // Menampilkan tampilan
        $this->load->view('layout/cust_header', $data);
        $this->load->view('layout/cust_breadcrumb', $data);
        $this->load->view('catalog/detail', $data);
        $this->load->view('layout/cust_footer');
    }

    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Produk';

        // Set ddl fk dari mssubkategori
        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $produk = $this->Produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $produk->save();
            redirect('produk');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('layout/cust_breadcrumb', $data);
        $this->load->view('produk/add', $data);
        $this->load->view('layout/admin_footer');
    }

    public function edit($id = null)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Edit Produk';

        if (!isset($id)) redirect('produk');


        // Set ddl fk dari mssubkategori
        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $produk = $this->Produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $produk->update();
            redirect('produk');
        }

        $data["produk"] = $produk->getById($id);
        if (!$data["produk"]) show_404();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('layout/cust_breadcrumb', $data);
        $this->load->view('produk/edit', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Hapus Data Produk
     */
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Produk_model->delete($id)) {
            redirect(site_url('produk'));
        }
    }
}
