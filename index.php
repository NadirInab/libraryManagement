<?php 
    include "templates/navbar.php" ;
    include "includes/autoloader.php" ;
    include "includes/function.php" ;

    $userExist = null ;
    $pwdError = null ;

    $connection = new DbConnection ;
    $connect = $connection->connect() ;
    if(isset($_POST["submit"])){
        $data = ["fullName" => $_POST["name"],"email" => $_POST["email"],"profile" => $_POST["profile"], "phone" => $_POST["phone"] ,"pwd" => $_POST["pwd"],"confirmedPwd" => $_POST["confirmedPwd"]] ;
        //$userExist = Admin::authenticateUser($data, $connect) ;
        // ===================> method in admin . 
        (!pwdIsConfirmed($data["pwd"], $data["confirmedPwd"])) ? $pwdError = "Please enter matching passwords"  : null  ; // code doesn't break .
        $query = "SELECT * FROM admin WHERE email = :email and fullName = :fullName " ;
        $stmt = $connect->prepare($query) ;
        $stmt->bindParam(":email", $data["email"]) ;
        $stmt->bindParam(":fullName", $data["fullName"]) ;
        $stmt->execute() ;
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
        if($stmt->rowCount() != 0){
            $userExist = "User name or Email already exist" ;  
        }else{
            AdminFactory::createAdmin($connect, $data) ;
        }  
        // ==================== 

        //AdminFactory::createAdmin($connect, $data) ;
    }

    if(isset($_POST["addBook"])){
        $bookData = ["title" => $_POST["title"], "type" => $_POST["type"], "image" => $_POST["image"], "publish_date" =>$_POST["publish_date"]] ;
        $book1 = Admin::addBook($bookData["title"], $bookData["type"],$bookData["image"], $bookData["publish_date"],$connect) ;
    }
    
    if(isset($_POST["signIn"])){
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
            $_SESSION["id"] = $result["id"] ;
            header("location:/libraryManagement/templates/adminPage.php") ;
        }else{
            echo "<h3> user not registered</h3>" ;
        }
    }
?>


     <div class="container w-50">
        <h2>Admin</h2>
        <?php if($userExist) : ?>
        <div class="alert alert-danger">
            <?= $userExist ?>
        </div>
        <?php endif ;  ?>
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
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input name="phone" type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="06-12-33-45-67">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input name="profile" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="pwd" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="confirmedPwd" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <?php if($pwdError) :  ?>
                <div class="alert alert-danger"><?= $pwdError ?></div>
            <?php endif ; ?>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> 

     <hr>
     <div class="container w-50">
        <?php if(!isConnected()) : ?>
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
        <?php endif ; ?>



    <div class="container w-50">
        <h2>Sign in</h2>
        <!--<form method="POST" action="./templates/adminPage.php"> -->
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
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


    