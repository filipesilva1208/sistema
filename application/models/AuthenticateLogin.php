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
}