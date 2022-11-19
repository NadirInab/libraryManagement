<?php
    include "../includes/autoloader.php" ;
    $connection = new DbConnection ;
    $connect = $connection->connect() ;

    function createAdmin(){
            global $connect ;
            $data = ["fullName" => $_POST["name"],"email" => $_POST["email"],"profile" => $_POST["profile"], "phone" => $_POST["phone"] ,"pwd" => $_POST["pwd"],"confirmedPwd" => $_POST["confirmedPwd"]] ;
            (!pwdIsConfirmed($data["pwd"], $data["confirmedPwd"])) ? $pwdError = "Please enter matching passwords"  : null  ; // code doesn't break .
            $query = "SELECT * FROM admin WHERE email = :email and fullName = :fullName " ;
            $stmt = $connect->prepare($query) ;
            $stmt->bindParam(":email", $data["email"]) ;
            $stmt->bindParam(":fullName", $data["fullName"]) ;
            $stmt->execute() ;
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
            if($stmt->rowCount() != 0){
                $userExist = "User name or Email already exist" ;  
                return $userExist ;
            }else{
                AdminFactory::createAdmin($connect, $data) ;
                return null ;
            }  
    }
    
    function signAdminIn(){
        global $connect ;
        $userData = ["email"=> $_POST["email"], "pwd" => $_POST["pwd"]] ;
        $query = "SELECT * FROM admin WHERE email = :email AND pwd = :pwd" ;
        $stmt = $connect->prepare($query) ;
        $stmt->bindParam(':email',$userData["email"]) ;
        $stmt->bindParam(':pwd',$userData["pwd"] ) ;
        $stmt->execute() ;
        $result = $stmt->fetch(PDO::FETCH_ASSOC) ;
  
        if($stmt->rowCount() > 0){
            session_start() ; 
            $_SESSION["admin"] = $result["fullName"] ;
            $_SESSION["profile"] = $result["image"] ;
            $_SESSION["phone"] = $result["phone"] ;
            $_SESSION["email"] = $result["email"] ;
            $_SESSION["admin_id"] = $result["admin_id"] ;
            header("location:http://localhost/schoolLibrary/libraryManagement/templates/adminPage.php") ;
        }else{
            return  "<h3> user not registered</h3>" ;
        }
    }

    function addBook(){
        global $connect ;
        $bookData = ["title" => $_POST["title"], "type" => $_POST["type"], "image" => $_POST["bookImage"], "publish_date" => $_POST["publish_date"]] ;
        $book1 = AdminCrud::addBook($bookData, $_SESSION["admin_id"],$connect) ;
        header("location:" .$_SERVER['PHP_SELF'] ) ;
    } 

    function fetchingBooks(){
        global $connect ;
        $admin_id = $_SESSION["admin_id"] ; 
        $bookQuery = "SELECT * FROM book WHERE admin_id = :admin_id" ;
        $stmt = $connect->prepare($bookQuery) ;
        $stmt->bindParam(':admin_id' , $admin_id) ;
        $stmt->execute() ;
        $booksData = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
        return $booksData ;
    }

    function deleteBook(){
        global $connect ;
        AdminCrud::deleteBook($_GET["id"],$connect) ;
    }

    // function updateBook($bookId){
    //     global $connect ;
    //     //$book_id = $_GET["id"] ;
    // //    $bookQuery = "SELECT * FROM book WHERE isbn = :isbn" ;
    // //     $stmt = $connect->prepare($bookQuery) ;
    // //     $stmt->bindParam(':isbn' , $book_id) ;
    // //     $stmt->execute() ;
    // //     $bookData = $stmt->fetch(PDO::FETCH_ASSOC) ;
       
    //     $bookData = ["title" => $_POST["title"], "type" => $_POST["type"], "image" => $_POST["bookImage"], "publish_date" => $_POST["publish_date"],"isbn" =>$bookId ] ;
    //     AdminCrud::upDateBook($bookData,$connect) ;
    //     //header("location:http://localhost/schoolLibrary/libraryManagement/templates/adminPage.php") ;

    // }