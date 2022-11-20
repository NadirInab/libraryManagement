<?php 
    $userCount = usersCounter() ;
    $booksCount = BooksCounter() ;
?>
 <div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top" src="../images/books.jpg" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center text-warning"><?= $booksCount ;  ?></h4>
    </div>
</div>

<div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top" src="../images/users.png" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center text-warning"><?=  $userCount ?></h4>
    </div>
</div>



<!-- <div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top" src="../images/users.png" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center text-warning"><?=  $ITbooksCounter ?></h4>
    </div>
</div>
<div class="mx-5 card" style="width: 15rem;">
    <img class="card-img-top" src="../images/users.png" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title pt-3 mt-3 text-center text-warning"><?=  $ITbooksCounter ?></h4>
    </div>
</div> -->