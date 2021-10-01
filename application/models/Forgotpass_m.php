<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpass_m extends CI_Model {

    public $LOGO_SITE              = '<a href="#"><img src="" style="max-height: 200px"></a><br>'; 
    

    public $table = 'users';

    function __construct()
    {
        parent::__construct();
        $this->load->library('Emails'); 
    }

    public function reset($email, $nova_senha)
    {
        $data['password'] = md5($nova_senha);

        return $this->db
            ->where('email', $email)
            ->update($this->table, $data);
    }

    public function search($email)
    {
        #verificar se email existe
       
        $query = $this->db
            ->where('email', $email)
            ->get($this->table);

        return $query->num_rows();
    }

    public function send($email, $senha_temp)
    {
        $assunto  = 'Nova senha';
        $mensagem  ='<div style="text-align:center; font-size: 16px;color:#FFFFFF; background-color: #0D1014">';    
        $mensagem .='<a href="#"><img src="" style="max-height: 200px"></a><br>';
        $mensagem .='<h5>Recuperação de conta</h5>';
        $mensagem .='<span>Sua nova senha é: '.$senha_temp.'</span><br><br>';
        $mensagem .='<br><br>Rodapé';    
        $mensagem .='<br><br></div>';    

        return $this->emails->SendEmail($assunto, $mensagem, $email);
        
    }


}