<?php defined('BASEPATH') or exit('No direct script access allowed');

class DetilBeli_model extends CI_Model
{
    private $_table = "detail_trpembelian";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_trpembelian" => $id])->row();
    }

    public function getProductByDetil()
    {
        $query = $this->db->query("SELECT mp.id_produk, mp.nama_produk FROM detail_trpembelian mk JOIN msproduk mp ON mk.id_produk = mp.id_produk");

        return $query->result();
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
        $id = $this->session->userdata('id_pengguna');
        $idTrans = $this->db->query("SELECT id_trpembelian FROM trpembelian ORDER BY id_trpembelian DESC LIMIT 1")->row();

        var_dump($idTrans->id_trpembelian);

        $this->db->query("INSERT INTO detail_trpembelian (id_trpembelian, id_produk, jumlah_produk, subtotal_harga) SELECT '$idTrans->id_trpembelian', id_produk, qty, total_harga FROM mskeranjang WHERE id_pengguna = '$id'");
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
