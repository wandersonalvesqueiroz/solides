<?php

class Time_stamp extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('time_stamp');
    }

    public function register_list()
    {
        $this->load->model('time_stamp_model');

        $result = $this->time_stamp_model->search();

        print_r($result);die;

        $this->load->view('time_stamp_list', $result);
    }

}
