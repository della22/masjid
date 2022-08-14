<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_donasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_berita');
        $this->load->helper('dates_helper');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['berita'] = $this->M_berita->list_berita();
        $this->load->view('admin/berita_donasi/list_berita', $data);
    }

    public function proses()
    {
        $judul_berita = $this->input->post('judul_berita');
        $jangka_waktu = $this->input->post('tanggalawal').' - '.$this->input->post('tanggalakhir');
        $deskripsi_berita = $this->input->post('deskripsi_berita');
        $upload_img = $_FILES['upload_img']; 
            if($upload_img=''){
                 $upload_img = $this->input->post('upload_image');
            }
            else
            {
                $data['upload_path'] = './images';
                $data['allowed_types'] = 'jpg|png|jpeg';
                $nama_file = "gambar_berita";
                $data['file_name'] = $nama_file;

                $this->load->library('upload', $data);
                if(!$this->upload->do_upload('upload_img')){
                    $upload_img = $this->input->post('upload_image');
                }
            }
        $this->M_berita->input_berita($judul_berita, $jangka_waktu, $deskripsi_berita, $upload_img);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/berita_donasi');
    }

    public function detail()
    {
        $this->load->view('admin/berita_donasi/detail_berita');
    }
}