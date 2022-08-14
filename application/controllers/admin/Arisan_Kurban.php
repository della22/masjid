<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Arisan_Kurban extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_arisan');
        $this->load->helper('rupiah_helper');
        $this->load->helper('dates_helper');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['arisan_kurban'] = $this->M_arisan->list_arisan();
        $this->load->view('admin/arisan_kurban/list_arisan_kurban', $data);
    }

    public function cicilan()
    {
        $data['cicil_arisan_kurban'] = $this->M_arisan->list_cicilan();
        $this->load->view('admin/arisan_kurban/detail_arisan_kurban', $data);
    }

     public function proses()
    {
        if (trim($this->input->post('terbayar')) == "" || trim($this->input->post('status_arisan')) == "") {
            $terbayar == '0';
            $status_arisan == '0';
        }else{
            if ($terbayar >= $biaya) {
                $status_arisan == '1';
            }
            else{
                $status_arisan == '0';
            }
            $terbayar = $this->input->post('terbayar');
            $status_arisan = $this->input->post('status_arisan');
        }
        $id_donatur = $this->input->post('id_donatur');
        $tahun_periode = $this->input->post('tahun_periode');
        $biaya = $this->input->post('biaya');
        $this->M_arisan->input_arisan($id_donatur, $tahun_periode, $biaya, $terbayar, $status_arisan);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/arisan_kurban');
    }

    public function edit()
    {
        $id_arisan = $this->input->post('id_arisan');
        $id_donatur = $this->input->post('id_donatur');
        $tahun_periode = $this->input->post('tahun_periode');
        $biaya = $this->input->post('biaya');
        $terbayar = $this->input->post('terbayar');
        $status_arisan = $this->input->post('status_arisan');
        $this->M_arisan->edit_arisan($id_arisan, $id_donatur, $tahun_periode, $biaya, $terbayar, $status_arisan);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/arisan_kurban');
    }

    public function hapus($id_arisan = null){
        $this->M_arisan->hapus_arisan($id_arisan);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/arisan_kurban');
    }

     function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_arisan->search_donatur($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->nama_jamaah,
                    'nama' => $row->nama_jamaah,
                    'id_donatur'   => $row->id_jamaah,
                );
                echo json_encode($arr_result);
            }
        }
    }

    public function tambahCicil()
    {
        $id_arisan = $this->input->post('id_arisan');
        $tanggal_cicil = $this->input->post('tanggal_cicil');
        $nominal_cicil = $this->input->post('nominal_cicil');
        $this->M_arisan->input_cicilan($id_arisan, $tanggal_cicil, $nominal_cicil);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/arisan_kurban/cicilan');
    }

    public function editCicil()
    {
        $id_cicil_arisan = $this->input->post('id_cicil_arisan');
        $id_arisan = $this->input->post('id_arisan');
        $tanggal_cicil = $this->input->post('tanggal_cicil');
        $nominal_cicil = $this->input->post('nominal_cicil');
        $this->M_arisan->edit_cicilan($id_cicil_arisan, $id_arisan, $tanggal_cicil, $nominal_cicil);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/arisan_kurban/cicilan');
    }

    public function hapusCicil($id_cicil_arisan = null){
        $this->M_arisan->hapus_cicilan($id_cicil_arisan);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/arisan_kurban/cicilan');
    }

    public function print($no)
    {
        if (!isset($no)) 
            redirect('admin/arisan_kurban/cicilan');
        
        $data = $this->M_arisan->getByNoCicil($no);
        $data_arisan = $this->M_arisan->getByArisan($data->id_arisan);

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
        $pdf->Cell(16,10,' '.$data->id_cicil_arisan,0,1,'L');

        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'Atas Nama  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,' '.$data_arisan->nama_jamaah,0,1,'L');

        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'Keperluan  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,' '.'Cicilan Kurban',0,1,'L');

        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'Uang Sejumlah  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,terbilang($data->nominal_cicil). ' Rupiah',0,1,'L');

        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(60,10,'Tahun Periode Kurban  : ',0,0,'R');
        $pdf->SetFont('','',14);
        $pdf->Cell(16,10,' '.$data_arisan->tahun_periode,0,1,'L');

        $pdf->Cell(20);
        $pdf->SetY(-90);
        $pdf->Cell(40,5,'',0,0,'C');
        $pdf->SetFont('','B','16');
        $pdf->Cell(60,15,'Rp '.number_format($data->nominal_cicil,0,',','.'),1,0,'C');
        
        $pdf->Cell(20);
        $pdf->SetFont('','',14);
        $pdf->Cell(120,10,'Pangkalpinang , '.dates($data->tanggal_cicil),0,0,'R');

        $pdf->SetY(-90);
        $pdf->SetFont('','',14);
        $pdf->Cell(220,30,'Penerima',0,0,'R');

        $pdf->SetY(-90);
        $pdf->SetFont('','',14);
        $pdf->Cell(230,90,'............................',0,0,'R');

        $pdf->Output('Kuitansi Cicilan Kurban'.' .pdf');
    }

    public function rekap_arisan()
    {
        $this->load->view('admin/rekapitulasi/rekap_arisan');
    }
}