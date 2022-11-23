<?php

class AdminFactory {
    
    public static function createAdmin($connection,$data){
        $Admin1 = new Admin($data["fullName"],$data["email"],$data["profile"],$data["phone"],$data["pwd"]) ;
        $query = "INSERT INTO admin(email, pwd, fullName,image, phone) VALUES(:email,:pass_word,:fullName,:image,:phone)" ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':email', $Admin1->email) ;
        $stmt->bindParam(':pass_word', $Admin1->pwd) ;
        $stmt->bindParam(':fullName', $Admin1->fullName) ;
        $stmt->bindParam(':image', $Admin1->image) ;
        $stmt->bindParam('phone', $Admin1->phone) ;
        $stmt->execute() ;
    }
}