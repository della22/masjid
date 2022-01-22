<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_keg extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('admin/jadwal_keg/list_jadwal_keg');
    }
}