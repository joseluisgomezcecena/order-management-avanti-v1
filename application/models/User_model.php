<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_user($id)
    {
        $query = $this->db->get_where('users', array('user_id' => $id));
        return $query->row_array();
    }

    public function create_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data)
    {
       
        $this->db->where('user_id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->delete('users');
    }
}