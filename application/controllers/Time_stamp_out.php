<?php

class Time_stamp_out extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('time_stamp');
    }

    public function register()
    {
        $this->load->model('time_stamp_model');

        try {
            $result['msg'] = $this->time_stamp_model->registerTimeStamp();
            $result['type_msg'] = 'success';
        } catch (\Exception $exc) {
            $result['type_msg'] = 'danger';
            if($exc->getCode() == 10){
                $result['msg'] = $exc->getMessage();
            }else{
                $result['msg'] = 'Ocorreu um erro ao realizar o registro.';
            }
        }

        $this->load->view('time_stamp', $result);
    }


}
