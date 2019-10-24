<?php

class Users_out extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function create_view($msg = NULL)
    {
        $data['msg'] = $msg;
        $this->load->view('user_create', $data);
    }

    public function create()
    {
        $this->load->model('users_model');

        $result = $this->users_model->validate();

        if ($result) {

            if ($result == 'username') {
                $msg = 'Usuário já existente!';
            }
            if ($result == 'email') {
                $msg = 'E-mail já existente!';
            }
            if ($result == 'password') {
                $msg = 'Confirmação de senha não confere!';
            }

            $this->create_view($msg);
        } else {
            $this->load->view('home');
        }

    }

}
