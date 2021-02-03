<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Produk_model");
        $this->load->model("Barangkeluar_model");
        $this->load->library('form_validation');
        $this->load->library('cart');

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
        $data['title'] = 'Transaksi Barang Keluar';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('barangkeluar/list', $data);
        $this->load->view('layout/admin_footer');
    }

    public function addCart($id)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Barang Keluar';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $getData = $this->Barangkeluar_model->getProductCart('msproduk', $id);
        $keranjang = array(
            'id' => $getData->id_produk,
            'qty' => 1,
            'price' => $getData->harga_produk,
            'name' => $getData->nama_produk
        );
        $this->cart->insert($keranjang);

        // var_dump($this->cart->contents());

        $this->load->view('barangkeluar/list', $data);
        redirect(site_url('barangkeluar'));
    }

    public function plus()
    {
        $get = $this->input->get();
        $rowid = $get['rowid'];
        $qty = $get['qty'];
        $this->cart->update(array('rowid' => $rowid, 'qty' => $qty + 1));
        redirect(site_url('barangkeluar'));
    }

    public function minus()
    {
        $get = $this->input->get();
        $rowid = $get['rowid'];
        $qty = $get['qty'];
        $this->cart->update(array('rowid' => $rowid, 'qty' => $qty - 1));
        redirect(site_url('barangkeluar'));
    }

    public function hapus($rowid)
    {
        $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
        redirect(site_url('barangkeluar'));
    }

    public function showCart()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Barang Keluar';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $keranjang = $this->cart->contents();
        $this->load->view('barangkeluar/list', $data);
    }

    public function saveData()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Barang Keluar';

        $barang_keluar = $this->Barangkeluar_model;
        $produk = $this->Produk_model;

        $id_trkeluar = date('YmdHis') . randomString();
        $total_produk = $this->cart->total_items();

        // Memasukkan data ke tabel trbarangkeluar
        $barang_keluar->save($id_trkeluar, $total_produk);

        // Memasukkan data ke tabel trbarangkeluar
        foreach ($this->cart->contents() as $items) {
            $barang_keluar->saveDetail($items, $id_trkeluar);

            // Mengurangi Stok produk
            $dataproduk = $produk->getById($items['id']);
            $produk->kurangStok($items['id'], $dataproduk->stok_produk, $items['qty']);
            //$this->cart->update(array('rowid' => $items['id'], 'qty' => 0));
        }
        $this->cart->destroy();
        redirect(site_url('user'));
    }

    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Barang Keluar';

        $barangkeluar = $this->Barangkeluar_model;
        $validation = $this->form_validation;
        $validation->set_rules($barangkeluar->rules());

        if ($validation->run()) {
            $barangkeluar->save();
            redirect('barangkeluar');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('barangkeluar/add', $data);
        $this->load->view('layout/admin_footer');
    }
}
