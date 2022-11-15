<?php
    require "navbar.php" ;
    session_start() ;
?>
    <div class="container bg-dark text-secondary">
        <h3><?php echo "Welcome ".$_SESSION["admin"] ;  ?>  </h3>
    </div>
<?php
    require "footer.php" ;
?>