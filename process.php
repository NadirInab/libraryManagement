<?php 
    session_start() ;
   include "includes/autoloader.php" ;
    $connection = new DbConnection ;
    $connect = $connection->connect() ;


    $book_id = $_GET["id"] ;
    $bookQuery = "SELECT * FROM book WHERE isbn = :isbn" ;
    $stmt = $connect->prepare($bookQuery) ;
    $stmt->bindParam(':isbn' , $book_id) ;
    $stmt->execute() ;
    $bookData = $stmt->fetch(PDO::FETCH_ASSOC) ;

    if(isset($_POST["upDateBook"])){
        $bookData = ["title" => $_POST["title"], "type" => $_POST["type"], "image" => $_POST["bookImage"], "publish_date" => $_POST["publish_date"],"isbn" =>$book_id ] ;
        AdminCrud::upDateBook($bookData,$connect) ;
        //header("location:http://localhost/schoolLibrary/libraryManagement/templates/adminPage.php") ;
    }

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

    
    <div class="container w-50 p-3 mt-5">
        <h2>upDate  Book</h2>
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
                <option  <?= ($bookData["type"] == "ST")? "selected" : "" ?> value="ST">Short Stories</option>
                <option  <?= ($bookData["type"] == "Mystery")? "selected" : "" ?> value="Mystery">Mystery</option>
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