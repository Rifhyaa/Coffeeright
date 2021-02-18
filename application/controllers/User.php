<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
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
        $this->load->view('user/index', $data);
        $this->load->view('layout/admin_footer');
    }

    public function security()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Coffeeright - Security';

        $this->load->view('layout/admin_header', $data);
        $this->load->view('user/security', $data);
        $this->load->view('layout/admin_footer');
    }

    public function edit()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Coffeeright - Edit Profile';

        $this->load->view('layout/admin_header', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('layout/admin_footer');
    }

    public function editCust()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Profil';

        $this->load->view('layout/cust_header', $data);
        $this->load->view('layout/cust_breadcrumb', $data);
        $this->load->view('user/editCust', $data);
        $this->load->view('layout/cust_footer');
    }

    public function editPost()
    {
        $user = $this->Pengguna_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            redirect('user/editCust');
        }
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
        $data['totalKota'] = $this->db->query('SELECT * FROM mskota WHERE status = 1')->num_rows();

        $data['topProduk'] = $this->db->query('SELECT * FROM view_top10produkterlaris')->result();
        $data['produkHabis'] = $this->db->query('SELECT * FROM view_produkhabis')->result();

        $data['poffline'] = $this->db->query('SELECT * FROM trkasir')->num_rows();
        $data['ponline'] = $this->db->query('SELECT * FROM trpembelian')->num_rows();

        $this->load->view('layout/admin_header', $data);
        $this->load->view('user/dashboard', $data);
    }
}
