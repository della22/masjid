<?php

class M_profilMasjid extends CI_Model
{
    function list_layanan()
    {
        $this->db->order_by('id_layanan', 'DESC');
        return $this->db->get("layanan");
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

    public function updateProfil($id, $upload_img, $alamat_profil,$telp_profil,$email_profil,$norek_profil,$desk_profil)
    {
        $edit = $this->db->query("UPDATE profil_masjid SET upload_img = '$upload_img', alamat_profil = '$alamat_profil', telp_profil = '$telp_profil', email_profil = '$email_profil', norek_profil = '$norek_profil', desk_profil = '$desk_profil' WHERE id_profil ='$id'");
            return $edit;
    }
    
    public function input_layanan($nama_layanan = null, $pj_layanan = null, $kontak_layanan = null)
    {
        $data = [
            'nama_layanan' => $nama_layanan,
            'pj_layanan' => $pj_layanan,
            'kontak_layanan' => $kontak_layanan
        ];
        
        $this->db->insert('layanan', $data);
    }

    public function edit_layanan($id_layanan = null, $nama_layanan = null, $pj_layanan = null, $kontak_layanan = null)
    {
        $data = [
            'id_layanan' => $id_layanan,
            'nama_layanan' => $nama_layanan,
            'pj_layanan' => $pj_layanan,
            'kontak_layanan' => $kontak_layanan
        ];
        $this->db->where('id_layanan', $id_layanan);
        $this->db->update('layanan', $data);
    }

    public function hapus_layanan($id_layanan = null){
        $this->db->where('id_layanan', $id_layanan);
        $this->db->delete('layanan');
    }
}