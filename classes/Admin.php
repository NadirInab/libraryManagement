<?php

class Admin{
    public $fullName;
    public $email ;
    public $pwd ;
    public $image ;
    public $phone ;

    public function __construct($fullName, $email, $image, $phone, $pwd ){
        $this->fullName = $fullName ;
        $this->email = $email ;
        $this->image = $image ;
        $this->phone = $phone ;
        $this->pwd = $pwd ;
    } 
} 





