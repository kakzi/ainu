<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		//Title Header dan ambil Session user yang sedang Login
		$tittle['tittle'] = 'Data Stock Masuk';
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		//View dari Controller master/index
		$this->load->view('template/header', $tittle);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('template/footer');
	}
}
