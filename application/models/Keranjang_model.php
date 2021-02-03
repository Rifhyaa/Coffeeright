<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    private $_table = "mskeranjang";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_keranjang" => $id])->row();
    }

    public function getByUser($id)
    {
        $data = $this->db->get_where($this->_table, ["id_pengguna" => $id])->result();

        return $data;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pengguna = $this->session->userdata('id_pengguna');
        $this->id_produk = $post["id_produk"];
        $this->qty = 1;
        $this->total_harga = $this->qty * $post["total_harga"];

        return $this->db->insert($this->_table, $this);
    }

    public function update($post)
    {
        //$post = $this->input->post();
        $this->id_keranjang = $post->id_keranjang;
        $this->id_pengguna = $post->id_pengguna;
        $this->id_produk = $post->id_produk;
        $this->qty = $post->qty;
        $this->total_harga = $post->total_harga;
        $this->status = $post->status;

        return $this->db->update($this->_table, $this, array('id_keranjang' => $post->id_keranjang));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_keranjang" => $id));
    }

    public function deleteByPengguna()
    {
        return $this->db->delete($this->_table, array("id_pengguna" => $this->session->userdata('id_pengguna')));
    }

    public function getProductByKeranjang($id)
    {
        $query = $this->db->query("SELECT mp.id_produk, mp.nama_produk FROM mskeranjang mk JOIN msproduk mp ON mk.id_produk = mp.id_produk");

        return $query->result();
    }

    public function getTotal($id)
    {
        $total = $this->db->query("SELECT SUM(mk.total_harga) as sumharga FROM mskeranjang mk WHERE mk.id_pengguna = '$id'")->row();
        //var_dump($total);
        return $total;
    }
}
