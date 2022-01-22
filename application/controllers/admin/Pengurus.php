<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('admin/pengurus/list_pengurus');
    }
}