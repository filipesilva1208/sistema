<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_data_m extends CI_Model {


    public function totalUsers()
    {
        return $this->db->count_all_results('users');
    }

    public function totalUsersplans()
    {
        return $this->db->count_all_results('users_plans');
    }

    public function registrations_today()
    {
        $r = $this->db
        ->query("SELECT count(id) as total FROM users WHERE YEAR(created_at) = YEAR(CURDATE()) AND DAY(created_at) = DAY(CURDATE())")
        ->row();
        return  $r->total;
       
    }

    public function visits_today()
    {
        $r = $this->db
        ->query("SELECT count(id) as total FROM users_log_access WHERE YEAR(created_at) = YEAR(CURDATE()) AND DAY(created_at) = DAY(CURDATE())")
        ->row();
        return  $r->total;
    }

}