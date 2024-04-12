<?php

class Projects extends MY_Controller 
{
    
    public function show($project_id) {
        // Retrieve the project from the database
        $data['project'] = $this->Projects_model->get_project($project_id);
        
        // Load the view to display the project details
        $this->load->view('projects/show', $data);
    }


    public function index() 
    {
        // Retrieve all projects from the database
        $data['projects'] = $this->Projects_model->get_projects();
        $data['title'] = 'Projects';
        
        // Load the view to display the projects list
        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav');
        $this->load->view('_templates/sidebar');
        $this->load->view('projects/index', $data);
        $this->load->view('_templates/footer');
    }


    public function create() 
    {
        $data['title'] = 'Proyecto Nuevo.';
        $data['clients'] = $this->Clients_model->get_clients();
        // Handle the form submission to store a new project
        $this->form_validation->set_rules('project_name', 'Proyecto o nombre del proyecto', 'required');
        $this->form_validation->set_rules('client_id', 'Cliente', 'required|integer');
        $this->form_validation->set_rules('installation_required', 'Requerimiento de instalacion', 'required');
        $this->form_validation->set_rules('qty', 'Cantidad', 'required|numeric');
        $this->form_validation->set_rules('date', 'Fecha', 'required');
        $this->form_validation->set_rules('user', 'Usuario', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('work_units', 'Unidades de trabajo a realizar/fabricar', 'required|numeric');
        $this->form_validation->set_rules('approved_by', 'Aprobado por', 'required|max_length[255]');
        
        
        
        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the create project form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('projects/create');
            $this->load->view('_templates/footer');
        } 
        else 
        {

            // Check if the project name exists
            $project_name = $this->input->post('project_name');
            $exists = $this->Projects_model->check_project_name_exists($project_name);

            if ($exists) 
            {
                // Project name already exists, show an error message
                $this->session->set_flashdata('error', 'Un proyecto con ese nombre ya esta registrado.');

                $this->load->view('_templates/header', $data);
                $this->load->view('_templates/topnav');
                $this->load->view('_templates/sidebar');
                $this->load->view('projects/create', $data);
                $this->load->view('_templates/footer');
                return;
            }

            //upload the image
            $config['upload_path'] = './uploads/projects';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['file_name'] = 'project_' . time();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('main_image')) 
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                $this->load->view('_templates/header', $data);
                $this->load->view('_templates/topnav');
                $this->load->view('_templates/sidebar');
                $this->load->view('projects/create', $data);
                $this->load->view('_templates/footer');
                return;
            } 
            else 
            {
                $data = array('upload_data' => $this->upload->data());
            }


            // Validation passed, create the new project
            $date = date_create($this->input->post('date'));

            $project_data = array(
                'project_name' => $this->input->post('project_name'),
                'client_id' => $this->input->post('client_id'),
                'installation_required' => $this->input->post('installation_required'),
                'qty' => $this->input->post('qty'),
                'date' => $date->format('Y-m-d'),
                'user' => $this->input->post('user'),
                'work_units' => $this->input->post('work_units'),
                'approved_by' => $this->input->post('approved_by'),
                'area' => $this->input->post('area'),
                'user_name' => $this->session->userdata('username'),
                'main_image' => $data['upload_data']['file_name']
            );
            
            // Insert the new project into the database
            $project_id = $this->Projects_model->create_project($project_data);
            
            // Set flash message
            $this->session->set_flashdata('success', 'Proyecto registrado con exito.');

