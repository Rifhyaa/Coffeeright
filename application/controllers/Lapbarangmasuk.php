<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lapbarangmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Lapbarangmasuk_model");
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
        $data['title'] = 'List Transaksi Barang Masuk';

        $data["trbarangmasuk"] = $this->Lapbarangmasuk_model->getAll();
		
		$pengguna = $this->Pengguna_model->getAll();
		$data['pengguna'] = $pengguna;

		$produk = $this->Produk_model->getAll();
		$data['produk'] = $produk;
		
		$dtbarangmasuk = $this->Lapbarangmasuk_model->getAllDetail();
		$data['dtbarangmasuk'] = $dtbarangmasuk;

        // Menampilkan tampilan
        $this->load->view('layout/admin_header', $data);
        $this->load->view('laporan/lapbarangmasuk', $data);
        $this->load->view('layout/admin_footer');
    }

	public function print()	{
		$this->load->library('dompdf_gen');

		$data["trbarangmasuk"] = $this->Lapbarangmasuk_model->getAll();
		
		$pengguna = $this->Pengguna_model->getAll();
		$data['pengguna'] = $pengguna;

		$produk = $this->Produk_model->getAll();
		$data['produk'] = $produk;
		
		$dtbarangmasuk = $this->Lapbarangmasuk_model->getAllDetail();
		$data['dtbarangmasuk'] = $dtbarangmasuk;

        $this->load->view('laporan/lapbarangmasuk_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_barangmasuk.pdf", array('Attachment' =>0));
	}
}
