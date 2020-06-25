<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Produk_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tbl_produk');
        if ($id != null) {
            $this->db->where('id_produk', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function deleteProduk($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('tbl_produk');
    }

    //FUNCTION Stock
    public function getAllProduk()
    {

        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_satuan', 'tbl_produk.id_satuan = tbl_satuan.id_satuan');
        $this->db->order_by('id_produk', 'DESC');
        $query = $this->db->get();
        return $query;
    }


    public function tambahDataProduk($barcode_produk, $kode_produk, $nama_produk, $id_satuan, $stock_produk, $hpp, $price, $created)
    {

        $data = array(
            'barcode_produk' => $barcode_produk,
            'kode_produk' => $kode_produk,
            'nama_produk' => $nama_produk,
            'id_satuan' => $id_satuan,
            'stock_produk' => $stock_produk,
            'hpp' => $hpp,
            'harga_jual' => $price,
            'created' => $created
        );

        $this->db->insert('tbl_produk', $data);
    }

    public function updateStok($id_produk, $qty)
    {
        $sql = "UPDATE tbl_produk SET stock_produk =  stock_produk + '$qty' WHERE id_produk = '$id_produk'";
        $this->db->query($sql);
    }

    public function updateDelStok($id_produk, $qty)
    {
        $sql = "UPDATE tbl_produk SET stock_produk =  stock_produk - '$qty' WHERE id_produk = '$id_produk'";
        $this->db->query($sql);
    }
}
