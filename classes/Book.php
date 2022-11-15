<?php

class Book{
    public $isbn = 0 ;
    public $title ;
    public $type ;
    
    public function dumpConnection($conn){
        echo "<pre>" ;
            var_dump($conn) ;
        echo "</pre>" ;
    }
    public function __construct($title,$type){
        $this->isbn = rand(0,1000) ;
        $this->title = $title ;
        $this->type = $type ;
    }
}