<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


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
            $this->load->view('auth/register');
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

    public function login() 
    {
        // Validate form data
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $data['title'] = ucfirst("Inicio de sesión"); // Capitalize the first letter

        if ($this->form_validation->run() == FALSE) 
        {
            // Display login form with validation errors
            $this->load->view('_templates/header', $data);
            //$this->load->view('_templates/topnav');
            //$this->load->view('_templates/sidebar');
            $this->load->view('auth/login');
            $this->load->view('_templates/footer');
        } 
        else
        {
            // Process login data
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($user = $this->auth_model->login_user($username, $password)) 
            {
                //retrieve the user object
                
                //write session data.
                $session_data = array(
                    'user_id' => $user->id,
                    'username' => $username,
                    'email' => $user->email,
                    'is_admin' => $user->is_admin,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($session_data);

                
                // Login successful, redirect to dashboard
                redirect(base_url() . 'home');

            } 
            else 
            {
                //set flash message.
                $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos.');
                redirect(base_url() . 'login');
            }
        }
    }

    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();

        //$this->session->unset_userdata('logged_in');
		//$this->session->unset_userdata('data');
		//$this->session->unset_userdata('user_name');

        redirect('auth/login');
    }

}