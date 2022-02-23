<?php

class M_ustadz extends CI_Model
{
    function list_ustadz()
    {
        $this->db->order_by('nama_ustadz', 'ASC');
        return $this->db->get("ustadz");
    }
    
    public function input_ustadz($nik = null, $nama_ustadz = null, $telepon_ustadz = null, $alamat_ustadz = null)
    {
        $data = [
            'nik' => $nik,
            'nama_ustadz' => $nama_ustadz,
            'telepon_ustadz' => $telepon_ustadz,
            'alamat_ustadz' => $alamat_ustadz
        ];
        
        $this->db->insert('ustadz', $data);
    }

    public function import_data($data = null){
        $this->db->insert('ustadz', $data);
    }

    public function get_nik($nik = null){
        $this->db->select("*");
        $this->db->from("ustadz");
        $this->db->where('nik',$nik);
        $query = $this->db->get();
        return $query;
    }

    public function edit_ustadz($nik = null, $nama_ustadz = null, $telepon_ustadz = null, $alamat_ustadz = null)
    {
        $data = [
            'nik' => $nik,
            'nama_ustadz' => $nama_ustadz,
            'telepon_ustadz' => $telepon_ustadz,
            'alamat_ustadz' => $alamat_ustadz
        ];
        $this->db->where('nik', $nik);
        $this->db->update('ustadz', $data);
    }

    public function hapus_ustadz($nik = null){
        $this->db->where('nik',$nik);
        $this->db->delete('ustadz');
    }
}