<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Produk_model");
        $this->load->library('form_validation');

        // Cek User sudah login belum
        is_logged_in();
    }

    /**
     * View Data Produk
     */
    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Produk';

        $data["msproduk"] = $this->Produk_model->getAll();
		
		$subkategori = $this->Produk_model->getAllSubKategori();
		$data['subkategori'] = $subkategori;

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('produk/list', $data);
        $this->load->view('layout/admin_footer');
    }

    /**
     * Tambah Data Produk
     */
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

    //     if ($validation->run()) {
    //         $produk->save();
    //         redirect('produk');
    //     }

    //     // Menampilkan tampilan
    //     $this->load->view('layout/admin_header', $data);
    //     $this->load->view('produk/add', $data);
    //     $this->load->view('layout/admin_footer');
    if ($this->form_validation->run() == false) {
        $this->load->view('layout/admin_header', $data);
        $this->load->view('produk/add', $data);
        $this->load->view('layout/admin_footer');
    } 
    else 
    {
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
                $produk->save();
                redirect('produk');
            } else {
                echo $this->upload->dispay_errors();
            }
        }
    }
    }

    /**
     * Ubah Data Produk
     */
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

        $data["produk"] = $produk->getById($id);
        if (!$data["produk"]) show_404();

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/admin_header', $data);
            $this->load->view('produk/edit', $data);
            $this->load->view('layout/admin_footer');
        } 
        else 
        {
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
                    $produk->update();
                    redirect('produk');
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
        }
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
