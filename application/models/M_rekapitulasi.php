<?php

class M_rekapitulasi extends CI_Model
{

	function list_rekapitulasi(){
		$bulan = date('m');
		$this->db->order_by('tanggal', 'ASC');
		$this->db->where('MONTH(rekapitulasi.tanggal)', $bulan);
		return $this->db->get('rekapitulasi');
	}

	function list_rekapitulasi_filter($bulan = null, $tahun = null){
        $this->db->select('*');
         $this->db->from('rekapitulasi');
         $this->db->where('MONTH(rekapitulasi.tanggal)', $bulan);
         $this->db->where('YEAR(rekapitulasi.tanggal)', $tahun);
         $this->db->order_by('tanggal', 'ASC');
         return $this->db->get();
	}

}