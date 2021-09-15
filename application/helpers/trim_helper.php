<?php
defined('BASEPATH') or exit('No direct script access allowed');

function TrimHelperFixo($login){ 
    # LIMITA A IMPRESSÃO DE CARACTERES EM 11 DIGITOS
    return mb_strimwidth($login, 0, 11, "...");    
}

function TrimHelper($entrada,$i){ 
    return mb_strimwidth($entrada, 0, $i, "...");    
}