<?php
    include __DIR__."/../includes/autoloader.php" ;
    $connection = new DbConnection ;
    $connect = $connection->connect() ;

    function createAdmin(){
            global $connect ;
            $data = ["fullName" => $_POST["name"],"email" => $_POST["email"],"profile" => $_POST["profile"], "phone" => $_POST["phone"] ,"pwd" => $_POST["pwd"],"confirmedPwd" => $_POST["confirmedPwd"]] ; // md5
            $query = "SELECT * FROM admin WHERE email = :email and fullName = :fullName " ;
            $stmt = $connect->prepare($query) ;
            $stmt->bindParam(":email", $data["email"]) ;
            $stmt->bindParam(":fullName", $data["fullName"]) ;
            $stmt->execute() ;
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
            if($stmt->rowCount() != 0){ 
                $userExist = "Exist" ;  
                return $userExist ;
            }else{
                AdminFactory::createAdmin($connect, $data) ;
                return "Created" ;
            }  
    }
    
    function signAdminIn(){
        global $connect ;
        $userData = ["email"=> $_POST["email"], "pwd" => md5($_POST["pwd"])] ;
        $query = "SELECT * FROM admin WHERE email = :email AND pwd = :pwd" ;
        $stmt = $connect->prepare($query) ;
        $stmt->bindParam(':email',$userData["email"]) ;
        $stmt->bindParam(':pwd',$userData["pwd"]); 
        $stmt->execute() ;
        $result = $stmt->fetch(PDO::FETCH_ASSOC) ;
  
        if($stmt->rowCount() > 0){
            session_start() ; 
            $_SESSION["admin"] = $result["fullName"] ;
            $_SESSION["profile"] = $result["image"] ;
            $_SESSION["phone"] = $result["phone"] ;
            $_SESSION["email"] = $result["email"] ;
            $_SESSION["admin_id"] = $result["admin_id"] ;
            header("location: http://localhost/libraryManagement/templates/adminPage.php?&action=dashboard") ;
        }else{
            return  "notAuser" ;
        }
    }

    function addBook(){
        global $connect ;
        $bookData = ["title" => $_POST["title"], "type" => $_POST["type"], "image" => $_POST["bookImage"], "publish_date" => $_POST["publish_date"]] ;
        AdminCrud::addBook($bookData, $_SESSION["admin_id"],$connect) ; // see if book is necessary
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

    function signOut(){
        session_destroy();
        header("location: http://localhost/libraryManagement/index.php") ;
        
    }

    function usersCounter(){
        global $connect ;
        $query = "SELECT * FROM admin" ;
        $stmt = $connect->query($query) ;
        $rowCount = $stmt->rowCount() ;
        return $rowCount ;
    }
    function BooksCounter(){
        global $connect ;
        $query = "SELECT * FROM book" ;
        $stmt = $connect->query($query) ;
        $rowCount = $stmt->rowCount() ;
        return $rowCount ;
    }

    function typeCounter(){
        global $connect ;
        $query = "SELECT * FROM book WHERE type LIKE '%IT%' " ;
        $stmt = $connect->query($query) ;
        $rowCount = $stmt->rowCount() ;
        return $rowCount ;
    }
    function mystryCounter(){
        global $connect ;
        $query = "SELECT * FROM book WHERE type LIKE '%Mystery%' " ;
        $stmt = $connect->query($query) ;
        $rowCount = $stmt->rowCount() ;
        return $rowCount ;
    }

