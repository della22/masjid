<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ustadz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ustadz');
    }

    public function index()
    {
        $data['ustadz'] = $this->m_ustadz->list_ustadz();
        $this->load->view('admin/ustadz/list_ustadz', $data);
    }

    public function proses()
    {
        $nik = $this->input->post('nik');
        $nama_ustadz = $this->input->post('nama_ustadz');
        $telepon_ustadz = $this->input->post('telepon_ustadz');
        $alamat_ustadz = $this->input->post('alamat_ustadz');
        $this->m_ustadz->input_ustadz($nik, $nama_ustadz, $telepon_ustadz, $alamat_ustadz);
        redirect('admin/ustadz');
    }
}