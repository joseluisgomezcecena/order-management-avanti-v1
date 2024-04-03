<?php

class Clients extends MY_Controller 
{
    
    public function show($client_id) {
        // Retrieve the client from the database
        $data['client'] = $this->clients_model->get_client($client_id);
        
        // Load the view to display the client details
        $this->load->view('clients/show', $data);
    }

    public function index() 
    {
        // Retrieve all clients from the database
        $data['clients'] = $this->clients_model->get_clients();
        $data['title'] = 'Clientes';
        
        // Load the view to display the clients list
        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav');
        $this->load->view('_templates/sidebar');
        $this->load->view('clients/index', $data);
        $this->load->view('_templates/footer');
    }


    public function create() 
    {
        // Handle the form submission to store a new client
        $this->form_validation->set_rules('client_name', 'Nombre del cliente', 'required');
        
        //check only if the address is not empty
        if (!empty($this->input->post('address'))) 
        {
            $this->form_validation->set_rules('address', 'Dirección', 'min_length[5]|required');
        }


        $data['title'] = 'Nuevo Cliente.';
        
        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the create client form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('clients/create');
            $this->load->view('_templates/footer');
        } 
        else 
        {
            //check if the client name already exists.
            $client_name = $this->input->post('client_name');
            $client = $this->clients_model->get_client_by_name($client_name);

            if ($client) 
            {
                //set flash message.
                $this->session->set_flashdata('error', 'El cliente ya existe, edite al cliente o registre con un nombre diferente.');
                //loading views again.
                $this->load->view('_templates/header', $data);
                $this->load->view('_templates/topnav');
                $this->load->view('_templates/sidebar');
                $this->load->view('clients/create');
                $this->load->view('_templates/footer');
                return;
            }


            // Validation passed, create the new client
            $client_data = array(
                'client_name' => $this->input->post('client_name'),
                'address' => $this->input->post('address'),
                'user_name'=> $this->session->userdata('username')
            );
            
            // Insert the new client into the database
            $this->clients_model->create_client($client_data);
            
            //set flash message
            $this->session->set_flashdata('success', 'Cliente creado exitosamente.');

            // Redirect to the clients list page
            redirect(base_url() . 'clients/create');
        }
    }


    public function update($client_id) {
        // Handle the form submission to update an existing client
        $this->form_validation->set_rules('client_name', 'Client Name', 'required');
        //check only if the address is not empty
        if (!empty($this->input->post('address'))) 
        {
            $this->form_validation->set_rules('address', 'Dirección', 'min_length[5]|required');
        }
        $data['title'] = 'Actualizar o editar Cliente.';
        
        if ($this->form_validation->run() == FALSE) 
        {
            // Validation failed, reload the update client form with validation errors
            $data['client'] = $this->clients_model->get_client($client_id);
            
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('clients/update', $data);
            $this->load->view('_templates/footer');

        } 
        else
        {
            //check if the client name already exists.
            $client_name = $this->input->post('client_name');
            $client = $this->clients_model->get_client_by_name_and_id($client_name, $client_id);

            if ($client) 
            {
                //set flash message.
                $this->session->set_flashdata('error', 'El cliente ya existe, edite al cliente o registre con un nombre diferente.');
                //loading views again.
                $data['client'] = $this->clients_model->get_client($client_id);
                
                $this->load->view('_templates/header', $data);
                $this->load->view('_templates/topnav');
                $this->load->view('_templates/sidebar');
                $this->load->view('clients/update', $data);
                $this->load->view('_templates/footer');
                return;
            }


            // Validation passed, update the client
            $client_data = array(
                'client_name' => $this->input->post('client_name'),
                'address' => $this->input->post('address'),
                'user_name'=> $this->session->userdata('username')
            );
            
            // Update the client in the database
            $this->clients_model->update_client($client_id, $client_data);
            
            //set flash message.
            $this->session->set_flashdata('success', 'Cliente actualizado exitosamente.');

            // Redirect to the clients list page
            redirect(base_url() . 'clients/update/' . $client_id);
        }
    }



    public function delete($client_id) {
        //before deleting the client show a view to confirm the delete
        $data['client'] = $this->clients_model->get_client($client_id);
        $data['title'] = 'Eliminar Cliente.';

        if (!isset($_POST['confirm']))
        {
            // Validation failed, reload the delete client form with validation errors
            $data['client'] = $this->clients_model->get_client($client_id);
            
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('clients/delete', $data);
            $this->load->view('_templates/footer');
        } 
        else 
        {
            // Validation passed, delete the client
            $this->clients_model->delete_client($client_id);

            //set flash message.
            $this->session->set_flashdata('success', 'Cliente eliminado exitosamente.');

            // Redirect to the clients list page
            redirect(base_url() . 'clients');
        }
    }


}