<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TrKasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Produk_model");
        $this->load->model("TrKasir_model");
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
        $data['title'] = 'Transaksi Pembayaran';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('trkasir/list', $data);
        $this->load->view('layout/admin_footer');
    }

    public function addCart($id)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Pembayaran';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $getData = $this->TrKasir_model->getProductCart('msproduk', $id);
        $keranjang = array(
            'id' => $getData->id_produk,
            'qty' => 1,
            'price' => $getData->harga_produk,
            'name' => $getData->nama_produk
        );
        $this->cart->insert($keranjang);

        // var_dump($this->cart->contents());

        $this->load->view('trkasir/list', $data);
        redirect(site_url('trkasir'));
    }

    public function plus()
    {
        $get = $this->input->get();
        $rowid = $get['rowid'];
        $qty = $get['qty'];
        $this->cart->update(array('rowid' => $rowid, 'qty' => $qty + 1));
        redirect(site_url('trkasir'));
    }

    public function minus()
    {
        $get = $this->input->get();
        $rowid = $get['rowid'];
        $qty = $get['qty'];
        $this->cart->update(array('rowid' => $rowid, 'qty' => $qty - 1));
        redirect(site_url('trkasir'));
    }

    public function hapus($rowid)
    {
        $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
        redirect(site_url('trkasir'));
    }

    public function showCart()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Pembayaran';

        $data["msproduk"] = $this->Produk_model->getAll();

        $subkategori = $this->Produk_model->getAllSubKategori();
        $data['subkategori'] = $subkategori;

        $keranjang = $this->cart->contents();
        $this->load->view('trkasir/list', $data);
    }

    public function cobasave()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Pembayaran';

        $id_trkasir = date('YmdHis') . randomString(4);
        $tr_kasir = $this->TrKasir_model;
        $total_harga = $this->cart->total();
        $produk = $this->Produk_model;

        $tr_kasir->save($id_trkasir, $total_harga);

        foreach ($this->cart->contents() as $items) {
            $tr_kasir->cobasave($items, $id_trkasir);
            $this->cart->update(array('rowid' => $items['id'], 'qty' => 0));

            //mengurangi stok
            $dataproduk = $produk->getById($items['id']);
            $produk->kurangStok($items['id'], $dataproduk->stok_produk, $items['qty']);
        }
        $this->cart->destroy();
        redirect(site_url('trkasir'));
    }

    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Tambah Pembayaran';

        $tr_kasir = $this->TrKasir_model;
        $validation = $this->form_validation;
        $validation->set_rules($tr_kasir->rules());

        if ($validation->run()) {
            $tr_kasir->save();
            redirect('trkasir');
        }

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('trkasir/add', $data);
        $this->load->view('layout/admin_footer');
    }

    public function getnumber($string)
    {
        return intval(preg_replace('/[^0-9]+/', '', $string), 10);
    }
}
