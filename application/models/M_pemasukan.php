<?php

class M_pemasukan extends CI_Model
{
    function list_pemasukan()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get("pemasukan");
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
        $data = [
            'id' => $id_pemasukan,
            'tanggal' => $tanggal_pemasukan,
            'nominal' => $nominal_pemasukan,
            'keterangan' => $keterangan_pemasukan
        ];
        $data2 = [
            'id_rekapitulasi' => $id_rekapitulasi,
            'tanggal' => $tanggal_pemasukan,
            'nominal_pemasukan' => $nominal_pemasukan,
            'keterangan' => $keterangan_pemasukan
        ];
        $this->db->where('id', $id_pemasukan);
        $this->db->update('pemasukan', $data);
        $this->db->where('id_rekapitulasi', $id_rekapitulasi);
        $this->db->update('rekapitulasi', $data2);
    }

    public function hapus_pemasukan($id_pemasukan = null,$id_rekapitulasi = null){
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
}