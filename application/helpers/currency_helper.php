<?php
defined('BASEPATH') or exit('No direct script access allowed');


function reaisHelper($numero)
{
    return "R$" . number_format($numero, 2, ',', '.');
}
function reais2Helper($numero)
{
    return  number_format($numero, 2, ',', '.');
}
function dolarHelper($numero)
{
    return "US$" . number_format($numero, 2, '.', ',');
}
function percentHelper($numero)
{
    return number_format($numero, 2, '.', '.') . '%';
}
