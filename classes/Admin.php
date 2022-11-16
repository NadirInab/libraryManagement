<?php
   // include "Book.php" ;
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
    public static function addBook($title, $type,$connection){
        $Book1 = new Book($title, $type) ;
        $query = "INSERT INTO books(isbn,title,type) VALUES(:isbn, :title, :bookType)" ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':isbn', $Book1->isbn) ;
        $stmt->bindParam(':title', $Book1->title);
        $stmt->bindParam(':bookType', $Book1->type) ;
        $stmt->execute() ;
    }
    public function authenticateUser(){
        echo "hello admin" ;
    }
} 





