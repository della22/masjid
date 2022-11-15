<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita_donasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_berita');
        $this->load->helper('dates_helper');
        if ($this->session->userdata('status') == "login") {
            if ($this->session->userdata('role') != "Admin") {
                if ($this->session->userdata('role') != "Sekretaris") {
                    redirect(base_url("login"));
                }
            }
        } else {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['status_sekarang'] = null;
        if ($this->input->get('status')) {
            $status = (int) $this->input->get('status');
            if ($status === 1 || $status === 2 || $status === 3) {
                $data['berita'] = $this->M_berita->list_berita_status($status);
                $data['status_sekarang'] = $status;
            } else {
                $data['berita'] = $this->M_berita->list_berita();
            }
        } else {
            $data['berita'] = $this->M_berita->list_berita();
        }
        $this->load->view('admin/berita_donasi/list_berita', $data);
    }

    public function proses()
    {
        $judul_berita = $this->input->post('judul_berita');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');
        $deskripsi_berita = $this->input->post('deskripsi_berita');
        $filename = '';
        if (!empty($_FILES['gambar_berita']['name'])) {
            $config['upload_path'] = './images/berita_donasi';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $judul_berita . $_FILES['gambar_berita']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_berita')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
            } else {
                // GAGAL
            }
        }

        $this->M_berita->input_berita($judul_berita, $tanggal_mulai, $tanggal_selesai, $deskripsi_berita, $filename);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/berita_donasi');
    }

    public function proses_edit()
    {
        $id_berita = $this->input->post('id_berita');
        $judul_berita = $this->input->post('judul_berita');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');
        $deskripsi_berita = $this->input->post('deskripsi_berita');
        $gambar_default = $this->input->post('gambar_berita_default');
        $filename = '';
        if (!empty($_FILES['gambar_berita']['name'])) {
            $config['upload_path'] = './images/berita_donasi';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $judul_berita . $_FILES['gambar_berita']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_berita')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
            } else {
                // GAGAL
            }
        } else {
            $filename = $gambar_default;
        }

        $this->M_berita->edit_berita($id_berita, $judul_berita, $tanggal_mulai, $tanggal_selesai, $deskripsi_berita, $filename);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/berita_donasi/detail/' . $id_berita);
    }

    public function detail($id_berita = null)
    {

        if (!$id_berita) redirect('admin/berita_donasi');

        $data['berita'] = $this->M_berita->detail_berita($id_berita);
        $this->load->view('admin/berita_donasi/detail_berita', $data);
    }

    public function hapus($id_berita = null)
    {
        $old_image = $this->M_berita->detail_berita($id_berita);
        $path = './images/berita_donasi/' . $old_image['gambar_berita'];
        $this->M_berita->hapus_berita($id_berita);
        unlink($path);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/berita_donasi');
    }
}
