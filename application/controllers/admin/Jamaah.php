<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jamaah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jamaah');
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
        $data['jamaah'] = $this->M_jamaah->list_jamaah();
        $this->load->view('admin/jamaah/list_jamaah', $data);
    }

    public function proses()
    {
        $nama_jamaah = $this->input->post('nama_jamaah');
        $telepon_jamaah = $this->input->post('telepon_jamaah');
        $alamat_jamaah = $this->input->post('alamat_jamaah');
        $this->form_validation->set_rules('telepon_jamaah', 'No Telepon', 'numeric', ['numeric' => '%s harus angka!']);
        if ($this->form_validation->run() == FALSE) {
            $data['jamaah'] = $this->M_jamaah->list_jamaah();
            $this->load->view('admin/jamaah/list_jamaah', $data);
        } else {
            $this->M_jamaah->input_jamaah($nama_jamaah, $telepon_jamaah, $alamat_jamaah);
            $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
            redirect('admin/jamaah');
        }
    }

    public function edit()
    {
        $id_jamaah = $this->input->post('id_jamaah');
        $nama_jamaah = $this->input->post('nama_jamaah');
        $telepon_jamaah = $this->input->post('telepon_jamaah');
        $alamat_jamaah = $this->input->post('alamat_jamaah');
        $this->M_jamaah->edit_jamaah($id_jamaah, $nama_jamaah, $telepon_jamaah, $alamat_jamaah);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/jamaah');
    }

    public function hapus($id_jamaah = null)
    {
        $this->M_jamaah->hapus_jamaah($id_jamaah);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/jamaah');
    }
}
