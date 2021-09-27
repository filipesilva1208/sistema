<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library("access_control");
		$this->access_control->checking();
	}

	public function index()
	{

		$data['css'] = load_css(array(
			'css/fonts.googleapis',
			'css/fontawesome',
			'css/ionicons.min',
			'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min',
			'plugins/icheck-bootstrap/icheck-bootstrap.min',
			'plugins/jqvmap/jqvmap.min',
			'css/AdminLTE',
			'plugins/overlayScrollbars/css/OverlayScrollbars.min',
			'plugins/daterangepicker/daterangepicker',
			'plugins/summernote/summernote-bs4.min',
		));
		$data['js']  = load_js(array(
			'plugins/jquery/jquery.min',
			'plugins/jquery-ui/jquery-ui.min',
			'plugins/bootstrap/js/bootstrap.bundle.min',
			'plugins/chart.js/Chart.min',
			'plugins/sparklines/sparkline',
			'plugins/jqvmap/jquery.vmap.min',
			'plugins/jqvmap/maps/jquery.vmap.usa',
			'plugins/jquery-knob/jquery.knob.min',
			'plugins/moment/moment.min',
			'plugins/daterangepicker/daterangepicker',
			'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min',
			'plugins/summernote/summernote-bs4.min',
			'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min',
			'dist/js/adminlte',
			'js/demo',
			'js/dashboard',
		));

		$data['site_name']      = 'STA';
		$data['page_name']      = 'Dashboard';

		$this->load->view('cliente/dash/Home',$data);
	}

	
}