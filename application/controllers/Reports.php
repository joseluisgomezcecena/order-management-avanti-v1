<?php 
class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('projects_model');
        $this->load->model('operations_model');
    }

    public function index()
    {
        $data['active'] = 'reports';
        $data['title'] = 'Generador De Reportes.';

        $data['projects'] = $this->projects_model->get_projects();

        //get operations for each project
        foreach ($data['projects'] as $key => $project) {
            $data['projects'][$key]['operations'] = $this->Projects_model->get_operations_by_project($project['project_id']);
        }
        


        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav');
        $this->load->view('_templates/sidebar');
        $this->load->view('reports/index', $data);
        $this->load->view('_templates/footer');
    }

    
}