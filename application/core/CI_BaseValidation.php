<?php
defined('BASEPATH') OR exit('Error');

class CI_BaseValidation extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
    
    public function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('/');
        }
    }

}
