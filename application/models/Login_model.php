<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function validateLogin()
    {

        $user = $this->validateUser();

        if($user){
            $data = array(
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'validated' => true
            );

            $this->session->set_userdata($data);
            return true;
        }

        return false;
    }

    public function validateUser()
    {
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));

        // Run the query
        $query = $this->db->get('users');

        if ($query->result_id->num_rows == 1) {
            return $query->row();
        } else {
            return false;
        }

    }

}

?>