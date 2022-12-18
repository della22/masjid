<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Arisan_Kurban extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_arisan');
        $this->load->model('M_jamaah');
        $this->load->helper('rupiah_helper');
        $this->load->helper('dates_helper');
        // CHECK AUTH LOGIN
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function auth_cek_role()
    {
        if ($this->session->userdata('status') == "login") {
            if ($this->session->userdata('role') != "Admin") {
                if ($this->session->userdata('role') != "Bendahara") {
                    redirect(base_url("login"));
                }
            }
        } else {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $bulan = date('m');
        $tahun = date('Y');
        // Melakukan pencecekan apakah ada filter tahun dan status
        if ($this->input->get('tahun_periode') && $this->input->get('status_arisan')) {
            $tahun_filter = $this->input->get('tahun_periode');
            if ($this->input->get('status_arisan') != 'semua') {
                $status = $this->input->get('status_arisan') == 'lunas' ? '1' : '0';
                if ($this->input->get('status_arisan') != 'semua_tahun') {
                    $data['arisan_kurban'] = $this->M_arisan->list_arisan_filter($tahun_filter, $status);
                } else {
                    $data['arisan_kurban'] = $this->M_arisan->list_arisan();
                }
            } else {
                $data['arisan_kurban'] = $this->M_arisan->list_arisan_by_periode($tahun_filter);
            }
        } else {
            $data['arisan_kurban'] = $this->M_arisan->list_arisan();
        }
        $data['cicilan_bulan_arisan'] = $this->M_arisan->list_cicilan_bulan_ini($bulan, $tahun);
        $data['jamaah'] = $this->M_jamaah->list_jamaah();
        $data['tahun'] = $tahun;
        $this->load->view('admin/arisan_kurban/list_arisan_kurban', $data);
    }

    public function cicilan($id = null)
    {
        if (!$id) {
            redirect('admin/arisan_kurban');
        }
        $data['cicil_arisan_kurban'] = $this->M_arisan->list_cicilan($id);
        $data['arisan_kurban'] = $this->M_arisan->detail_arisan($id);
        $this->load->view('admin/arisan_kurban/detail_arisan_kurban', $data);
    }

    public function proses()
    {
        $this->auth_cek_role();
        $id_donatur = $this->input->post('id_donatur');
        $tahun_periode = $this->input->post('tahun_periode');
        $biaya = $this->input->post('biaya');
        $terbayar = 0;
        $status_arisan = 0;
        if ($this->M_arisan->input_arisan($id_donatur, $tahun_periode, $biaya, $terbayar, $status_arisan)) {
            $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        }
        redirect('admin/arisan_kurban');
    }

    public function edit()
    {
        $this->auth_cek_role();
        // Variabel Edit
        $id_arisan = $this->input->post('id_arisan');
        $id_donatur = $this->input->post('id_donatur');
        $tahun_periode = $this->input->post('tahun_periode');
        $biaya = $this->input->post('biaya_arisan');
        // Variabel edit status
        $total_dibayar = (int) $this->M_arisan->total_dibayar($id_arisan);
        // Kirim ke model
        $this->M_arisan->edit_arisan($id_arisan, $id_donatur, $tahun_periode, $biaya);
        $this->M_arisan->set_status_arisan($id_arisan, $biaya, $total_dibayar);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/arisan_kurban');
    }

    public function hapus($id_arisan = null)
    {
        $this->auth_cek_role();
        $this->M_arisan->hapus_arisan($id_arisan);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/arisan_kurban');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_arisan->search_donatur($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_jamaah,
                        'nama' => $row->nama_jamaah,
                        'id_donatur'   => $row->id_jamaah,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function tambahCicil()
    {
        $this->auth_cek_role();
        // variabel untuk tambah cicilan
        $id_arisan = $this->input->post('id_arisan');
        $tanggal_cicil = $this->input->post('tanggal_cicil');
        $nominal_cicil = $this->input->post('nominal_cicil');
        // Variabel untuk ubah status
        $total_dibayar = (int) $this->M_arisan->total_dibayar($id_arisan) + (int) $nominal_cicil;
        $biaya = (int) $this->M_arisan->detail_arisan($id_arisan)['biaya'];
        // Input data ke model
        $this->M_arisan->input_cicilan($id_arisan, $tanggal_cicil, $nominal_cicil);
        $this->M_arisan->set_status_arisan($id_arisan, $biaya, $total_dibayar);
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan');
        redirect('admin/arisan_kurban/cicilan/' . $id_arisan);
    }

    public function editCicil()
    {
        $this->auth_cek_role();
        // Variabel untuk mengubah data
        $id_cicil_arisan = $this->input->post('id_cicil_arisan');
        $id_arisan = $this->input->post('id_arisan');
        $tanggal_cicil = $this->input->post('tanggal_cicil');
        $nominal_cicil = $this->input->post('nominal_cicil');
        // Variabel untuk mengubah status
        $nominal_cicil_sebelumnya = (int) $this->M_arisan->getByNoCicil($id_cicil_arisan)->nominal_cicil;
        $total_dibayar = (int) $this->M_arisan->total_dibayar($id_arisan) - (int) $nominal_cicil_sebelumnya + (int) $nominal_cicil;
        $biaya = (int) $this->M_arisan->detail_arisan($id_arisan)['biaya'];
        // Input data ke model
        $this->M_arisan->edit_cicilan($id_cicil_arisan, $tanggal_cicil, $nominal_cicil);
        $this->M_arisan->set_status_arisan($id_arisan, $biaya, $total_dibayar);
        $this->session->set_flashdata('success', 'Item berhasil diedit');
        redirect('admin/arisan_kurban/cicilan/' . $id_arisan);
    }

    public function hapusCicil($id_cicil_arisan = null, $id_arisan = null)
    {
        $this->auth_cek_role();
        // Variabel untuk mengubah status
        $nominal_cicil_sebelumnya = (int) $this->M_arisan->getByNoCicil($id_cicil_arisan)->nominal_cicil;
        $total_dibayar = (int) $this->M_arisan->total_dibayar($id_arisan) - (int) $nominal_cicil_sebelumnya;
        $biaya = (int) $this->M_arisan->detail_arisan($id_arisan)['biaya'];
        // Input data ke model
        $this->M_arisan->set_status_arisan($id_arisan, $biaya, $total_dibayar);
        $this->M_arisan->hapus_cicilan($id_cicil_arisan);
        $this->session->set_flashdata('success', 'Item berhasil dihapus');
        redirect('admin/arisan_kurban/cicilan/' . $id_arisan);
    }

    public function rekap_arisan()
    {
        $data['tahun'] = date('Y');
        if ($this->input->get('tahun')) {
            $tahun = $this->input->get('tahun');
            $data['tahun'] = $tahun;
        }
        $data['arisan_lunas'] = $this->M_arisan->list_arisan_by_status(1);
        $data['arisan_belum_lunas'] = $this->M_arisan->list_arisan_by_status(0);
        $data['arisan_periode'] = $this->M_arisan->list_arisan_by_periode($data['tahun']);
        $data['link_download'] = base_url() . 'admin/phpspreadsheet/cetak_rekap_arisan/' . $data['tahun'];

        $this->load->view('admin/rekapitulasi/rekap_arisan', $data);
    }

    public function apiArisanBulanIni()
    {
        $response = array();

        $bulan = date('m');
        $tahun = date('Y');
        if ($this->input->get('bulan') && $this->input->get('tahun')) {
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
        }

        $arisan_kurban = $this->M_arisan->list_arisan();
        $cicilan_bulan_arisan = $this->M_arisan->list_cicilan_bulan_ini($bulan, $tahun);
        $total_belum_lunas = 0;
        $total_lunas = 0;

        foreach ($arisan_kurban->result_array() as $data_arisan) {
            $perbulan_harus = $data_arisan['biaya'] / 12;
            // MELAKUKAN PERHITUNGAN JUMLAH PEMBAYARAN BULAN INI
            $total_bulan_ini = 0;
            foreach ($cicilan_bulan_arisan->result_array() as $cicilan_bulan_ini) {

                if ($data_arisan['id_arisan'] == $cicilan_bulan_ini['id_arisan']) {

                    $total_bulan_ini += $cicilan_bulan_ini['nominal_cicil'];
                }
            }

            if ($data_arisan['status_arisan'] == 0) {

                if ((int) $total_bulan_ini < (int) $perbulan_harus) {

                    $total_belum_lunas++;
                } else {
                    $total_lunas++;
                }
            }
        }

        $response[] = array(
            'category' => 'Lunas',
            'value' => $total_lunas,
        );
        $response[] = array(
            'category' => 'Belum lunas',
            'value' => $total_belum_lunas,
        );

        header('Content-Type: application/json');
        echo json_encode(
            array(
                'success' => true,
                'message' => 'Get All Data kategori with Nominal',
                'filter'  =>   'aaaaaa',
                'data'    => $response,
            )
        );
    }

    public function print($no)
    {
        if (!isset($no))
            redirect('admin/arisan_kurban/cicilan');

        $data = $this->M_arisan->getByNoCicil($no);
        $data_arisan = $this->M_arisan->getByArisan($data->id_arisan);

        $pdf = new \TCPDF();
        $pdf->AddPage('L', 'mm', 'A4');
        $image_file = base_url('images/logo.png');
        $pdf->Image($image_file, 20, 20, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        /* Kop Atas */
        $pdf->Ln(6);
        $pdf->SetFont('', 'B', 18);
        $pdf->Cell(140, 7, "MASJID NURUL IMAN", 0, 1, 'C');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(212, 0, "KELURAHAN SELINDUNG BARU KOTA PANGKALPINANG", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        /* Judul */
        $style = array('width' => 0.5, 'dash' => '0,0,0,0', 'phase' => 0, 'color' => array(0, 0, 0));
        $pdf->Line(10, 50, 290, 50, $style);
        $pdf->SetFont('', 'B', 25);
        $pdf->Cell(260, 45, "KUITANSI PEMBAYARAN", 0, 4, 'C');


        $pdf->SetY(70);
        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'No. Kuitansi  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, ' ' . $data->id_cicil_arisan, 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'Atas Nama  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, ' ' . $data_arisan->nama_jamaah, 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'Keperluan  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, ' ' . 'Cicilan Kurban', 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'Uang Sejumlah  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, terbilang($data->nominal_cicil) . ' Rupiah', 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(60, 10, 'Tahun Periode Kurban  : ', 0, 0, 'R');
        $pdf->SetFont('', '', 14);
        $pdf->Cell(16, 10, ' ' . $data_arisan->tahun_periode, 0, 1, 'L');

        $pdf->Cell(20);
        $pdf->SetY(-90);
        $pdf->Cell(40, 5, '', 0, 0, 'C');
        $pdf->SetFont('', 'B', '16');
        $pdf->Cell(60, 15, 'Rp ' . number_format($data->nominal_cicil, 0, ',', '.'), 1, 0, 'C');

        $pdf->Cell(20);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(120, 10, 'Pangkalpinang , ' . dates($data->tanggal_cicil), 0, 0, 'R');

        $pdf->SetY(-90);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(220, 30, 'Penerima', 0, 0, 'R');

        $pdf->SetY(-90);
        $pdf->SetFont('', '', 14);
        $pdf->Cell(230, 90, '............................', 0, 0, 'R');

        $pdf->Output('Kuitansi Cicilan Kurban' . ' .pdf');
    }
}
