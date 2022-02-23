<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    public function index()
    {
        $data['user_profile'] = $this->M_user->list_user();
        $this->load->view('admin/user/list_user', $data);
    }

    public function proses()
    {
        $nik_user = $this->input->post('nik_user');
        $id_pengurus = $this->input->post('id_pengurus');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $this->M_user->input_user($nik_user, $id_pengurus, $username, $password, $role);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/user');
    }

    public function edit()
    {
        $id_user = $this->input->post('id_user');
        $id_pengurus = $this->input->post('id_pengurus');
        $nik_user = $this->input->post('nik_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $this->M_user->edit_user($id_user, $id_pengurus,$nik_user, $username, $password, $role);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/user');
    }

    public function hapus($id = null){
        $this->M_user->hapus_user($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/user');
    }

     function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_user->search_user($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->nama_ustadz.' - '.$row->jabatan_pengurus,
                    'nama_user' => $row->nama_ustadz,
                    'nik_user'   => $row->nik,
                    'id_pengurus' => $row->id_pengurus
                );
                echo json_encode($arr_result);
            }
        }
    }
}