<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_berita');
        $this->load->model('M_arisan');
        $this->load->model('M_rekapitulasi');
        $this->load->model('M_pemasukan');
        $this->load->model('M_pengeluaran');
        $this->load->helper('dates_helper');
        $this->load->helper('rupiah_helper');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['bulan'] = date('m');
        $data['tahun'] = date('Y');
        $data['bulan_terbilang'] = bulan($data['bulan']);
        if ($this->input->get('bulan') && $this->input->get('tahun')) {
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
            $data['bulan_terbilang'] = bulan($bulan);
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
        }
        $data['donasi_berlangsung'] = $this->M_berita->list_berita_status(2)->num_rows();
        $data['jumlah_donatur'] = $this->M_arisan->list_arisan()->num_rows();
        $data['kategori_pemasukan'] = $this->M_rekapitulasi->list_kategori_pemasukan()->result_array();
        $data['kategori_pengeluaran'] = $this->M_rekapitulasi->list_kategori_pengeluaran()->result_array();
        $data['list_bulanan_masuk'] = $this->M_rekapitulasi->list_rekapitulasi_filter_masuk($data['bulan'], $data['tahun'])->result_array();
        $data['list_bulanan_keluar'] = $this->M_rekapitulasi->list_rekapitulasi_filter_keluar($data['bulan'], $data['tahun'])->result_array();
        $data['total_keuangan'] = $this->totalDuit();
        $this->load->view('admin/overview', $data);
    }

    public function apiPemasukanPengeluaran()
    {
        $response = array();
        $pemasukan_result = $this->M_pemasukan->pemasukan_6_bulan();
        $pengeluaran_result = $this->M_pengeluaran->pengeluaran_6_bulan();
        // buat Array list 6 bulan dengan value pemasukan pengeluaran 0
        for ($i = 0; $i <= 5; $i++) {
            $response[] = array(
                'date' => date("Y-m", strtotime(date('Y-m-01') . " - $i months")),
                'value1' => 0,
                'value2' => 0,
            );
        }

        // Array bulan di looping lalu di cek pemasukan dan pengeluaran dengan date yang sama
        foreach ($response as $key => $bulan) {
            foreach ($pemasukan_result->result_array() as $pemasukan) {
                if ($bulan['date'] == $pemasukan['tgl']) {
                    $response[$key]['value1'] = (int) $pemasukan['jumlah'];
                }
            }

            foreach ($pengeluaran_result->result_array() as $pengeluaran) {
                if ($bulan['date'] == $pengeluaran['tgl']) {
                    $response[$key]['value2'] = (int) $pengeluaran['jumlah'];
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode(
            array(
                'success' => true,
                'message' => 'Get All Data kategori with Nominal',
                'filter'  =>   'aaaaaa',
                'data'    => $response,
            )
        );
    }

    function totalDuit()
    {
        $pemasukan = $this->M_pemasukan->list_pemasukan();
        $pengeluaran = $this->M_pengeluaran->list_pengeluaran();
        $kategori_pemasukan = $this->M_pemasukan->list_kategori_pemasukan();
        $kategori_pengeluaran = $this->M_pengeluaran->list_kategori_pengeluaran();
        $total_pemasukan = 0;
        $total_pengeluaran = 0;

        foreach ($kategori_pemasukan->result_array() as $kat_pemasukan) {
            foreach ($pemasukan->result_array() as $masuk) {
                if ($kat_pemasukan['id_kategori_masuk'] == $masuk['id_kategori']) {
                    $total_pemasukan += (int) $masuk['nominal'];
                }
            }
        }

        foreach ($kategori_pengeluaran->result_array() as $kat_pengeluaran) {
            foreach ($pengeluaran->result_array() as $keluar) {
                if ($kat_pengeluaran['id_kategori_keluar'] == $keluar['id_kategori']) {
                    $total_pengeluaran += (int) $keluar['nominal'];
                }
            }
        }

        return (int) $total_pemasukan - $total_pengeluaran;
    }
}
