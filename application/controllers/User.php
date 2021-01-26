<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
}
