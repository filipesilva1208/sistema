<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserData_m extends CI_Model {

    private $table = 'users';

    public function getData()
    {
        $id_user = $this->session->userdata['loggedUser']['id'];

        $query = $this->db 
            ->where('id', $id_user)
            ->get('users');
        
        return $query->result();
    }


    public function getUserData($id_user)
    {
        $query = $this->db 
            ->where('id', $id_user)
            ->get('users');

        if($query->num_rows() > 0){
            return $query->result();

        }else{
            redirect('admin/List_users');
        }
    }

    public function updateData()
    {
        $result = FALSE;
        $data['telephone']  = $this->input->post('inputTelephone');
        $data['cpf']        = $this->input->post('inputCpf');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', user_id_logged());
        if($this->db->update($this->table,$data)){
            $result = TRUE;
        }else{
            $result = FALSE;
        }
        return $result;
    }

    public function updatePassword()
    {
        $result = FALSE;
        $data['password'] = md5($this->input->post('password'));

        $this->db->where('id', dataUser(0,'id'));
        if($this->db->update($this->table,$data)){
            $result = TRUE;
        }else{
            $result = FALSE;
        }
        return $result;
    }

    public function getNetwork()
    {
        $id_user = $this->session->userdata['loggedUser']['id'];

        $query = $this->db
            ->select('references')
            ->where('id_user', $id_user)
            ->get($this->table);

        return $query->row();    
    }

    public function updateProfile()
    {
        $result = FALSE;
        $config['upload_path'] = "./assets/img/profiles";
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("file")) {
            $data = $this->upload->data();

            //Resize and Compress Image
            $config['image_library']  = 'gd2';
            $config['source_image']   = './assets/img/profiles' . $data['file_name'];
            $config['create_thumb']   = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality']        = '60%';
            //$config['width']        = 600;
            //$config['height']       = 400;
            $config['new_image']      = './assets/img/profiles' . $data['file_name'];

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data['profile']          =  $data['file_name'];
            $this->db->where('id', user_id_logged());
            
            if($this->db->update($this->table, $data)){
                $result = TRUE;
            }

           
            return $result;
        }
    }
}