<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Arisan_Kurban extends CI_Controller
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
        $this->load->view('admin/arisan_kurban/list_arisan_kurban');
    }

    public function rekap_arisan()
    {
        $this->load->view('admin/rekapitulasi/rekap_arisan');
    }

    public function detail()
    {
        $this->load->view('admin/arisan_kurban/detail_arisan_kurban');
    }
}