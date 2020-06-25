<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pembelian_model extends CI_Model
{

    //FUNCTION akun
    public function getAllFakturPembelian()
    {
        $this->db->select('*');
        $this->db->from('tbl_faktur_pembelian');
        $this->db->join('tbl_supplier', 'tbl_faktur_pembelian.id_supplier = tbl_supplier.id_supplier');
        $this->db->order_by('id_faktur_pembelian', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(id_cart_pembelian) AS cart_no FROM tbl_cart_pembelian");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int) $row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'id_cart_pembelian' => $car_no,
            'id_produk' => $post['id_produk'],
            'harga_barang' => $post['harga_barang'],
            'qty_barang' => $post['qty_barang'],
            'total_harga' => $post['qty_barang'] * $post['harga_barang'],
            'user_created' => $this->session->userdata('username')
        );

        $this->db->insert('tbl_cart_pembelian', $params);
    }

    public function ambil_cart($params = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_cart_pembelian');
        $this->db->join('tbl_produk', 'tbl_cart_pembelian.id_produk = tbl_produk.id_produk');
        if ($params != null) {
            $this->db->where($params);
        }
        $query = $this->db->get();
        return $query;
    }

    function update_qty_cart($post)
    {
        $sql = "UPDATE tbl_cart_pembelian SET harga_barang = '$post[price]',
                qty_barang = qty_barang + '$post[qty]',
                total_harga = '$post[harga_barang]'* qty_barang
                WHERE id_produk = '$post[id_produk]'";
        $this->db->query($sql);
    }

    public function edit_cart($post)
    {
        $params = array(
            'harga_barang' => $post['harga_barang'],
            'qty_barang' => $post['qty_barang'],
            'total_harga' => $post['total_harga']

        );
        $this->db->where('id_cart_pembelian', $post['id_cart_pembelian']);
        $this->db->update('tbl_cart_pembelian', $params);
    }
}
