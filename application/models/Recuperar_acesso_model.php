<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperar_acesso_model extends CI_Model {

    public $LOGO_SITE = '<a href="https://pepco.com.br"><img src="https://pepco.com.br/assets/images/sistema/4c87636fde9c6fc913275f974a7506af.png" style="max-height: 200px"></a><br>'; 
    public $MSG_FOOTER = '<br><br><a href="https://pepco.com.br/" style="text-decoration: none; padding: 10px; background: #886A08; color: #fff; border-radius: 10px">
    Acesse sua conta</a> <br><br>'.'Atenciosamente,<br>'.'<b>PEPCO<b><br>'; 
    public $CONTAINER_OPEN = '<div style="text-align:center; font-size: 16px;color:#FFFFFF; background-color: #0D1014">' ;
    public $CONTAINER_CLOSE = '<br><br></div>';
    public $LINK_WHATSAPP_OPEN = '<a href="https://api.whatsapp.com/send?phone=5531984444598&text=Ol%C3%A1!%20meu%20plano%20est%C3%A1%20vencendo%2C%20eu%20gostaria%20de%20renova-lo" target="_blank">';
    public $LINK_WHATSAPP_CLOSE = '</a>';

    function __construct()
    {
        parent::__construct();
        $this->load->library('Emails'); 
    }

    public function resetaSenha($email, $nova_senha)
    {
        $data['senha'] = md5($nova_senha);

        return $this->db
            ->where('email', $email)
            ->update('clientes', $data);
    }

    public function buscaEmail($email)
    {
        #verificar se email existe
       
        $query = $this->db
            ->where('email', $email)
            ->get('clientes');

        return $query->num_rows();
    }

    public function sendEmail($email, $senha_temp)
    {
        $assunto  = 'NOVA SENHA';
        $mensagem =
            $this->CONTAINER_OPEN.
            $this->LOGO_SITE.
        

            '<h3>Recuperação de acesso</h3>'.
            'Sua nova senha é: '.$senha_temp.'<br><br>'.
            
            $this->MSG_FOOTER.
            $this->CONTAINER_CLOSE;

        return $this->emails->SendEmail($assunto, $mensagem, $email);
        
    }


}