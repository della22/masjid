<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_imakho extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('admin/jadwal_imakho/list_jadwal_imakho');
    }
}