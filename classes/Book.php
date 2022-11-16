<?php

class Book{
    public $isbn  ;
    public $title ;
    public $type ;
    public $image ;
    public $publish_date ;
    
    public function dumpConnection($conn){
        echo "<pre>" ;
            var_dump($conn) ;
        echo "</pre>" ;
    }
    public function __construct($title,$type, $image, $publish_date){
        $this->isbn = rand(0,1000)."-".rand(0,5)."-".rand(100,10000) ;
        $this->title = $title ;
        $this->type = $type ;
        $this->image = $image ;
        $this->publish_date = $publish_date ;
    }
}