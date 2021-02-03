<?php defined('BASEPATH') or exit('No direct script access allowed');

class TransBeli_model extends CI_Model
{
    private $_table = "trpembelian";
    private $_keranjang = "mskeranjang";
    private $_pengguna = "mspengguna";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_trpembelian" => $id])->row();
    }

    public function getByUser()
    {
        return $this->db->get_where($this->_table, ["id_pengguna" => $this->session->userdata('id_pengguna')])->result();
    }

    public function getOngkir($id)
    {
        $pengguna = $this->db->get_where($this->_pengguna, ["id_pengguna" => $id])->row();
        if (strcasecmp("Jakarta", $pengguna->kota) || strcasecmp("Bogor", $pengguna->kota) || strcasecmp("Depok", $pengguna->kota) || strcasecmp("Tangerang", $pengguna->kota) || strcasecmp("Bekasi", $pengguna->kota)) {
            $ongkir = 0;
        } else {
            $ongkir = 20000;
        }

        return $ongkir;
    }

    public function getTotal($id)
    {
        $total = $this->db->query("SELECT SUM(mk.total_harga) as sumharga FROM mskeranjang mk WHERE mk.id_pengguna = '$id'")->row();

        $ongkir = $this->getOngkir($id);

        $grandTotal = $total->sumharga + $ongkir;
        return $grandTotal;
    }

    public function save()
    {
        $user_session = $this->session->userdata('pengguna');
        $post = $this->input->post();
        //var_dump($post);
        $this->id_trpembelian = uniqid();
        $this->id_pengguna = $this->session->userdata('id_pengguna');
        $this->total_harga = $post['total_harga'];
        $this->status_pengiriman = 0;
        $this->tgl_transaksi = date('Y-m-d H:i:s');
        $this->id_kota = 1;

        $this->db->insert($this->_table, $this, array('id_trpembelian' => $this->id_trpembelian));
        return $this->id_trpembelian;
    }

    public function updateStok($id)
    {
        $post = $this->input->post();

        foreach ($post['id_produk'] as $list) {
            $id_produk = $post['id_produk'];
            $jumlah_produk = $post['jumlah_produk'];

            $this->db->query("UPDATE msproduk mp SET stok_produk = stok_produk - $jumlah_produk WHERE mp.id_produk = $id");
        }
    }

    public function update($data)
    {
        $this->id_trpembelian = $data->id_pengguna;
        $this->id_pengguna = $data->id_pengguna;
        $this->total_harga = $data->total_harga;

        return $this->db->insert($this->_table, $this, array('id_trpembelian' => $data->id_trpembelian));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_trpembeli" => $id));
    }
}
