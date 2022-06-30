<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['user_profile'] = $this->M_user->list_user();
        $this->load->view('admin/user/list_user', $data);
    }

    public function proses()
    {
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $this->M_user->input_user($nama_user, $email, $telepon, $username, $password, $role);
        $this->session->set_flashdata('success','Item berhasil ditambahkan');
        redirect('admin/user');
    }

    public function edit()
    {
        $id_user = $this->input->post('id_user');
        $nama_user = $this->input->post('nama_user');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        $this->M_user->edit_user($id_user, $nama_user, $email, $telepon, $username, $password, $role);
        $this->session->set_flashdata('success','Item berhasil diedit');
        redirect('admin/user');
    }

    public function hapus($id = null){
        $this->M_user->hapus_user($id);
        $this->session->set_flashdata('success','Item berhasil dihapus');
        redirect('admin/user');
    }

    //  function get_autocomplete(){
    //     if (isset($_GET['term'])) {
    //         $result = $this->M_user->search_user($_GET['term']);
    //         if (count($result) > 0) {
    //         foreach ($result as $row)
    //             $arr_result[] = array(
    //                 'label' => $row->nama_jamaah.' - '.$row->jabatan_pengurus,
    //                 'nama_user' => $row->nama_jamaah,
    //                 'id_jamaah'   => $row->id_jamaah,
    //             );
    //             echo json_encode($arr_result);
    //         }
    //     }
    // }
}