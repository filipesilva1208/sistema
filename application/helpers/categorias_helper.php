<?php
defined('BASEPATH') or exit('No direct script access allowed');


function col_grid_prod($categoria)
{
    $CI  = & get_instance();
    $CI->load->model('CategoriasModel');

    $col = $CI->CategoriasModel->col_grid_prod($categoria);


    return $col;
    
}