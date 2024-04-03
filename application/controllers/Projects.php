<?php

class Projects extends MY_Controller 
{
    
    public function show($project_id) {
        // Retrieve the project from the database
        $data['project'] = $this->projects_model->get_project($project_id);
        
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
        
        // Add more validation rules for other fields if needed
        
        $data['title'] = 'Proyecto Nuevo.';
        
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

            // Validation passed, create the new project
            $project_data = array(
                'project_name' => $this->input->post('project_name'),
                'client_id' => $this->input->post('client_id'),
                'installation_required' => $this->input->post('installation_required'),
                'qty' => $this->input->post('qty'),
                'date' => $this->input->post('date'),
                'user' => $this->input->post('user'),
                'work_units' => $this->input->post('work_units'),
                'approved_by' => $this->input->post('approved_by'),
            );
            
            // Insert the new project into the database
            $this->projects_model->create_project($project_data);
            
            // Set flash message
            $this->session->set_flashdata('success', 'Proyecto registrado con exito.');

            // Redirect to the projects list page
            redirect(base_url() . 'projects/create');
        }
    }
}