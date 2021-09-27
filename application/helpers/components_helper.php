<?php
defined('BASEPATH') or exit('No direct script access allowed');


function checkid($id = 0)
{
    // verifica se usuario existe pelo id
    $CI = &get_instance();
    $user = $CI->db->where('id',$id)->get('users');

    if($id > 0 && $user->num_rows() > 0){
        return TRUE;
    }else{
        return FALSE;
    }
}

function checkemail($email = null)
{
    // verifica se usuario existe pelo email
    $CI = &get_instance();
    $user = $CI->db->where('email',$email)->get('users');

    if($email !== NULL && $user->num_rows() > 0){
        return TRUE;
    }else{
        return FALSE;
    }
}
