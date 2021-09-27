<?php
defined('BASEPATH') or exit('No direct script access allowed');

function dataUser($id_user = 0, $column = null)
{
    $CI  = & get_instance();

    if($column != null){        
        if($id_user > 0){
            //busca status do user passado por parametro
            $query = $CI->db
                ->where('id', $id_user)
                ->get('users')
                ->row();
                if($query == true){
                    return $query->$column;  
                }else{
                    return "<div class='alert alert-danger text-center'><i class='fas fa-times'></i> Coluna não encontrada!</div>";  
                }
        }else{
            //busca status do user logado
            $query = $CI->db
                ->where('id',$CI->session->userdata['loggedUser']['id'])
                ->get('users')
                ->row();
                if($query == true){
                    return $query->$column;  
                }else{
                    return "<div class='alert alert-danger text-center'><i class='fas fa-times'></i> Coluna não encontrada!</div>";   
                }
        }
    }
}

function statusUserIcon()
{
    if(dataUser(0,'status') == 1){
        return '<i class="fas fa-check-circle text-success"></i>';
    }else{
        return '<i class="fas fa-times-circle text-danger"></i>';
    }
}
function activeUserIcon()
{
    if(dataUser(0,'active') == 1){
        return '<i class="fas fa-check-circle text-success"></i>';
    }else{
        return '<i class="fas fa-times-circle text-danger"></i>';
    }
}

function getNetwork($id_user = 0)
{
    $CI  = & get_instance();

    if($id_user > 0){
        $query = $CI->db
            ->select('references')
            ->where('id_user', $id_user)
            ->get('users_networks')
            ->row();
    
        return $query[0]->references; 

    }else{
        $id_user = $CI->session->userdata['loggedUser']['id'];
        $query =$CI->db
            ->select('references')
            ->where('id_user', $id_user)
            ->get('users_networks')
            ->row();

        return $query->references;
    }

}