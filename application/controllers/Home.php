<?php
require(APPPATH . 'core/CI_BaseValidation.php');

class Home extends CI_BaseValidation
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

}
