<?php 
    require "navbar.php"  ;
    //include "../includes/autoloader.php" ;
    include "../includes/function.php" ;
    require "../classes/Admin.php" ;
    require "../classes/Dbconnection.php" ;
    require "../classes/Book.php" ;
    $connection = new DbConnection ;
    $connect = $connection->connect() ;

    $admin_id = $_SESSION["admin_id"] ; 
    //======== FTCHING BOOKS
    $bookQuery = "SELECT * FROM book WHERE admin_id = :admin_id" ;
    $stmt = $connect->prepare($bookQuery) ;
    $stmt->bindParam(':admin_id' , $admin_id) ;
    $stmt->execute() ;
    $booksData = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

    // +++++
    // adding book //
    if(isset($_POST["addBook"])){
        $bookData = ["title" => $_POST["title"], "type" => $_POST["type"], "image" => $_POST["bookImage"], "publish_date" => $_POST["publish_date"]] ;
        $book1 = Admin::addBook($bookData["title"], $bookData["type"],$bookData["image"], $bookData["publish_date"], $_SESSION["admin_id"],$connect) ;
    }

    // if($_GET['action'] === 'delete'){
    //     echo "delete is here" ;
    //     Admin::deleteBook($_GET["id"],$connect) ;
    //    // header("Refresh:0");
    // }

    // =============================

?>
    <aside class="col-sm-1 col-md-2 col-lg-2">
        <div id="aside" class="container text-light">
            <div class="text-center pt-2">
                <img class="rounded-circle w-50 h-50" src="../images/<?=  $_SESSION["profile"] ?>" alt="">
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

        <div class="col-7 mx-5 pt-4">
        <div class="card p-3" >
        <div class="row g-0">
            <div class="col-md-6 border border-2 ">
                <img src="../images/<?= $_SESSION["profile"]   ?>" class="img-fluid rounded-start d-block m-auto" alt="...">
            </div>
        <div class="col-md-6">
            <div class="card-body border border-muted h-100">
                <h5 class="card-title p-2">Name  :<?= $_SESSION["admin"]   ?> </h5>
                <h5 class="card-title p-2">Email :<?= $_SESSION["email"]   ?></h5>
                <h5 class="card-title p-2">Phone :<?= $_SESSION["phone"]   ?></h5>
            </div>
        </div>
        </div>
        </div>
    </div>
    <main class="col- col-sm-3 col-md-6 col-lg-9 pt-5">
        <div class="row d-flex justify-content-around">
        <?php foreach($booksData as $book) : ?>
            <div class="col- mx-1 card" style="width: 16rem;">
                 <img src="../images/<?= $book["image"] ?>" class="card-img-top" style="height: 15rem ;" alt="...">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong>Isbn &nbsp;&nbsp;&nbsp; :</strong> <?= $book["isbn"] ?> </li>
                        <li class="list-group-item"> <strong>Title &nbsp;&nbsp;&nbsp;:</strong> <?= $book["title"] ?> </li>
                        <li class="list-group-item"> <strong>Type &nbsp;&nbsp;&nbsp;:</strong> <?= $book["type"] ?> </li>
                        <li class="list-group-item"> <strong> Publish-Date : </strong> <?= $book["publish_date"] ?> </li>
                        <li class="list-group-item"> <strong> Added-at &nbsp;&nbsp;:  </strong> <?= $book["add_at"] ?> </li>
                    </ul>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary"><a href="../process.php?id=<?=$book["isbn"]?>">update </a>  </button>
                    <button name="delete" value="delete" class="btn btn-danger"><a href="adminPage.php?id=<?=$book["isbn"]?>&action=delete">delete </a>  </button>
                </div>

            </div>
            <?php endforeach ;  ?>
            </div>  
    </main>

    
    <div class="container w-50">
        <h2>add Book</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Publish Date</label>
                <input name="publish_date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
            <button name="addBook" type="submit" class="btn btn-primary mt-2">  Submit</button>
        </form>
    </div>  -->


    <!-- <hr>
        <div class="col-8 pt-4">
        <div class="card p-3" >
        <div class="row g-0">
            <div class="col-md-6 border border-2 ">
                <img src="../images/<?= $_SESSION["profile"]   ?>" class="img-fluid rounded-start d-block m-auto" alt="...">
            </div>
        <div class="col-md-6">
            <div class="card-body border border-muted h-100">
                <h5 class="card-title p-2">Name  :<?= $_SESSION["admin"]   ?> </h5>
                <h5 class="card-title p-2">Email :<?= $_SESSION["email"]   ?></h5>
                <h5 class="card-title p-2">Phone :<?= $_SESSION["phone"]   ?></h5>
            </div>
        </div>
        </div>
        </div>
    </div>
<?php
    require "footer.php" ;
?>