<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemasukan');
        $this->load->helper('rupiah_helper');
        $this->load->helper('dates_helper');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        if ($this->input->post('tanggalawal') && $this->input->post('tanggalakhir')) {
            $tanggalawal = $this->input->post('tanggalawal');
            $tanggalakhir = $this->input->post('tanggalakhir');
            $data['pemasukan'] = $this->M_pemasukan->filter($tanggalawal,$tanggalakhir);
        }   
        else{
            $data['kategori_pemasukan'] = $this->M_pemasukan->list_kategori_pemasukan();
            $data['pemasukan'] = $this->M_pemasukan->list_pemasukan();
        }
        $this->load->view('admin/pemasukan/list_pemasukan', $data);  
    }

    public function proses()
    {
        $tanggal_pemasukan = $this->input->post('tanggal_pemasukan');
        $nominal_pemasukan = $this->input->post('nominal_pemasukan');
        $keterangan_pemasukan = $this->input->post('keterangan_pemasukan');
        $id_kategori = $this->input->post('kategori_pemasukan');
        $this->M_pemasukan->input_pemasukan($tanggal_pemasukan, $nominal_pemasukan, $keterangan_pemasukan, $id_kategori);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/pemasukan');
    }

    public function edit()
    {
        $id_pemasukan = $this->input->post('id_pemasukan');
        $tanggal_pemasukan = $this->input->post('tanggal_pemasukan');
        $nominal_pemasukan = $this->input->post('nominal_pemasukan');
        $keterangan_pemasukan = $this->input->post('keterangan_pemasukan');
        $id_kategori = $this->input->post('kategori_pemasukan');
        $this->M_pemasukan->edit_pemasukan($id_pemasukan, $tanggal_pemasukan, $nominal_pemasukan, $keterangan_pemasukan, $id_kategori);
        $this->session->set_flashdata('success','Item berhasil diedit');
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
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'No. Kuitansi  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,' '.$data->id,0,1,'L');

        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'Uang Sejumlah  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,terbilang($data->nominal). ' Rupiah',0,1,'L');

        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'Kategori  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,' '.$data_kategori->nama_kategori_masuk,0,1,'L');

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

        $pdf->Output('Laporan Pemasukan '.' .pdf');
    }

    public function hapus($id = null){
        $this->M_pemasukan->hapus_pemasukan($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/pemasukan');
    }

    public function rekap_masuk()
    {
        $this->load->view('admin/rekapitulasi/rekap_masuk');
    }

    public function kategori_pemasukan()
    {

        $data['kategori_pemasukan'] = $this->M_pemasukan->list_kategori_pemasukan();
        $this->load->view('admin/pemasukan/list_kategori_pemasukan', $data);
    }

    public function addKategoriMasuk()
    {
        $nama_kategori_masuk = $this->input->post('nama_kategori_masuk');
        $this->M_pemasukan->input_kategori($nama_kategori_masuk);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/pemasukan/kategori_pemasukan');
    }

    public function editKategoriMasuk()
    {
        $id_kategori_masuk = $this->input->post('id_kategori_masuk');
        $nama_kategori_masuk = $this->input->post('nama_kategori_masuk');
        $this->M_pemasukan->edit_kategori($id_kategori_masuk, $nama_kategori_masuk);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/pemasukan/kategori_pemasukan');
    }

    public function hapus_kategori($id = null){
        $this->M_pemasukan->hapus_kategori($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/pemasukan/kategori_pemasukan');
    }

    
}