<?php

class Chart_model extends CI_Model
{
   
    //fetch projects by month
    function fetch_data_monthly()
    {
        $this->db->select("MONTH(created_at) as month, count(project_id) as total");
        $this->db->from("projects");
        $this->db->group_by("MONTH(created_at)");
        $query = $this->db->get();
        
        $chart_data = [];
        foreach ($query->result() as $row) {
            $chart_data['label'][] = $row->month;
            $chart_data['data'][] = (int) $row->total;
        }

        return json_encode($chart_data);

    }

    function fetch_data()
    {
        $this->db->select("MONTHNAME(created_at) as month, count(project_id) as total");
        $this->db->from("projects");
        $this->db->group_by("MONTH(created_at)");
        $query = $this->db->get();

        // Create an array with all the months
        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $chart_data = array_fill_keys($months, 0);

        // Merge the result from the database with the months array
        foreach ($query->result() as $row) {
            $chart_data[$row->month] = (int) $row->total;
        }

        // Format the data for the chart
        $chart_data = [
            'label' => array_keys($chart_data),
            'data' => array_values($chart_data),
        ];

        return json_encode($chart_data);
    }

}