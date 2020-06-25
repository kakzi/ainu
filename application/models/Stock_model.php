<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Stock_model extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tbl_stock_produk');
        if ($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function deleteStock($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('tbl_stock_produk');
    }

    //FUNCTION Stock
    public function get_stock_in()
    {

        $this->db->select('*');
        $this->db->from('tbl_stock_produk');
        $this->db->join('tbl_produk', 'tbl_stock_produk.id_produk = tbl_produk.id_produk');
        $this->db->join('tbl_supplier', 'tbl_stock_produk.id_supplier = tbl_supplier.id_supplier');
        $this->db->where('type', 'in');
        $this->db->order_by('stock_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_stock_out()
    {
        $this->db->select('*');
        $this->db->from('tbl_stock_produk');
        $this->db->join('tbl_produk', 'tbl_stock_produk.id_produk = tbl_produk.id_produk');
       // $this->db->join('tbl_supplier', 'tbl_stock_produk.id_supplier = tbl_supplier.id_supplier');
        $this->db->where('type', 'out');
        $this->db->order_by('stock_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }


    public function tambahDataStok($id_produk, $type, $detail, $id_supplier, $qty, $date,$user)
    {

        $data = array(
            'id_produk' => $id_produk,
            'qty_p' => $qty,
            'type' => $type,
            'id_supplier' => $id_supplier == '' ? null : $id_supplier,
            'detail' => $detail,
            'date_stock' => $date,
            'user'=> $user
        );

        $this->db->insert('tbl_stock_produk', $data);
    }

    public function tambahDataStokOut($id_produk, $type, $detail, $qty, $date, $created)
    {

        $data = array(
            'id_produk' => $id_produk,
            'qty_p' => $qty,
            'type' => $type,
            'detail' => $detail,
            'date_stock' => $date,
            'user' => $created
        );

        $this->db->insert('tbl_stock_produk', $data);
    }
}
