<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pelanggan_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tbl_pelanggan');
        if ($id != null) {
            $this->db->where('id_pelanggan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function deletePelanggan($id)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('tbl_pelanggan');
    }

    //FUNCTION Stock
    public function getAllPelanggan()
    {

        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->order_by('id_pelanggan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function tambahDataPelanggan($kode_pelanggan, $nama_pelanggan, $id_kategori, $pic, $nik, $no_telp, $alamat, $barcode, $created)
    {

        $data = array(
            'kode_pelanggan' => $kode_pelanggan,
            'nama_pelanggan' => $nama_pelanggan,
            'id_kategori' => $id_kategori,
            'pic_pelanggan' => $pic,
            'nik' => $nik,
            'no_telp' => $no_telp,
            'alamat_pelanggan' => $alamat,
            'barcode_pelanggan' => $barcode,
            'created' => $created
        );

        $this->db->insert('tbl_pelanggan', $data);
    }
}
