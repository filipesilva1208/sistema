<?php
defined('BASEPATH') or exit('No direct script access allowed');


function StatusHelper($data)
{
   

    if($data == 'pendente'){
        $icon = '<i class="fas fa-user-clock text-danger"></i> '; 
        $status = 'Pendente';

        $span = '<span class="text-danger"> ';
        $span .= $icon;
        $span .= $status;
        $span .= '</span>';
        return $span;
    }
    if($data == 'andamento'){
        $icon = '<i class="fas fa-fire text-warning"></i> '; 
        $status = 'Em andamento';

        $span = '<span class="text-warning"> ';
        $span .= $icon;
        $span .= $status;
        $span .= '</span>';
        return $span;
    }
    if($data == 'caminho'){
        $icon = '<i class="fas fa-motorcycle text-info"></i> '; 
        $status = 'Saiu para entrega';

        $span = '<span class="text-info"> ';
        $span .= $icon;
        $span .= $status;
        $span .= '</span>';
        return $span;
    }
    if($data == 'pronto'){
        $icon = '<i class="fa fa-check-square text-success"></i> '; 
        $status = 'Pedido pronto';

        $span = '<span class="text-success"> ';
        $span .= $icon;
        $span .= $status;
        $span .= '</span>';
        return $span;
    }
    if($data == 'compensando'){
        $icon = '<i class="fas fa-exclamation-triangle text-warning"></i> '; 
        $status = 'Compensando..';

        $span = '<span class="text-warning"> ';
        $span .= $icon;
        $span .= $status;
        $span .= '</span>';
        return $span;
    }
    if($data == 'entregue'){
        $icon = '<i class="fas fa-check-circle text-success"></i> '; 
        $status = 'Entregue';

        $span = '<span class="text-success"> ';
        $span .= $icon;
        $span .= $status;
        $span .= '</span>';
        return $span;
    }
}

