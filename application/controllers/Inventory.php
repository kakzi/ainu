<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('master_model', 'master');
        $this->load->model('produk_model', 'produk');
        $this->load->model('Stock_model', 'stock');
        //Library Pagination
        // $this->load->library('pagination');
    }

    public function index()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Stock Masuk';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['stock'] = $this->stock->get_stock_in()->result_array();

        //View dari Controller master/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('inventory/index', $data);
        $this->load->view('template/footer');
    }

    public function form_stock_in()
    {

        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Form Stock in';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['supplier'] = $this->master->getAllSupplier();
        $data['produk']  = $this->produk->getAllProduk()->result_array();

        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('inventory/form_stock_add', $data);
        $this->load->view('template/footer');
    }


    public function delete_stock()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['stock'] = $this->stock->get_stock_in()->result_array();

        $stock_id = $this->uri->segment(3);
        $id_produk = $this->uri->segment(4);
        $qty = $this->stock->get($stock_id)->row()->qty_p;

        $this->produk->updateDelStok($id_produk, $qty);
        $this->stock->deleteStock($stock_id);

        $this->session->set_flashdata('flash', 'Data Stock in Berhasil di Hapus');
        redirect('inventory'); //redirect ke mahasiswa usai simpan data
    }

    public function tambahstok()
    {
        $id_produk = $this->input->post('id_produk', true);
        $type = 'in';
        $detail = $this->input->post('keterangan', true);
        $id_supplier = $this->input->post('supplier', true);
        $qty = $this->input->post('qty', true);
        $date = $this->input->post('date', true);
        $user = $this->session->userdata('username');

        $this->stock->tambahDataStok($id_produk, $type, $detail, $id_supplier, $qty, $date, $user); //simpan ke database
        $this->produk->updateStok($id_produk, $qty);
        $this->session->set_flashdata('flash', 'Data Stock Berhasil di Tambahkan');
        redirect('inventory'); //redirect ke mahasiswa usai simpan data
    }


    public function stockout()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Stock Keluar';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['stock'] = $this->stock->get_stock_out()->result_array();

        //View dari Controller master/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('inventory/stockout', $data);
        $this->load->view('template/footer');
    }

    public function form_stock_out()
    {

        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Form Stock Out';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['supplier'] = $this->master->getAllSupplier();
        $data['produk']  = $this->produk->getAllProduk()->result_array();

        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('inventory/form_stock_out', $data);
        $this->load->view('template/footer');
    }

    public function tambahstockout()
    {
        $id_produk = $this->input->post('id_produk', true);
        $type = 'out';
        $detail = $this->input->post('keterangan', true);
        $qty = $this->input->post('qty', true);
        $date = $this->input->post('date', true);
        $user = $this->session->userdata('username');

        $this->stock->tambahDataStokOut($id_produk, $type, $detail, $qty, $date, $user); //simpan ke database
        $this->produk->updateDelStok($id_produk, $qty);
        $this->session->set_flashdata('flash', 'Data Stock Keluar Berhasil di Tambahkan');
        redirect('inventory/stockout'); //redirect ke mahasiswa usai simpan data
    }

    public function delete_stock_out()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['stock'] = $this->stock->get_stock_out()->result_array();

        $stock_id = $this->uri->segment(3);
        $id_produk = $this->uri->segment(4);
        $qty = $this->stock->get($stock_id)->row()->qty_p;

        $this->produk->updateStok($id_produk, $qty);
        $this->stock->deleteStock($stock_id);

        $this->session->set_flashdata('flash', 'Data Stock in Berhasil di Hapus');
        redirect('inventory/stockout'); //redirect ke mahasiswa usai simpan data
    }
}
