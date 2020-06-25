<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->model('akuntansi_model', 'akun');
        $this->load->model('penjualan_model', 'penjualan');
        $this->load->model('produk_model', 'produk');
    }

    public function index()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Tagihan';

        $data = array(
            'data_tagihan' => $this->penjualan->ambil_data_tagihan()->result_array(),
            'data_detail_penjualan' => $this->penjualan->ambil_detail_penjualan(),
            'user' => $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array()
        );

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('tagihan/index', $data);
        $this->load->view('template/footer');
    }
}
