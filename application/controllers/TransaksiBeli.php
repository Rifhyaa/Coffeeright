<?php defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiBeli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("TransBeli_model");
        $this->load->model("Keranjang_model");
        $this->load->model("DetilBeli_model");
        $this->load->library('form_validation');

        // Cek User sudah login belum
        is_logged_in();
    }

    /**
     * View Data Keranjang
     */
    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Belanjaan';

        // Set data pembelian
        $data["transaksiBeli"] = $this->TransBeli_model->getByUser($this->session->userdata('id_pengguna'));

        //$temp = $this->TransBeli_model->getByUser($this->session->userdata('id_pengguna'));

        // Set detil pembelian
        $data['detilTransaksi'] = $this->DetilBeli_model->getAll();

        // Set data product
        $data['produk'] = $this->DetilBeli_model->getProductByDetil();

        // Menampilkan tampilan
        $this->load->view('layout/cust_header', $data);
        $this->load->view('transaksiBeli/list', $data);
        $this->load->view('layout/cust_footer');
    }

    public function checkout()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['pengguna'] = $this->db->get_where('mspengguna', ['id_pengguna' => $this->session->userdata('id_pengguna')])->row();


        // Set title page
        $data['title'] = 'Checkout';

        // Set data keranjang
        $data['keranjang'] = $this->Keranjang_model->getByUser($this->session->userdata('id_pengguna'));

        // Set data product
        $data['produk'] = $this->Keranjang_model->getProductByKeranjang($this->session->userdata('id_pengguna'));

        // Set total keranjang + ongkir
        $data['total'] = $this->TransBeli_model->getTotal($this->session->userdata('id_pengguna'));

        // Set ongkir
        $data['ongkir'] = $this->TransBeli_model->getOngkir($this->session->userdata('id_pengguna'));

        // Menampilkan tampilan
        $this->load->view('layout/cust_header', $data);
        $this->load->view('transaksiBeli/Checkout', $data);
        $this->load->view('layout/cust_footer');
    }

    public function add()
    {
        $this->TransBeli_model->save();
        $this->DetilBeli_model->save();
        $this->Keranjang_model->deleteByPengguna();

        redirect(site_url('transaksiBeli/index'));
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

        if ($this->Keranjang_model->delete($id)) {
            redirect(site_url('keranjang'));
        }
    }
}
