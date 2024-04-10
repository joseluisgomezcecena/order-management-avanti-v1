<?php

class Workorders extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load necessary models, libraries, etc.
    }
    
    public function index() {
        // Display a list of work orders
        //workorders are the same as projects
        $data['title'] = "Ordenes de Trabajo";
        $data['projects'] = $this->Projects_model->get_projects();

        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav');
        $this->load->view('_templates/sidebar');
        $this->load->view('workorders/index', $data);
        $this->load->view('_templates/footer');

    }


    

    public function update($id)
    {
        $data['title'] = "Llenar Orden de Trabajo";
        $data['project'] = $this->Projects_model->get_project($id);
        $data['sharedfields'] = $this->Sharedfields_model->get_shared_fields();
        
        // Fetch the operations for the project
        $data['operations'] = $this->Projects_model->get_operations_by_project($id);






        // For each operation, fetch the custom fields
        foreach ($data['operations'] as &$operation) {
            $operation['custom_fields'] = $this->Operations_model->get_operation_customfields($operation['po_operation_id']);
        }
                
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


    public function create($project_id) 
    {
        $operation_id = $this->input->post('operation_id');
        

        $check_if_record_exists = $this->Projects_model->check_if_record_exists($project_id, $operation_id);

        // Process shared fields
        $sharedData = array(
            'shared_project_id' => $project_id,
            'shared_operation_id' => $operation_id,
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

        if ($check_if_record_exists) {
            // Update shared fields in the database
            $id = $check_if_record_exists['shared_id'];
            $this->Projects_model->update_sharedfields($id, $sharedData);
        } else {
            // Save shared fields to the database
            $this->Projects_model->insert_sharedfields($sharedData);
        }
        
        
            //delete all custom fields for this operation and project
            $this->Projects_model->delete_customfields($operation_id, $project_id);

            // Process custom fields
            $customFields = $this->input->post('custom_fields');
            foreach ($customFields as $customFieldId => $customFieldValue) {
                $customFieldData = array(
                    'cf_project_id' => $project_id,
                    'cf_operation_id' => $operation_id,
                    'cf_custom_field' => $customFieldId,
                    'cf_data' => $customFieldValue['value']
                );
                
                // Save custom field to the database
                $this->Projects_model->insert_customfield($customFieldData);
            }

        
        // Redirect or display success message.
        $this->session->set_flashdata('success', 'Orden de trabajo creada exitosamente.');
        redirect(base_url("workorders/update/$project_id"));
    }


}