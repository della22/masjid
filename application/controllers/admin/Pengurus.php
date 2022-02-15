<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengurus');
    }

    public function index()
    {
        $data['pengurus'] = $this->M_pengurus->list_pengurus();
        $this->load->view('admin/pengurus/list_pengurus',$data);
    }

   public function proses()
    {
        $nik_pengurus = $this->input->post('nik_pengurus');
        $jabatan_pengurus = $this->input->post('jabatan_pengurus');
        $this->M_pengurus->input_pengurus($nik_pengurus, $jabatan_pengurus);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/pengurus');
    }

     function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_pengurus->search_pengurus($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->nama_ustadz,
                    'nama' => $row->nama_ustadz,
                    'nik_pengurus'   => $row->nik
                );
                echo json_encode($arr_result);
            }
        }
    }

}