<?php

class M_arisan extends CI_Model
{
    function list_arisan()
    {
        $this->db->select('*');
        $this->db->from('jamaah');
        $this->db->join('arisan_kurban', 'arisan_kurban.id_donatur = jamaah.id_jamaah');
        $this->db->order_by('id_arisan', 'DESC');
        return $this->db->get();
    }

    function list_cicilan()
    {
        $this->db->select('*');
        $this->db->from('arisan_kurban');
        $this->db->join('cicil_arisan_kurban', 'cicil_arisan_kurban.id_arisan = arisan_kurban.id_arisan');
        $this->db->order_by('id_cicil_arisan', 'DESC');
        return $this->db->get();
    }

    public function input_arisan($id_donatur = null, $tahun_periode = null, $biaya = null, $terbayar = null, $status_arisan = null)
    {
        $data = [
            'id_donatur' => $id_donatur,
            'tahun_periode' => $tahun_periode,
            'biaya' => $biaya,
            'terbayar' => $terbayar,
            'status_arisan' => $status_arisan
        ];
        $this->db->insert('arisan_kurban', $data);
    }

    public function edit_arisan($id_arisan = null, $id_donatur = null, $tahun_periode = null, $biaya = null, $terbayar = null, $status_arisan = null)
    {
        $data = [
            'id_arisan' => $id_arisan,
            'id_donatur' => $id_donatur,
            'tahun_periode' => $tahun_periode,
            'biaya' => $biaya,
            'terbayar' => $terbayar,
            'status_arisan' => $status_arisan
        ];
        $this->db->where('id_arisan', $id_arisan);
        $this->db->update('arisan_kurban', $data);
    }

    public function hapus_arisan($id_arisan = null){
        $this->db->where('id_arisan', $id_arisan);
        $this->db->delete('arisan_kurban');
    }

    public function getByArisan($no)
    {
        $this->db->select("*");
        $this->db->where("id_arisan", $no);
        return $this->db->get("arisan_kurban")->row();
    }

    public function getByNoCicil($no)
    {
        $this->db->select("*");
        $this->db->where("id_cicil_arisan", $no);
        return $this->db->get("cicil_arisan_kurban")->row();
    }

    public function search_donatur($title){
        $this->db->like('nama_jamaah', $title , 'both');
        $this->db->order_by('id_jamaah', 'ASC');
        $this->db->limit(10);
        return $this->db->get('jamaah')->result();
    }

    public function input_cicilan($id_arisan = null, $tanggal_cicil = null, $nominal_cicil = null)
    {
        $data = [
            'id_arisan' => $id_arisan,
            'tanggal_cicil' => $tanggal_cicil,
            'nominal_cicil' => $nominal_cicil
        ];
        $this->db->insert('cicil_arisan_kurban', $data);
    }

    public function edit_cicilan($id_cicil_arisan = null, $id_arisan = null, $tanggal_cicil = null, $nominal_cicil = null)
    {
        $data = [
            'id_cicil_arisan' => $id_cicil_arisan,
            'id_arisan' => $id_arisan,
            'tanggal_cicil' => $tanggal_cicil,
            'nominal_cicil' => $nominal_cicil
        ];
        $this->db->where('id_cicil_arisan', $id_arisan);
        $this->db->update('cicil_arisan_kurban', $data);
    }

    public function hapus_cicilan($id_cicil_arisan = null){
        $this->db->where('id_cicil_arisan', $id_cicil_arisan);
        $this->db->delete('cicil_arisan_kurban');
    }

    // public function filter($tanggalawal = null, $tanggalakhir = null)
    // {
        
    //     $this->db->select('*');
    //     $this->db->from('arisan');
    //     $this->db->join('kategori_arisan', 'arisan.id_kategori = kategori_arisan.id_kategori_masuk' );
    //     $this->db->where("tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir'");
    //     $this->db->order_by('tanggal', 'ASC');
    //     return $this->db->get();
    // }
}