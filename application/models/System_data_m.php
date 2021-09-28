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
        // return $this->db
        //     ->where('created_at', date('Y-m-d'))
        //     ->count_all_results('users');
        // contar somente novos cadastros do dia

        return 0;
    }

    public function visits_today()
    {
        // return $this->db
        //     ->where('created_at', date('Y-m-d'))
        //     ->count_all_results('users');
        // contar somente novos cadastros do dia

        return 0;
    }

}