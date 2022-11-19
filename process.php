<?php 
    // require "classes/Admin.php" ;
    // require "classes/Dbconnection.php" ;
    // require "classes/Book.php" ;
    session_start() ;
    include "includes/autoloader.php" ;
    $connection = new DbConnection ;
    $connect = $connection->connect() ;

    $book_id = $_GET["id"] ;
    $admin_id = $_SESSION["admin_id"] ; 
    //======== FTCHING BOOKS
   $bookQuery = "SELECT * FROM book WHERE isbn = :isbn" ;
    $stmt = $connect->prepare($bookQuery) ;
    $stmt->bindParam(':isbn' , $book_id) ;
    $stmt->execute() ;
    $bookData = $stmt->fetch(PDO::FETCH_ASSOC) ;
    // var_dump($bookData) ;
    if(isset($_POST["upDateBook"])){
        $bookData = ["title" => $_POST["title"], "type" => $_POST["type"], "image" => $_POST["bookImage"], "publish_date" => $_POST["publish_date"],"isbn" =>$book_id ] ;
        Admin::upDateBook($bookData,$connect) ;
        //header("location:http://localhost/schoolLibrary/libraryManagement/templates/adminPage.php") ;
    }


    // if($_GET['action'] === 'delete'){
    //     echo "delete is here" ;
    //     Admin::deleteBook($_GET["id"],$connect) ;
    //    // header("Refresh:0");
    // }

    // =============================

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>YouCode Library</title>
</head>
<body class="row">
<nav class="navbar navbar-expand-lg bg-dark bg-muted">
    <div class="container">
      <div>
      <img id="logo" src="images/YouCode.png" alt=""> 
        <span class="navbar-brand fw-bold" href="#">Library Management</span>
      </div>
      <button class="btn btn-primary float-right">
        Sign out
      </button>
  </div>
</nav>
    <aside class="col-md-2 col-lg-2">
        <div id="aside" class="container text-light">
            <div class="text-center pt-2">
                <img class="rounded-circle w-50 h-50" src="images/<?=  $_SESSION["profile"] ?>" alt="">
                <h4>Welcome <?= $_SESSION["admin"] ?></h4>
            </div>
            <ul class="list-group w-75">
                <li class="list-group-item"> <a class="text-decoration-none fw-bold" href="#"> Profile </a> </li>
                <li class="list-group-item"> <a class="text-decoration-none fw-bold"  href="#"> Dashboard </a> </li>
                <li class="list-group-item"> <a class="text-decoration-none fw-bold"  href="#"> Books </a> </li>
                <li class="list-group-item"> <a class="text-decoration-none fw-bold"  href="#"> Users </a> </li>
                <li class="list-group-item"> <a class="text-decoration-none fw-bold"  href="#"> statistics </a> </li>
            </ul>
            
        </div>
    
    </aside>
    
    <div class="container w-50">
        <h2>add Book</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name="title" type="text" value="<?= $bookData['title'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Publish Date</label>
                <input name="publish_date" value="<?= $bookData['publish_date'] ?>" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <select name="type" class="form-select" aria-label="Default select example">
                <option  selected>Book type</option>
                <option <?= ($bookData["type"] == "SC")? "selected" : "" ?> value="SC">SC</option>
                <option <?= ($bookData["type"] == "Cartoon")? "selected" : "" ?> value="Cartoon">Cartoon</option>
                <option  <?= ($bookData["type"] == "IT")? "selected" : "" ?> value="IT">IT</option>
            </select>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Book Image</label>
                <input name="bookImage" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button name="upDateBook" type="submit" class="btn btn-primary mt-2">  Submit</button>
        </form>
    </div> 
<?php
    require "templates/footer.php" ;
?>