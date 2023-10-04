<?php 

namespace root\src\helpers;

function stringToArray($divider, $string){
    $data = explode($divider, $string);
    return $data;
}

function arrayToString($divider, $array){
    $data = implode($divider, $array);
    return $data;
}