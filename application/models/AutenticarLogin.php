<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutenticarLogin extends CI_Model {

    public function autenticar($login, $senha)
    {
        $this->db->where("login", $login);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("clientes")->row_array();
        return $usuario;
    }
}