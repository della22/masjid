<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil_masjid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profilMasjid');
        $this->load->model('M_jamaah');

        $this->load->library('form_validation');
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
        $data['layanan'] = $this->M_profilMasjid->list_layanan();
        $data['profil'] = $this->M_profilMasjid->getDataProfil()->row_array();
        $data['sdm'] = $this->M_profilMasjid->getDataSDM()->row_array();
        $data['jamaah'] = $this->M_jamaah->list_jamaah();

        $this->load->view('admin/profil_masjid/profil', $data);
    }

    public function editProfil()
    {
        $alamat_profil = $this->input->post('alamat_profil');
        $telp_profil = $this->input->post('telp_profil');
        $email_profil = $this->input->post('email_profil');
        $norek_profil = $this->input->post('norek_profil');
        $desk_profil = $this->input->post('desk_profil');
        $bank_an_profil = $this->input->post('bank_an');
        $upload_img_file = $_FILES['upload_img'];

        $this->form_validation->set_rules('email_profil', 'Email', 'valid_email', ['valid_email' => '%s harus sesuai format email!']);
        if ($this->form_validation->run() == FALSE) {
            $data['layanan'] = $this->M_profilMasjid->list_layanan();
            $data['profil'] = $this->M_profilMasjid->getDataProfil()->row_array();
            $data['sdm'] = $this->M_profilMasjid->getDataSDM()->row_array();
            return $this->load->view('admin/profil_masjid/profil', $data);
        } else {
            if ($upload_img_file = '') {
                $upload_img = $this->input->post('upload_image');
            } else {
                $data['upload_path'] = './images';
                $data['allowed_types'] = 'jpg|png|jpeg';
                $data['encrypt_name'] = TRUE;

                $this->load->library('upload', $data);
                if (!$this->upload->do_upload('upload_img')) {
                    $upload_img = $this->input->post('upload_image');
                } else {
                    $old = $this->db->query("SELECT * FROM profil_masjid WHERE id_profil=1")->row_array();
                    if ($old['upload_img'] != '') {
                        $path = './images/' . $old['upload_img'];
                        unlink($path);
                    }
                    $upload_img = $this->upload->data('file_name');
                }
            }
            $this->M_profilMasjid->updateProfil(1, $upload_img, $alamat_profil, $telp_profil, $email_profil, $norek_profil, $desk_profil, $bank_an_profil);
            $this->session->set_flashdata('success', 'Item berhasil diedit');

            redirect('admin/profil_masjid');
        }
    }

    public function editSdm()
    {
        $jumlah_pengurus = $this->input->post('jumlah_pengurus');
        $jumlah_remaja_masjid = $this->input->post('jumlah_remaja_masjid');
        $jumlah_imam_utama = $this->input->post('jumlah_imam_utama');
        $jumlah_imam_cadangan = $this->input->post('jumlah_imam_cadangan');
        $jumlah_muadzin = $this->input->post('jumlah_muadzin');
        $jumlah_khatib = $this->input->post('jumlah_khatib');
        $foto_bagan_file = $_FILES['foto_bagan'];

        if ($foto_bagan_file = '') {
            $foto_bagan = $this->input->post('old_foto_bagan');
        } else {
            $config['upload_path'] = './images';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_bagan')) {
                $foto_bagan = $this->input->post('old_foto_bagan');
            } else {
                $old1 = $this->db->query("SELECT * FROM sdm_masjid WHERE id_sdm=1")->row_array();
                if ($old1['foto_bagan'] != '') {
                    $path = './images/' . $old1['foto_bagan'];
                    unlink($path);
                }
                $foto_bagan = $this->upload->data('file_name');
            }
        }
        $this->M_profilMasjid->updateSdm(1, $foto_bagan, $jumlah_pengurus, $jumlah_remaja_masjid, $jumlah_imam_utama, $jumlah_imam_cadangan, $jumlah_muadzin, $jumlah_khatib);
        $this->session->set_flashdata('success', 'Item berhasil diedit');

        redirect('admin/profil_masjid');
    }

    public function inputLayanan()
    {
        $nama_layanan = $this->input->post('nama_layanan');
        $pj_layanan = $this->input->post('pj_layanan');
        $this->M_profilMasjid->input_layanan($nama_layanan, $pj_layanan);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/profil_masjid');
    }

    public function editLayanan()
    {
        $id_layanan = $this->input->post('id_layanan');
        $nama_layanan = $this->input->post('nama_layanan');
        $pj_layanan = $this->input->post('pj_layanan');
        $this->M_profilMasjid->edit_layanan($id_layanan, $nama_layanan, $pj_layanan);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/profil_masjid');
    }

    public function hapusLayanan($id = null)
    {
        $this->M_profilMasjid->hapus_layanan($id);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/profil_masjid');
    }
}
