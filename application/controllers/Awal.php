<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Awal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekapitulasi');
        $this->load->model('M_pemasukan');
        $this->load->model('M_pengeluaran');
        $this->load->model('M_profilMasjid');
        $this->load->model('M_berita');
        $this->load->model('M_arisan');
        $this->load->helper('dates_helper');
        $this->load->helper('rupiah_helper');
    }

    public function index()
    {
        $data['bulan'] = date('m');
        $data['tahun'] = date('Y');
        $data['bulan_terbilang'] = bulan($data['bulan']);

        $data['kategori_pemasukan'] = $this->M_rekapitulasi->list_kategori_pemasukan()->result_array();
        $data['kategori_pengeluaran'] = $this->M_rekapitulasi->list_kategori_pengeluaran()->result_array();
        $data['list_bulanan_masuk'] = $this->M_rekapitulasi->list_rekapitulasi_filter_masuk($data['bulan'], $data['tahun'])->result_array();
        $data['list_bulanan_keluar'] = $this->M_rekapitulasi->list_rekapitulasi_filter_keluar($data['bulan'], $data['tahun'])->result_array();
        $data['list_rekapitulasi'] = $this->M_rekapitulasi->list_rekapitulasi_union($data['bulan'], $data['tahun'])->result_array();
        $data['berita'] = $this->M_berita->list_berita_status(2);
        $data['arisan_kurban'] = $this->M_arisan->list_arisan();
        $data['profil'] = $this->M_profilMasjid->getDataProfil()->row_array();
        $data['layanan'] = $this->M_profilMasjid->list_layanan();

        $data['cicilan_bulan_arisan'] = $this->M_arisan->list_cicilan_bulan_ini($data['bulan'], $data['tahun']);

        // Menghitung Total Semua duit
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
        $data['total_keuangan'] = (int) $total_pemasukan - $total_pengeluaran;
        $this->load->view('awal', $data);
    }
    public function masjid()
    {
        $this->load->view('masjid');
    }
}
