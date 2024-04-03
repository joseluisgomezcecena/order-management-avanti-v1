<?php

class Auth_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function register_user($data) {
        // Insert user data into the users table
        return $this->db->insert('users', $data);
    }

    
    public function login_user($username, $password) {
        // Fetch the user with the given username
        $this->db->where('username', $username);
        $query = $this->db->get('users');
    
        if ($query->num_rows() == 1) {
            // User exists, check password
            $user = $query->row();
    
            if (password_verify($password, $user->password)) {
                // Password is correct, return true
                //return true;

                //return the user object
                return $user;

            }
        }
        // User doesn't exist or password is incorrect, return false
        return false;
    }

}
