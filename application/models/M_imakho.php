<?php

class M_imakho extends CI_Model
{
    function list_imakho()
    {
        $this->db->select('*');
        $this->db->from('ustadz');
        $this->db->join('jadwal_imakho', 'jadwal_imakho.nik_imakho = ustadz.nik', 'jadwal_imakho.nik_muadzin = ustadz.nik');
        $this->db->order_by('id_imakho', 'DESC');
        return $this->db->get();
    }
    
    public function input_imakho($nik_imakho = null,  $nik_muadzin = null, $tanggal_imakho = null)
    {
        $data = [
            'nik_imakho' => $nik_imakho,
            'nik_muadzin' => $nik_muadzin,
            'tanggal_imakho' => $tanggal_imakho,
        ];
        
        $this->db->insert('jadwal_imakho', $data);
    }

    public function edit_imakho($id_imakho = null, $nik_imakho = null, $nik_muadzin = null, $tanggal_imakho = null)
    {
        $data = [
            'id_imakho' => $id_imakho,
            'nik_imakho' => $nik_imakho,
            'nik_muadzin' => $nik_muadzin,
            'tanggal_imakho' => $tanggal_imakho
        ];
        $this->db->where('id_imakho', $id_imakho);
        $this->db->update('jadwal_imakho', $data);
    }

    public function hapus_imakho($id_imakho = null){
        $this->db->where('id_imakho', $id_imakho);
        $this->db->delete('jadwal_imakho');
    }

    public function search_imakho($title){
        $this->db->like('nama_ustadz', $title , 'both');
        $this->db->order_by('nik', 'ASC');
        $this->db->limit(10);
        return $this->db->get('ustadz')->result();
    }
}