<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_masjid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profilMasjid');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
         $data['layanan'] = $this->M_profilMasjid->list_layanan();
        $this->load->view('admin/profil_masjid/profil', $data);
    }

    public function inputLayanan()
    {
        $nama_layanan = $this->input->post('nama_layanan');
        $pj_layanan = $this->input->post('pj_layanan');
        $kontak_layanan = $this->input->post('kontak_layanan');
        $this->M_profilMasjid->input_layanan($nama_layanan, $pj_layanan, $kontak_layanan);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/profil_masjid');
    }

    public function editLayanan()
    {
        $id_layanan = $this->input->post('id_layanan');
        $nama_layanan = $this->input->post('nama_layanan');
        $pj_layanan = $this->input->post('pj_layanan');
        $kontak_layanan = $this->input->post('kontak_layanan');
        $this->M_profilMasjid->edit_layanan($id_layanan, $nama_layanan, $pj_layanan, $kontak_layanan);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/profil_masjid');
    }

    public function hapusLayanan($id = null){
        $this->M_profilMasjid->hapus_layanan($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/profil_masjid');
    }


}