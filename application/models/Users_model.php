<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){

        $username = $this->security->xss_clean($this->input->post('username'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $password_confirm = $this->security->xss_clean($this->input->post('password_confirm'));

        $this->db->where('username', $username);
        $this->db->or_where('email', $email);
        
        $query = $this->db->get('users');

        if($query->result_id->num_rows == 1)
        {
            $row = $query->row();

            if($row->username == $username) {
                return 'username';
            }

            if($row->email == $email) {
                return 'email';
            }

            return false;
        }

        if($password != $password_confirm){
            return 'password';
        }

        $this->save($this->input->post());

        return true;
    }

    public function save($data){

        unset($data['password_confirm']);
        $this->db->set($data);
        $this->db->insert('users');

        $this->db->where('id', $this->db->insert_id());
        $query = $this->db->get('users');

        $row = $query->row();

        $data = array(
            'id' => $row->id,
            'username' => $row->username,
            'validated' => true
        );

        $this->session->set_userdata($data);

        redirect('dashboard');
    }
}
?>