<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_keg extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_keg');
    }

    public function index()
    {
        $data['jadwal_keg'] = $this->M_keg->list_keg();
        $this->load->view('admin/jadwal_keg/list_jadwal_keg',$data);
    }

   public function proses()
    {
        $nik_pengisi = $this->input->post('nik_pengisi');
        $nama_keg = $this->input->post('nama_keg');
        $tanggal_keg = $this->input->post('tanggal_keg');
        $waktu_keg = $this->input->post('waktu_mulai').' - '.$this->input->post('waktu_selesai').' WIB';
        $tempat_keg = $this->input->post('tempat_keg');
        // var_dump($nik_pengisi.'/'.$nama_keg.'/'.$tanggal_keg.'/'.$waktu_keg.'/'.$tempat_keg);
        $this->M_keg->input_keg($nik_pengisi, $nama_keg, $tanggal_keg, $waktu_keg, $tempat_keg);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/jadwal_keg');
    }

    public function edit()
    {
        $id_jadkeg = $this->input->post('id_jadkeg');
        $nik_pengisi = $this->input->post('nik_pengisi');
        $nama_keg = $this->input->post('nama_keg');
        $tanggal_keg = $this->input->post('tanggal_keg');
        $waktu_keg = $this->input->post('waktu_mulai').' - '.$this->input->post('waktu_selesai').' WIB';
        $tempat_keg = $this->input->post('tempat_keg');
        $this->M_keg->edit_keg($id_jadkeg, $nik_pengisi, $nama_keg, $tanggal_keg, $waktu_keg, $tempat_keg);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/jadwal_keg');
    }

    public function hapus($id = null){
        $this->M_keg->hapus_keg($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/jadwal_keg');
    }

     function get_autocomplete(){
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
}