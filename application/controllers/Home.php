<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $tittle['tittle'] = 'AINU | Air Minum NU Ngasem';
        $this->load->view('frontend/home', $tittle);
    }
}
