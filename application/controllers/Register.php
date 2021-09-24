<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('RegisterUser_m');
	}

	public function index()
	{
		redirect('register/sponsor');
	}

	
	public function sponsor()
	{
		$data['title'] = 'Register';
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
			'js/jquery.mask.min',
			'js/toastr.min',
			'js/register/javascript',
		));
		
		$data['sponsor'] = $this->uri->segment(3);

		$this->load->view('Register',$data);
	}

	public function send()
	{
		if($this->input->is_ajax_request()){
			$result = $this->RegisterUser_m->save();
			if($result == 'success'){
				echo json_encode(array(
					'status'   =>'success',
					'msg_type' =>'success',
					'msg_title'=>'Prontinho!',
					'msg_text' =>'Cadastro realizado com sucesso.',
				));

			}else if($result == 'exists'){
				echo json_encode(array(
					'status'=>'exists',
					'msg_type' =>'error',
					'msg_title'=>'Email já cadastrado! ',
					'msg_text' =>'Tente recuperar sua senha.',
				));
				
			}else if($result == 'invalidemail'){
				echo json_encode(array(
					'status'    =>'invalidemail',
					'msg_type'  => 'error',
					'msg_title' => 'Email inválido!',
					'msg_text'  => 'Certifique-se se digitou corretamente.',
				));

			}else if($result == 'invalidsponsor'){
				echo json_encode(array(
					'status'    =>'invalidsponsor',
					'msg_type'  => 'error',
					'msg_title' => 'Falhou!',
					'msg_text'  => 'Link de convite inválido.',
				));
				
			}else{
				echo json_encode(array(
					'status'    =>'error',
					'msg_type'  => 'error',
					'msg_title' => 'Falhou',
					'msg_text'  => 'Não foi possivel efetuar o cadastro.',
				));
			}
		}else{
			redirect('login');
		}
		
		
	}
}