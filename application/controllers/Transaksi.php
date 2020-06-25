<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('akuntansi_model', 'akun');
        $this->load->model('penjualan_model', 'penjualan');
        $this->load->model('produk_model', 'produk');
        $this->load->model('angsuran_model', 'angsuran');
    }

    public function index()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Form Transaksi Penjualan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['invoice'] = $this->penjualan->invoice_no();
        $data['akun'] = $this->akun->getAllakun();
        $data['produk']  = $this->produk->getAllProduk()->result_array();
        $data['cart'] = $this->penjualan->ambil_cart();
        $data['pelanggan'] = $this->pelanggan->getAllPelanggan()->result_array();

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer');
    }
    public function proses()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {
            $id_produk = $this->input->post('id_produk');
            $check_cart = $this->penjualan->ambil_cart(['tbl_cart.id_produk' => $id_produk])->num_rows();
            if ($check_cart > 0) {
                $this->penjualan->update_qty_cart($data);
            } else {
                $this->penjualan->add_cart($data);
            }
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
        if (isset($_POST['edit_cart'])) {
            $this->penjualan->edit_cart($data);

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
        $cart = $this->penjualan->ambil_cart();
        $data['cart'] = $cart;
        $this->load->view('transaksi/cart_data', $data);
    }

    public function cart_del()
    {
        $id_cart = $this->input->post('id_cart');
        $this->penjualan->del_cart(['id_cart' => $id_cart]);

        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    public function cetak($id)
    {
        $data = array(
            'penjualan' => $this->penjualan->get_penjualan($id)->row(),
            'detail_penjualan' => $this->penjualan->get_detail_penjualan($id)->result()
        );

        $this->load->view('transaksi/receipt_print', $data);
    }

    public function cetak_tagihan($id)
    {
        $data = array(
            'penjualan' => $this->penjualan->get_penjualan($id)->row(),
            'detail_penjualan' => $this->penjualan->get_detail_penjualan($id)->result(),
            'angsuran' => $this->penjualan->get_detail_angsuran($id)->result()
        );

        $this->load->view('transaksi/receipt_tagihan', $data);
    }


    public function history()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'History Penjualan';

        $data = array(
            'data_penjualan' => $this->penjualan->ambil_data_penjualan()->result_array(),
            'data_detail_penjualan' => $this->penjualan->ambil_detail_penjualan(),
            'user' => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array()
        );

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('transaksi/history', $data);
        $this->load->view('template/footer');
    }

    public function angsuran()
    {
        $tittle['tittle'] = 'Data Angsuran';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['angsuran'] = $this->angsuran->get_angsuran()->result_array();

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('transaksi/angsuran', $data);
        $this->load->view('template/footer');
    }

    public function form_angsuran()
    {

        $tittle['tittle'] = 'Input Angsuran';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['penjualan'] = $this->penjualan->ambil_data_tagihan()->result_array();

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('transaksi/form_angsuran', $data);
        $this->load->view('template/footer');
    }

    public function tambahangsuran()
    {

        $id_penjualan = $this->input->post('id_penjualan', true);
        $id_pelanggan = $this->input->post('id_pelanggan', true);
        $tagihan = $this->input->post('tagihan', true);
        $angsuran_pokok = $this->input->post('angsuran', true);
        $angsuran_laba = $this->input->post('n_laba', true);
        $saldotagihan = $this->input->post('saldo_tagihan', true);
        $keterangan = $this->input->post('keterangan', true);
        $date = $this->input->post('date', true);
        $user = $this->session->userdata('username');

        $this->angsuran->tambahAngsuran($id_penjualan, $id_pelanggan, $tagihan, $angsuran_pokok, $angsuran_laba,   $saldotagihan, $keterangan, $date, $user);
        $this->penjualan->updateTagihan($id_penjualan, $angsuran_pokok, $angsuran_laba);
        $this->session->set_flashdata('flash', 'Input Angsuran Berhasil di Tambahkan');
        redirect('transaksi/angsuran'); //redirect ke mahasiswa usai simpan data

    }

    public function cetak_angsuran($id)
    {
        $data = array(
            'angsuran' => $this->angsuran->get_angsuran($id)->row(),
        );

        $this->load->view('transaksi/receipt_print_angsuran', $data);
    }
}
