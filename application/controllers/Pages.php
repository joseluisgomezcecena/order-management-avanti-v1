<?php

class Pages extends MY_Controller
{
    public function view($page = 'home')
    {
        $data['active'] = 'home';

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        if ($page == 'home') {
            //chart data.
            $data['chart_data'] = $this->Chart_model->fetch_data();

            // data for panels.
            $data['finished_projects'] = $this->Chart_model->count_projects_by_status('Terminado');
            
            $data['registered_projects'] = $this->Chart_model->count_projects_by_status('Registrado');
            $data['process_projects'] = $this->Chart_model->count_projects_by_status('En Proceso');
            $data['hold_projects'] = $this->Chart_model->count_projects_by_status('En Espera');
            $data['unfinished_projects'] = $data['registered_projects'] + $data['process_projects'] + $data['hold_projects'];

            $data['shop_projects'] = $this->Chart_model->count_projects_by_type('t');
            $data['maintenance_projects'] = $this->Chart_model->count_projects_by_type('m');

        }

        $data['recents'] = $this->Projects_model->get_recent_projects();



        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav', $data);
        $this->load->view('_templates/sidebar', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('_templates/footer', $data);
    }
}