<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Emails
{
    #CONFIGURAÇÕES GERAIS
    /*
        Definir informações do servidor quando estiver em produção
    */
    public $SITE_NAME      = 'STA';
    public $MAIL_HOST      = 'smtp.mailtrap.io';
    public $MAIL_PORT      = '2525';
    public $MAIL_USERNAME  = 'db11b01deb47ec';
    public $MAIL_PASSWORD  = '8fb46c4679c087';
    public $MAIL_FROM      = 'teste@email.com';
    public $MAIL_REMETENTE = '';
    public $DEBUG_MODE     = 0;
    public $DESTINATARIO   = '';

    public function SendEmail($assunto, $mensagem, $distinatarios = []) #Sistema de envio de emails
    {       
        require 'assets/phpmailer/src/Exception.php';
        require 'assets/phpmailer/src/PHPMailer.php';
        require 'assets/phpmailer/src/SMTP.php';
        $Remetente = '';
       
        $mail = new PHPMailer(true);
        $mail->IsSMTP();    //Ativar SMTP
        $mail->SMTPDebug    = $this->DEBUG_MODE;    //Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail->SMTPAuth     = true;    //Autenticação ativada
        $mail->SMTPSecure   = 'tls';  //SSL REQUERIDO pelo GMail
        $mail->Host         = $this->MAIL_HOST;  // SMTP utilizado
        $mail->Port         = $this->MAIL_PORT;      //A porta 587 deverá estar aberta em seu servidor
        $mail->Username     = $this->MAIL_USERNAME;
        $mail->Password     = $this->MAIL_PASSWORD;
        $mail->Subject      = $assunto;
        $mail->Body         = $mensagem;
        $mail->CharSet      = 'UTF-8';
        $mail->SetFrom($this->MAIL_FROM, $this->SITE_NAME);
        $mail->IsHTML(true);

        $mail->AddAddress($distinatarios);
        
        // adaptar aqui quando for pra mais de um destinatário  
        // foreach($distinatarios as $d)
        // {
        //     $email = str_replace(' ','',$d['email']);//retira espaços em branco
        //     $mail->AddAddress($email);
        // }

        if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
        } else {
        //$error = 'Mensagem enviada!';
        return true;
        }
    }
}