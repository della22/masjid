<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekapitulasi');
        $this->load->helper('dates_helper');
    }

    public function index()
    {
        if ($this->input->get('bulan') && $this->input->get('tahun')) {
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
            $data['bulan_terbilang'] = bulan($bulan);
            $data['rekapitulasi'] = $this->M_rekapitulasi->list_rekapitulasi_filter($bulan,$tahun)->result_array();
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['link_download'] = base_url().'admin/phpspreadsheet/cetak_rekapitulasi/'.$bulan.'/'.$tahun;
        }
        else{
            $data['bulan'] = date('m');
            $data['tahun'] = date('Y');
            $data['bulan_terbilang'] = bulan($data['bulan']);
            $data['rekapitulasi'] = $this->M_rekapitulasi->list_rekapitulasi()->result_array();
            $data['link_download'] = base_url().'admin/phpspreadsheet/cetak_rekapitulasi/'.$data['bulan'].'/'.$data['tahun'];
        }

        
        
        $this->load->view('admin/rekapitulasi/list_rekapitulasi',$data);
    }
}