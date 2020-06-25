<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('pembelian_model', 'fpembelian');
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('akuntansi_model', 'akun');
        $this->load->model('penjualan_model', 'penjualan');
        $this->load->model('produk_model', 'produk');
        $this->load->model('angsuran_model', 'angsuran');
        $this->load->model('master_model', 'master');
    }

    public function index()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Faktur Pembelian';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['faktur'] = $this->fpembelian->getAllFakturPembelian()->result_array();

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembelian/index', $data);
        $this->load->view('template/footer');
    }

    public function buatfaktur()
    {
        $tittle['tittle'] = 'Buat Faktur Pembelian';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $data['faktur'] = $this->fpembelian->getAllFakturPembelian()->result_array();

        $data['invoice'] = $this->penjualan->invoice_no();
        $data['akun'] = $this->akun->getAllakun();
        $data['produk']  = $this->produk->getAllProduk()->result_array();
        $data['cart'] = $this->fpembelian->ambil_cart();
        $data['pelanggan'] = $this->pelanggan->getAllPelanggan()->result_array();
        $data['supplier'] = $this->master->getAllSupplier();

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pembelian/buatfaktur', $data);
        $this->load->view('template/footer');
    }


    public function proses()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {
            $id_produk = $this->input->post('id_produk');
            $check_cart = $this->fpembelian->ambil_cart(['tbl_cart_pembelian.id_produk' => $id_produk])->num_rows();
            if ($check_cart > 0) {
                $this->fpembelian->update_qty_cart($data);
            } else {
                $this->fpembelian->add_cart($data);
            }
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
        if (isset($_POST['edit_cart'])) {
            $this->fpembelian->edit_cart($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['proses_payment'])) {
            $id_penjualan = $this->penjualan->add_sale($data);
            $cart = $this->penjualan->ambil_cart()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push(
                    $row,
                    array(
                        'id_penjualan' => $id_penjualan,
                        'id_produk' => $value->id_produk,
                        'price' => $value->price,
                        'qty' => $value->qty,
                        'hpp_produk' => $value->hpp_cart,
                        'total' => $value->total,
                        'laba' => $value->laba,
                    )
                );
            }
            //$this->penjualan->add_tagihan($row);
            $this->penjualan->add_detail_penjualan($row);
            $this->penjualan->del_cart(['user_id' => $this->session->userdata('username')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "id_penjualan" => $id_penjualan);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    function cart_data()
    {
        $cart = $this->fpembelian->ambil_cart();
        $data['cart'] = $cart;
        $this->load->view('pembelian/cart_pembelian', $data);
    }
}
