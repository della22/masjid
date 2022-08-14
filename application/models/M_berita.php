<?php

class M_berita extends CI_Model
{
    function list_berita()
    {
        $this->db->order_by('id_berita', 'DESC');
        return $this->db->get("berita_donasi");
    }
    public function input_berita($judul_berita = null, $jangka_waktu = null, $deskripsi_berita = null, $status_berita = null, $upload_img = null)
        {
            $data = [
                'judul_berita' => $judul_berita,
                'jangka_waktu' => $jangka_waktu,
                'deskripsi_berita' => $deskripsi_berita,
                'status_berita' => $status_berita,
                'upload_img' => $upload_img
            ];
            
            $this->db->insert('berita_donasi', $data);
        }
}