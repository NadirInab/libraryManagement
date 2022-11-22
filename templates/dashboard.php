<?php 
    //include "../includes/function.php" ;
    isNotSignedIn() ;
    $userCount = usersCounter() ;
    $booksCount = BooksCounter() ;
    $fictionCounter = typeCounter() ;
?>
 <div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top h-75" src="../images/books.jpg" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center text-muted">Total of Books : <strong class="fw-bold text-warning">  <?= $booksCount ;  ?> </strong> </h4>
    </div>
</div>

<div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top" src="../images/users.png" alt="Card image cap">
    <div class="card-body mt-5">
        <h4 class="card-title pt-3 mt-3 text-center text-muted">Total of Users <br> <strong class="fw-bold text-warning"> <?=  $userCount ?> </strong>  </h4>
    </div>
</div>



 <div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top" src="../images/codingBooks.webp" alt="Card image cap">
    <div class="card-body mt-4">
        <h4 class="card-title pt-3 mt-3 text-center text-muted">Total of IT Books <br> <strong class="fw-bold text-warning"> <?=  $fictionCounter ?> </strong></h4>
    </div>
</div>

