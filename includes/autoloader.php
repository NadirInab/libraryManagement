<?php

spl_autoload_register("autoloader") ;

function autoLoader($className){    
    $path = "classes/" ;
    $ext = ".php" ;
    $fullPath = $path.$className.$ext ;
    if(!file_exists($fullPath)){
        return false ;
    }
    include $fullPath ;
}