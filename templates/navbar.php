<?php
  require "header.php" ;
  session_start() ;
  //require "../includes/function.php" ; 
 ?>
<nav class="navbar navbar-expand-lg bg-secondary">
  <?php if(isset($_SESSION["admin"])) :  ?>
  <div class="container d-flex ">
    <a class="navbar-brand fw-bold" href="#">Library Management</a>
  </div>
  <?php else : ?>
    <div class="container d-flex ">
    <a class="navbar-brand fw-bold" href="#">Library Management</a>
      <button class="btn btn-primary float-right">
        Sign out
      </button>
  </div>
  <?php endif ; ?>
</nav>