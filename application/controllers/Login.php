<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthenticateLogin');
	}

	public function index()
	{

		$data['css'] = load_css(array(
			'css/fonts.googleapis',
			'css/fontawesome',
			'css/icheck.bootstrap',
			'css/bootstrap/css/bootstrap.min',
			'css/AdminLTE',
			'css/toastr.min',
		));
		$data['js'] = load_js(array(
			'js/jquery.min',
			'bootstrap/js/bootstrap.min',
			'js/adminlte',
			'js/login/javascript',
			'js/toastr.min',
		));

		$data['title']    = 'STA | Login';

		$this->load->view('Login',$data);
	}

	public function authentication()
	{		
		if($this->input->is_ajax_request()){
			$email    = $this->input->post("email");
		    $password = md5($this->input->post("password"));
			
			$user = $this->AuthenticateLogin->authenticate($email, $password);  
			
			if($user == true)
			{	
				$this->logAcess($user['id']);

				//$result = json_encode(array("status"=>"admin"));
				if($user['nivel'] == 1){
					$this->session->set_userdata("loggedUser", $user);				
					$result = json_encode(array("status"=>"admin"));
				}else{
					$this->session->set_userdata("loggedUser", $user);			
					$result = json_encode(array("status"=>"user"));
				}
			
			}else{
			$result = json_encode(array("status"=>"erro"));
			}

			echo $result;

		} 
	}

	public function logAcess($id)
	{
		return $this->AuthenticateLogin->logAcess($id);
	}

	public function logout()
	{	
		session_destroy();			
		redirect('Login');		
	}

	
}