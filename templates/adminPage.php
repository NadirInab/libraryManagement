<?php
    require "navbar.php" ;
   // isConnected() ;
   //session_start() ;
?>
    <div class="container bg-dark text-secondary">
        <h3><?= "Welcome ".$_SESSION["admin"] ;  ?>  </h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia, cupiditate!</p>
        <img style="width: 100px ; height= 100px ;border-radius: 50%;" src="../images/<?= $_SESSION["profile"] ?>" alt="" > <br>
        <strong> <?= $_SESSION["phone"] ?></strong>
        <h1> <?= $_SESSION["id"] ?></h1>
    </div>
<?php
    require "footer.php" ;
?>