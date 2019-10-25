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
        $session = $this->session->userdata();
        print_r($session);

        $id_user = $session['id'];
        $this->db->where('id_user', $id_user);

        if($this->input->post()){
            $date_register = $this->security->xss_clean($this->input->post('date_register'));
            $this->db->where('date_register', $date_register);
        }





        $query = $this->db->find('time_stamp');

        echo '<pre>';
        print_r($query);die;

        $row['registers'] = $query->row();



        $this->load->view('time_stamp_list', $row);
    }

}
