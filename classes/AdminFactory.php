<?php
  //require "Admin.php" ;
class AdminFactory {

    public static function createAdmin($connection,$data){
        $Admin1 = new Admin($data["fullName"],$data["email"],$data["pwd"]) ;
        $query = "INSERT INTO admin(email, pass_word, fullName) VALUES(:email,:pass_word,:fullName)" ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':email', $Admin1->email) ;
        $stmt->bindParam(':pass_word', $Admin1->pwd) ;
        $stmt->bindParam(':fullName', $Admin1->fullName) ;
        $stmt->execute() ;
    }
}




// fetching admin .
/* 
  adminData = [] ;
  adminData = AdminFactory::createAdmin(...$result) ;

  array_push(adminData, AdminFactory::createAdmin(...result)) ;


  first of all add data to db . and then fetch in classes .
  wish will make it easier . 

  add in easy way . 
*/