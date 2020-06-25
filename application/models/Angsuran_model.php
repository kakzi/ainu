<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Angsuran_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tbl_angsuran');
        if ($id != null) {
            $this->db->where('id_angsuran', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_angsuran($id_angsuran = null)
    {

        $this->db->select('*');
        $this->db->from('tbl_angsuran');
        $this->db->join('tbl_penjualan', 'tbl_angsuran.id_penjualan = tbl_penjualan.id_penjualan');
        $this->db->join('tbl_pelanggan', 'tbl_angsuran.id_pelanggan = tbl_pelanggan.id_pelanggan');
        $this->db->order_by('id_angsuran', 'DESC');
        if ($id_angsuran != null) {
            $this->db->where('tbl_angsuran.id_angsuran', $id_angsuran);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_detail_angsuran($id_penjualan = null)
    {
        $this->db->from('tbl_angsuran');
        $this->db->join('tbl_pelanggan', 'tbl_angsuran.id_pelanggan = tbl_pelanggan.id_pelanggan');
        if ($id_penjualan != null) {
            $this->db->where('tbl_angsuran.id_penjualan', $id_penjualan);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambahAngsuran($id_penjualan, $id_pelanggan, $tagihan, $angsuran_pokok, $angsuran_laba,   $saldotagihan, $keterangan, $date, $user)
    {
        $data = array(
            'id_penjualan' => $id_penjualan,
            'id_pelanggan' => $id_pelanggan,
            'tagihan_a' => $tagihan,
            'angsuran_pokok' => $angsuran_pokok,
            'angsuran_laba' => $angsuran_laba,
            'saldo_tagihan' => $saldotagihan,
            'keterangan_a' => $keterangan,
            'date_angsuran' => $date,
            'user_a' => $user
        );
        $this->db->insert('tbl_angsuran', $data);
    }
}
