<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('admin/pemasukan/list_pemasukan');
    }
}