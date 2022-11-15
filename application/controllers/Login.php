<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        // tampilkan halaman login
        $this->load->view('login_page');
    }

    public function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => $password
        );
        $cek = $this->M_login->cek_login("user_profile", $where);
        if ($cek->num_rows() > 0) {
            $role = $this->M_login->cek_role("user_profile", $where)['role'];
            $data_session = array(
                'id_user' => $cek->row()->id_user,
                'username' => $username,
                'role' => $role,
                'status' => 'login'
            );

            $this->session->set_userdata($data_session);

            redirect(base_url("admin/overview"));
        } else {
            $this->session->set_flashdata('success', 'Username dan Password Salah!');
            redirect(base_url("login"));
        }
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Berhasil Logout!');
        redirect(site_url('login'));
    }
}
