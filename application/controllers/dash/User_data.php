<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_data extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
        echo 'Dados do usuário';
	}


}