<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekapitulasi');
        $this->load->helper('dates_helper');
        $this->load->helper('rupiah_helper');
        if ($this->session->userdata('status') == "login") {
            if ($this->session->userdata('role') != "Admin") {
                if ($this->session->userdata('role') != "Bendahara") {
                    redirect(base_url("login"));
                }
            }
        } else {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['bulan'] = date('m');
        $data['tahun'] = date('Y');
        if ($this->input->get('bulan') && $this->input->get('tahun')) {
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
            $data['bulan_terbilang'] = bulan($bulan);
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['link_download'] = base_url() . 'admin/phpspreadsheet/cetak_rekapitulasi/' . $bulan . '/' . $tahun;
        } else {
            $data['bulan_terbilang'] = bulan($data['bulan']);
            $data['link_download'] = base_url() . 'admin/phpspreadsheet/cetak_rekapitulasi/' . $data['bulan'] . '/' . $data['tahun'];
        }
        $data['kategori_pemasukan'] = $this->M_rekapitulasi->list_kategori_pemasukan()->result_array();
        $data['kategori_pengeluaran'] = $this->M_rekapitulasi->list_kategori_pengeluaran()->result_array();
        $data['list_bulanan_masuk'] = $this->M_rekapitulasi->list_rekapitulasi_filter_masuk($data['bulan'], $data['tahun'])->result_array();
        $data['list_bulanan_keluar'] = $this->M_rekapitulasi->list_rekapitulasi_filter_keluar($data['bulan'], $data['tahun'])->result_array();
        $data['list_rekapitulasi'] = $this->M_rekapitulasi->list_rekapitulasi_union($data['bulan'], $data['tahun'])->result_array();

        $this->load->view('admin/rekapitulasi/list_rekapitulasi', $data);
    }
}
