<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_donasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $this->load->view('admin/berita_donasi/list_berita');
    }

    public function detail()
    {
        $this->load->view('admin/berita_donasi/detail_berita');
    }
}