<?php

class Operations extends CI_Controller {
    

    
    public function index() {
        $data['title'] = 'Procesos u Operaciones.';
        // Retrieve all operations from the database
        $data['operations'] = $this->Operations_model->get_all_operations();
        
        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav');
        $this->load->view('_templates/sidebar');
        $this->load->view('operations/index', $data);
        $this->load->view('_templates/footer');
    }
    

    public function create() {
        // Title of the page.
        $data['title'] = 'Nuevo Proceso u Operación.';
        // Validate the operation name
        $this->form_validation->set_rules('operation_name', 'Nombre del proceso u operación', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the create operation form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('operations/create');
            $this->load->view('_templates/footer');
        } 
        else
        {

            // Check if the operation name exists
            $operationName = $this->input->post('operation_name');
            $exists = $this->Operations_model->check_operation_name_exists($operationName);
            
            if ($exists) 
            {
                // Operation name already exists, show an error message
                $this->session->set_flashdata('error', 'Este proceso u operación ya esta registrado.');
                
                $this->load->view('_templates/header', $data);
                $this->load->view('_templates/topnav');
                $this->load->view('_templates/sidebar');
                $this->load->view('operations/create', $data);
                $this->load->view('_templates/footer');
                return;
            }

            // Insert the new operation into the database
            $data = array(
                'operation_name' => $operationName,
                'operation_user' => $this->session->userdata('username'),
            );
            $operation_id = $this->Operations_model->insert_operation($data);
            
            // Show a success message
            $this->session->set_flashdata('success', 'El proceso u operación fueron registrados exitosamente.');
            
            redirect(base_url() . 'operations/customfields/' . $operation_id);
        }
    }



    public function customfields($operation_id) {
        // Title of the page.
        $data['title'] = 'Campos Personalizados.';
        $data['operation'] = $this->Operations_model->get_operation($operation_id);
        // Retrieve all custom fields for the operation from the database
        $data['customfields'] = $this->Operations_model->get_operation_customfields($operation_id);

        //validate the custom fields
        $this->form_validation->set_rules('customfield_type', 'Tipo de campo personalizado', 'required');
        $this->form_validation->set_rules('customfield_label', 'Etiqueta', 'required');
        

        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the create operation form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('operations/customfields', $data);
            $this->load->view('_templates/footer');
        } 
        else
        {

            //make a customfield for name based on the label and withou spaces or special characters
            $customfield_label = $this->input->post('customfield_label');
            $customfield_name = strtolower(str_replace(' ', '_', $customfield_label));
            $customfield_name = preg_replace('/[^A-Za-z0-9\-]/', '', $customfield_name);


            // Insert the new custom field into the database
            $data = array(
                'customfield_name' => $customfield_name,
                'customfield_type' => $this->input->post('customfield_type'),
                'customfield_label' => $this->input->post('customfield_label'),
                'customfield_operation_id' => $operation_id,
                'customfield_user' => $this->session->userdata('username'),
            );
            $this->Operations_model->insert_customfield($data);
            
            // Show a success message
            $this->session->set_flashdata('success', 'El campo personalizado fue registrado exitosamente.');
            
            redirect(base_url() . 'operations/customfields/' . $operation_id);
        }

    }


    

    public function update($operation_id) {
        // Title of the page.
        $data['title'] = 'Actualizar Proceso u Operación';
        $data['operation'] = $this->Operations_model->get_operation($operation_id);
        // Validate the operation name
        $this->form_validation->set_rules('operation_name', 'Nombre del proceso u operación', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the create operation form with validation errors
            
            
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('operations/update', $data);
            $this->load->view('_templates/footer');
        } 
        else
        {

            // Check if the operation name exists
            $operationName = $this->input->post('operation_name');
            $exists = $this->Operations_model->check_operation_name_exists($operationName);
            
            if ($exists) 
            {
                // Operation name already exists, show an error message
                $this->session->set_flashdata('error', 'Este proceso u operación ya esta registrado.');
                
                $this->load->view('_templates/header', $data);
                $this->load->view('_templates/topnav');
                $this->load->view('_templates/sidebar');
                $this->load->view('operations/update', $data);
                $this->load->view('_templates/footer');
                return;
            }

            // Update the operation in the database
            $data = array(
                'operation_name' => $operationName,
            );
            $this->Operations_model->update_operation($operation_id, $data);
            
            // Show a success message
            $this->session->set_flashdata('success', 'El proceso u operación fue actualizado exitosamente.');
            
            redirect('operations/update/' . $operation_id);
        }
    }


    public function delete($operation_id) {
        //before deleting the operation show a view to confirm the delete
        $data['operation'] = $this->Operations_model->get_operation($operation_id);
        
        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav');
        $this->load->view('_templates/sidebar');
        $this->load->view('operations/delete', $data);
        $this->load->view('_templates/footer');

        if (isset($_POST['confirm'])) 
        {
            // Delete the operation from the database
            $this->Operations_model->delete_operation($operation_id);
            
            // Show a success message
            $this->session->set_flashdata('success', 'El proceso u operación fue eliminado exitosamente.');
            
            redirect('operations');
        }
    }
    
}