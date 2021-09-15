<?php
defined('BASEPATH') or exit('No direct script access allowed');

function PalavraHelper($string,$position){ 
    # mostra apenas a primeira palavra da string
    return explode(' ',trim($string))[$position] ;
}
?>   

