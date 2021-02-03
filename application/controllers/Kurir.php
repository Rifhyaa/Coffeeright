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
     * View Data Kurir
     */
    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Kota';

        // Set Data Dashboard
        $data['totalUser'] = $this->db->get_where('mspengguna', ['status' => 1])->num_rows();
        $data['totalProduk'] = $this->db->get_where('msproduk', ['status' => 1])->num_rows();
        $data['totalVendor'] = $this->db->get_where('msvendor', ['status' => 1])->num_rows();
        $data['totalUlasan'] = $this->db->query('SELECT * FROM msulasan')->num_rows();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kurir/dashboard', $data);
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
        $data['title'] = 'Daftar Pickup';

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kurir/daftarpickup', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Daftar Pengiriman Data Transaksi
     */
    public function daftarpengiriman()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Daftar Pengiriman';

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kurir/daftarpengiriman', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Konfirmasi Pengiriman Data Transaksi
     */
    public function konfirmasipengiriman()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Konfirmasi Pengiriman';

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kurir/konfirmasipengiriman', $data);
        $this->load->view('layout/admin_footer');
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
