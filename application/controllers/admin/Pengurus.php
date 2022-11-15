<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengurus');
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
        $data['pengurus'] = $this->M_pengurus->list_pengurus();
        $this->load->view('admin/pengurus/list_pengurus', $data);
    }

    public function proses()
    {
        $nik_pengurus = $this->input->post('nik');
        $jabatan_pengurus = $this->input->post('jabatan_pengurus');
        $this->M_pengurus->input_pengurus($nik_pengurus, $jabatan_pengurus);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/pengurus');
    }

    public function edit()
    {
        $id_pengurus = $this->input->post('id_pengurus');
        $nik_pengurus = $this->input->post('nik');
        $jabatan_pengurus = $this->input->post('jabatan_pengurus');
        $this->M_pengurus->edit_pengurus($id_pengurus, $nik_pengurus, $jabatan_pengurus);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/pengurus');
    }

    public function hapus($id = null)
    {
        $this->M_pengurus->hapus_pengurus($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/pengurus');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_pengurus->search_pengurus($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_ustadz,
                        'nama' => $row->nama_ustadz,
                        'nik_pengurus'   => $row->nik,
                        'telepon_pengurus' => $row->telepon_ustadz,
                        'alamat_pengurus' => $row->alamat_ustadz,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
