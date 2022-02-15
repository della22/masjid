<?php

class M_pengurus extends CI_Model
{
    function list_pengurus()
    {
        $this->db->select('*');
        $this->db->from('ustadz');
        $this->db->join('pengurus', 'pengurus.nik_pengurus = ustadz.nik' );
        return $this->db->get();
    }
    
    public function input_pengurus($nik_pengurus = null, $jabatan_pengurus = null)
    {
        $data = [
            'nik_pengurus' => $nik_pengurus,
            'jabatan_pengurus' => $jabatan_pengurus,
        ];
        
        $this->db->insert('pengurus', $data);
    }

    public function search_pengurus($title){
        $this->db->like('nama_ustadz', $title , 'both');
        $this->db->order_by('nik', 'ASC');
        $this->db->limit(10);
        return $this->db->get('ustadz')->result();
    }
}