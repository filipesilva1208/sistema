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
    if(dataUser(0,'blocked') == 1){
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
        if($query == true){
            return $query->references; 
        }else{
            return 0;
        }    
    

    }else{
        $id_user = $CI->session->userdata['loggedUser']['id'];
        $query =$CI->db
            ->select('references')
            ->where('id_user', $id_user)
            ->get('users_networks')
            ->row();

        if($query == true){
            return $query->references; 
        }else{
            return 0;
        } 
    }

}

function statusUserButton($id_user)
{
    $status_user = dataUser($id_user,'active');
    if($status_user == 1){
        return '<a href="#" class="btn btn-sm btn-success" id="desable_id" value="'.$id_user.'"
        data-toggle="tooltip" data-placement="top" title="Inativar"><i class="fas fa-check-circle"></i>';

    }else{
        return '<a href="#" class="btn btn-sm btn-danger" id="active_id" value="'.$id_user.'"
        data-toggle="tooltip" data-placement="top" title="Ativar"><i class="fas fa-times-circle"></i></a>';
    }
}

function blockedUserButton($id_user)
{
    $status_user = dataUser($id_user,'blocked');
    if($status_user == 2){
        return '  <a href="#" class="btn btn-sm btn-danger" id="unlock_id" value="'.$id_user.'"
        data-toggle="tooltip" data-placement="top" title="Desbloquear"><i class="fas fa-lock"></i></a>';

    }else{
        return '<a href="#" class="btn btn-sm btn-outline-danger" id="blocked_id" value="'.$id_user.'"
        data-toggle="tooltip" data-placement="top" title="Bloquear"><i class="fas fa-lock-open"></i></a>';
    }
}

function maskCel($TEL)
{
    $tam = strlen(preg_replace("/[^0-9]/", "", $TEL));
        if ($tam == 13) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
        return "+".substr($TEL,0,$tam-11)."(".substr($TEL,$tam-11,2).")".substr($TEL,$tam-9,5)."-".substr($TEL,-4);
        }
        if ($tam == 12) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
        return "+".substr($TEL,0,$tam-10)."(".substr($TEL,$tam-10,2).")".substr($TEL,$tam-8,4)."-".substr($TEL,-4);
        }
        if ($tam == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
        return "(".substr($TEL,0,2).")".substr($TEL,2,5)."-".substr($TEL,7,11);
        }
        if ($tam == 10) { // COM CÓDIGO DE ÁREA NACIONAL
        return "(".substr($TEL,0,2).")".substr($TEL,2,4)."-".substr($TEL,6,10);
        }
        if ($tam <= 9) { // SEM CÓDIGO DE ÁREA
        return substr($TEL,0,$tam-4)."-".substr($TEL,-4);
        }
}

function now()
{
    return date('Y-m-d H:i:s');
}

function pri_ult_nome($nome)
{
    $partes = explode(' ', $nome);
    $primeiroNome = array_shift($partes);
    $ultimoNome = array_pop($partes);

    return ucfirst($primeiroNome).' '. ucfirst($ultimoNome);
}

function pri_nome($nome)
{
    $partes = explode(' ', $nome);
    $primeiroNome = array_shift($partes);
    $ultimoNome = array_pop($partes);

    return ucfirst($primeiroNome);
}

function checkAdmin($id_user = 0)
{
    $CI  = & get_instance();
    
    if($id_user > 0){
        //busca status do user passado por parametro
        $query = $CI->db
            ->where('id', $id_user)
            ->get('users')
            ->row();
            if($query == true){
                return true;  
            }else{
                return false;  
            }
    }else{
        //busca status do user logado
        $query = $CI->db
            ->where('id',$CI->session->userdata['loggedUser']['id'])
            ->get('users')
            ->row();
            if($query == true){
                if($query->nivel == 1){
                    return true;    
                }else{
                    return false;             
                }
            }
         }
}