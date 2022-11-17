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
        $book1 = Admin::addBook($bookData["title"], $bookData["type"],$bookData["image"], $bookData["publish_date"], $_SESSION["Admin_id"] ,$connect) ;
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
            $_SESSION["admin_id"] = $result["admin_id"] ;
            header("location:/libraryManagement/templates/adminPage.php") ;
        }else{
            echo "<h3> user not registered</h3>" ;
        }
    }
?>

    <aside class="col- col-sm-1 col-md-2 col-lg-3 ">
        <?php require "aside.php"  ?>
    </aside>

    <main class="col- col-sm-3 col-md-6 col-lg-9 pt-5">
        <div class="row d-flex justify-content-around">
            <div class="col-3 mx-1 card" style="width: 18rem;">
                 <img src="images/pain_nu.jpg" class="card-img-top pt-2 " style="height: 15rem ;" alt="...">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong>Isbn &nbsp;&nbsp;&nbsp; :</strong> </li>
                        <li class="list-group-item"> <strong>Title &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong>Type &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong> Publish-Date : </strong> </li>
                        <li class="list-group-item"> <strong> Added-at &nbsp;&nbsp;:  </strong> </li>
                    </ul>
                </div>
            <div class="card-body">
                <button class="btn btn-primary">update</button>
                <button class="btn btn-danger">delete</button>
            </div>

            </div>

            <div class="col-3 mx-1 card" style="width: 18rem;">
                 <img src="images/bread.jpg" class="card-img-top" style="height: 15rem ;" alt="...">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong>Isbn &nbsp;&nbsp;&nbsp; :</strong> </li>
                        <li class="list-group-item"> <strong>Title &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong>Type &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong> Publish-Date : </strong> </li>
                        <li class="list-group-item"> <strong> Added-at &nbsp;&nbsp;:  </strong> </li>
                    </ul>
                </div>
            </div>

            <div class="col-3 card" style="width: 18rem;">
                 <img src="images/pain_nu.jpg" class="card-img-top" style="height: 15rem ;" alt="...">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong>Isbn &nbsp;&nbsp;&nbsp; :</strong> </li>
                        <li class="list-group-item"> <strong>Title &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong>Type &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong> Publish-Date : </strong> </li>
                        <li class="list-group-item"> <strong> Added-at &nbsp;&nbsp;:  </strong> </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>


    <!-- =========================================================== -->
    <!-- <div class="col-8 pt-4">
        <div class="card p-3" >
        <div class="row g-0">
            <div class="col-md-6 border border-2 ">
                <img src="images/user.png" class="img-fluid rounded-start d-block m-auto" alt="...">
            </div>
        <div class="col-md-6">
            <div class="card-body border border-muted h-100">
                <h5 class="card-title p-2">Name  : </h5>
                <h5 class="card-title p-2">Email :</h5>
                <h5 class="card-title p-2">Phone :</h5>
                <h5 class="card-title p-2">data  :</h5>
            </div>
        </div>
        </div>
        </div>
    </div> -->

    <!-- =============================================================== -->

    <section class="col-8">
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
        <h2>add Book</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Publish Date</label>
                <input name="date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <select name="type" class="form-select" aria-label="Default select example">
                <option selected>Book type</option>
                <option value="SC">SC</option>
                <option value="Cartoon">Cartoon</option>
                <option value="IT">IT</option>
            </select>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Book Image</label>
                <input name="bookImage" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button name="addBook" type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div> 
    <hr> 



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
    </section> 
    


    
    <?php include "templates/footer.php" ?>


    