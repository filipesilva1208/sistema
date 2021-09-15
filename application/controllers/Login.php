<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Cadastro_cliente');
	}

	public function index()
	{

		$data['css'] = load_css(array(
			'css/fonts.googleapis',
			'css/fontawesome',
			'css/icheck.bootstrap',
			'css/bootstrap/css/bootstrap.min',
			'css/AdminLTE',
		));
		$data['js'] = load_js(array(
			'js/jquery.min',
			'bootstrap/js/bootstrap.min',
			'js/adminlte',
		));

		$this->load->view('cliente/Login',$data);
	}

	public function Cadastro()
	{
		if($this->Cadastro_cliente->salvar()== true){
			$this->session->set_flashdata("success", "Cadastro realizado com sucesso");
			redirect('Inicio');
		}else{
			$this->session->set_flashdata("danger", "Ops... Login indisponível! Tente outro");
			redirect('Inicio');
		}
		
	}
	public function autenticar()
	 {		
	 	$this->load->model("AutenticarLogin");
	 	$login = $this->input->post("login");
		$senha = md5($this->input->post("senha"));
	 	$usuario = $this->AutenticarLogin->autenticar($login, $senha);

		if($usuario == true)
		{
			// $this->session->set_userdata("usuariologado", $usuario);
			 $this->session->set_flashdata("success", "parabéns você está logado.");
			// redirect('Cliente');

			if($user_data['nome']=$usuario['nivel'] == 'admin'){
				
				$this->session->set_userdata("usuariologado", $usuario);
				redirect('PainelAdm', $user_data);


			}if($user_data['nome']=$usuario['nivel'] == 'motoboy'){
				
				$this->session->set_userdata("usuariologado", $usuario);
				redirect('Motoboy', $user_data);


			}else{			
				$this->session->set_userdata("usuariologado", $usuario);
				redirect('Cliente', $user_data);
			}
	 
		}else{
		$this->session->set_flashdata("danger", "Usuário ou senha inválido!");
		}
		 redirect('Inicio');
	}	
	public function logout()
	{	
			session_destroy();			
			redirect('Inicio');		
	}


}