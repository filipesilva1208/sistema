<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Css_js_padrao {

    public function get_css_js_padrao()
    {
        $data['css'] = load_css(array(
			'css/fonts.googleapis',
			'css/fontawesome',
            'css/toastr.min',            
			'plugins/datatables-bs4/css/dataTables.bootstrap4.min',
			'plugins/datatables-responsive/css/responsive.bootstrap4.min',
			'plugins/datatables-buttons/css/buttons.bootstrap4.min',
			'css/AdminLTE',
		));
        
		$data['js']  = load_js(array(
			'plugins/jquery/jquery.min',
			'plugins/bootstrap/js/bootstrap.bundle.min',
            
			'plugins/datatables/jquery.dataTables.min',
			'plugins/datatables-bs4/js/dataTables.bootstrap4.min',
			'plugins/datatables-responsive/js/dataTables.responsive.min',
			'plugins/datatables-responsive/js/responsive.bootstrap4.min',
			'plugins/datatables-buttons/js/dataTables.buttons.min',
			'plugins/datatables-buttons/js/buttons.bootstrap4.min',
			'plugins/jszip/jszip.min',
			'plugins/pdfmake/pdfmake.min',
			'plugins/pdfmake/vfs_fonts',
			'plugins/datatables-buttons/js/buttons.html5.min',
			'plugins/datatables-buttons/js/buttons.print.min',
			'plugins/datatables-buttons/js/buttons.colVis.min',
            'dist/js/adminlte',
			'js/demo',
			'js/dashboard',
            'js/toastr.min',
			'js/admin/listUsers',
		));

        return $data;
    }
}