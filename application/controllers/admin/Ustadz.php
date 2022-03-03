<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ustadz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ustadz');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['ustadz'] = $this->M_ustadz->list_ustadz();
        $this->load->view('admin/ustadz/list_ustadz', $data);
    }

    public function proses()
    {
        $nik = $this->input->post('nik');
        $nama_ustadz = $this->input->post('nama_ustadz');
        $telepon_ustadz = $this->input->post('telepon_ustadz');
        $alamat_ustadz = $this->input->post('alamat_ustadz');
        $this->form_validation->set_rules('nik', 'NIK', 'numeric', ['numeric' => '%s harus angka!']);
        $this->form_validation->set_rules('telepon_ustadz', 'No Telepon', 'numeric', ['numeric' => '%s harus angka!']);
        if ($this->form_validation->run() == FALSE){
            $data['ustadz'] = $this->M_ustadz->list_ustadz();
            $this->load->view('admin/ustadz/list_ustadz', $data);
        }else{
             $this->M_ustadz->input_ustadz($nik, $nama_ustadz, $telepon_ustadz, $alamat_ustadz);
            $this->session->set_flashdata('success','Item berhasil ditambahkan');
            redirect('admin/ustadz');
        }
    }

    public function edit()
    {
        $nik = $this->input->post('nik');
        $nama_ustadz = $this->input->post('nama_ustadz');
        $telepon_ustadz = $this->input->post('telepon_ustadz');
        $alamat_ustadz = $this->input->post('alamat_ustadz');
        $this->M_ustadz->edit_ustadz($nik, $nama_ustadz, $telepon_ustadz, $alamat_ustadz);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/ustadz');
    }

    public function hapus($nik = null){
        $this->M_ustadz->hapus_ustadz($nik);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/ustadz');
    }
}