<?php

class M_rekapitulasi extends CI_Model
{

	function list_rekapitulasi()
	{
		$bulan = date('m');
		$this->db->order_by('tanggal', 'ASC');
		$this->db->where('MONTH(rekapitulasi.tanggal)', $bulan);
		return $this->db->get('rekapitulasi');
	}

	function list_kategori_pemasukan()
	{
		return $this->db->get("kategori_pemasukan");
	}

	function list_kategori_pengeluaran()
	{
		return $this->db->get("kategori_pengeluaran");
	}

	function list_rekapitulasi_filter_masuk($bulan = null, $tahun = null, $order_by = 'id')
	{
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->join('kategori_pemasukan', 'pemasukan.id_kategori = kategori_pemasukan.id_kategori_masuk');
		$this->db->where('MONTH(pemasukan.tanggal)', $bulan);
		$this->db->where('YEAR(pemasukan.tanggal)', $tahun);
		$this->db->order_by($order_by, 'ASC');
		return $this->db->get();
	}


	function list_rekapitulasi_filter_keluar($bulan = null, $tahun = null, $order_by = 'id')
	{
		$this->db->select('*');
		$this->db->from('pengeluaran');
		$this->db->join('kategori_pengeluaran', 'pengeluaran.id_kategori = kategori_pengeluaran.id_kategori_keluar');
		$this->db->where('MONTH(pengeluaran.tanggal)', $bulan);
		$this->db->where('YEAR(pengeluaran.tanggal)', $tahun);
		$this->db->order_by($order_by, 'ASC');
		return $this->db->get();
	}

	// UNION ALL 2 table

	function list_rekapitulasi_union($bulan = null, $tahun = null)
	{
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('MONTH(pemasukan.tanggal)', $bulan);
		$this->db->where('YEAR(pemasukan.tanggal)', $tahun);
		$this->db->join('kategori_pemasukan', 'pemasukan.id_kategori = kategori_pemasukan.id_kategori_masuk');
		$query1 = $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('pengeluaran');
		$this->db->where('MONTH(pengeluaran.tanggal)', $bulan);
		$this->db->where('YEAR(pengeluaran.tanggal)', $tahun);
		$this->db->join('kategori_pengeluaran', 'pengeluaran.id_kategori = kategori_pengeluaran.id_kategori_keluar');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' ORDER BY tanggal DESC');
		return $query;
	}
}
