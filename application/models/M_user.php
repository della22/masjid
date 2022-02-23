<?php

class M_user extends CI_Model
{
    function list_user()
    {
        $this->db->select('*');
        $this->db->from('ustadz','pengurus');
        $this->db->join('user_profile', 'user_profile.nik_user = ustadz.nik', 'user_profile.jabatan_pengurus = ustadz.jabatan_pengurus' );
        return $this->db->get();
    }
    
    public function input_user($nik_user = null, $id_pengurus = null, $username = null, $password = null, $role = null)
    {
        $data = [
            'id_pengurus' => $id_pengurus,
            'nik_user' => $nik_user,
            'username' => $username,
            'password' => $password,
            'role' => $role
        ];
        
        $this->db->insert('user_profile', $data);
    }

    public function edit_user($id_user = null, $id_pengurus = null, $nik_user = null, $username = null, $password = null, $role = null)
    {
        $data = [
            'id_user' => $id_user,
            'id_pengurus' => $id_pengurus,
            'nik_user' => $nik_user,
            'username' => $username,
            'password' => $password,
            'role' => $role
        ];
        $this->db->where('id_user', $id_user);
        $this->db->update('user_profile', $data);
    }

    public function hapus_user($id_user = null){
        $this->db->where('id_user', $id_user);
        $this->db->delete('user_profile');
    }

    public function search_user($title){
        $this->db->select('*');
        $this->db->from('pengurus');
        $this->db->join('ustadz', 'ustadz.nik = pengurus.nik_pengurus' );
        $this->db->like('jabatan_pengurus', $title , 'both');
        $this->db->order_by('id_pengurus', 'ASC');
        $this->db->limit(10);
        return $this->db->get()->result();
    }
}