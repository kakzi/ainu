<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        //Mastermodel ->mengambil data di DB
        $this->load->model('master_model', 'master');
        $this->load->model('satuan_model', 'satuan');

        $this->load->model('pelanggan_model', 'pelanggan');

        //Library Pagination
        $this->load->library('pagination');
    }

    //SUB DISTRIBUTOR FITUR
    public function index()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Supplier';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // //ambil data keyword
        // if ($this->input->post('submit')) {
        //     $data['keyword'] = $this->input->post('keyword');
        //     $this->session->set_userdata('keyword', $data['keyword']);
        // } else {
        //     $data['keyword'] = $this->session->userdata('keyword');
        // }


        // //Config Pagination
        // $this->db->like('nama_supplier', $data['keyword']);
        // $this->db->or_like('pic_supplier', $data['keyword']);
        // $this->db->from('tbl_supplier');
        // $config['base_url'] = 'http://localhost/ainungasem/master/supplier';
        // $config['total_rows'] = $this->db->count_all_results();
        // $data['total_rows'] = $config['total_rows'];
        // $config['per_page'] = 4;
        // $config['num_link'] = 5;

        // //Style and design Pagination
        // $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center mt-3">';
        // $config['full_tag_close'] = '</ul></nav>';

        // $config['first_link'] = 'First';
        // $config['first_tag_open'] = '<li class="page-item">';
        // $config['first_tag_close'] = '</li>';

        // $config['last_link'] = 'Last';
        // $config['last_tag_open'] = '<li class="page-item">';
        // $config['last_tag_close'] = '</li>';

        // $config['next_link'] = '&raquo';
        // $config['next_tag_open'] = '<li class="page-item">';
        // $config['next_tag_close'] = '</li>';

        // $config['pref_link'] = '&laquo';
        // $config['pref_tag_open'] = '<li class="page-item">';
        // $config['pref_tag_close'] = '</li>';

        // $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        // $config['cur_tag_close'] = '</a></li>';

        // $config['num_tag_open'] = '<li class="page-item">';
        // $config['num_tag_close'] = '</li>';


        // $config['attributes'] = array('class' => 'page-link');

        // //inisisasi Pagination
        // $this->pagination->initialize($config);

        // //Uri segment 3 untuk localhost/ainungasem bernilai 0, method selanjutnya 1,2,3
        // $data['start'] = $this->uri->segment(3);
        // $data['supplier'] = $this->master->getPaginationSupplier($config['per_page'], $data['start'], $data['keyword']);

        // //Create Link Pagination
        // $data['pagination'] = $this->pagination->create_links();

        $data['supplier'] = $this->master->getAllSupplier();


        //View dari Controller master/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('master/index', $data);
        $this->load->view('template/footer');
    }

    public function tambahsupplier()
    {

        $kode_supplier = 'SUP' . time();
        $nama_supplier = $this->input->post('nama_supplier', true);
        $pic = $this->input->post('pic', true);
        $nik = $this->input->post('nik', true);
        $alamat_supplier = $this->input->post('alamat_supplier', true);
        $telp_supplier = $this->input->post('telp_supplier', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $date = time();
        $created = $this->session->userdata('username');

        $this->master->tambahDataSupplier($kode_supplier, $nama_supplier, $pic, $nik, $alamat_supplier, $telp_supplier, $deskripsi, $date, $created); //simpan ke database
        $this->session->set_flashdata('flash', 'Data Supplier Berhasil di Tambahkan');
        redirect('master'); //redirect ke mahasiswa usai simpan data

    }

    public function pdfsupplier()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Cetak Data Supplier';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->library('mypdf');

        // ambil semua data yang ada di table supplier lewat model
        $data['supplier'] = $this->master->getAllSupplier();

        $this->mypdf->generateSupplier('master/pdfsupplier', $data);

        //View dari Controller master/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('master/pdfsupplier', $data);
        $this->load->view('template/footer');
    }

    public function satuan()
    {

        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Satuan Barang';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['satuan'] = $this->satuan->getAllSatuan();

        //View dari Controller master/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('master/satuan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_satuan()
    {


        $nama_satuan = $this->input->post('nama_satuan', true);
        $created = $this->session->userdata('username');

        $this->satuan->tambahDataSatuan($nama_satuan, $created); //simpan ke database
        $this->session->set_flashdata('flash', 'Data Satuan Barang Berhasil di Tambahkan');
        redirect('master/satuan'); //redirect ke mahasiswa usai simpan data

    }

    public function p_category()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Kategori Pelanggan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kategori'] = $this->master->getAllKategoriPelanggan();

        //View dari Controller master/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('master/c_pelanggan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_kategori()
    {
        $nama_kategori = $this->input->post('nama_kategori', true);
        $created = $this->session->userdata('username');

        $this->master->tambahDataKategori($nama_kategori, $created); //simpan ke database
        $this->session->set_flashdata('flash', 'Data Kategori Pelanggan Berhasil di Tambahkan');
        redirect('master/p_category'); //redirect ke mahasiswa usai simpan data

    }

    public function pelanggan()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kategori'] = $this->master->getAllKategoriPelanggan();
        $data['pelanggan'] = $this->pelanggan->getAllPelanggan()->result_array();

        //View dari Controller master/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('master/pelanggan', $data);
        $this->load->view('template/footer');
    }

    public function tambahpelanggan()
    {
        $kode_pelanggan = 'PLG' . time();
        $nama_pelanggan = $this->input->post('nama_pelanggan', true);
        $id_kategori = $this->input->post('id_kategori', true);
        $pic = $this->input->post('pic_pelanggan', true);
        $nik = $this->input->post('nik', true);
        $no_telp = $this->input->post('no_telp', true);
        $alamat_pelanggan = $this->input->post('alamat_pelanggan', true);
        $created = $this->session->userdata('username');

        $this->load->library('ciqrcode');

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/qrcode/pelanggan/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $barcode_pelanggan = $kode_pelanggan . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $kode_pelanggan; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $barcode_pelanggan; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE



        $this->pelanggan->tambahDataPelanggan($kode_pelanggan, $nama_pelanggan, $id_kategori, $pic, $nik, $no_telp, $alamat_pelanggan, $barcode_pelanggan, $created); //simpan ke database
        $this->session->set_flashdata('flash', 'Data Pelanggan Baru Berhasil di Tambahkan');
        redirect('master/pelanggan'); //redirect ke mahasiswa usai simpan data
    }


    public function cetak_supplier($id)
    {
        $data = array(
            'supplier' => $this->master->get_supplier($id)->row(),
        );

        $this->load->view('master/detail_supplier', $data);
    }
}
