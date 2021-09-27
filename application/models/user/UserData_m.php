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

    public function updateData()
    {
        $result = FALSE;
        $data['telephone'] = $this->input->post('telephone');
        $data['cpf'] = $this->input->post('cpf');

        $this->db->where('id', dataUser(0,'id'));
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
}