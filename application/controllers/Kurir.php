<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Transaksi_model");
        $this->load->model("Kota_model");
        $this->load->model("Pengguna_model");
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
        $data['title'] = 'Dashboard';

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

        // Mendapat data transaksi yang statusnya belum dipickup
        $data["trPembelian"] = $this->Transaksi_model->getAll(0);
        $data['mskota'] = $this->Kota_model->getAll();

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

        // Mendapat data transaksi yang statusnya sudah dipickup
        $data["trPembelian"] = $this->Transaksi_model->getAll(1);
        $data['mskota'] = $this->Kota_model->getAll();

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

        // Mendapat data transaksi yang statusnya sudah dikirim
        $data["trPembelian"] = $this->Transaksi_model->getAll(2);
        $data['mskota'] = $this->Kota_model->getAll();

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

    public function simpan_pickup($id = null)
    {
        // Mengganti Data Kurir dan Status Pengiriman
        $this->Transaksi_model->changeKurir($this->session->userdata('id_pengguna'), $id);

        $data = array(
            'id_transaksi' => $id,
            'status' => 'Paket telah dipickup oleh ' . $this->session->userdata('pengguna'),
            'creadate' => date('Y-m-d H:i:s'),
            'id_kurir' => $this->session->userdata('id_pengguna')
        );

        // Menambah riwayat pengiriman
        $this->Transaksi_model->insertPengiriman($data);

        redirect(site_url('kurir/daftarpickup'));
    }

    public function simpan_pengiriman($id = null)
    {
        // Mengganti Data Kurir dan Status Pengiriman
        $this->Transaksi_model->changeStatus(2, $id);

        $data = array(
            'id_transaksi' => $id,
            'status' => 'Paket akan diantar oleh ' . $this->session->userdata('pengguna'),
            'creadate' => date('Y-m-d H:i:s'),
            'id_kurir' => $this->session->userdata('id_pengguna')
        );

        // Menambah riwayat pengiriman
        $this->Transaksi_model->insertPengiriman($data);

        redirect(site_url('kurir/daftarpengiriman'));
    }

    public function simpan_konfirmasi($id = null)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Konfirmasi Pengiriman';

        $data['trans'] = $id;

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('kurir/commit', $data);
        $this->load->view('layout/admin_footer');
    }

    public function commit($id = null, $keterangan = null)
    {
        $post = $this->input->post();

        // Mengganti Data Kurir dan Status Pengiriman
        $this->Transaksi_model->changeStatus(3, $post["id"]);

        $data = array(
            'id_transaksi' => $post["id"],
            'status' => 'Paket telah sampai ke alamat pembeli',
            'creadate' => date('Y-m-d H:i:s'),
            'keterangan' => $post["keterangan"],
            'id_kurir' => $this->session->userdata('id_pengguna')
        );

        // Menambah riwayat pengiriman
        $this->Transaksi_model->insertPengiriman($data);

        redirect(site_url('kurir/konfirmasipengiriman'));
    }
}
