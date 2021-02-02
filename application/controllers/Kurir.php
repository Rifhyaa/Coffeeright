<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kurir_model");
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
     * Daftar Pickup Data Transaksi
     */
    public function daftarpickup()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Kota';
    }

    /**
     * Daftar Konfirmasi Data Transaksi
     */
    public function konfirmasi($id = null)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Edit Kota';
    }

    /**
     * Detail Data Transaksi
     */
    public function detail($id = null)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Edit Kota';
    }
}
