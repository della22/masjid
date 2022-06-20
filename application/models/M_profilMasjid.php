<?php

class M_profilMasjid extends CI_Model
{
    function list_layanan()
    {
        $this->db->order_by('id_layanan', 'DESC');
        return $this->db->get("layanan");
    }

    public function getDataProfil($id)
    {
        $this->db->where('id_profil', $id);
        $query = $this->db->get('profil_masjid')->row();
    }

    public function edit_sdm($id_sdm = null, $foto_sdm = null, $jumlah_pengurus = null, $jumlah_remaja_masjid = null,$jumlah_imam_utama = null, $jumlah_imam_cadangan = null, $jumlah_muadzin = null, $jumlah_khatib = null)
    {
        $data = [
            'id_sdm' => $id_sdm,
            'foto_sdm' => $foto_sdm,
            'jumlah_pengurus' => $jumlah_pengurus,
            'jumlah_remaja_masjid' => $jumlah_remaja_masjid,
            'jumlah_imam_utama' => $jumlah_imam_utama,
            'jumlah_imam_cadangan' => $jumlah_imam_cadangan,
            'jumlah_muadzin' => $jumlah_muadzin,
            'jumlah_khatib' => $jumlah_khatib
        ];
        $this->db->where('id_sdm', $id_sdm);
        $this->db->update('sdm_masjid', $data);
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