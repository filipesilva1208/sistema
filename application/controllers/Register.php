<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('RegisterUser_m');
	}

	public function index($id = null)
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
				echo json_encode(array('status'=>'success'));
			}else if($result == 'exists'){
				echo json_encode(array('status'=>'exists'));
			}else if($result == 'invalidemail'){
				echo json_encode(array('status'=>'invalidemail'));
			}else{
				echo json_encode(array('status'=>'error'));
			}
		}else{
			redirect('login');
		}
		
		
	}

	public function register()
	{
		# code...
	}
}