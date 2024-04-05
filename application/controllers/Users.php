<?php
class Users extends MY_Controller
{


    public function index()
    {
        $data['title'] = ucfirst("Usuarios"); // Capitalize the first letter

        $data['users'] = $this->auth_model->get_users();

        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav');
        $this->load->view('_templates/sidebar');
        $this->load->view('users/index', $data);
        $this->load->view('_templates/footer');
    }



    public function register() {
        // Validate form data
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        $data['title'] = ucfirst("Registro de usuarios"); // Capitalize the first letter

        if ($this->form_validation->run() == FALSE) 
        {
            // Display registration form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('users/register');
            $this->load->view('_templates/footer');
        } 
        else
        {
            // Process registration data
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            if ($this->auth_model->register_user($data))
            {
                // Registration successful set flash message.
                $this->session->set_flashdata('success', 'Se ha registrado al usuario '.$this->input->post('username').'. Ya puede iniciar sesion.');

                // Registration successful, redirect to login page
                redirect(base_url() . 'register');
            } else {
                // Registration failed, display error message
                $data['error'] = 'Registration failed. Please try again.';
                redirect(base_url() . 'register');

            }
        }
    }


    public function update($user_id)
    {
        $data['title'] = ucfirst("Actualizar usuario"); // Capitalize the first letter
        $data['user'] = $this->auth_model->get_user($user_id);

        // Validate form data
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
   

        if ($this->form_validation->run() == FALSE) 
        {
            // Display registration form with validation errors
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('users/update', $data);
            $this->load->view('_templates/footer');
        } 
        else
        {
            // Process registration data
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            if ($this->auth_model->update_user($user_id, $data))
            {
                // Registration successful set flash message.
                $this->session->set_flashdata('success', 'Se ha actualizado al usuario '.$this->input->post('username').'. Ya puede iniciar sesion.');

                // Registration successful, redirect to login page
                redirect(base_url() . 'users');
            } else {
                // Registration failed, display error message
                $data['error'] = 'Registration failed. Please try again.';
                redirect(base_url() . 'users');

            }
        }
    }


    public function delete($user_id)
    {
        if ($this->auth_model->delete_user($user_id))
        {
            // Registration successful set flash message.
            $this->session->set_flashdata('success', 'Se ha eliminado al usuario.');

            // Registration successful, redirect to login page
            redirect(base_url() . 'users');
        } 
        else {
            // Registration failed, display error message
            $data['error'] = 'Registration failed. Please try again.';
            redirect(base_url() . 'users');

        }
    }


}