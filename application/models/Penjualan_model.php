<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Penjualan_model extends CI_Model
{
    public function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,11,4)) AS invoice_no 
                FROM tbl_penjualan 
                WHERE MID(invoice,5,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int) $row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }

        // NU2004060001
        // AINU2004060001

        $invoice = "AINU" . date('ymd') . $no;
        return $invoice;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(id_cart) AS cart_no FROM tbl_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int) $row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'id_cart' => $car_no,
            'id_produk' => $post['id_produk'],
            'price' => $post['price'],
            'qty' => $post['qty'],
            'hpp_cart' => $post['qty'] * $post['hpp'],
            'total' => $post['qty'] * $post['price'],
            'laba' => ($post['qty'] * $post['price']) - ($post['qty'] * $post['hpp']),
            'user_id' => $this->session->userdata('username')
        );

        $this->db->insert('tbl_cart', $params);
    }

    public function ambil_cart($params = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_cart');
        $this->db->join('tbl_produk', 'tbl_cart.id_produk = tbl_produk.id_produk');
        if ($params != null) {
            $this->db->where($params);
        }
        $query = $this->db->get();
        return $query;
    }

    function update_qty_cart($post)
    {
        $sql = "UPDATE tbl_cart SET price = '$post[price]',
                qty = qty + '$post[qty]',
                hpp_cart = '$post[hpp]'* qty,
                total = '$post[price]'* qty,
                laba = laba + '$post[qty]'*'$post[price]' - '$post[qty]'*'$post[hpp]'
                WHERE id_produk = '$post[id_produk]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('tbl_cart');
    }

    public function edit_cart($post)
    {
        $params = array(
            'price' => $post['price'],
            'qty' => $post['qty'],
            'diskon_produk' => $post['diskon'],
            'total' => $post['total'],
            'laba' => $post['laba']
        );
        $this->db->where('id_cart', $post['id_cart']);
        $this->db->update('tbl_cart', $params);
    }

    public function add_sale($post)
    {
        $tgl = $post['date'];
        $jatuh_tempo = date('Y-m-d', strtotime('+14 days', strtotime($tgl)));

        $params = array(
            'invoice' => $this->invoice_no(),
            'id_pelanggan' => $post['id_pelanggan'] == "" ? null : $post['id_pelanggan'],
            'id_akun' => $post['id_akun'],
            'sub_total' => $post['subtotal'],
            'diskon' => $post['diskon'],
            'total_price' => $post['grandtotal'],
            'jenis_payment' => $post['jenis_payment'],
            'cash' => $post['bayar'],
            'remaining' => abs($post['change']),
            'tagihan' => abs($post['tagihan']),
            'hpp_total' => abs($post['hpp_total']),
            'laba' => $post['laba'],
            'note' => $post['note'],
            'date_penjualan' => $post['date'],
            'jatuh_tempo' => $jatuh_tempo,
            'user_id' => $this->session->userdata('username')
        );
        $this->db->insert('tbl_penjualan', $params);
        return $this->db->insert_id();
    }

    function add_tagihan($params)
    {
        $this->db->insert_batch('tbl_tagihan', $params);
    }


    function add_detail_penjualan($params)
    {
        $this->db->insert_batch('tbl_detail_penjualan', $params);
    }

    public function get_penjualan($id = null)
    {
        $this->db->select('*, tbl_penjualan.created as sale_created');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_pelanggan', 'tbl_penjualan.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        if ($id != null) {
            $this->db->where('id_penjualan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_detail_penjualan($id_penjualan = null)
    {
        $this->db->from('tbl_detail_penjualan');
        $this->db->join('tbl_produk', 'tbl_detail_penjualan.id_produk = tbl_produk.id_produk');
        if ($id_penjualan != null) {
            $this->db->where('tbl_detail_penjualan.id_penjualan', $id_penjualan);
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

    public function ambil_data_penjualan()
    {
        $this->db->select('*, tbl_penjualan.created as sale_created, tbl_penjualan.user_id as user');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_pelanggan', 'tbl_penjualan.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        $this->db->order_by('id_penjualan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function ambil_detail_penjualan()
    {
        $this->db->from('tbl_detail_penjualan');
        $this->db->join('tbl_produk', 'tbl_detail_penjualan.id_produk = tbl_produk.id_produk');
        $query = $this->db->get();
        return $query;
    }

    public function ambil_data_tagihan()
    {
        $this->db->select('*, tbl_penjualan.created as sale_created, tbl_penjualan.user_id as user');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_pelanggan', 'tbl_penjualan.id_pelanggan = tbl_pelanggan.id_pelanggan', 'left');
        $this->db->where('jenis_payment', 'DP');
        $this->db->order_by('id_penjualan', 'DESC');
        $query = $this->db->get();
        return $query;
    }



    public function updateTagihan($id_penjualan, $angsuran_pokok, $angsuran_laba)
    {
        $angsuran = $angsuran_laba + $angsuran_pokok;
        $sql = "UPDATE tbl_penjualan 
        SET tagihan =  tagihan - '$angsuran' , hpp_total = hpp_total - '$angsuran_pokok' , laba = laba - '$angsuran_laba'
        WHERE id_penjualan = '$id_penjualan'";
        $this->db->query($sql);
    }

    public function updateCash($id_penjualan, $nominal)
    {
        $sql = "UPDATE tbl_penjualan 
        SET cash = cash + '$nominal'
        WHERE id_penjualan = '$id_penjualan'";
        $this->db->query($sql);
    }

    // public function updateKeterangan($id_penjualan)
    // {

    //     $sql = "UPDATE tbl_penjualan 
    //     SET note = '$note'
    //     WHERE id_penjualan = '$id_penjualan'";
    //     $this->db->query($sql);
    // }
}
