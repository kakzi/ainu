<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akuntansi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('akuntansi_model', 'akuntansi');
    }

    public function index()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Data Akun';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // ambil semua data yang ada di table agen lewat model
        // $data['agen'] = $this->master->getAllAgen();

        //Library Pagination
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }


        //Config Pagination
        $this->db->like('nama_akun', $data['keyword']);
        $this->db->or_like('no_acc', $data['keyword']);
        $this->db->from('tbl_akun');
        $config['base_url'] = 'http://localhost/ainungasem/akuntansi/index';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $config['num_link'] = 6;

        //Style and design Pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center mt-3">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['pref_link'] = '&laquo';
        $config['pref_tag_open'] = '<li class="page-item">';
        $config['pref_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';


        $config['attributes'] = array('class' => 'page-link');

        //inisisasi Pagination
        $this->pagination->initialize($config);

        //Uri segment 3 untuk localhost/ainungasem bernilai 0, method selanjutnya 1,2,3
        $data['start'] = $this->uri->segment(3);
        //$data['akun'] = $this->akuntansi->getPaginationakun($config['per_page'], $data['start'], $data['keyword']);
        $data['akun'] = $this->akuntansi->getAllAkunBaru()->result_array();
        //Create Link Pagination
        $data['pagination'] = $this->pagination->create_links();

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('akuntansi/index', $data);
        $this->load->view('template/footer');
    }

    public function header_akun()
    {
        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Header Akun';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();


        //Library Pagination
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }


        //Config Pagination
        $this->db->like('nama_header', $data['keyword']);
        $this->db->or_like('no_reff', $data['keyword']);
        $this->db->from('tbl_header_akun');
        $config['base_url'] = 'http://localhost/ainungasem/akuntansi/header_akun';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;
        $config['num_link'] = 7;

        //Style and design Pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center mt-3">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['pref_link'] = '&laquo';
        $config['pref_tag_open'] = '<li class="page-item">';
        $config['pref_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';


        $config['attributes'] = array('class' => 'page-link');

        //inisisasi Pagination
        $this->pagination->initialize($config);

        //Uri segment 3 untuk localhost/ainungasem bernilai 0, method selanjutnya 1,2,3
        $data['start'] = $this->uri->segment(3);
        $data['header'] = $this->akuntansi->getPaginationHeader($config['per_page'], $data['start'], $data['keyword']);

        //Create Link Pagination
        $data['pagination'] = $this->pagination->create_links();
        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('akuntansi/header_akun', $data);
        $this->load->view('template/footer');
    }

    public function tambah_header()
    {
        $no_reff = $this->input->post('no_reff', true);
        $nama_header = $this->input->post('nama_header', true);
        // $date = time();
        $created = $this->session->userdata('username');

        $this->akuntansi->tambahHeader($no_reff, $nama_header, $created);
        $this->session->set_flashdata('flash', 'Data Header Akun Berhasil di Tambahkan');
        redirect('akuntansi/header_akun');
    }

    public function create()
    {

        //Title Header dan ambil Session user yang sedang Login
        $tittle['tittle'] = 'Tambah Data Akun';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['header'] = $this->akuntansi->getAllHeader();

        //View dari Controller akuntansi/index
        $this->load->view('template/header', $tittle);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('akuntansi/create_akun', $data);
        $this->load->view('template/footer');
    }


    public function tambahakun()
    {

        $id_header = $this->input->post('id_header', true);
        $nomor_akun = $this->input->post('nomor_akun', true);
        $nama_akun = $this->input->post('nama_akun', true);
        $status = $this->input->post('status', true);
        $created = $this->session->userdata('username');

        $this->akuntansi->tambahDataakun($id_header, $nomor_akun, $nama_akun, $status, $created); //simpan ke database
        $this->session->set_flashdata('flash', 'Data Akun Berhasil di Tambahkan');
        redirect('akuntansi'); //redirect ke mahasiswa usai simpan data

    }
}