            // Redirect to the projects list page
            redirect(base_url() . "projects/$project_id/operations");
        }
    }



    public function operations($project_id) 
    {
        //Title.
        $data['title'] = 'Procesos u Operaciones del Proyecto.';
        //Get all operations available
        $data['operations'] = $this->Operations_model->get_all_operations();
        // Retrieve the project from the database
        $data['project'] = $this->Projects_model->get_project($project_id);
        
        // Retrieve all operations for the project from the database
        $data['project_ops'] = $this->Projects_model->get_operations_by_project($project_id);
        
        //validate the form
        $this->form_validation->set_rules('operation_id', 'Operacion', 'required|integer');

        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the project operations form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('projects/operations', $data);
            $this->load->view('_templates/footer');
        } 
        else 
        {
            // Handle the form submission to add an operation to the project
            $operation_id = $this->input->post('operation_id');
            
            // Check if the operation is already added to the project
            $exists = $this->Projects_model->check_operation_exists($project_id, $operation_id);
            
            if ($exists) 
            {
                // Operation already exists, show an error message
                $this->session->set_flashdata('error', 'La operacion ya esta agregada al proyecto.');
                
                $this->load->view('_templates/header', $data);
                $this->load->view('_templates/topnav');
                $this->load->view('_templates/sidebar');
                $this->load->view('projects/operations', $data);
                $this->load->view('_templates/footer');
                return;
            }
            
            // Add the operation to the project
            $this->Projects_model->add_operation($project_id, $operation_id);
            
            // Set flash message
            $this->session->set_flashdata('success', 'Operacion agregada al proyecto con exito.');
            
            // Redirect to the project operations page
            redirect(base_url() . "projects/$project_id/operations");
        }

    }


    public function update($project_id) 
    {
        $data['title'] = 'Actualizar Proyecto.';
        $data['clients'] = $this->Clients_model->get_clients();
        $data['project'] = $this->Projects_model->get_project($project_id);
        
        // Handle the form submission to update a project
        $this->form_validation->set_rules('project_name', 'Proyecto o nombre del proyecto', 'required');
        $this->form_validation->set_rules('client_id', 'Cliente', 'required|integer');
        $this->form_validation->set_rules('installation_required', 'Requerimiento de instalacion', 'required');
        $this->form_validation->set_rules('qty', 'Cantidad', 'required|numeric');
        $this->form_validation->set_rules('date', 'Fecha', 'required');
        $this->form_validation->set_rules('user', 'Usuario', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('work_units', 'Unidades de trabajo a realizar/fabricar', 'required|numeric');
        $this->form_validation->set_rules('approved_by', 'Aprobado por', 'required|max_length[255]');
        
        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the update project form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('projects/update', $data);
            $this->load->view('_templates/footer');
        } 
        else 
        {
            // Check if the project name exists
            $project_name = $this->input->post('project_name');
            $exists = $this->Projects_model->check_project_name_exists_for_update($project_name, $project_id);

            if ($exists) 
            {
                // Project name already exists, show an error message
                $this->session->set_flashdata('error', 'Un proyecto con ese nombre ya esta registrado.');

                $this->load->view('_templates/header', $data);
                $this->load->view('_templates/topnav');
                $this->load->view('_templates/sidebar');
                $this->load->view('projects/update', $data);
                $this->load->view('_templates/footer');
                return;
            }


            // Validation passed, update the project
            $date = date_create($this->input->post('date'));

            $project_data = array(
                'project_name' => $this->input->post('project_name'),
                'client_id' => $this->input->post('client_id'),
                'installation_required' => $this->input->post('installation_required'),
                'qty' => $this->input->post('qty'),
                'date' => $date->format('Y-m-d'),
                'user' => $this->input->post('user'),
                'work_units' => $this->input->post('work_units'),
                'approved_by' => $this->input->post('approved_by'),
                'area' => $this->input->post('area'),
                'user_name' => $this->session->userdata('username')
            );

            // Check if the main_image input is not empty
            if (!empty($_FILES['main_image']['name'])) {
                // Upload the image
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048; // 2MB
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('main_image')) 
                {
                    $data = $this->upload->data();
                    $project_data['main_image'] = $data['file_name'];
                } 
                else
                {
                    // Handle the upload error
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url() . 'projects/update/' . $project_id);
                    return;
                }
            }

            // Update the project in the database
            $this->Projects_model->update_project($project_id, $project_data);

            // Set flash message
            $this->session->set_flashdata('success', 'Proyecto actualizado con exito.');




            // Redirect to the projects list page
            //redirect(base_url() . 'projects/update/' . $project_id);
            redirect(base_url() . 'projects/' . $project_id . '/operations');
        }
    }



    public function update_order() 
    {
        $order = $this->input->post('order');
        $this->Projects_model->update_order($order);
    }



    public function delete_operation($project_id, $po_id) 
    {
        // Delete the operation from the project
        $this->Projects_model->delete_operation($po_id);
        
        // Set flash message
        $this->session->set_flashdata('success', 'Operacion eliminada del proyecto con exito.');
        
        // Redirect to the project operations page
        redirect(base_url() . "projects/$project_id/operations");
    }


}