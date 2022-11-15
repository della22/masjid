<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_imakho extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_imakho');
        if ($this->session->userdata('status') == "login") {
            if ($this->session->userdata('role') != "Admin") {
                if ($this->session->userdata('role') != "Sekretaris") {
                    redirect(base_url("login"));
                }
            }
        } else {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        if ($this->input->get('bulan') && $this->input->get('tahun')) {
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
            $data['jadwal_imakho'] = $this->M_imakho->filter($bulan, $tahun);
            $data['link_download'] = base_url() . 'admin/jadwal_imakho/cetak/' . $bulan . '/' . $tahun;
        } else {
            $data['jadwal_imakho'] = $this->M_imakho->list_imakho();
            $data['link_download'] = base_url() . 'admin/jadwal_imakho/cetak';
        }
        $this->load->view('admin/jadwal_imakho/list_jadwal_imakho', $data);
    }

    public function proses()
    {
        $nik_imakho = $this->input->post('nik_imakho');
        $nik_muadzin = $this->input->post('nik_muadzin');
        $tanggal_imakho = $this->input->post('tanggal_imakho');

        $this->M_imakho->input_imakho($nik_imakho, $nik_muadzin, $tanggal_imakho);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/jadwal_imakho');
    }

    public function edit()
    {
        if (trim($this->input->post('nama_muadzin')) == "-") {
            $nik_muadzin = "";
        } else {
            $nik_muadzin = $this->input->post('nik_muadzin');
        }
        $id_imakho = $this->input->post('id_imakho');
        $nik_imakho = $this->input->post('nik_imakho');

        $tanggal_imakho = $this->input->post('tanggal_imakho');
        $this->M_imakho->edit_imakho($id_imakho, $nik_imakho, $nik_muadzin, $tanggal_imakho);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/jadwal_imakho');
    }

    public function hapus($id = null)
    {
        $this->M_imakho->hapus_imakho($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/jadwal_imakho');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_imakho->search_imakho($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_ustadz,
                        'nama' => $row->nama_ustadz,
                        'nik'   => $row->nik
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function cetak($bulan = null, $tahun = null)
    {
        // echo $bulan.$tahun;
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $bulan_cek = array(
            '1' => 'JANUARI',
            '2' => 'FEBRUARI',
            '3' => 'MARET',
            '4' => 'APRIL',
            '5' => 'MEI',
            '6' => 'JUNI',
            '7' => 'JULI',
            '8' => 'AGUSTUS',
            '9' => 'SEPTEMBER',
            '10' => 'OKTOBER',
            '11' => 'NOVEMBER',
            '12' => 'DESEMBER',
        );
        $this->load->library('pdfgenerator');

        if ($bulan && $tahun) {
            $data['jadwal_imakho'] = $this->M_imakho->filter($bulan, $tahun);
            if ($bulan == 13) {
                $data['judul_pdf'] = 'JADWAL TAHUN ' . $tahun;
            } else {
                $data['judul_pdf'] = 'BULAN ' . $bulan_cek[$bulan] . ' TAHUN ' . $tahun;
            }
        } else {
            $data['jadwal_imakho'] = $this->M_imakho->list_imakho();
            $data['judul_pdf'] = 'JADWAL KESELURUHAN';
        }

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan jadwal imam dan khotib masjid';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('admin/jadwal_imakho/laporan_imakho_pdf', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
