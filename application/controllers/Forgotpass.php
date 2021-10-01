<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpass extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->library('Emails');
		$this->load->model('Forgotpass_m');
	}

	public function index()
	{

		$data['css'] = load_css(array(
			'css/fonts.googleapis',
			'css/fontawesome',
			'css/icheck-bootstrap',
			'css/bootstrap/css/bootstrap.min',
			'css/AdminLTE',
			'css/toastr.min',
		));
		$data['js'] = load_js(array(
			'js/jquery.min',
			'bootstrap/js/bootstrap.bundle.min',
			'js/adminlte',
			'js/toastr.min',
			'js/recovery_pass/recoveryPass',
		));

        $data['title']      = 'STA | Recuperar senha';

		$this->load->view('Forgotpass',$data);
	}

	public function send()
    {
        $email = $this->input->post('email');

        if ($this->Forgotpass_m->search($this->input->post('email')) > 0) {
            
            #cria senha temporária
            $senha_temp = $this->gerar_senha(8, true, true, true, false);

            #altera senha do cliente
            $this->Forgotpass_m->reset($email, $senha_temp);
            
            #envia nova senha para o email do cliente
            if($this->Forgotpass_m->send($this->input->post('email'),$senha_temp) == true)
            {
                echo json_encode(array('status'=>'success'));
            }else{
                echo json_encode(array('status'=>'false'));
            }
            
        }else{
            echo json_encode(array('status'=>'erroemail'));
        }

    }

    public function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos)
    {
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%¨&*()_+="; // $si contem os símbolos
        $senha = 0;

        if ($maiusculas){
              // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
              $senha .= str_shuffle($ma);
        }
      
        if ($minusculas){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($mi);
        }
    
        if ($numeros){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($nu);
        }
    
        if ($simbolos){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($si);
        }
    
        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($senha),0,$tamanho);
    }

}