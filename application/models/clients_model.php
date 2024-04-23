<?php

class Clients_model extends CI_Model 
{
    public function get_clients() 
    {
        // Retrieve all clients from the database
        $query = $this->db->get('clients');
        return $query->result_array();
        
    }
    
    public function get_client($client_id) 
    {
        // Retrieve a specific client from the database
        // Implement your logic here
        $query = $this->db->get_where('clients', array('client_id' => $client_id));
        return $query->row_array();
    }

    
    public function create_client($client_data) 
    {
        // Insert a new client into the database
        // Implement your logic here
        $query = $this->db->insert('clients', $client_data);
        return $query;
    }
    

    public function update_client($client_id, $client_data) 
    {
        // Update an existing client in the database
        // Implement your logic here
        $query = $this->db->update('clients', $client_data, array('client_id' => $client_id));
        return $query;
    }
    

    public function delete_client($client_id) 
    {
        // Delete a client from the database
        // Implement your logic here
        $query = $this->db->delete('clients', array('client_id' => $client_id));
    }


    public function get_client_by_name($client_name) 
    {
        // Retrieve a specific client by name from the database
        // Implement your logic here
        $query = $this->db->get_where('clients', array('client_name' => $client_name));
        return $query->row_array();
    }


    public function get_client_by_name_and_id($client_name, $client_id) 
    {
        // Retrieve a specific client by name and id from the database
        // Implement your logic here
        $query = $this->db->get_where('clients', array('client_name' => $client_name, 'client_id !=' => $client_id));
        return $query->row_array();
    }

    public function get_projects_by_client($client_id) 
    {
        // Retrieve all projects for a specific client from the database
        // Implement your logic here
        $query = $this->db->get_where('projects', array('client_id' => $client_id));
        return $query->result_array();
    }

}