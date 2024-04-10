<?php

class Pages extends MY_Controller
{
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        if ($page == 'home') {
            $data['chart_data'] = $this->Chart_model->fetch_data();
        }

        $data['recents'] = $this->Projects_model->get_recent_projects();



        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/topnav', $data);
        $this->load->view('_templates/sidebar', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('_templates/footer', $data);
    }
}