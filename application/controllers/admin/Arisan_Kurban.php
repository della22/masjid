<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Arisan_Kurban extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_arisan');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['arisan_kurban'] = $this->M_arisan->list_arisan();
        $this->load->view('admin/arisan_kurban/list_arisan_kurban', $data);
    }

     public function proses()
    {
        if (trim($this->input->post('terbayar')) == "" || trim($this->input->post('status_arisan')) == "") {
            $terbayar == '0';
            $status_arisan == '0';
        }else{
            if ($terbayar >= $biaya) {
                $status_arisan == '1';
            }
            else{
                $status_arisan == '0';
            }
            $terbayar = $this->input->post('terbayar');
            $status_arisan = $this->input->post('status_arisan');
        }
        $id_donatur = $this->input->post('id_donatur');
        $tahun_periode = $this->input->post('tahun_periode');
        $biaya = $this->input->post('biaya');
        $this->M_arisan->input_arisan($id_donatur, $tahun_periode, $biaya, $terbayar, $status_arisan);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/arisan_kurban');
    }

    public function edit()
    {
        $id_arisan = $this->input->post('id_arisan');
        $id_donatur = $this->input->post('id_donatur');
        $tahun_periode = $this->input->post('tahun_periode');
        $biaya = $this->input->post('biaya');
        $terbayar = $this->input->post('terbayar');
        $status_arisan = $this->input->post('status_arisan');
        $this->M_arisan->edit_arisan($id_arisan, $id_donatur, $tahun_periode, $biaya, $terbayar, $status_arisan);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/arisan_kurban');
    }

    public function hapus($id_arisan = null){
        $this->M_arisan->hapus_arisan($id_arisan);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/arisan_kurban');
    }

     function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_arisan->search_donatur($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->nama_jamaah,
                    'nama' => $row->nama_jamaah,
                    'id_jamaah'   => $row->id_jamaah
                );
                echo json_encode($arr_result);
            }
        }
    }

    public function rekap_arisan()
    {
        $this->load->view('admin/rekapitulasi/rekap_arisan');
    }

    public function detail()
    {
        $this->load->view('admin/arisan_kurban/detail_arisan_kurban');
    }
}