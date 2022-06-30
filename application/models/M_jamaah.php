<?php

class M_jamaah extends CI_Model
{
    function list_jamaah()
    {
        $this->db->order_by('nama_jamaah', 'ASC');
        return $this->db->get("jamaah");
    }
    
    public function input_jamaah($nama_jamaah = null, $telepon_jamaah = null, $alamat_jamaah = null)
    {
        $data = [
            'nama_jamaah' => $nama_jamaah,
            'telepon_jamaah' => $telepon_jamaah,
            'alamat_jamaah' => $alamat_jamaah
        ];
        
        $this->db->insert('jamaah', $data);
    }

    public function import_data($data = null){
        $this->db->insert('jamaah', $data);
    }

    public function get_id($id_jamaah = null){
        $this->db->select("*");
        $this->db->from("jamaah");
        $this->db->where('id_jamaah',$id_jamaah);
        $query = $this->db->get();
        return $query;
    }

    public function edit_jamaah($id_jamaah = null, $nama_jamaah = null, $telepon_jamaah = null, $alamat_jamaah = null)
    {
        $data = [
            'id_jamaah' => $id_jamaah,
            'nama_jamaah' => $nama_jamaah,
            'telepon_jamaah' => $telepon_jamaah,
            'alamat_jamaah' => $alamat_jamaah
        ];
        $this->db->where('id_jamaah', $id_jamaah);
        $this->db->update('jamaah', $data);
    }

    public function hapus_jamaah($id_jamaah = null){
        $this->db->where('id_jamaah',$id_jamaah);
        $this->db->delete('jamaah');
    }
}