<?php

defined('BASEPATH') or exit('No direct script access allowed');

class barangmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Produk_model");
        $this->load->model("Barangmasuk_model");
        $this->load->library('form_validation');
        $this->load->library('cart');

        $this->load->helper('form');

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
        $data['title'] = 'Transaksi Barang Masuk';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('barangmasuk/list', $data);
        $this->load->view('layout/admin_footer');
    }

    public function addCart($id)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Barang Masuk';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $getData = $this->Barangmasuk_model->getProductCart('msproduk', $id);
        $keranjang = array(
            'id' => $getData->id_produk,
            'qty' => 1,
            'price' => $getData->harga_produk,
            'name' => $getData->nama_produk
        );
        $this->cart->insert($keranjang);
        var_dump($this->cart->contents());
        $this->load->view('barangmasuk/list', $data);
        redirect(site_url('barangmasuk'));
    }

    public function showCart()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Barang Masuk';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $keranjang = $this->cart->contents();
        $this->load->view('barangmasuk/list', $data);
    }

    public function hapus($rowid)
    {
        $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
        redirect(site_url('barangmasuk'));
    }

    public function update()
    {
        // $i = 1;

        // foreach($this->cart->contents() as $produk){
        //     $this->cart->update(array('rowid' => $produk['rowid'], 'qty' => $_POST['qty'.$i]));
        //     $i++;
        // }
        $update = 0;

        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        // Update item in the cart
        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }

        // Return response
        echo $update ? 'ok' : 'err';
    }

    public function minus()
    {
        $get = $this->input->get();
        $rowid = $get['rowid'];
        $qty = $get['qty'];
        $this->cart->update(array('rowid' => $rowid, 'qty' => $qty - 1));
        redirect(site_url('barangmasuk'));
    }

    public function plus()
    {
        $get = $this->input->get();
        $rowid = $get['rowid'];
        $qty = $get['qty'];
        $this->cart->update(array('rowid' => $rowid, 'qty' => $qty + 1));
        redirect(site_url('barangmasuk'));
    }

    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Barang Masuk';
        $data['id_vendor'] = $this->Barangmasuk_model->getAllVendor();

        $barangmasuk = $this->Barangmasuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($barangmasuk->rules());

        if ($validation->run()) {
            $barangmasuk->save();
            redirect('barangmasuk');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('barangmasuk/add', $data);
        $this->load->view('layout/admin_footer');
    }

    public function saveData()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Barang Masuk';

        $id_trmasuk = date('YmdHis') . randomString();
        $barang_masuk = $this->Barangmasuk_model;
        $produk = $this->Produk_model;

        $total_produk = $this->cart->total_items();

        $barang_masuk->save($id_trmasuk, $total_produk);

        foreach ($this->cart->contents() as $items) {
            $barang_masuk->saveDetail($items, $id_trmasuk);

            //mengurangi stok
            $dataproduk = $produk->getById($items['id']);
            $produk->tambahStok($items['id'], $dataproduk->stok_produk, $items['qty']);
        }
        $this->cart->destroy();
        redirect(site_url('barangmasuk'));
    }
}
