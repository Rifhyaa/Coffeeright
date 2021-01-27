<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        // Cek User sudah login belum
        is_logged_in();
    }

    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Coffeeright - My Profile';

        $this->load->view('layout/admin_header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('layout/admin_footer');
    }

    public function dashboard()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Coffeeright - Dashboard';

        // Set Data Dashboard
        $data['totalUser'] = $this->db->get_where('mspengguna', ['status' => 1])->num_rows();
        $data['totalProduk'] = $this->db->get_where('msproduk', ['status' => 1])->num_rows();
        $data['totalVendor'] = $this->db->get_where('msvendor', ['status' => 1])->num_rows();
        $data['totalUlasan'] = $this->db->query('SELECT * FROM msulasan')->num_rows();

        $this->load->view('layout/admin_header', $data);
        $this->load->view('admin/dashboard', $data);
    }
}
