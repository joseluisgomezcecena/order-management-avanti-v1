<?php

class Projects_model extends CI_Model
{

    public function get_project($project_id)
    {
        // Retrieve a project from the database
        $this->db->select('projects.*, clients.client_name, clients.client_id, clients.address');
        $this->db->from('projects');
        $this->db->join('clients', 'projects.client_id = clients.client_id'); //join with clients table to get client name
        $this->db->where('project_id', $project_id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_projects()
    {
        // Retrieve all projects from the database
        $this->db->select('projects.*, clients.client_name, clients.client_id, clients.address');
        $this->db->from('projects');
        $this->db->join('clients', 'projects.client_id = clients.client_id'); //join with clients table to get client name
        $this->db->order_by('project_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
        
    }


    public function search_projects($status, $client, $start, $end, $type)
    {
        // Retrieve all projects from the database
        $this->db->select('projects.*, clients.client_name, clients.client_id, clients.address');
        $this->db->from('projects');
        $this->db->join('clients', 'projects.client_id = clients.client_id'); //join with clients table to get client name
        if ($status) {
            $this->db->where('project_status', $status);
        }
        if ($type) {
            $this->db->where('project_type', $type);
        }
        if ($client) {
            $this->db->where('projects.client_id', $client);
        }
        if ($start) {
            $start = date('Y-m-d', strtotime($start));
            $this->db->where('projects.created_at >=', $start." 00:00:00");
        }
        if ($end) {
            //turn the date into a timestamp
            $end = date('Y-m-d', strtotime($end));
            $this->db->where('projects.created_at <=', $end." 23:59:59");
        }
        $this->db->order_by('project_id', 'DESC');
        $query = $this->db->get();
        //$last_query = $this->db->last_query();
        #print_r($last_query);
        return $query->result_array();
    }





    public function get_recent_projects()
    {
        // Retrieve the most recent projects from the database
        $this->db->select('projects.*, clients.client_name, clients.client_id, clients.address');
        $this->db->from('projects');
        $this->db->join('clients', 'projects.client_id = clients.client_id'); //join with clients table to get client name
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_operations_by_project($project_id)
    {
        // Retrieve all operations for a project from the database
        $this->db->select('project_operation.*, operations.operation_name');
        $this->db->from('project_operation');
        $this->db->join('operations', 'project_operation.po_operation_id = operations.operation_id'); //join with operations table to get operation name
        $this->db->where('po_project_id', $project_id);
        $this->db->order_by('po_order', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_projects_by_operation($operation_id)
    {
        // Retrieve all projects that use an operation from the database
        $this->db->select('projects.*, clients.client_name, clients.client_id, clients.address');
        $this->db->from('projects');
        $this->db->join('clients', 'projects.client_id = clients.client_id'); //join with clients table to get client name
        $this->db->join('project_operation', 'projects.project_id = project_operation.po_project_id'); //join with project_operation table to get project id
        $this->db->where('po_operation_id', $operation_id);
        $this->db->order_by('project_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }




    public function check_project_name_exists($project_name)
    {
        // Check if the project name exists in the database
        $this->db->where('project_name', $project_name);
        $query = $this->db->get('projects');
        return $query->num_rows() > 0;
    }


    public function check_project_name_exists_for_update($project_name, $project_id)
    {
        // Check if the project name exists in the database
        $this->db->where('project_name', $project_name);
        $this->db->where('project_id !=', $project_id);
        $query = $this->db->get('projects');
        return $query->num_rows() > 0;
    }


    public function check_operation_exists( $project_id, $operation_id)
    {
        // Check if the operation exists in the project
        $this->db->where('po_operation_id', $operation_id);
        $this->db->where('po_project_id', $project_id);
        $query = $this->db->get('project_operation');
        $last_query = $this->db->last_query();
        //print_r($last_query);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
        //return $query->num_rows() > 0;
    }


    public function create_project($project_data)
    {
        // Insert the new project into the database
        $this->db->insert('projects', $project_data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
    }


    public function update_project($project_id, $project_data)
    {
        // Update a project in the database
        $this->db->where('project_id', $project_id);
        $this->db->update('projects', $project_data);
    }



    public function update_status($project_id, $status)
    {
        // Update the status of a project in the database
        $this->db->where('project_id', $project_id);
        $this->db->update('projects', array('project_status' => $status));
    }


    
    public function delete_project($project_id)
    {
        // Delete a project from the database
        $this->db->where('project_id', $project_id);
        $this->db->delete('projects');
    }


    public function add_operation($project_id, $operation_id) 
    {
        //get the last operation order for the project_id
        $this->db->select('po_order');
        $this->db->from('project_operation');
        $this->db->where('po_project_id', $project_id);
        $this->db->order_by('po_order', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $last_order = $query->row_array();
        $order = $last_order['po_order'] + 1;

        $data = array(
            'po_project_id' => $project_id,
            'po_operation_id' => $operation_id,
            'po_order' => $order,
            'po_user' => $this->session->userdata('username'),
        );
    
        return $this->db->insert('project_operation', $data);
    }



    public function update_order($order) 
    {
        foreach ($order as $i => $po_id) {
            $data = array('po_order' => $i);
            $this->db->where('po_id', $po_id);
            $this->db->update('project_operation', $data);
        }
    }


    public function insert_customfield($data)
    {
        // Insert a new custom field into the database
        $this->db->insert('custom_filled', $data);
    }


    public function insert_sharedfields($data)
    {
        // Insert a new shared field into the database
        $this->db->insert('operation_shared_fields', $data);
    }

    public function update_sharedfields($id, $data)
    {
        // Update shared fields in the database
        $this->db->where('shared_id', $id);
        $this->db->update('operation_shared_fields', $data);
    }


    public function get_saved_data($operation_id, $project_id) {
        $this->db->where('shared_operation_id', $operation_id);
        $this->db->where('shared_project_id', $project_id);//added this line

        
        
        $query = $this->db->get('operation_shared_fields');
        return $query->row_array();
    }
    

    public function get_saved_custom_field_value($operation_id, $custom_field_id, $project_id) {//added project_id
        $this->db->where('cf_operation_id', $operation_id);
        $this->db->where('cf_custom_field', $custom_field_id);
        $this->db->where('cf_project_id', $project_id);//added this line
        $query = $this->db->get('custom_filled');
        //return $query->row()->value;
        return $query->row_array();
    }


    public function check_if_record_exists($project_id, $operation_id) {
        $this->db->where('shared_project_id', $project_id);
        $this->db->where('shared_operation_id', $operation_id);
        $query = $this->db->get('operation_shared_fields');
        
        if ($query->num_rows() > 0) {
            return $query->row_array();     
        } else {
            return false;
        }
    }

    public function delete_customfields($operation_id, $project_id) {
        $this->db->where('cf_operation_id', $operation_id);
        $this->db->where('cf_project_id', $project_id);
        $this->db->delete('custom_filled');
    }   


    public function insert_file($data)
    {
        // Insert a new file into the database
        $this->db->insert('upload_project', $data);
    }


    public function get_files($project_id)
    {
        // Retrieve all files for a project from the database
        $this->db->where('file_project_id', $project_id);
        $query = $this->db->get('upload_project');
        return $query->result_array();
    }


    public function delete_operation($po_id)
    {
        // Delete an operation from the project
        $this->db->where('po_id', $po_id);
        $this->db->delete('project_operation');
    }

}