<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        //Produkmodel ->mengambil data di DB
        $this->load->model('produk_model', 'produk');
        $this->load->model('satuan_model', 'satuan');
        //Library Pagination
        $this->load->library('pagination');
    }


    public function index()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Produk';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['satuan'] =$this->satuan->getAllSatuan();

        $data['produk'] = $this->produk->getAllProduk()->result_array();

        //View dari Controller master/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('template/footer');
    }

    public function tambahproduk()
    {
        $kode_produk = 'PROD' . time();
        $nama_produk = $this->input->post('nama_produk', true);
        $id_satuan = $this->input->post('id_satuan', true);
        $stock_produk = $this->input->post('stock_produk', true);
        $hpp = $this->input->post('hpp', true);
        $price = $this->input->post('price', true);
        $created = $this->session->userdata('username');

        $this->load->library('ciqrcode');

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/qrcode/produk/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $barcode_produk = $kode_produk . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $kode_produk; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $barcode_produk; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE



        $this->produk->tambahDataProduk($barcode_produk, $kode_produk, $nama_produk,$id_satuan, $stock_produk, $hpp, $price, $created); //simpan ke database
        $this->session->set_flashdata('flash', 'Data Produk Berhasil di Tambahkan');
        redirect('produk'); //redirect ke mahasiswa usai simpan data
    }
}
