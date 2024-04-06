<?php

class Sharedfields_model extends CI_Model {
    
    protected $table = 'operation_shared_fields';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_shared_fields() {
        return $this->db->get($this->table)->result();
    }
    
    public function get_shared_field($shared_id) {
        return $this->db->get_where($this->table, array('shared_id' => $shared_id))->row();
    }
    
    public function create_shared_field($data) {
        return $this->db->insert($this->table, $data);
    }
    
    public function update_shared_field($shared_id, $data) {
        $this->db->where('shared_id', $shared_id);
        return $this->db->update($this->table, $data);
    }
    
    public function delete_shared_field($shared_id) {
        return $this->db->delete($this->table, array('shared_id' => $shared_id));
    }
    
}