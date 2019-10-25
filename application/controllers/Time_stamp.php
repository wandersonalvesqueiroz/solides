<?php
require(APPPATH.'core/CI_BaseValidation.php');

class Time_stamp extends CI_BaseValidation
{

    public function __construct()
    {
        parent::__construct();
    }

    public function register_list()
    {
        $this->load->model('time_stamp_model');

        $result['months'] = $this->time_stamp_model->months();
        $result['registers'] = $this->time_stamp_model->search();

        $this->load->view('time_stamp_list', $result);
    }

}
