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
            'name' => $getData->nama_produk,
            'price' => $getData->harga_produk
        );
        $this->cart->insert($keranjang);

        //$produk = $this->Barangkeluar_model;
        //$produk->cobasave($keranjang);

        // $tempkeluar = $this->Tempkeluar_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($tempkeluar->rules());

        // if ($validation->run()) {
        //     $tempkeluar->savetemp();
        //     redirect('barangkeluar');
        // }

        $this->load->view('barangkeluar/list', $data);
        redirect(site_url('barangkeluar'));
    }

    public function addtemp()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Barang Keluar';

        $tempkeluar = $this->Tempkeluar_model;
        $validation = $this->form_validation;
        $validation->set_rules($tempkeluar->rules());

        if ($validation->run()) {
            $tempkeluar->savetemp();
            redirect('barangkeluar');
        }

        $this->load->view('barangkeluar/list', $data);
        redirect(site_url('barangkeluar'));
    }

    // public function minusCart($id)
    // {
    //     // Set session
    //     $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

    //     // Set title page
    //     $data['title'] = 'Transaksi Barang Keluar';

    //     $data["msproduk"] = $this->Produk_model->getAll();

    // 	$subkategori = $this->Produk_model->getAllSubKategori();
    // 	$data['subkategori'] = $subkategori;

    //     $getData = $this->Barangkeluar_model->getProductCart('msproduk',$id);
    //     $keranjang = array(  'id' => $getData->id_produk,
    //                     'qty' => -1,
    //                     'price' => $getData->harga_produk,
    //                     'name' => $getData->nama_produk);

    //     if($keranjang.['qty'] == "0")
    //     {
    //         $this->cart->update(array('qty' => 0));
    //         redirect(site_url('barangkeluar'));
    //     }
    //     else
    //     {
    //         $this->cart->insert($keranjang);
    //         $this->load->view('barangkeluar/list', $data);
    //         redirect(site_url('barangkeluar'));
    //     }    
    // }

    // public function plus($rowid)
    // {
    //     $this->cart->update(array('rowid' => $rowid, 'qty' => $qty + 1));
    //     redirect(site_url('barangkeluar'));
    // }

    // public function minus($rowid)
    // {
    //     $this->cart->update(array('rowid' => $rowid, 'qty' => $qty - 1));
    //     redirect(site_url('barangkeluar'));
    // }

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

    public function cobasave()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'Transaksi Barang Keluar';


        $barang_keluar = $this->Barangkeluar_model;
        foreach ($this->cart->contents() as $items) {
            $barang_keluar->cobasave($items);
        }

        redirect(site_url('user'));
        //$produk = $this->Barangkeluar_model;
        //$produk->cobasave($keranjang);
    }
}
