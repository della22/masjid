<?php

class M_user extends CI_Model
{
    function list_user()
    {
        $this->db->select('*');
        $this->db->from('user_profile');
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get();
    }
    
    public function input_user($nama_user = null, $jabatan = null, $username = null, $password = null, $role = null)
    {
        $data = [
            'nama_user' => $nama_user,
            'jabatan' => $jabatan,
            'username' => $username,
            'password' => $password,
            'role' => $role
        ];
        
        $this->db->insert('user_profile', $data);
    }

    public function edit_user($id_user = null, $nama_user = null, $jabatan = null, $username = null, $password = null, $role = null)
    {
        $data = [
            'nama_user' => $nama_user,
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