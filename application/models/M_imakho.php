<?php
class M_imakho extends CI_Model
{
    function list_imakho()
    {
        $this->db->select('a.id_imakho, a.tanggal_imakho, a.nik_imakho,a.nik_muadzin, b.nama_ustadz as nama_imakho, c.nama_ustadz as nama_muadzin');
         $this->db->from('jadwal_imakho a');
         $this->db->join('ustadz b', 'a.nik_imakho = b.nik','left');
         $this->db->join('ustadz c', 'a.nik_muadzin = c.nik','left');
         $this->db->order_by('tanggal_imakho', 'DESC');
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

    public function filter($bulan = null, $tahun = null){

        if ($bulan == 13) {
            $this->db->select('a.id_imakho, a.tanggal_imakho, a.nik_imakho,a.nik_muadzin, b.nama_ustadz as nama_imakho, c.nama_ustadz as nama_muadzin');
             $this->db->from('jadwal_imakho a');
             $this->db->where('YEAR(a.tanggal_imakho)', $tahun);
             $this->db->join('ustadz b', 'a.nik_imakho = b.nik','left');
             $this->db->join('ustadz c', 'a.nik_muadzin = c.nik','left');
             return $this->db->get();
        }else{
            $this->db->select('a.id_imakho, a.tanggal_imakho, a.nik_imakho,a.nik_muadzin, b.nama_ustadz as nama_imakho, c.nama_ustadz as nama_muadzin');
             $this->db->from('jadwal_imakho a');
             $this->db->where('MONTH(a.tanggal_imakho)', $bulan);
             $this->db->where('YEAR(a.tanggal_imakho)', $tahun);
             $this->db->join('ustadz b', 'a.nik_imakho = b.nik','left');
             $this->db->join('ustadz c', 'a.nik_muadzin = c.nik','left');
             return $this->db->get();
        }    
    }
}