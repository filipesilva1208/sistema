<?php
defined('BASEPATH') or exit('No direct script access allowed');


function CompensadoHelper($data)
{
   
    if($data == 'nao'){
        $icon = '<i class="fas fa-times-circle text-danger"></i>';

        $compensado = '<span class="text-danger"> ';
        $compensado .= $icon;
        $compensado .= '</span>';
        return $compensado;
    }else{
        $icon = '<i class="fas fa-check-circle text-success"></i>';

        $compensado = '<span class="text-success"> ';
        $compensado .= $icon;
        $compensado .= '</span>';
        return $compensado;
    }
}

