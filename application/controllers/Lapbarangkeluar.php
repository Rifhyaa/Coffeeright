<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lapbarangkeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Lapbarangkeluar_model");
        $this->load->model("Pengguna_model");
        $this->load->model("Produk_model");
        $this->load->library('form_validation');

        // Cek User sudah login belum
        is_logged_in();
    }

    public function index()
    {
        // Set session
        $data['user'] = $this->db->get_where('mspengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Set title page
        $data['title'] = 'List Transaksi Barang Keluar';

        $data["dtlaporan"] = $this->db->query('SELECT * FROM view_laporanbarangkeluar')->result();

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('laporan/lapbarangkeluar', $data);
        $this->load->view('layout/admin_footer');
    }

    public function print_pdf()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Barang Keluar';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_barang_keluar_2021';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $data["dtlaporan"] = $this->db->query('SELECT * FROM view_laporanbarangkeluar')->result();
        $html = $this->load->view('laporan/pdf_laporanbarangkeluar', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
