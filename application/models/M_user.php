<?php

class M_user extends CI_Model
{
    function list_user()
    {
        $this->db->select('*');
        $this->db->from('jamaah');
        $this->db->join('user_profile', 'user_profile.id_jamaah = jamaah.id_jamaah');
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

    public function edit_user($id_user = null, $id_jamaah = null, $username = null, $password = null, $role = null)
    {
        $data = [
            'id_user' => $id_user,
            'id_jamaah' => $id_jamaah,
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
        $this->db->like('nama_jamaah', $title , 'both');
        $this->db->order_by('id_jamaah', 'ASC');
        $this->db->limit(10);
        return $this->db->get('jamaah')->result();
    }

    public function getUser($id_user){
        $user = $this->db->query("SELECT * FROM user_profile where id_user = '$id_user'");
        return $user;
    }

    public function updateProfil($id_user, $username, $password){
        $update = $this->db->query("UPDATE user_profile SET username = '$username', password = '$password' where id_user = '$id_user'");
        return $update;
    }

    public function ambil_password($id_user)
    {
        $ambil = $this->db->query("SELECT password from user_profile where id_user = '$id_user' limit 1")->row_array();
        return $ambil['password'];
    }

    public function edit_username($id_user, $username)
    {
        $update = $this->db->query("UPDATE user_profile SET username = '$username' where id_user = '$id_user'");
        return $update;
    }

}