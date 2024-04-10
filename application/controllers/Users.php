<?php
class Users extends MY_Controller
{


    public function index()
    {
        $data['title'] = ucfirst("Usuarios"); // Capitalize the first letter
        $data['users'] = $this->User_model->get_users();

        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav');
        $this->load->view('_templates/sidebar');
        $this->load->view('users/index', $data);
        $this->load->view('_templates/footer');
    }



    public function create() {
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
            $this->load->view('users/create', $data);
            $this->load->view('_templates/footer');
        } 
        else
        {

            if ($this->session->userdata('is_admin') == 1) {
                $is_admin = $this->input->post('is_admin');
            } else {
                $is_admin = 0;
            }

            // Process registration data
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_admin' => $is_admin   
            );

            if ($this->auth_model->register_user($data))
            {
                // Registration successful set flash message.
                $this->session->set_flashdata('success', 'Se ha registrado al usuario '.$this->input->post('username').'. Ya puede iniciar sesion.');

                // Registration successful, redirect to login page
                redirect(base_url() . 'users');
            } else {
                // Registration failed, display error message
                $data['error'] = 'Registration failed. Please try again.';
                redirect(base_url() . 'users');

            }
        }
    }


    public function update($user_id)
    {
        $data['title'] = ucfirst("Actualizar usuario"); // Capitalize the first letter
        $data['user'] = $this->User_model->get_user($user_id);

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
        
            if ($this->session->userdata('is_admin') == 1) {
                $is_admin = $this->input->post('is_admin');
            } else {
                $is_admin = 0;
            }

            // Process registration data
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_admin' => $is_admin
            );

            if ($this->User_model->update_user($user_id, $data))
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


    public function delete($user_id) {
        // Before deleting the user, show a view to confirm the delete
        $data['user'] = $this->User_model->get_user($user_id);
        $data['title'] = 'Eliminar Usuario.';

        if ($data['user']['username'] == "administrator") {
            // Set flash message
            $this->session->set_flashdata('error', 'No es posible eliminar al usuario administrator.');

            // Redirect to the users list page
            redirect(base_url() . 'users');
        }

        if (!isset($_POST['confirm'])) {
            // Validation failed, reload the delete user form with validation errors
            $data['user'] = $this->User_model->get_user($user_id);

            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/topnav');
            $this->load->view('_templates/sidebar');
            $this->load->view('users/delete', $data);
            $this->load->view('_templates/footer');
        } else {
            // Validation passed, delete the user
            $this->User_model->delete_user($user_id);

            // Set flash message
            $this->session->set_flashdata('success', 'Usuario eliminado exitosamente.');

            // Redirect to the users list page
            redirect(base_url() . 'users');
        }
    }

}
