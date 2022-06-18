<?php

class M_pemasukan extends CI_Model
{
    function list_pemasukan()
    {
        $this->db->select('*');
        $this->db->from('pemasukan');
        $this->db->join('kategori_pemasukan', 'pemasukan.id_kategori = kategori_pemasukan.id_kategori_masuk' );
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
    
    function list_kategori_pemasukan()
    {
        return $this->db->get("kategori_pemasukan");
    }
    

    public function input_pemasukan($tanggal_pemasukan = null, $nominal_pemasukan = null, $keterangan_pemasukan = null)
    {
        $data = [
            'tanggal' => $tanggal_pemasukan,
            'nominal' => $nominal_pemasukan,
            'keterangan' => $keterangan_pemasukan,
        ];
        
        $this->db->insert('pemasukan', $data);
    }

    public function edit_pemasukan($id_pemasukan = null, $tanggal_pemasukan = null, $kategori_pemasukan = null, $nominal_pemasukan = null, $keterangan_pemasukan = null)
    {
        $data = [
            'id' => $id_pemasukan,
            'tanggal' => $tanggal_pemasukan,
            'id_kategori' => $kategori_pemasukan,
            'nominal' => $nominal_pemasukan,
            'keterangan' => $keterangan_pemasukan
        ];
        $this->db->where('id', $id_pemasukan);
        $this->db->update('pemasukan', $data);
    }

    public function hapus_pemasukan($id_pemasukan = null){
        $this->db->where('id', $id_pemasukan);
        $this->db->delete('pemasukan');
    }

    public function getByNoPemasukan($no)
    {
        $this->db->select("*");
        $this->db->where("id", $no);
        return $this->db->get("pemasukan")->row();
    }

    public function getKategori()
    {
        $this->db->select("*");
        $this->db->order_by('id_kategori_masuk', 'ASC');
        return $this->db->get("kategori_pemasukkan")->result();
    }
    
    public function input_kategori($nama_kategori_masuk = null)
    {
        $data = [
            'nama_kategori_masuk' => $nama_kategori_masuk
        ];
        
        $this->db->insert('kategori_pemasukan', $data);
    }

    public function edit_kategori($id_kategori_masuk = null, $nama_kategori_masuk = null)
    {
        $data = [
            'nama_kategori_masuk' => $nama_kategori_masuk
        ];
        $this->db->where('id_kategori_masuk', $id_kategori_masuk);
        $this->db->update('kategori_pemasukan', $data);
    }

    public function hapus_kategori($id_kategori_masuk = null){
        $this->db->where('id_kategori_masuk', $id_kategori_masuk);
        $this->db->delete('kategori_pemasukan');
    }
}