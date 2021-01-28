<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pengguna_model");
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
        $data['title'] = 'List Pengguna';

        $data["mspengguna"] = $this->Pengguna_model->getAll();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('pengguna/list', $data);
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
        $data['title'] = 'Tambah Pengguna';

        $pengguna = $this->Pengguna_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) {
            $pengguna->save();
            redirect('pengguna');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('pengguna/add', $data);
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
        $data['title'] = 'Edit Pengguna';

        if (!isset($id)) redirect('pengguna');

        $pengguna = $this->Pengguna_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        $data["pengguna"] = $pengguna->getById($id);
        if (!$data["pengguna"]) show_404();

        // Menampilkan tampilan

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/admin_header', $data);
            $this->load->view('pengguna/edit', $data);
            $this->load->view('layout/admin_footer');
        } else {
            
            if (!empty($_FILES['foto']['name'])) {
                $upload_image = $_FILES['foto']['name'];
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/upload/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $new_image = $this->upload->data('file_name');

                    if ($new_image != null) {
                        $this->db->set('foto', $new_image);
                    }
                    $pengguna->update();
                    redirect('pengguna');
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
        }
    }

    /**
     * Hapus Data Kategori
     */
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Pengguna_model->delete($id)) {
            redirect(site_url('pengguna'));
        }
    }
}
