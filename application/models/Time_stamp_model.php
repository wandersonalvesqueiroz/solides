<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Time_stamp_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function search()
    {

        $session = $this->session->userdata();
        print_r($session);

        $id_user = $session['id'];
        $this->db->where('id_user', $id_user);

        if($this->input->post()){
            $date_register = $this->security->xss_clean($this->input->post('date_register'));
            $this->db->where('date_register', $date_register);
        }

        $query = $this->db->get('time_stamp');
        $row['registers'] = $query->row();

        return $row;
    }

}

?>