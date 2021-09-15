<?php
defined('BASEPATH') or exit('No direct script access allowed');

function load_js($js)
{        
    $javascript = '';
    foreach ($js as $js){
        $javascript .= '<script src="'.base_url().'assets/'.$js.'.js"></script>' . "\n";
    }    
    return $javascript;
}

function load_css($css)
{        
    $stylesheet = '';
    foreach ($css as $css){
        $stylesheet .= '<link href="'.base_url().'assets/'.$css.'.css" rel="stylesheet" />'. "\n";
    }    
    return $stylesheet;
}