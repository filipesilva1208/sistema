<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpass extends CI_Controller {

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
			'css/icheck-bootstrap',
			'css/bootstrap/css/bootstrap.min',
			'css/AdminLTE',
		));
		$data['js'] = load_js(array(
			'js/jquery.min',
			'bootstrap/js/bootstrap.bundle.min',
			'js/adminlte',
		));

		$this->load->view('Forgotpass',$data);
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
}