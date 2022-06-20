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

    public function tampilProfil($id)
    {
        $data['profil_masjid'] = $this->M_profilMasjid->getDataProfil($id);
        $this->load->view('admin/profil_masjid', $data);
    }

    public function editSdm()
    {
        $id_sdm = $this->input->post('id_sdm');
        $foto_sdm = $this->input->post('foto_sdm');
        $jumlah_pengurus = $this->input->post('jumlah_pengurus');
        $jumlah_remaja_masjid = $this->input->post('jumlah_remaja_masjid');
        $jumlah_imam_utama = $this->input->post('jumlah_imam_utama');
        $jumlah_imam_cadangan = $this->input->post('jumlah_imam_cadangan');
        $jumlah_muadzin = $this->input->post('jumlah_muadzin');
        $jumlah_khatib = $this->input->post('jumlah_khatib');
        $data['sdm_masjid'] =$this->M_profilMasjid->edit_sdm($id_sdm, $foto_sdm, $jumlah_pengurus, $jumlah_remaja_masjid, $jumlah_imam_utama, $jumlah_imam_cadangan, $jumlah_muadzin, $jumlah_khatib)->row();
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/profil_masjid');
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