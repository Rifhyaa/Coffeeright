<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Keranjang_model");
        $this->load->model("Produk_model");
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
        $data['title'] = 'List Keranjang';

        // Set data keranjang
        $data["mskeranjang"] = $this->Keranjang_model->getByUser($this->session->userdata('id_pengguna'));

        // Set data product
        $data['produk'] = $this->Produk_model->getAll();

        // Set total keranjang
        $data['total'] = $this->Keranjang_model->getTotal($this->session->userdata('id_pengguna'));

        // Set banyak produk
        $data['count'] = $this->Keranjang_model->getCount($this->session->userdata('id_pengguna'));

        //var_dump($data);
        // Menampilkan tampilan
        $this->load->view('layout/cust_header', $data);
        $this->load->view('layout/cust_breadcrumb', $data);
        $this->load->view('keranjang/list', $data);
        $this->load->view('layout/cust_footer');
    }

    public function plusQty(int $id)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // set model
        $model = $this->Keranjang_model;

        // buat objek table keranjang dan produk
        $keranjang = $this->db->get_where('mskeranjang', ['id_keranjang' => $id])->row();
        $produk = $this->db->get_where('msproduk', ['id_produk' => $keranjang->id_produk])->row();

        //definisikan jumlah produk dan haraganya
        $jumlah = $keranjang->qty;
        $harga = $produk->harga_produk;

        if (($jumlah + 1) <= $produk->stok_produk) {
            //tambahkan jumlah produk dan harga total
            $keranjang->qty = $jumlah + 1;
            $keranjang->total_harga = $keranjang->qty * $harga;

            //update table keranjang
            $model->update($keranjang);
            redirect(site_url('keranjang'));
        } else {
            //$alert = "<script>alert('Maaf, Jumlah yang anda minta melebihi stok yang tersedia')</script>";
            redirect(site_url('keranjang'));
        }
    }

    public function minQty(int $id)
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // set model
        $model = $this->Keranjang_model;

        // buat objek table keranjang dan produk
        $keranjang = $this->db->get_where('mskeranjang', ['id_keranjang' => $id])->row();
        $produk = $this->db->get_where('msproduk', ['id_produk' => $keranjang->id_produk])->row();

        //definisikan jumlah produk dan haraganya
        $jumlah = $keranjang->qty;
        $harga = $produk->harga_produk;

        if (($jumlah - 1) > 0) {
            //kurang jumlah produk dan harga total
            $keranjang->qty = $jumlah - 1;
            $keranjang->total_harga = $keranjang->qty * $harga;

            //update table keranjang
            $model->update($keranjang);
            redirect(site_url('keranjang'));
        } else {
            //maka hapus data keranjang
            $this->delete($keranjang->id_keranjang);
        }

        redirect(site_url('keranjang'));
    }

    public function add()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->Keranjang_model->save();
        redirect(site_url('keranjang/index'));
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();

        if ($this->Keranjang_model->delete($id)) {
            redirect(site_url('keranjang'));
        }
    }
}
