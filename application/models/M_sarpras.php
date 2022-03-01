<?php

class M_sarpras extends CI_Model
{
    function list_sarpras()
    {
        $this->db->order_by('id_sarpras', 'DESC');
        return $this->db->get("sarpras");
    }
    
    public function input_sarpras($item = null, $jumlah_sarpras = null, $kondisi = null, $keterangan_sarpras = null)
    {
        $data = [
            'item' => $item,
            'jumlah_sarpras' => $jumlah_sarpras,
            'kondisi' => $kondisi,
            'keterangan_sarpras' => $keterangan_sarpras
        ];
        
        $this->db->insert('sarpras', $data);
    }

    public function edit_sarpras($id_sarpras = null, $item = null, $jumlah_sarpras = null, $kondisi = null, $keterangan_sarpras = null)
    {
        $data = [
            'id_sarpras' => $id_sarpras,
            'item' => $item,
            'jumlah_sarpras' => $jumlah_sarpras,
            'kondisi' => $kondisi,
            'keterangan_sarpras' => $keterangan_sarpras
        ];
        $this->db->where('id_sarpras', $id_sarpras);
        $this->db->update('sarpras', $data);
    }

    public function hapus_sarpras($id_sarpras = null){
        $this->db->where('id_sarpras', $id_sarpras);
        $this->db->delete('sarpras');
    }
}