<?php 
    require "navbar.php"  ;
    include "../services/adminService.php" ;
    include "../includes/function.php" ;

    $booksData = fetchingBooks() ;

    if(isset($_GET["action"])&& $_GET['action'] === 'delete'){
        deleteBook() ;
        sleep(1) ;
        header("location:" .$_SERVER['PHP_SELF'] ) ;
    }
    if(isset($_POST["addBook"])){
        addBook() ;
    }

?>
    <aside class="col-sm-1 col-md-2 col-lg-2">
        <div id="aside" class="container text-light">
            <div class="text-center text-dark pt-2">
                <img class="rounded-circle w-50 h-50" src="../images/<?=  $_SESSION["profile"] ?>" alt="">
                <h4>Welcome <?= $_SESSION["admin"] ?></h4>
            </div>
            <ul id="side" class="list-group w-75">
                <li class="list "> <i class="fa-solid fa-user-vneck"></i> <a class=""> Profile </a> </li>
                <li class="list"> <a class=""  href="#"> Dashboard </a> </li>
                <li class="list"> <a class=""  href="#"> Books </a> </li>
                <li class="list"> <a class=""  href="#"> Users </a> </li>
                <li class="list"> <a class=""  href="#"> statistics </a> </li>
            </ul>
        </div>
    </aside> 
        <?php //require "profile.php" ?>
    <main class="col- col-sm-3 col-md-6 col-lg-10 pt-5">
        <div class="row d-flex justify-content-around">
        <?php foreach($booksData as $book) : ?>
            <div class="col- mx-1 card mt-3" style="width: 18rem;">
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
                    <button name="delete" value="delete" class="btn btn-danger text-dark"><a href="adminPage.php?id=<?=$book["isbn"]?>&action=delete">delete </a>  </button>
                </div>
            </div>
            <?php endforeach ;  ?>
            </div>  
    </main>

    
    <!-- <div class="container w-50 pb-5">
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
                <option value="SC">Science fitction</option>
                <option value="Mystery">Mystery</option>
                <option value="IT">IT</option>
                <option value="ST">Biographie</option>
            </select>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Book Image</label>
                <input name="bookImage" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button name="addBook" type="submit" class="btn btn-primary mt-2">  Submit</button>
        </form>
    </div>   -->
<?php
    require "footer.php" ;
?>

<!-- just display -->