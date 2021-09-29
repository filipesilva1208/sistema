<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_users extends CI_Controller {
   

	function __construct(){
		parent::__construct();
		$this->load->library("access_control");
		$this->load->library("Css_js_padrao");
		$this->access_control->checkingAdmin();
        $this->load->model('System_data_m');
        $this->load->model('admin/List_users_m');
        $this->load->model('user/UserData_m','UserData');
	}

	public function index()
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
     

		$data['site_name']            = 'STA';
		$data['page_name']            = 'Usuários';
        $data['data_user']            = $this->UserData->getData();

		$this->load->view('admin/List_users',$data);
	}

    public function getAllUsers()
    {
        $fetch_data = $this->List_users_m->make_datatables();
        $data = array();
        foreach($fetch_data as $row)
        {
            $sub_array = array();
            $sub_array[] = $row->name;
            $sub_array[] = $row->email;
            $sub_array[] = maskCel($row->telephone);
            $sub_array[] = '<div class="btn-group">
                <a href="'.base_url().'admin/List_users/editUser/'.$row->id.'" class="btn btn-sm btn-primary" id="edit" value="'.$row->id.'" name="'.$row->name.'"
                data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-user-edit"></i></a>
                
                '.statusUserButton($row->id).
                blockedUserButton($row->id).'
                </div>
                ';
                      

            $data[] = $sub_array;
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->List_users_m->get_all_data(),
            "recordsFiltered"   => $this->List_users_m->get_filtered_data(),
            "data"              => $data,
        );
        //var_dump($output);die();
        echo json_encode($output);
    }

    public function blockedUser()
	{
        if($this->input->is_ajax_request()){
            $id = $this->input->post('blocked_id');
            if($this->List_users_m->blockedUser($id) == true){
                echo json_encode(array('status'=>'success')); 
            }else{
                echo json_encode(array('status'=>'error')); 
            }

        }

    }

    public function unlockUser()
	{
        if($this->input->is_ajax_request()){
            $id = $this->input->post('unlock_id');
            if($this->List_users_m->unlockUser($id) == true){
                echo json_encode(array('status'=>'success')); 
            }else{
                echo json_encode(array('status'=>'error')); 
            }

        }

    }

    public function activateUser()
	{
        if($this->input->is_ajax_request()){
            $id = $this->input->post('active_id');
            if($this->List_users_m->activateUser($id) == true){
                echo json_encode(array('status'=>'success')); 
            }else{
                echo json_encode(array('status'=>'error')); 
            }

        }

    }

    public function desableUser()
	{
        if($this->input->is_ajax_request()){
            $id = $this->input->post('desable_id');
            if($this->List_users_m->desableUser($id) == true){
                echo json_encode(array('status'=>'success')); 
            }else{
                echo json_encode(array('status'=>'error')); 
            }

        }

    }

    public function editUser($id_user)
    {
        $data = $this->css_js_padrao->get_css_js_padrao();
        //$data['js'] .= load_js(array("descomentar caso tenha outro file desta pagina"));

        $data['id_user']              = $this->uri->segment(4);
        $data['site_name']            = 'STA';
		$data['page_name']            = 'Usuários';
        $data['data_user']            = $this->UserData->getUserData($this->uri->segment(4));
        
        $this->load->view('admin/editUser',$data);
    }

	
}