<?php 
    define('__ABS_PATH__', "http://localhost/libraryManagement") ;
    require "navbar.php"  ;
    include "../services/adminService.php" ;
    include "../includes/function.php" ;

    isNotSignedIn() ;
    $booksData = fetchingBooks() ;

    if(isset($_POST["addBook"])){
        addBook() ;
        header("location: adminPage.php?&action=books" ) ;
    }
    if(isset($_GET["action"]) && $_GET['action'] === 'delete'){
        deleteBook() ;
        sleep(1) ;
        header("location: adminPage.php?&action=books" ) ;
    }
    if(isset($_GET["action"]) && $_GET['action'] === 'signOut'){
        signOut() ;
    }
?>
    <?php if(isConnected()) : ?>
        <aside  class="col-sm-1 col-md-2 col-lg-2">
            <h4 class="menu"><i class="fa-solid fa-bars"></i></h4>
            <div id="aside" class="container text-light">
                <div class="text-center text-dark pt-2">
                    <img class="rounded-circle w-50 h-50" src="../images/<?=  $_SESSION["profile"] ?>" alt="">
                    <h5 > Welcome <strong class="text-secondary"> <?= $_SESSION["admin"] ?> </strong> </h5>
                </div>
                <ul id="side" class="col-1 col-sm-2 col-md-2 list-group w-75">
                    <li class="list pt-2"> <a  href="adminPage.php?&action=dashboard"> <i class="fa-solid fa-house"></i> Dashboard </a> </li>
                    <li class="list pt-2"> <a  href="adminPage.php?&action=books"><i class="fa-solid fa-book"></i> Books </a> </li>
                    <li class="list pt-2"> <a  href="adminPage.php?&action=profile" class=""><i class="fa-solid fa-user"></i> Profile </a></li>
                    <li class="list pt-2"> <a  href="adminPage.php?&action=addBook"><i class="fa-solid fa-plus"></i> addBook</a></li>
                    <li class="list pt-2"> <a  href="adminPage.php?&action=signOut"> <i class="fa-solid fa-right-from-bracket"></i> Sign Out</a> </li>
                </ul>
            </div>
        </aside> 

        <?php
          if(isset($_GET['action']) AND $_GET["action"] === "profile"){
             require "profile.php" ;
             die() ;
            }
        ?>

        <?php
            if(isset($_GET['action']) AND $_GET["action"] === "dashboard"){
                require "dashboard.php" ;
            }
        ?>
        
        <?php if(isset($_GET['action']) AND $_GET["action"] === "books") :?>
            <main class="col- col-sm-3 col-md-5 col-lg-10 pt-5">
                <div class="row d-flex justify-content-around">
                <?php foreach($booksData as $book) : ?>
                    <div id="cardData" class="col-sm-1 col-md-3 mx-1 card mt-3" style="width: 18rem;">
                        <img id="bookImg" src="../images/<?= $book["image"] ?>" class="card-img-top" style="height: 15rem ;" alt="...">
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
                            <button class="btn btn-warning "><a href="../process.php?id=<?=$book["isbn"]?>">update </a>  </button>
                            <button name="delete" value="delete" class="btn btn-danger text-dark"><a href="adminPage.php?id=<?=$book["isbn"]?>&action=delete">delete </a>  </button>
                        </div>
                    </div>
                    <?php endforeach ;  ?>
                    </div>  
            </main>
        <?php endif ;  ?>
 

        <?php if(isset($_GET['action']) AND $_GET["action"] === "addBook") :?>
        <div class="container w-50 pb-5">
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
                    <option value="FN">fantasy Novel</option>
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
        </div>  

        <?php elseif(isset($_GET['action']) AND $_GET["action"] === "upDateBook") : ?>
        
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
                    <option <?= ($bookData["type"] == "FN")? "selected" : "" ?> value="FN">FN</option>
                    <option <?= ($bookData["type"] == "Cartoon")? "selected" : "" ?> value="Cartoon">Cartoon</option>
                    <option  <?= ($bookData["type"] == "IT")? "selected" : "" ?> value="IT">IT</option>
                    <option  <?= ($bookData["type"] == "ST")? "selected" : "" ?> value="ST">Short Stories</option>
                    <option  <?= ($bookData["type"] == "Mystery")? "selected" : "" ?> value="Mystery">Mystery</option>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Book Image</label>
                    <input  name="bookImage" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button name="upDateBook" type="submit" class="btn btn-primary mt-2">  Submit</button>
            </form>
        </div> 
        <?php endif ;  ?>

    <?php endif ; ?>

    <?php require "footer.php" ; ?>
