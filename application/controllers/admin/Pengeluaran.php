<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengeluaran');
        $this->load->helper('rupiah_helper');
        $this->load->helper('dates_helper');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['kategori_pengeluaran'] = $this->M_pengeluaran->list_kategori_pengeluaran();
        $data['pengeluaran'] = $this->M_pengeluaran->list_pengeluaran();
        $this->load->view('admin/pengeluaran/list_pengeluaran',$data);
    }

    public function proses()
    {
        $tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');
        $nominal_pengeluaran = $this->input->post('nominal_pengeluaran');
        $keterangan_pengeluaran = $this->input->post('keterangan_pengeluaran');
        $this->M_pengeluaran->input_pengeluaran($tanggal_pengeluaran, $nominal_pengeluaran, $keterangan_pengeluaran);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/pengeluaran');
    }

    public function edit()
    {
        $id_pengeluaran = $this->input->post('id_pengeluaran');
        $tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');
        $nominal_pengeluaran = $this->input->post('nominal_pengeluaran');
        $keterangan_pengeluaran = $this->input->post('keterangan_pengeluaran');
        $this->M_pengeluaran->edit_pengeluaran($id_pengeluaran, $tanggal_pengeluaran, $nominal_pengeluaran, $keterangan_pengeluaran);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/pengeluaran');
    }

    public function print($no)
    {
        if (!isset($no)) 
            redirect('admin/pengeluaran');
        
        $data = $this->M_pengeluaran->getByNoPengeluaran($no);

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
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'No. Kuitansi  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,' '.$data->id,0,1,'L');

        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'Uang Sejumlah  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,terbilang($data->nominal). 'Rupiah',0,1,'L');

        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'Keterangan  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,' '.$data->keterangan,0,1,'L');

        $pdf->Cell(20);
        $pdf->SetY(-90);
        $pdf->Cell(40,5,'',0,0,'C');
        $pdf->SetFont('','B','16');
        $pdf->Cell(60,15,'Rp '.number_format($data->nominal,0,',','.'),1,0,'C');
    
        
        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(120,10,'Pangkalpinang , '.dates($data->tanggal),0,0,'R');

        $pdf->SetY(-90);
        $pdf->SetFont('','',14);
        $pdf->Cell(220,30,'Penerima',0,0,'R');

        $pdf->SetY(-90);
        $pdf->SetFont('','',14);
        $pdf->Cell(230,90,'............................',0,0,'R');

        $pdf->Output('Laporan Pengeluaran '.' .pdf');
    }

    public function hapus($id = null){
        $this->M_pengeluaran->hapus_pengeluaran($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/pengeluaran');
    }

    public function rekap_keluar()
    {
        $this->load->view('admin/rekapitulasi/rekap_keluar');
    }

    public function kategori_pengeluaran()
    {
        $data['kategori_pengeluaran'] = $this->M_pengeluaran->list_kategori_pengeluaran();
        $this->load->view('admin/pengeluaran/list_kategori_pengeluaran', $data);
    }

    public function addKategoriKeluar()
    {
        $nama_kategori_keluar = $this->input->post('nama_kategori_keluar');
        $this->M_pengeluaran->input_kategori($nama_kategori_keluar);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/pengeluaran/kategori_pengeluaran');
    }

    public function editKategoriKeluar()
    {
        $id_kategori_keluar = $this->input->post('id_kategori_keluar');
        $nama_kategori_keluar = $this->input->post('nama_kategori_keluar');
        $this->M_pengeluaran->edit_kategori($id_kategori_keluar, $nama_kategori_keluar);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/pengeluaran/kategori_pengeluaran');
    }

    public function hapus_kategori($id = null){
        $this->M_pengeluaran->hapus_kategori($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/pengeluaran/kategori_pengeluaran');
    }
}