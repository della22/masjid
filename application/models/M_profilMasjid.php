<?php

class M_profilMasjid extends CI_Model
{
    function list_layanan()
    {
        $this->db->order_by('id_layanan', 'DESC');
        return $this->db->get("layanan");
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