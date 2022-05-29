<?php

class M_pemasukan extends CI_Model
{
    function list_pemasukan()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get("pemasukan");
    }
    
    function list_kategori_pemasukan()
    {
        return $this->db->get("kategori_pemasukan");
    }
    

    public function input_pemasukan($tanggal_pemasukan = null, $nominal_pemasukan = null, $keterangan_pemasukan = null)
    {
        $this->db->order_by('id_rekapitulasi', 'DESC');
        $get_last_saldo = $this->db->get("rekapitulasi")->row_array()['saldo'];
        $data = [
            'tanggal' => $tanggal_pemasukan,
            'nominal_pemasukan' => $nominal_pemasukan,
            'keterangan' => $keterangan_pemasukan,
            'saldo' => $get_last_saldo + $nominal_pemasukan
        ];
        
        $this->db->insert('rekapitulasi', $data);
        $insert_id_rekapitulasi = $this->db->insert_id();
        $data2 = [
            'tanggal' => $tanggal_pemasukan,
            'nominal' => $nominal_pemasukan,
            'keterangan' => $keterangan_pemasukan,
            'id_rekapitulasi' => $insert_id_rekapitulasi
        ];
        $this->db->insert('pemasukan', $data2);
    }

    public function edit_pemasukan($id_pemasukan = null, $tanggal_pemasukan = null, $nominal_pemasukan = null, $keterangan_pemasukan = null,$id_rekapitulasi = null)
    {
        $this->db->order_by('id_rekapitulasi', 'DESC');
        $get_last_saldo1 = $this->db->get("rekapitulasi")->row_array();
        $get_last_saldo = $get_last_saldo1['saldo'];
        $get_pemasukan = $this->db->where('id', $id_pemasukan)->get("pemasukan")->row_array()['nominal_pemasukan'];
        if ($nominal_pemasukan > $get_pemasukan) {
            $nominal_now = $nominal_pemasukan - $get_pemasukan;
            $edit_nominal = $get_last_saldo + $nominal_now;
        }else if ($nominal_pemasukan < $get_pemasukan) {
            $nominal_now = $get_pemasukan - $nominal_pemasukan;
            $edit_nominal = $get_last_saldo - $nominal_now;
        }else{
            $edit_nominal = $get_last_saldo;
        }
        $data = [
            'id' => $id_pemasukan,
            'tanggal' => $tanggal_pemasukan,
            'nominal' => $nominal_pemasukan,
            'keterangan' => $keterangan_pemasukan
        ];
        $data2 = [
            'tanggal' => $tanggal_pemasukan,
            'nominal_pemasukan' => $nominal_pemasukan,
            'keterangan' => $keterangan_pemasukan,
        ];
        $data3 = [
            'saldo' => $edit_nominal,
        ];
        $this->db->where('id', $id_pemasukan);
        $this->db->update('pemasukan', $data);
        $this->db->where('id_rekapitulasi', $id_rekapitulasi);
        $this->db->update('rekapitulasi', $data2);
        $this->db->where('id_rekapitulasi', $get_last_saldo1['id_rekapitulasi']);
        $this->db->update('rekapitulasi', $data3);
    }

    public function hapus_pemasukan($id_pemasukan = null,$id_rekapitulasi = null){
        $this->db->order_by('id_rekapitulasi', 'DESC');
        $get_last_saldo = $this->db->get("rekapitulasi")->row_array();
        $get_pemasukan = $this->db->get("pemasukan")->where('id', $id_pemasukan)->row_array()['nominal_pemasukan'];
        $data2 = [
            'id_rekapitulasi' => $get_last_saldo['id_rekapitulasi'],
            'saldo' => $get_last_saldo['saldo'] - $get_pemasukan,
        ];
        $this->db->where('id', $id_pemasukan);
        $this->db->delete('pemasukan');
        $this->db->where('id_rekapitulasi', $id_rekapitulasi);
        $this->db->delete('rekapitulasi');
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
    
    public function input_kategori($item = null)
    {
        $data = [
            'item' => $item
        ];
        
        $this->db->insert('kategori_pemasukan', $data);
    }

    public function edit_kategori($id_kategori_masuk = null, $item = null)
    {
        $data = [
            'id_sarpras' => $id_kategori_masuk,
            'item' => $item
        ];
        $this->db->where('id_kategori_masuk', $id_kategori_masuk);
        $this->db->update('kategori_pemasukan', $data);
    }

    public function hapus_kategori($id_kategori_masuk = null){
        $this->db->where('id_kategori_masuk', $id_kategori_masuk);
        $this->db->delete('kategori_pemasukan');
    }
}