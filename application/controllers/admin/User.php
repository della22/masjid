<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_jamaah');

        if ($this->session->userdata('status') == "login") {
            if ($this->session->userdata('role') != "Admin") {
                redirect(base_url("login"));
            }
        } else {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['user_profile'] = $this->M_user->list_user();
        $data['jamaah'] = $this->M_jamaah->list_jamaah();

        $this->load->view('admin/user/list_user', $data);
    }

    public function proses()
    {
        $id_jamaah = $this->input->post('id_jamaah');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $this->M_user->input_user($id_jamaah, $username, $password, $role);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/user');
    }

    public function edit()
    {
        $id_user = $this->input->post('id_user');
        $id_jamaah = $this->input->post('id_jamaah');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        $this->M_user->edit_user($id_user, $id_jamaah, $username, $password, $role);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/user');
    }

    public function hapus($id = null)
    {
        $this->M_user->hapus_user($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/user');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_user->search_user($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_jamaah,
                        'nama' => $row->nama_jamaah,
                        'telepon' => $row->telepon_jamaah,
                        'id_jamaah'   => $row->id_jamaah,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
