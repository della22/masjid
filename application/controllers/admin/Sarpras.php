<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sarpras extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sarpras');
    }

    public function index()
    {
        $data['sarpras'] = $this->M_sarpras->list_sarpras();
        $this->load->view('admin/sarpras/list_sarpras', $data);
    }

    public function proses()
    {
        $nama_item = $this->input->post('nama_item');
        $jumlah_item = $this->input->post('jumlah_item');
        $kondisi_item = $this->input->post('kondisi_item');
        $keterangan_item = $this->input->post('keterangan_item');;
        $this->M_sarpras->input_sarpras($nama_item, $jumlah_item, $kondisi_item, $keterangan_item);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/sarpras');
    }

    public function edit()
    {
        $id_sarpras = $this->input->post('id_sarpras');
        $nama_item = $this->input->post('nama_item');
        $jumlah_item = $this->input->post('jumlah_item');
        $kondisi_item = $this->input->post('kondisi_item');
        $keterangan_item = $this->input->post('keterangan_item');
        $this->M_sarpras->edit_sarpras($id_sarpras, $nama_item, $jumlah_item, $kondisi_item, $keterangan_item);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/sarpras');
    }

    public function hapus($id = null){
        $this->M_sarpras->hapus_sarpras($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/sarpras');
    }
}