<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterUser_m extends CI_Model {

    private $table = "users";

    public function save()
    {
        $email = $this->input->post('email');

        //valida o email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'invalidemail';
        }
        $row = $this->db->where('email =',$email)->count_all_results($this->table);
        
        //verifica se existe um usuário com mesmo nome
        if($row > 0){
            return 'exists';
        }else{  

            $data['name']        = $this->input->post('name');
            $data['email']       = $this->input->post('email');
            $data['cpf']         = 1231232321;
            $data['password']    = md5($this->input->post('password'));
            $data['telephone']   = 123456789;
            $data['nivel']       = 0;
            $data['status']      = 0;
            $data['active']      = 0;
            $data['sponsor']     = 1;
            $data['account_ip']  = get_ip_helper();
            $data['created_at']  = date('Y-m-d H:i:s');
            $data['updated_at']  = date('Y-m-d H:i:s');
            $data['activate_at'] = date('Y-m-d H:i:s');

            if($this->db->insert($this->table, $data)){
                return 'success';
            }else{
                return 'error';
            }
    
        }
    }
}