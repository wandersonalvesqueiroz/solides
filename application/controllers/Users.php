<?php
require(APPPATH.'core/CI_BaseValidation.php');

class Users extends CI_BaseValidation
{

    public function __construct() {
       parent::__construct();
    }
    
    public function index()
    {
        $this->load->view('home');
    }

    public function create_view()
    {
        $this->load->view('user_create');
    }

    public function create()
    {
        $this->load->model('users_model');

        $result = $this->users_model->validate();

        $this->load->view('user_create');
    }

}
