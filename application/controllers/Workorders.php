<?php

class Workorders extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load necessary models, libraries, etc.
    }
    
    public function index() {
        // Display a list of work orders
    }


    public function update($id)
    {
        $data['title'] = "Llenar Orden de Trabajo";
        $data['project'] = $this->Projects_model->get_project($id);
        $data['sharedfields'] = $this->Sharedfields_model->get_shared_fields();
        $data['operations'] = $this->Projects_model->get_operations_by_project($id);

        $this->form_validation->set_rules('shared_project_id', 'Proyecto', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the update project form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('workorders/update', $data);
            $this->load->view('_templates/footer');
        } 
        else 
        {
            // Validation passed, update the project in the database
            $this->Projects_model->update_project($id);
            redirect('projects');
        }

    }

    
    public function create() {
        // Create a new work order
        
        // Process shared fields
        $sharedData = array(
            'shared_project_id' => $this->input->post('shared_project_id'),
            'shared_operation_id' => $this->input->post('shared_operation_id'),
            'hora_inicio' => $this->input->post('hora_inicio'),
            'hora_termino' => $this->input->post('hora_termino'),
            'realizo' => $this->input->post('realizo'),
            'reviso' => $this->input->post('reviso'),
            'fecha' => $this->input->post('fecha'),
            'entrego' => $this->input->post('entrego'),
            'recibio' => $this->input->post('recibio'),
            'hora_salida' => $this->input->post('hora_salida'),
            'hora_recibido' => $this->input->post('hora_recibido'),
            'observaciones' => $this->input->post('observaciones')
        );
        
        // Save shared fields to the database
        
        // Process custom fields
        $customFields = $this->input->post('custom_fields');
        foreach ($customFields as $customField) {
            $customFieldData = array(
                'customfield_operation_id' => $this->input->post('shared_operation_id'),
                'customfield_label' => $customField['label'],
                'customfield_name' => $customField['name'],
                'customfield_type' => $customField['type'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'customfield_user' => $this->input->post('customfield_user')
            );
            
            // Save custom field to the database
        }
        
        // Redirect or display success message
    }
    
    public function edit($id) {
        // Edit an existing work order
        
        // Retrieve shared fields from the database
        
        // Retrieve custom fields from the database
        
        // Display the edit form with the retrieved data
    }
    
  
    
    public function delete($id) {
        // Delete a work order
        
        // Delete shared fields from the database
        
        // Delete custom fields from the database
        
        // Redirect or display success message
    }
    
}