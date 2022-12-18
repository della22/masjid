<?php

class M_jamaah extends CI_Model
{
    function list_jamaah()
    {
        $this->db->order_by('nama_jamaah', 'ASC');
        return $this->db->get("jamaah");
    }

    public function list_jamaah_nothapus()
    {
        $this->db->select("*");
        $this->db->from("jamaah");
        $this->db->where('is_dihapus', false);
        $this->db->order_by('id_jamaah', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function input_jamaah($nama_jamaah = null, $telepon_jamaah = null, $alamat_jamaah = null, $tanggal_lahir = null, $jenis_kelamin = null)
    {
        $data = [
            'nama_jamaah' => $nama_jamaah,
            'telepon_jamaah' => $telepon_jamaah,
            'alamat_jamaah' => $alamat_jamaah,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
        ];

        $this->db->insert('jamaah', $data);
    }

    public function import_data($data = null)
    {
        $this->db->insert('jamaah', $data);
    }

    public function get_id($id_jamaah = null)
    {
        $this->db->select("*");
        $this->db->from("jamaah");
        $this->db->where('id_jamaah', $id_jamaah);
        $query = $this->db->get();
        return $query;
    }

    public function edit_jamaah($id_jamaah = null, $nama_jamaah = null, $telepon_jamaah = null, $alamat_jamaah = null, $tanggal_lahir = null, $jenis_kelamin = null)
    {
        $data = [
            'id_jamaah' => $id_jamaah,
            'nama_jamaah' => $nama_jamaah,
            'telepon_jamaah' => $telepon_jamaah,
            'alamat_jamaah' => $alamat_jamaah,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
        ];
        $this->db->where('id_jamaah', $id_jamaah);
        $this->db->update('jamaah', $data);
    }

    public function hapus_jamaah($id_jamaah = null)
    {
        $data = [
            'is_dihapus' => true,
            'tanggal_dihapus' => date("Y-m-d")
        ];
        $this->db->where('id_jamaah', $id_jamaah);
        $this->db->update('jamaah', $data);
    }

    public function countPertahun($tahun = null)
    {
        $sampai = (int) $this->getMinTahunDitambah();

        $this->db->select('*');
        $this->db->from('jamaah');
        $this->db->where("YEAR(jamaah.tanggal_ditambah) BETWEEN '$sampai' AND '$tahun'");
        $this->db->where("is_dihapus", 0);
        return $this->db->count_all_results();
    }

    public function getMinTahunDitambah()
    {
        $this->db->select_min("YEAR(jamaah.tanggal_ditambah)", 'tahun');
        $this->db->from("jamaah");
        $query = $this->db->get();
        return $query->result_array()[0]['tahun'];
    }

    public function tahunDitambah()
    {
        $this->db->select("YEAR(jamaah.tanggal_ditambah) as tahun");
        $this->db->from("jamaah");
        $this->db->group_by("YEAR(jamaah.tanggal_ditambah)");
        $query = $this->db->get();
        return $query->result_array();
    }
}
