<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_imakho extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_imakho');
    }

    public function index()
    {
        $data['jadwal_imakho'] = $this->M_imakho->list_imakho();
        $this->load->view('admin/jadwal_imakho/list_jadwal_imakho',$data);
    }

   public function proses()
    {
        $nik_imakho = $this->input->post('nik_imakho');
        $nik_muadzin = $this->input->post('nik_muadzin');
        $tanggal_imakho = $this->input->post('tanggal_imakho');
        $this->M_imakho->input_imakho($nik_imakho, $nik_muadzin, $tanggal_imakho);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/jadwal_imakho');
    }

    public function edit()
    {
        $id_imakho = $this->input->post('id_imakho');
        $nik_imakho = $this->input->post('nik_imakho');
        $nik_muadzin = $this->input->post('nik_muadzin');
        $tanggal_imakho = $this->input->post('tanggal_imakho');
        $this->M_imakho->edit_imakho($id_imakho, $nik_imakho, $nik_muadzin, $tanggal_imakho);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/jadwal_imakho');
    }

    public function hapus($id = null){
        $this->M_imakho->hapus_imakho($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/jadwal_imakho');
    }

     function get_autocomplete(){
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
    public function cetak(){
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $data['title_pdf'] = 'Laporan Jadwal Imam dan Khotib Masjid';
        $data['jadwal_imakho'] = $this->M_imakho->list_imakho();

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan jadwal imam dan khotib masjid';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
        $html = $this->load->view('admin/jadwal_imakho/laporan_imakho_pdf',$data, true);     
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }

}