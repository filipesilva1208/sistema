<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_users_m extends CI_Model {

    var $table = "users";
    var $select_column = array("id","name","email","telephone",);
    var $order_column  = array("id","name","email","telephone",);//se der erro definir null para outras colunas

    public function make_query()
    {
        //$this->db->where('name',$this->input->post('name'));
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        $this->db->order_by("id","DESC");
        if(isset($_POST['search']['value'])){
            $this->db->like("name",$_POST['search']['value']);  
            $this->db->like("email",$_POST['search']['value']);  
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else{
            $this->db->order_by("id","DESC");
        }
    }

    public function make_datatables()
    {
        $this->make_query();
        if($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_data()
    {
       // $this->db->where('name',$this->input->post('name'));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function blockedUser($id)
	{
        $data['blocked'] = 2;
        $this->db->where('id',$id);
        return $this->db->update($this->table,$data);  

    }

    public function unlockUser($id)
	{
        $data['blocked'] = 1;
        $this->db->where('id',$id);
        return $this->db->update($this->table,$data);  
    }

    public function activateUser($id)
	{
        $data['active'] = 1;
        $this->db->where('id',$id);
        return $this->db->update($this->table,$data);  

    }

    public function desableUser($id)
	{
        $data['active'] = 0;
        $this->db->where('id',$id);
        return $this->db->update($this->table,$data);  
    }

}