<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengeluaran');
        $this->load->model('M_rekapitulasi');
        $this->load->helper('rupiah_helper');
        $this->load->helper('dates_helper');
        // CHECK AUTH LOGIN
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
        $kategori = (int) $this->input->get('kategori');
        $iskategori = $this->input->get('hanya_kategori');
        $data['filter'] = '';
        if (!$iskategori) {
            if ($this->input->get('tanggalawal') && $this->input->get('tanggalakhir')) {
                $tanggalawal = $this->input->get('tanggalawal');
                $tanggalakhir = $this->input->get('tanggalakhir');

                if ($kategori === 0) {
                    if ($tanggalawal === $tanggalakhir) {
                        $data['pengeluaran'] = $this->M_pengeluaran->list_pengeluaran();
                    } else {
                        $data['pengeluaran'] = $this->M_pengeluaran->filter($tanggalawal, $tanggalakhir);
                        $data['filter'] = $this->input->post('tanggalawal') . ' sampai ' . $this->input->post('tanggalakhir');
                    }
                } else {
                    $data['pengeluaran'] = $this->M_pengeluaran->filter_kategori($tanggalawal, $tanggalakhir, $kategori);
                    $data['filter'] = $this->input->get('tanggalawal') . ' sampai ' . $this->input->get('tanggalakhir');
                }
            } else {
                $data['pengeluaran'] = $this->M_pengeluaran->list_pengeluaran();
                $data['filter'] = '';
            }
        } else {
            $data['pengeluaran'] = $this->M_pengeluaran->filter_kategori_only($kategori);
            $data['filter'] = '';
        }
        $data['kategori_pengeluaran'] = $this->M_pengeluaran->list_kategori_pengeluaran();
        $this->load->view('admin/pengeluaran/list_pengeluaran', $data);
    }

    public function proses()
    {
        $this->auth_cek_role();
        $tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');
        $nominal_pengeluaran = $this->input->post('nominal_pengeluaran');
        $keterangan_pengeluaran = $this->input->post('keterangan_pengeluaran');
        $id_kategori = $this->input->post('kategori_pengeluaran');
        $this->M_pengeluaran->input_pengeluaran($tanggal_pengeluaran, $nominal_pengeluaran, $keterangan_pengeluaran, $id_kategori);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/pengeluaran');
    }

    public function edit()
    {
        $this->auth_cek_role();
        $id_pengeluaran = $this->input->post('id_pengeluaran');
        $tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');
        $nominal_pengeluaran = $this->input->post('nominal_pengeluaran');
        $keterangan_pengeluaran = $this->input->post('keterangan_pengeluaran');
        $id_kategori = $this->input->post('kategori_pengeluaran');
        $this->M_pengeluaran->edit_pengeluaran($id_pengeluaran, $tanggal_pengeluaran, $nominal_pengeluaran, $keterangan_pengeluaran, $id_kategori);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/pengeluaran');
    }

    public function print($no)
    {
        if (!isset($no))
            redirect('admin/pengeluaran');

        $data = $this->M_pengeluaran->getByNoPengeluaran($no);
        $data_kategori = $this->M_pengeluaran->getByKategori($data->id_kategori);

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
        $pdf->Cell(260, 45, "KUITANSI PEMBAYARAN", 0, 4, 'C');


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
        $pdf->Cell(16, 10, ' ' . $data_kategori->nama_kategori_keluar, 0, 1, 'L');

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

        $pdf->Output('Laporan Pengeluaran ' . ' .pdf');
    }

    public function hapus($id = null)
    {
        $this->auth_cek_role();
        $this->M_pengeluaran->hapus_pengeluaran($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/pengeluaran');
    }

    public function rekap_keluar()
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
        $data['kategori_pengeluaran'] = $this->M_rekapitulasi->list_kategori_pengeluaran()->result_array();
        $data['list_bulanan_keluar'] = $this->M_rekapitulasi->list_rekapitulasi_filter_keluar($data['bulan'], $data['tahun'])->result_array();
        $data['list_bulanan_keluar_by_tanggal'] = $this->M_rekapitulasi->list_rekapitulasi_filter_keluar($data['bulan'], $data['tahun'], 'tanggal')->result_array();

        $this->load->view('admin/rekapitulasi/rekap_keluar', $data);
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
        $list_bulanan_keluar = $this->M_rekapitulasi->list_rekapitulasi_filter_keluar($data['bulan'], $data['tahun'])->result_array();
        $list_kategori_keluar = $this->M_rekapitulasi->list_kategori_pengeluaran()->result_array();

        foreach ($list_kategori_keluar as $kat_pengeluaran) {
            $total_perkategori_keluar = 0;
            foreach ($list_bulanan_keluar as $total_pengeluaran) {
                if ($total_pengeluaran['id_kategori_keluar'] == $kat_pengeluaran['id_kategori_keluar']) {

                    $total_perkategori_keluar += (int) $total_pengeluaran['nominal'];
                }
            }

            $response[] = array(
                'category' => $kat_pengeluaran['nama_kategori_keluar'],
                'value'    => $total_perkategori_keluar
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

    public function kategori_pengeluaran()
    {
        $data['kategori_pengeluaran'] = $this->M_pengeluaran->list_kategori_pengeluaran();
        $this->load->view('admin/pengeluaran/list_kategori_pengeluaran', $data);
    }

    public function addKategoriKeluar()
    {
        $this->auth_cek_role();
        $nama_kategori_keluar = $this->input->post('nama_kategori_keluar');
        $this->M_pengeluaran->input_kategori($nama_kategori_keluar);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/pengeluaran/kategori_pengeluaran');
    }

    public function editKategoriKeluar()
    {
        $this->auth_cek_role();
        $id_kategori_keluar = $this->input->post('id_kategori_keluar');
        $nama_kategori_keluar = $this->input->post('nama_kategori_keluar');
        $this->M_pengeluaran->edit_kategori($id_kategori_keluar, $nama_kategori_keluar);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/pengeluaran/kategori_pengeluaran');
    }

    public function hapus_kategori($id = null)
    {
        $this->auth_cek_role();
        $this->M_pengeluaran->hapus_kategori($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/pengeluaran/kategori_pengeluaran');
    }
}
