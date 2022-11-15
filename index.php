<?php 

    include "templates/navbar.php" ;
    include "includes/autoloader.php" ;
    function throwArray($data){
        echo "<pre>" ;
            var_dump($data) ;
        echo "</pre>" ;
    } 
    
    $connection = new DbConnection ;
    $connect = $connection->connect() ;

    if(isset($_POST["submit"])){
        $data = ["fullName" => $_POST["name"],"email" => $_POST["email"], "pwd" => $_POST["pwd"]] ;
        AdminFactory::createAdmin($connect, $data) ;
    }

    if(isset($_POST["addBook"])){
        $bookData = ["title" => $_POST["title"], "type" => $_POST["type"]] ;
        $book1 = Admin::addBook($bookData["title"], $bookData["type"],$connect) ;
    }
    if(isset($_POST["signIn"])){
        $userData = ["email"=> $_POST["email"], "pwd" => $_POST["pwd"]] ;
        $query = "SELECT * FROM admin WHERE email = :email AND pass_word = :pwd" ;
        $stmt = $connect->prepare($query) ;
        $stmt->bindParam(':email',$userData["email"]) ;
        $stmt->bindParam('pwd',$userData["pwd"] ) ;
        $stmt->execute() ;
        $result = $stmt->fetch(PDO::FETCH_ASSOC) ;
        if($stmt->rowCount() > 0){
            session_start() ; 
            $_SESSION["admin"] = "Admin :".$result["fullName"] ;
            header("location:/libraryManagement/templates/adminPage.php") ;
        }else{
            echo "<h3> user not registered</h3>" ;
        }
    }

    echo $_SERVER["DOCUMENT_ROOT"] ;

?>
     <div class="container w-50">
        <h2>Admin</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="pwd" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> 
    <hr>
    <div class="container w-50">
        <h2>add Book</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <select name="type" class="form-select" aria-label="Default select example">
                <option selected>Book type</option>
                <option value="SC">SC</option>
                <option value="Cartoon">Cartoon</option>
                <option value="IT">IT</option>
            </select>
            <button name="addBook" type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div> 
    <hr>

    <div class="container w-50">
        <h2>Sign in</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input name="pwd" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button name="signIn" type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    <?php include "templates/footer.php" ?>


    