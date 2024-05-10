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


    public function update_signature($id, $file_path)
    {

        $data = array(
            'signature' => $file_path
        );

        $this->db->where('user_id', $id);
        return $this->db->update('users', $data);
        
    }


    public function check_user_signature($username, $password) {
        // Fetch the user with the given username
        $this->db->where('username', $username);
        $this->db->where('signature IS NOT NULL');
        $query = $this->db->get('users');
    
        if ($query->num_rows() == 1) {
            
            $user = $query->row();
    
            if (password_verify($password, $user->password)) {
                // Password is correct, return true
                return true;

                //return the user object
                //return $user;

            }
        }
        // User doesn't exist or password is incorrect, return false
        return false;
    }



    public function get_user_signature($username) {
        // Fetch the user with the given username
        $this->db->where('username', $username);
        $this->db->where('signature IS NOT NULL');
        $query = $this->db->get('users');
    
        if ($query->num_rows() == 1) {
            
           //return as array
           return $query->row_array();
        }
        // User doesn't exist or password is incorrect, return false
        return false;
    }


}