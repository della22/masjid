<?php

class M_arisan extends CI_Model
{
    function list_arisan()
    {
        $this->db->select('*');
        $this->db->from('arisan_kurban a');
        $this->db->join('jamaah b', 'a.id_donatur = b.id_jamaah');
        $this->db->order_by('a.id_arisan', 'DESC');
        return $this->db->get();
    }

    function periode_terbaru()
    {
        $this->db->select_max('tahun_periode');
        $query = $this->db->get('arisan_kurban');
        return $query->result_array();
    }

    function list_arisan_filter($tahun = null, $status = null)
    {
        $this->db->select('*');
        $this->db->from('arisan_kurban a');
        $this->db->where('a.status_arisan', (int) $status);
        $this->db->where('a.tahun_periode', $tahun);
        $this->db->join('jamaah b', 'a.id_donatur = b.id_jamaah');
        $this->db->order_by('a.id_arisan', 'DESC');
        return $this->db->get();
    }

    function list_cicilan_bulan_ini($bulan = null, $tahun = null)
    {
        $this->db->select('*');
        $this->db->from('cicil_arisan_kurban');
        $this->db->where('MONTH(cicil_arisan_kurban.tanggal_cicil)', $bulan);
        $this->db->where('YEAR(cicil_arisan_kurban.tanggal_cicil)', $tahun);
        $this->db->order_by('id_cicil_arisan', 'DESC');
        return $this->db->get();
    }

    function list_arisan_by_status($status = null)
    {
        $this->db->select('*');
        $this->db->from('arisan_kurban');
        $this->db->where('status_arisan', $status);
        $this->db->join('jamaah', 'arisan_kurban.id_donatur = jamaah.id_jamaah');
        $this->db->order_by('id_arisan', 'DESC');
        return $this->db->get();
    }

    function list_arisan_by_periode($tahun = null)
    {
        $this->db->select('*');
        $this->db->from('arisan_kurban');
        $this->db->where('tahun_periode', (string) $tahun);
        $this->db->join('jamaah', 'arisan_kurban.id_donatur = jamaah.id_jamaah');
        $this->db->order_by('id_arisan', 'DESC');
        return $this->db->get();
    }

    function detail_arisan($id_arisan = null)
    {
        $this->db->select('*');
        $this->db->from('arisan_kurban');
        $this->db->where('id_arisan', $id_arisan);
        $this->db->join('jamaah', 'arisan_kurban.id_donatur = jamaah.id_jamaah');
        $this->db->order_by('id_arisan', 'DESC');
        return $this->db->get()->row_array();
    }

    function list_cicilan($id_arisan = null)
    {
        $this->db->select('*');
        $this->db->from('cicil_arisan_kurban');
        $this->db->where('id_arisan', $id_arisan);
        $this->db->order_by('id_cicil_arisan', 'DESC');
        return $this->db->get();
    }

    function total_dibayar($id_arisan = null)
    {
        $this->db->select('*');
        $this->db->from('cicil_arisan_kurban');
        $this->db->where('id_arisan', $id_arisan);
        $this->db->order_by('id_cicil_arisan', 'DESC');
        $list =  $this->db->get();
        $total_dibayar = 0;
        foreach ($list->result_array() as $list_cicilan) {
            $total_dibayar += $list_cicilan['nominal_cicil'];
        }

        return $total_dibayar;
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

    public function edit_arisan($id_arisan = null, $id_donatur = null, $tahun_periode = null, $biaya = null)
    {
        $data = [
            'id_donatur' => $id_donatur,
            'tahun_periode' => $tahun_periode,
            'biaya' => $biaya,
        ];
        $this->db->where('id_arisan', $id_arisan);
        $this->db->update('arisan_kurban', $data);
    }

    public function set_status_arisan($id_arisan = null, $biaya_total = null, $biaya_terbayar = null)
    {
        // Jika biaya total = biaya yang dibayar maka set variabel status menjadi 1, jika tidak set menjadi 0
        $status = ((int) $biaya_terbayar >= (int) $biaya_total) ? 1 : 0; //(int) untuk merubah string menjadi integer
        $data = [
            'terbayar' => $biaya_terbayar,
            'status_arisan' => $status
        ];
        $this->db->where('id_arisan', $id_arisan);
        $this->db->update('arisan_kurban', $data);
    }

    public function hapus_arisan($id_arisan = null)
    {
        $this->db->where('id_arisan', $id_arisan);
        $this->db->delete('arisan_kurban');
    }

    public function getByArisan($no)
    {
        $this->db->select("*");
        $this->db->from('arisan_kurban');
        $this->db->where('id_arisan', $no);
        $this->db->join('jamaah', 'arisan_kurban.id_donatur = jamaah.id_jamaah');
        return $this->db->get()->row();
    }

    public function getByNoCicil($no)
    {
        $this->db->select('*');
        $this->db->from('cicil_arisan_kurban');
        $this->db->where("id_cicil_arisan", $no);
        return $this->db->get()->row();
    }

    public function search_donatur($title)
    {
        $this->db->like('nama_jamaah', $title, 'both');
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

    public function edit_cicilan($id_cicil_arisan = null, $tanggal_cicil = null, $nominal_cicil = null)
    {
        $data = [
            'tanggal_cicil' => $tanggal_cicil,
            'nominal_cicil' => $nominal_cicil
        ];
        $this->db->where('id_cicil_arisan', $id_cicil_arisan);
        $this->db->update('cicil_arisan_kurban', $data);
    }

    public function hapus_cicilan($id_cicil_arisan = null)
    {
        $this->db->where('id_cicil_arisan', $id_cicil_arisan);
        $this->db->delete('cicil_arisan_kurban');
    }

    public function countPertahun($tahun = null)
    {
        $sampai = (int) $this->getMinTahunPeriode();

        $this->db->select('*');
        $this->db->from('arisan_kurban');
        $this->db->where("tahun_periode BETWEEN '$sampai' AND '$tahun'");
        return $this->db->count_all_results();
    }

    public function getMinTahunPeriode()
    {
        $this->db->select_min('tahun_periode');
        $this->db->from("arisan_kurban");
        $query = $this->db->get();
        return $query->result_array()[0]['tahun_periode'];
    }

    public function tahunPeriode()
    {
        $this->db->select("tahun_periode");
        $this->db->from("arisan_kurban");
        $this->db->group_by("tahun_periode");
        $query = $this->db->get();
        return $query->result_array();
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
