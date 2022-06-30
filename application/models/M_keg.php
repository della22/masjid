<?php

class M_keg extends CI_Model
{
    function list_keg()
    {
        $this->db->select('*');
        $this->db->from('ustadz');
        $this->db->join('jadwal_keg', 'jadwal_keg.nik_pengisi = ustadz.nik');
        $this->db->order_by('id_jadkeg', 'DESC');
        return $this->db->get();
    }
    
    public function input_keg($nik_pengisi = null,  $nama_keg = null, $tanggal_keg = null, $waktu_keg = null, $tempat_keg = null)
    {
        
        $data = [
            'nik_pengisi' => $nik_pengisi,
            'nama_keg' => $nama_keg,
            'tanggal_keg' => $tanggal_keg,
            'waktu_keg' => $waktu_keg,
            'tempat_keg' => $tempat_keg
        ];
        
        $this->db->insert('jadwal_keg', $data);
    }

    public function edit_keg($id_jadkeg = null, $nik_pengisi = null,  $nama_keg = null, $tanggal_keg = null, $waktu_keg = null, $tempat_keg = null)
    {
        $data = [
            'id_jadkeg' => $id_jadkeg,
            'nik_pengisi' => $nik_pengisi,
            'nama_keg' => $nama_keg,
            'tanggal_keg' => $tanggal_keg,
            'waktu_keg' => $waktu_keg,
            'tempat_keg' => $tempat_keg
        ];
        $this->db->where('id_jadkeg', $id_jadkeg);
        $this->db->update('jadwal_keg', $data);
    }

    public function hapus_keg($id_jadkeg = null){
        $this->db->where('id_jadkeg', $id_jadkeg);
        $this->db->delete('jadwal_keg');
    }

    public function search_pengisi($title){
        $this->db->like('nama_ustadz', $title , 'both');
        $this->db->order_by('nik', 'ASC');
        $this->db->limit(10);
        return $this->db->get('ustadz')->result();
    }

    public function filter($bulan = null, $tahun = null){

        if ($bulan == 13) {
            $this->db->select('*');
            $this->db->from('ustadz');
            $this->db->join('jadwal_keg', 'jadwal_keg.nik_pengisi = ustadz.nik');
            $this->db->where('YEAR(tanggal_keg)', $tahun);
            return $this->db->get();
        }else{
            $this->db->select('*');
            $this->db->from('ustadz');
            $this->db->join('jadwal_keg', 'jadwal_keg.nik_pengisi = ustadz.nik');
            $this->db->where('MONTH(tanggal_keg)', $bulan);
            $this->db->where('YEAR(tanggal_keg)', $tahun);
            return $this->db->get();
        } 
    }
}