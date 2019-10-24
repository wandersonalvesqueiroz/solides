<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $email = $this->security->xss_clean($this->input->post('email'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->or_where('email', $email);
        
        // Run the query
        $query = $this->db->get('users');



        // Let's check if there are any results
        if($query->result_id->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();

            if($row->username == $username) {
                echo 'Username';
                die;
            }

            if($row->email == $email) {
                echo 'Email';
                die;
            }

            $data = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'validated' => true
                    );
            
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>