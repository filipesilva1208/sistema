<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterUser_m extends CI_Model {

    private $table   = "users";
    private $table_n = "users_networks";

    public function save()
    {
        $email = $this->input->post('email');

        //valida o email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'invalidemail';
        }
        //verifica se existe um usuário com mesmo nome
        if(checkemail($email) == true ){
            return 'exists';
        }if(checkid($this->input->post('sponsor')) == false ){
            return 'invalidsponsor';
        }else{  

            $data['name']        = strtolower($this->input->post('name'));
            $data['email']       = $this->input->post('email');
            $data['cpf']         = 0;//onlyNumber($this->input->post('cpf'));
            $data['password']    = md5($this->input->post('password'));
            $data['telephone']   = onlyNumber($this->input->post('telephone'));
            $data['nivel']       = 0;
            $data['blocked']     = 0;
            $data['active']      = 0;
            $data['sponsor']     = $this->input->post('sponsor');
            $data['account_ip']  = get_ip_helper();
            $data['created_at']  = now();
            $data['updated_at']  = '0000-00-00 00:00:00';
            $data['activate_at'] = '0000-00-00 00:00:00';

            if($this->db->insert($this->table, $data)){
                $this->newGuest($this->input->post('sponsor'));
                return 'success';
            }else{
                return 'error';
            }
    
        }
    }

    public function newGuest($id_user = 0)
    {
        if($id_user > 0 ){
            $query = $this->db
                ->where('id_user', $id_user)
                ->get($this->table_n);

            if($query->num_rows() > 0){
                $query = $this->db
                ->query("UPDATE {$this->table_n} SET `references` = `references` + 1, updated_at = now() WHERE id_user = {$id_user}");

                return $query;    

            }else{
                $data['id_user'] = $id_user;
                $data['references'] = 1;
                $data['created_at'] = date('Y-m-d H:i:s');
                return $this->db->insert($this->table_n, $data);
            }    
        }
    }
}