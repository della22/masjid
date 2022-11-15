<?php

class M_berita extends CI_Model
{
    function list_berita()
    {
        $this->db->order_by('id_berita', 'DESC');
        return $this->db->get("berita_donasi");
    }

    function list_berita_status($status = null)
    {
        if (isset($status)) {
            $sekarang = date('Y-m-d');
            $this->db->select('*');
            $this->db->from('berita_donasi');
            if ($status === 1) {
                $this->db->where('tanggal_mulai >', $sekarang);
                $this->db->where('tanggal_selesai >', $sekarang);
            } else if ($status === 2) {
                $this->db->where('tanggal_mulai <=', $sekarang);
                $this->db->where('tanggal_selesai >=', $sekarang);
            } else if ($status === 3) {
                $this->db->where('tanggal_mulai <', $sekarang);
                $this->db->where('tanggal_selesai <', $sekarang);
            }
            $this->db->order_by('id_berita', 'DESC');
        }
        return $this->db->get();
    }


    public function input_berita($judul_berita = null, $tanggal_mulai = null, $tanggal_selesai = null, $deskripsi_berita = null, $berita_gambar = null)
    {
        $data = [
            'judul_berita' => $judul_berita,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'deskripsi_berita' => $deskripsi_berita,
            'gambar_berita' => $berita_gambar
        ];

        $this->db->insert('berita_donasi', $data);
    }

    public function edit_berita($id_berita = null, $judul_berita = null, $tanggal_mulai = null, $tanggal_selesai = null, $deskripsi_berita = null, $berita_gambar = null)
    {
        $data = [
            'judul_berita' => $judul_berita,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'deskripsi_berita' => $deskripsi_berita,
            'gambar_berita' => $berita_gambar
        ];
        $this->db->where('id_berita', $id_berita);
        $this->db->update('berita_donasi', $data);
    }

    function detail_berita($id_berita = null)
    {
        $this->db->select('*');
        $this->db->from('berita_donasi');
        $this->db->where('id_berita', $id_berita);
        return $this->db->get()->row_array();
    }

    public function hapus_berita($id_berita = null)
    {
        $this->db->where('id_berita', $id_berita);
        $this->db->delete('berita_donasi');
    }
}
