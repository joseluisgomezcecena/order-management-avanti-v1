<?php

class Operations_model extends CI_Model {
    
    public function get_all_operations() {
        // Retrieve all operations from the database
        $query = $this->db->get('operations');
        return $query->result_array();
    }

    
    public function get_operation_customfields($operation_id) { 
        // Retrieve all custom fields for a specific operation from the database
        $this->db->where('customfield_operation_id', $operation_id);
        $query = $this->db->get('operation_custom_field');
        return $query->result_array();
    }


    public function insert_customfield($data) {
        // Insert a new custom field into the database
        $this->db->insert('operation_custom_field', $data);
    }

    
    public function check_operation_name_exists($operationName) {
        // Check if the operation name exists in the database
        $this->db->where('operation_name', $operationName);
        $query = $this->db->get('operations');
        return $query->num_rows() > 0;
    }
    

    public function check_operation_exists_for_update($operationName, $operation_id) {
        // Check if the operation name exists in the database for a specific operation
        $this->db->where('operation_name', $operationName);
        $this->db->where('operation_id !=', $operation_id);
        $query = $this->db->get('operations');
        return $query->num_rows() > 0;
    }



    
    public function insert_operation($data) {
        // Insert a new operation into the database
        $this->db->insert('operations', $data);
        return $this->db->insert_id();
    }
    

    public function get_operation($operation_id) {
        // Retrieve a specific operation from the database
        $this->db->where('operation_id', $operation_id);
        $query = $this->db->get('operations');
        return $query->row_array();
    }
    
    
    public function update_operation($operation_id, $data) {
        // Update an operation in the database
        $this->db->where('operation_id', $operation_id);
        $this->db->update('operations', $data);
    }
    
    
    public function delete_operation($operation_id) {
        // Delete an operation from the database
        $this->db->where('operation_id', $operation_id);
        $this->db->delete('operations');
    }
    

    public function delete_customfield($customfield_id) {
        // Delete a custom field from the database
        $this->db->where('customfield_id', $customfield_id);
        $this->db->delete('operation_custom_field');
    }



}