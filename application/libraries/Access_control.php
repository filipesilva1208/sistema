<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_control {

  public function checking()
  {
    $CI = &get_instance();
    $user = $CI->session->userdata("loggedUser");

    if(empty($user)){        
        redirect('Login');
    }
  }

}