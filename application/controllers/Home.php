<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    /**
     * View Data Kategori
     */
    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Kategori';



        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kategori/list', $data);
        $this->load->view('layout/admin_footer');
    }

    public function product()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Kategori';


        // Menampilkan tampilan

        $this->load->view('home/product', $data);
    }
}
