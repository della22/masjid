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
        $this->load->view('admin/profile');
    }

    public function tampilProfil($id)
    {
        $data['user_profile'] = $this->M_user->getUser($id);

        if($data['user_profile']){
            $this->load->view('admin/profile', $data);
        }
        else{
            redirect('admin/profile');
        }
    }

    public function changePassword()
    {

    }
}