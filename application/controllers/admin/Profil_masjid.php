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
        $data['profil'] = $this->M_profilMasjid->getDataProfil()->row_array();
        $data['sdm'] = $this->M_profilMasjid->getDataSDM()->row_array();
        $this->load->view('admin/profil_masjid/profil', $data);

    }

    public function editProfil()
    {
        $alamat_profil = $this->input->post('alamat_profil');
        $telp_profil = $this->input->post('telp_profil');
        $email_profil = $this->input->post('email_profil');
        $norek_profil = $this->input->post('norek_profil');
        $desk_profil = $this->input->post('desk_profil');
        $upload_img = $_FILES['upload_img'];
        if($upload_img=''){}
        else
        {
            $data['upload_path'] = './images';
            $data['allowed_types'] = 'jpg|png|jpeg';

            // $this->load->library('upload', $data);
            // if(!$this->upload->do_upload('upload_img')){
            //     echo "upload gagal"; die();
            // }
            // else{
            //     $upload_img=$this->upload->data('file_name');
            // }
        }
        var_dump($_POST);
        // $this->M_profilMasjid->updateProfil(1, $upload_img, $alamat_profil,$telp_profil,$email_profil,$norek_profil,$desk_profil);
        // $this->session->set_flashdata('success','Berhasil diupdate');

        // redirect('admin/profil_masjid');
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