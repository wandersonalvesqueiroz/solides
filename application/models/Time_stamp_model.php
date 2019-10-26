<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Time_stamp_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function months()
    {

        $session = $this->session->userdata();

        $id_user = $session['id'];
        $this->db->where('id_user', $id_user);
        $this->db->group_by('MONTH(date_register), YEAR(date_register)');

        $query = $this->db->get('time_stamp');
        $row = $query->result();

        return $row;
    }

    public function search()
    {

        $session = $this->session->userdata();

        $id_user = $session['id'];
        $this->db->where('id_user', $id_user);

        $date_register = date('Y-m-d');
        if (!empty($this->input->post())) {
            $date_register = $this->security->xss_clean($this->input->post('month'));
        }

        $month_date_register = new DateTime($date_register);
        $month_date_register = $month_date_register->format('Y-m');

        $this->db->where("DATE_FORMAT(date_register,'%Y-%m')", $month_date_register);
        $query = $this->db->get('time_stamp');
        $row = $query->result();

        return $row;

    }

    public function registerTimeStamp()
    {
        $this->load->model('Login_model');
        $result = $this->Login_model->validateUser();

        if ($result) {
            //realiza a batida
            //busca se ja possui batida no dia de hoje
            $this->db->where('id_user', $result->id);
            $this->db->where('date_register', date('Y-m-d'));

            // Run the query
            $query = $this->db->get('time_stamp');

            if ($query->result_id->num_rows == 1) {
                //Tem registro somente atualiza
                return $this->updateTimeStamp($query->row());
            } else {
                //não tem batida insere no banco
                return $this->insertTimeStamp($result->id);
            }

        } else {
            //erro na autenticação do usuário
            throw new \Exception('Usuário ou senha inválido', 10);
        }
    }

    private function updateTimeStamp($data)
    {
        $this->db->where('id', $data->id);
        $data_atual = date("d/m/Y", strtotime($data->date_register));
        $hora = date('H:i:s');

        if (!$data->in_time) {
            $this->db->update('time_stamp', array('in_time' => $hora));
            return "Entrada registrada: $data_atual às $hora";
        } else if (!$data->out_lunch) {
            $this->db->update('time_stamp', array('out_lunch' => $hora));
            return "Saída Almoço registrada: $data_atual às $hora";
        } else if (!$data->in_lunch) {
            $this->db->update('time_stamp', array('in_lunch' => date('H:i:s')));
            return "Volta Almoço registrada: $data_atual às $hora";
        } else if (!$data->out_time) {
            $this->db->update('time_stamp', array('out_time' => date('H:i:s')));
            return "Saída registrada: $data_atual às $hora";
        } else {
            //todas as batidas já registradas
            throw new \Exception("Todas as 4 batidas já feitas no dia: $data_atual", 10);
        }
    }

    private function insertTimeStamp($id_user)
    {
        $data = array(
            'id_user' => $id_user,
            'date_register' => date('Y-m-d'),
            'in_time' => date('H:i:s')
        );
        $result = $this->db->insert('time_stamp', $data);
        if ($result) {
            return "Entrada registrada: " . date('d-m-Y') . " às {$data['in_time']}";
        } else {
            throw new \Exception('Erro ao inserir batida', 10);
        }

    }

}

?>