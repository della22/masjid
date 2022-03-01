<?php

class M_pengeluaran extends CI_Model
{
    function list_pengeluaran()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get("pengeluaran");
    }
    
    function saldo_terakhir(){
        $this->db->order_by('id_rekapitulasi', 'DESC');
        return $this->db->get("rekapitulasi")->row_array()['saldo'];
    }

    public function input_pengeluaran($tanggal_pengeluaran = null, $nominal_pengeluaran = null, $keterangan_pengeluaran = null)
    {
        $this->db->order_by('id_rekapitulasi', 'DESC');
        $get_last_saldo = $this->db->get("rekapitulasi")->row_array()['saldo'];
        $data = [
            'tanggal' => $tanggal_pengeluaran,
            'nominal_pengeluaran' => $nominal_pengeluaran,
            'keterangan' => $keterangan_pengeluaran,
            'saldo' => $get_last_saldo - $nominal_pengeluaran
        ];
        
        $this->db->insert('rekapitulasi', $data);
        $insert_id_rekapitulasi = $this->db->insert_id();
        $data2 = [
            'tanggal' => $tanggal_pengeluaran,
            'nominal' => $nominal_pengeluaran,
            'keterangan' => $keterangan_pengeluaran,
            'id_rekapitulasi' => $insert_id_rekapitulasi
        ];
        $this->db->insert('pengeluaran', $data2);
    }

    public function edit_pengeluaran($id_pengeluaran = null, $tanggal_pengeluaran = null, $nominal_pengeluaran = null, $keterangan_pengeluaran = null, $id_rekapitulasi = null)
    {
        $data = [
            'id' => $id_pengeluaran,
            'tanggal' => $tanggal_pengeluaran,
            'nominal' => $nominal_pengeluaran,
            'keterangan' => $keterangan_pengeluaran
        ];
        $data2 = [
            'id_rekapitulasi' => $id_rekapitulasi,
            'tanggal' => $tanggal_pengeluaran,
            'nominal_pengeluaran' => $nominal_pengeluaran,
            'keterangan' => $keterangan_pengeluaran
        ];
        $this->db->where('id', $id_pengeluaran);
        $this->db->update('pengeluaran', $data);
        $this->db->where('id_rekapitulasi', $id_rekapitulasi);
        $this->db->update('rekapitulasi', $data2);
    }

    public function hapus_pengeluaran($id_pengeluaran = null, $id_rekapitulasi = null){
        $this->db->where('id', $id_pengeluaran);
        $this->db->delete('pengeluaran');
        $this->db->where('id_rekapitulasi', $id_rekapitulasi);
        $this->db->delete('rekapitulasi');
    }

    public function getByNoPengeluaran($no)
    {
        $this->db->select("*");
        $this->db->where("id", $no);
        return $this->db->get("pengeluaran")->row();
    }
}