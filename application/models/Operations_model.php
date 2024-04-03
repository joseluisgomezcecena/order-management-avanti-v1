<?php

class Operations_model extends CI_Model {
    
    public function get_all_operations() {
        // Retrieve all operations from the database
        $query = $this->db->get('operations');
        return $query->result_array();
    }
    
    
    public function check_operation_name_exists($operationName) {
        // Check if the operation name exists in the database
        $this->db->where('operation_name', $operationName);
        $query = $this->db->get('operations');
        return $query->num_rows() > 0;
    }
    
    
    public function insert_operation($data) {
        // Insert a new operation into the database
        $this->db->insert('operations', $data);
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
    
}