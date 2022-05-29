<?php

class M_user extends CI_Model
{
    function list_user()
    {
        $this->db->select('*');
        $this->db->from('jamaah');
        $this->db->join('user_profile', 'user_profile.id_jamaah = jamaah.id_jamaah' );
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get();
    }
    
    public function input_user($id_jamaah = null, $username = null, $password = null, $role = null)
    {
        $data = [
            'id_jamaah' => $id_jamaah,
            'username' => $username,
            'password' => $password,
            'role' => $role
        ];
        
        $this->db->insert('user_profile', $data);
    }

    public function edit_user($id_user = null, $id_jamaah = null, $jabatan = null, $username = null, $password = null, $role = null)
    {
        $data = [
            'id_user' => $id_user,
            'id_jamaah' => $id_jamaah,
            'jabatan' => $jabatan,
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
        $this->db->from('jamaah');
        $this->db->like('nama_jamaah', $title , 'both');
        $this->db->order_by('id_jamaah', 'ASC');
        $this->db->limit(10);
        return $this->db->get()->result();
    }
}