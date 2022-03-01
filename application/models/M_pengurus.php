<?php

class M_pengurus extends CI_Model
{
    function list_pengurus()
    {
        $this->db->select('*');
        $this->db->from('ustadz');
        $this->db->join('pengurus', 'pengurus.nik_pengurus = ustadz.nik' );
        $this->db->order_by('id_pengurus', 'DESC');
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

        public function edit_pengurus($id_pengurus = null, $nik_pengurus = null, $jabatan_pengurus = null)
    {
        $data = [
            'id_pengurus' => $id_pengurus,
            'nik_pengurus' => $nik_pengurus,
            'jabatan_pengurus' => $jabatan_pengurus
        ];
        $this->db->where('id_pengurus', $id_pengurus);
        $this->db->update('pengurus', $data);
    }

    public function hapus_pengurus($id_pengurus = null){
        $this->db->where('id_pengurus', $id_pengurus);
        $this->db->delete('pengurus');
    }

    public function search_pengurus($title){
        $this->db->like('nama_ustadz', $title , 'both');
        $this->db->order_by('nik', 'ASC');
        $this->db->limit(10);
        return $this->db->get('ustadz')->result();
    }
}