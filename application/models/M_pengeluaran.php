<?php

class M_pengeluaran extends CI_Model
{
    function list_pengeluaran()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->join('kategori_pengeluaran', 'pengeluaran.id_kategori = kategori_pengeluaran.id_kategori_keluar');
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }

    function list_kategori_pengeluaran()
    {
        return $this->db->get("kategori_pengeluaran");
    }


    public function input_pengeluaran($tanggal_pengeluaran = null, $nominal_pengeluaran = null, $keterangan_pengeluaran = null, $kategori_pengeluaran = null)
    {
        $data = [
            'tanggal' => $tanggal_pengeluaran,
            'nominal' => $nominal_pengeluaran,
            'keterangan' => $keterangan_pengeluaran,
            'id_kategori' => $kategori_pengeluaran,
            'jenis' => 'pengeluaran'
        ];
        $this->db->insert('pengeluaran', $data);
    }

    public function edit_pengeluaran($id_pengeluaran = null, $tanggal_pengeluaran = null, $nominal_pengeluaran = null, $keterangan_pengeluaran = null, $kategori_pengeluaran = null)
    {
        $data = [
            'id' => $id_pengeluaran,
            'tanggal' => $tanggal_pengeluaran,
            'nominal' => $nominal_pengeluaran,
            'keterangan' => $keterangan_pengeluaran,
            'id_kategori' => $kategori_pengeluaran
        ];
        $this->db->where('id', $id_pengeluaran);
        $this->db->update('pengeluaran', $data);
    }

    public function hapus_pengeluaran($id_pengeluaran = null)
    {
        $this->db->where('id', $id_pengeluaran);
        $this->db->delete('pengeluaran');
    }

    public function getByNoPengeluaran($no)
    {
        $this->db->select("*");
        $this->db->where("id", $no);
        return $this->db->get("pengeluaran")->row();
    }

    public function getByKategori($no)
    {
        $this->db->select("*");
        $this->db->where("id_kategori_keluar", $no);
        return $this->db->get("kategori_pengeluaran")->row();
    }

    public function filter($tanggalawal = null, $tanggalakhir = null)
    {

        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->join('kategori_pengeluaran', 'pengeluaran.id_kategori = kategori_pengeluaran.id_kategori_keluar');
        $this->db->where("tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir'");
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get();
    }

    public function getKategori()
    {
        $this->db->select("*");
        $this->db->order_by('id_kategori_keluar', 'ASC');
        return $this->db->get("kategori_pengeluaran")->result();
    }

    public function input_kategori($nama_kategori_keluar = null)
    {
        $data = [
            'nama_kategori_keluar' => $nama_kategori_keluar
        ];

        $this->db->insert('kategori_pengeluaran', $data);
    }

    public function edit_kategori($id_kategori_keluar = null, $nama_kategori_keluar = null)
    {
        $data = [
            'nama_kategori_keluar' => $nama_kategori_keluar
        ];
        $this->db->where('id_kategori_keluar', $id_kategori_keluar);
        $this->db->update('kategori_pengeluaran', $data);
    }

    public function hapus_kategori($id_kategori_keluar = null)
    {
        $this->db->where('id_kategori_keluar', $id_kategori_keluar);
        $this->db->delete('kategori_pengeluaran');
    }
    public function pengeluaran_6_bulan()
    {
        $query = $this->db->query('SELECT date_format(tanggal, "%Y-%m") as tgl, sum(nominal) as jumlah FROM `pengeluaran` WHERE DATE(tanggal) >= (DATE(NOW()) - INTERVAL 6 MONTH) group by date_format(tanggal, "%M")');
        return $query;
    }
}
