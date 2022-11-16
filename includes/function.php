<?php 

function isConnected(){
    if(session_status() === PHP_SESSION_NONE){
        session_start() ;
    }
    return !empty($_SESSION["admin"]) ;
}


function throwArray($data){
    echo "<pre>" ;
        var_dump($data) ;
    echo "</pre>" ;
} 

function pwdIsConfirmed($pwd1,$pwd2){
    if($pwd1 === $pwd2 ){
        return true ;
    }else{
        return false ;
    }
}

?>