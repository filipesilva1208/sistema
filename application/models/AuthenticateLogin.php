<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthenticateLogin extends CI_Model {

    public function authenticate($email, $password)//admin@email.com
    {
        $user = $this->db
            ->where("email", $email)
            ->where("password", $password)
            ->get("users");

        return $user->row_array();
    }

    public function logAcess($id_user)
    {
        if($id_user > 0){
            $data['id_user']     = $id_user;
            $data['ip']          = get_ip_helper();
            $data['created_at']  = now();

            $this->db->insert('users_log_access',$data);
        }else{
            return false;
        }
     
    }
}