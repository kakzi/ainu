<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Master_model extends CI_Model
{
    //MODEL SUB DISTRIBUTOR

    public function get($id = null)
    {
        $this->db->from('tbl_supplier');
        if ($id != null) {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_supplier($id = null)
    {

        $this->db->select('*');
        $this->db->from('tbl_supplier');
        $this->db->order_by('id_supplier', 'DESC');
        if ($id != null) {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    //Ambil semua data dari tbl_dist
    public function getAllSupplier()
    {
        return $this->db->get('tbl_supplier')->result_array();
    }


    //Ambil data berdasarkan pagination dan keyword search
    public function getPaginationSupplier($limit, $start, $keyword = null)
    {

        if ($keyword) {
            $this->db->like('nama_supplier', $keyword);
            $this->db->or_like('pic_supplier', $keyword);
        }

        return $this->db->get('tbl_supplier', $limit, $start)->result_array();
    }

    public function countOfSupplier()
    {
        return $this->db->get('tbl_supplier')->num_rows();
    }

    public function tambahDataSupplier($kode_supplier, $nama_supplier, $pic, $nik, $alamat_supplier, $telp_supplier, $deskripsi, $date, $created)
    {

        $data = array(
            'kode_supplier' => $kode_supplier,
            'nama_supplier' => $nama_supplier,
            'pic_supplier' => $pic,
            'nik' => $nik,
            'alamat_supplier' => $alamat_supplier,
            'telp_supplier' => $telp_supplier,
            'deskripsi' => $deskripsi,
            'date' => $date,
            'created' => $created
        );

        $this->db->insert('tbl_supplier', $data);
    }

    //Ambil semua data dari 
    public function getAllKategoriPelanggan()
    {
        return $this->db->get('tbl_kategori')->result_array();
    }

    public function tambahDataKategori($nama_kategori, $created)
    {
        $data = array(
            'nama_kategori' => $nama_kategori,
            'created' => $created
        );

        $this->db->insert('tbl_kategori', $data);
    }
}
