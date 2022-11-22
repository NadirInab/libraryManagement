<?php 

function isConnected(){
    if(session_status() === PHP_SESSION_NONE){
        session_start() ;
    }
    return !empty($_SESSION["admin"]) ;
}

function isNotSignedIn(){
    if($_SESSION["admin"] == null){
        header("location: http://localhost/libraryManagement/") ;
    }
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

function inValidInputs($data){
    foreach($data as $datum ){
        if(strlen($datum) == 0 ){
            return "inputs must be filled !!" ;
        }
        else{
            return true ;
        }
    }
}

?>