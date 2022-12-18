<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemasukan');
        $this->load->model('M_rekapitulasi');
        $this->load->helper('rupiah_helper');
        $this->load->helper('dates_helper');
        // CHECK LOGIN
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function auth_cek_role()
    {
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
        $kategori = (int) $this->input->post('kategori');
        $iskategori = $this->input->post('hanya_kategori');
        $data['filter'] = '';
        if (!$iskategori) {
            if ($this->input->post('tanggalawal') && $this->input->post('tanggalakhir')) {
                $tanggalawal = $this->input->post('tanggalawal');
                $tanggalakhir = $this->input->post('tanggalakhir');
                if ($kategori === 0) {
                    if ($tanggalawal === $tanggalakhir) {
                        $data['pemasukan'] = $this->M_pemasukan->list_pemasukan();
                    } else {
                        $data['pemasukan'] = $this->M_pemasukan->filter($tanggalawal, $tanggalakhir);
                        $data['filter'] = $this->input->post('tanggalawal') . ' sampai ' . $this->input->post('tanggalakhir');
                    }
                } else {
                    $data['pemasukan'] = $this->M_pemasukan->filter_kategori($tanggalawal, $tanggalakhir, $kategori);
                    $data['filter'] = $this->input->post('tanggalawal') . ' sampai ' . $this->input->post('tanggalakhir');
                }
            } else {
                $data['pemasukan'] = $this->M_pemasukan->list_pemasukan();
                $data['filter'] = '';
            }
        } else {
            $data['pemasukan'] = $this->M_pemasukan->filter_kategori_only($kategori);
            $data['filter'] = '';
        }
        $data['kategori_pemasukan'] = $this->M_pemasukan->list_kategori_pemasukan();
        $data['role'] = $this->session->userdata('role');
        $this->load->view('admin/pemasukan/list_pemasukan', $data);
    }

    public function proses()
    {
        $this->auth_cek_role();
        $tanggal_pemasukan = $this->input->post('tanggal_pemasukan');
        $nominal_pemasukan = $this->input->post('nominal_pemasukan');
        $keterangan_pemasukan = $this->input->post('keterangan_pemasukan');
        $id_kategori = $this->input->post('kategori_pemasukan');
        $this->M_pemasukan->input_pemasukan($tanggal_pemasukan, $nominal_pemasukan, $keterangan_pemasukan, $id_kategori);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/pemasukan');
    }

    public function edit()
    {
        $this->auth_cek_role();
        $id_pemasukan = $this->input->post('id_pemasukan');
        $tanggal_pemasukan = $this->input->post('tanggal_pemasukan');
        $nominal_pemasukan = $this->input->post('nominal_pemasukan');
        $keterangan_pemasukan = $this->input->post('keterangan_pemasukan');
        $id_kategori = $this->input->post('kategori_pemasukan');
        $this->M_pemasukan->edit_pemasukan($id_pemasukan, $tanggal_pemasukan, $nominal_pemasukan, $keterangan_pemasukan, $id_kategori);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/pemasukan');
    }

    public function print($no)
    {
        if (!isset($no))
            redirect('admin/pemasukan');

        $data = $this->M_pemasukan->getByNoPemasukan($no);
        $data_kategori = $this->M_pemasukan->getByKategori($data->id_kategori);

        $pdf = new \TCPDF();
        $pdf->AddPage('L', 'mm', 'A4');
        $image_file = base_url('images/logo.png');
        $pdf->Image($image_file, 20, 20, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        /* Kop Atas */
        $pdf->Ln(6);
        $pdf->SetFont('', 'B', 18);
        $pdf->Cell(140, 7, "MASJID NURUL IMAN", 0, 1, 'C');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(212, 0, "KELURAHAN SELINDUNG BARU KOTA PANGKALPINANG", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        /* Judul */
        $style = array('width' => 0.5, 'dash' => '0,0,0,0', 'phase' => 0, 'color' => array(0, 0, 0));
        $pdf->Line(10, 50, 290, 50, $style);
        $pdf->SetFont('', 'B', 25);
        $pdf->Cell(260, 45, "KUITANSI", 0, 4, 'C');


        $pdf->SetY(70);
        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'No. Kuitansi  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, ' ' . $data->id, 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'Uang Sejumlah  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, terbilang($data->nominal) . ' Rupiah', 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'Kategori  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, ' ' . $data_kategori->nama_kategori_masuk, 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'Keterangan  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, ' ' . $data->keterangan, 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetY(-90);
        $pdf->Cell(40, 5, '', 0, 0, 'C');
        $pdf->SetFont('', 'B', '16');
        $pdf->Cell(60, 15, 'Rp ' . number_format($data->nominal, 0, ',', '.'), 1, 0, 'C');


        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(120, 10, 'Pangkalpinang , ' . dates($data->tanggal), 0, 0, 'R');

        $pdf->SetY(-90);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(220, 30, 'Penerima', 0, 0, 'R');

        $pdf->SetY(-90);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(230, 90, '............................', 0, 0, 'R');

        $pdf->Output('Laporan Pemasukan ' . ' .pdf');
    }

    public function hapus($id = null)
    {
        $this->auth_cek_role();
        $this->M_pemasukan->hapus_pemasukan($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/pemasukan');
    }

    public function rekap_masuk()
    {
        $data['bulan'] = date('m');
        $data['tahun'] = date('Y');
        if ($this->input->get('bulan') && $this->input->get('tahun')) {
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
            $data['bulan_terbilang'] = bulan($bulan);
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
        } else {
            $data['bulan_terbilang'] = bulan($data['bulan']);
        }
        $data['kategori_pemasukan'] = $this->M_rekapitulasi->list_kategori_pemasukan()->result_array();
        $data['list_bulanan_masuk'] = $this->M_rekapitulasi->list_rekapitulasi_filter_masuk($data['bulan'], $data['tahun'])->result_array();
        $data['list_bulanan_masuk_by_tanggal'] = $this->M_rekapitulasi->list_rekapitulasi_filter_masuk($data['bulan'], $data['tahun'], 'tanggal')->result_array();

        $this->load->view('admin/rekapitulasi/rekap_masuk', $data);
    }

    public function apiKategoriChart()
    {
        $response = array();

        $data['bulan'] = date('m');
        $data['tahun'] = date('Y');
        if ($this->input->get('bulan') && $this->input->get('tahun')) {
            $data['bulan'] = $this->input->get('bulan');
            $data['tahun'] = $this->input->get('tahun');
        }
        $data['bulan_terbilang'] = bulan($data['bulan']);
        $list_bulanan_masuk = $this->M_rekapitulasi->list_rekapitulasi_filter_masuk($data['bulan'], $data['tahun'])->result_array();
        $list_kategori_masuk = $this->M_rekapitulasi->list_kategori_pemasukan()->result_array();

        foreach ($list_kategori_masuk as $kat_pemasukan) {
            $total_perkategori_masuk = 0;
            foreach ($list_bulanan_masuk as $total_pemasukan) {
                if ($total_pemasukan['id_kategori_masuk'] == $kat_pemasukan['id_kategori_masuk']) {

                    $total_perkategori_masuk += (int) $total_pemasukan['nominal'];
                }
            }

            $response[] = array(
                'category' => $kat_pemasukan['nama_kategori_masuk'],
                'value'    => $total_perkategori_masuk
            );
        }


        header('Content-Type: application/json');
        echo json_encode(
            array(
                'success' => true,
                'message' => 'Get All Data kategori with Nominal',
                'filter'   =>   bulan($data['bulan']) . '-' . $data['tahun'],
                'data'    => $response
            )
        );
    }

    public function kategori_pemasukan()
    {
        $this->auth_cek_role();
        $data['kategori_pemasukan'] = $this->M_pemasukan->list_kategori_pemasukan();
        $this->load->view('admin/pemasukan/list_kategori_pemasukan', $data);
    }

    public function addKategoriMasuk()
    {
        $this->auth_cek_role();
        $nama_kategori_masuk = $this->input->post('nama_kategori_masuk');
        $this->M_pemasukan->input_kategori($nama_kategori_masuk);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/pemasukan/kategori_pemasukan');
    }

    public function editKategoriMasuk()
    {
        $this->auth_cek_role();

        $id_kategori_masuk = $this->input->post('id_kategori_masuk');
        $nama_kategori_masuk = $this->input->post('nama_kategori_masuk');
        $this->M_pemasukan->edit_kategori($id_kategori_masuk, $nama_kategori_masuk);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/pemasukan/kategori_pemasukan');
    }

    public function hapus_kategori($id = null)
    {
        $this->auth_cek_role();
        $this->M_pemasukan->hapus_kategori($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/pemasukan/kategori_pemasukan');
    }
}
