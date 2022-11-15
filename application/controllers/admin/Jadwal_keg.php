<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_keg extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_keg');
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
            $data['jadwal_keg'] = $this->M_keg->filter($bulan, $tahun);
            $data['link_download'] = base_url() . 'admin/jadwal_keg/cetak/' . $bulan . '/' . $tahun;
        } else {
            $data['jadwal_keg'] = $this->M_keg->list_keg();
            $data['link_download'] = base_url() . 'admin/jadwal_keg/cetak';
        }
        $this->load->view('admin/jadwal_keg/list_jadwal_keg', $data);
    }

    public function proses()
    {
        $nik_pengisi = $this->input->post('nik_pengisi');
        $nama_keg = $this->input->post('nama_keg');
        $tanggal_keg = $this->input->post('tanggal_keg');
        $waktu_keg = $this->input->post('waktu_mulai') . ' - ' . $this->input->post('waktu_selesai') . ' WIB';
        $tempat_keg = $this->input->post('tempat_keg');
        $this->M_keg->input_keg($nik_pengisi, $nama_keg, $tanggal_keg, $waktu_keg, $tempat_keg);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/jadwal_keg');
    }

    public function edit()
    {
        $id_jadkeg = $this->input->post('id_jadkeg');
        $nik_pengisi = $this->input->post('nik_pengisi');
        $nama_keg = $this->input->post('nama_keg');
        $tanggal_keg = $this->input->post('tanggal_keg');
        $waktu_keg = $this->input->post('waktu_mulai') . ' - ' . $this->input->post('waktu_selesai') . ' WIB';
        $tempat_keg = $this->input->post('tempat_keg');
        $this->M_keg->edit_keg($id_jadkeg, $nik_pengisi, $nama_keg, $tanggal_keg, $waktu_keg, $tempat_keg);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/jadwal_keg');
    }

    public function hapus($id = null)
    {
        $this->M_keg->hapus_keg($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/jadwal_keg');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_keg->search_pengisi($_GET['term']);
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
            $data['jadwal_keg'] = $this->M_keg->filter($bulan, $tahun);
            if ($bulan == 13) {
                $data['judul_pdf'] = 'JADWAL TAHUN ' . $tahun;
            } else {
                $data['judul_pdf'] = 'BULAN ' . $bulan_cek[$bulan] . ' TAHUN ' . $tahun;
            }
        } else {
            $data['jadwal_keg'] = $this->M_keg->list_keg();
            $data['judul_pdf'] = 'JADWAL KESELURUHAN';
        }

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan kegiatan masjid';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('admin/jadwal_keg/laporan_keg_pdf', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
