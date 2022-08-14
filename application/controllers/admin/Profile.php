<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $id_user = $this->session->userdata('id_user');
        $data['ubah'] = $this->M_user->getUser($id_user)->row_array();
        $this->load->view('admin/profile', $data);
    }
    
    public function changeProfil()
    {
        $inputan_username = $this->input->post('username');
        $id_user = $this->session->userdata('id_user');
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $password_konfirm = $this->input->post('password_konfirm');
        if($this->M_user->ambil_password($id_user) == $password_lama){
            if($password_baru == ""){
                        $this->M_user->edit_username($id_user,$inputan_username);
                        $this->session->set_flashdata('success', 'Perubahan berhasil');
            }
            if($password_baru == $password_konfirm){
                        $this->M_user->updateProfil($id_user,$inputan_username,$password_baru);
                        $this->session->set_userdata('username', $post["username"]);
                        $this->session->set_flashdata('success', 'Perubahan berhasil');
            }
            if($password_baru != $password_konfirm){
                $this->session->set_flashdata('error', 'Password Konfirmasi Tidak Sama');
                redirect('admin/Profile');
            }
        }
        else{
            $this->session->set_flashdata('error', 'Password Lama Salah');
                redirect('admin/Profile');
            }
    }
}