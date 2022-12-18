<?php

class M_profilMasjid extends CI_Model
{
    function list_layanan()
    {
        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('jamaah b', 'a.pj_layanan = b.id_jamaah');
        $this->db->order_by('a.id_layanan', 'DESC');
        return $this->db->get();
    }

    public function getDataProfil()
    {
        $dataProfil = $this->db->query("SELECT * FROM profil_masjid WHERE id_profil = 1");
        return $dataProfil;
    }

    public function getDataSDM()
    {
        $dataSDM = $this->db->query("SELECT * FROM sdm_masjid WHERE id_sdm = 1");
        return $dataSDM;
    }

    public function updateProfil($id, $upload_img, $alamat_profil, $telp_profil, $email_profil, $norek_profil, $desk_profil, $bank_an)
    {
        $edit = $this->db->query("UPDATE profil_masjid SET upload_img = '$upload_img', alamat_profil = '$alamat_profil', telp_profil = '$telp_profil', email_profil = '$email_profil', norek_profil = '$norek_profil', desk_profil = '$desk_profil',bank_an = '$bank_an'  WHERE id_profil ='$id'");
        return $edit;
    }

    public function updateSdm($id, $foto_bagan, $jumlah_pengurus, $jumlah_remaja_masjid, $jumlah_imam_utama, $jumlah_imam_cadangan, $jumlah_muadzin, $jumlah_khatib)
    {
        $edit = $this->db->query("UPDATE sdm_masjid SET foto_bagan = '$foto_bagan', jumlah_pengurus = '$jumlah_pengurus', jumlah_remaja_masjid = '$jumlah_remaja_masjid', jumlah_imam_utama = '$jumlah_imam_utama', jumlah_imam_cadangan = '$jumlah_imam_cadangan', jumlah_muadzin = '$jumlah_muadzin', jumlah_khatib = '$jumlah_khatib'  WHERE id_sdm ='$id'");
        return $edit;
    }

    public function input_layanan($nama_layanan = null, $pj_layanan = null, $kontak_layanan = null)
    {
        $data = [
            'nama_layanan' => $nama_layanan,
            'pj_layanan' => $pj_layanan,
        ];

        $this->db->insert('layanan', $data);
    }

    public function edit_layanan($id_layanan = null, $nama_layanan = null, $pj_layanan = null)
    {
        $data = [
            'id_layanan' => $id_layanan,
            'nama_layanan' => $nama_layanan,
            'pj_layanan' => $pj_layanan,
        ];
        $this->db->where('id_layanan', $id_layanan);
        $this->db->update('layanan', $data);
    }

    public function hapus_layanan($id_layanan = null)
    {
        $this->db->where('id_layanan', $id_layanan);
        $this->db->delete('layanan');
    }
}
