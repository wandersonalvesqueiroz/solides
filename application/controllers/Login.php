<?php

defined('BASEPATH') OR exit('Error');

class Login extends CI_Controller
{

    public function index($msg = NULL)
    {
        $session = $this->session->userdata();
        if(!empty($session['validated']) || !is_null($session['validated'])){
            redirect('dashboard');
        }

        $data['msg'] = $msg;
        $this->load->view('login', $data);

    }

    public function process()
    {

        $this->load->model('login_model');

        $result = $this->login_model->validate();
        if (!$result) {
            $msg = 'Usuário e/ou senha inválido(s)!';

            $this->index($msg);
        } else {
            redirect('dashboard');
        }
    }

}
