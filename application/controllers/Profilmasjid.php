<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profilmasjid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profilMasjid');
        $this->load->helper('dates_helper');
        $this->load->helper('rupiah_helper');
    }

    public function index()
    {
        $data['layanan'] = $this->M_profilMasjid->list_layanan();
        $data['profil'] = $this->M_profilMasjid->getDataProfil()->row_array();
        $data['sdm'] = $this->M_profilMasjid->getDataSDM()->row_array();
        $this->load->view('profilmasjid', $data);
    }
}
