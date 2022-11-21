<?php 
    $userCount = usersCounter() ;
    $booksCount = BooksCounter() ;
    $fictionCounter = typeCounter() ;
?>
 <div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top h-75" src="../images/books.jpg" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center text-warning">Total of Books : <?= $booksCount ;  ?></h4>
    </div>
</div>

<div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top" src="../images/users.png" alt="Card image cap">
    <div class="card-body mt-5">
        <h4 class="card-title pt-3 mt-3 text-center text-warning">Total of Users <br><?=  $userCount ?></h4>
    </div>
</div>



 <div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top" src="../images/ITbooks.webp" alt="Card image cap">
    <div class="card-body mt-4">
        <h4 class="card-title pt-3 mt-3 text-center text-warning">Total of IT Books <br><?=  $fictionCounter ?></h4>
    </div>
</div>

