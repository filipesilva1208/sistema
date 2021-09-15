
<?php
defined('BASEPATH') or exit('No direct script access allowed');


function dataHelper($data)
{
    if($data !== null){
        $nova_data = date('d/m/Y - H:i:s', strtotime($data));
    }else{
        $nova_data = '---';
    }
    return  $nova_data;
}

function TimeHelper($data)
{
    return  date('H:i:s', strtotime($data));
}
