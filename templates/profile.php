<?php 
    include "../includes/function.php" ;
    isNotSignedIn() ;
?>
<div id="profileSection" class="col-7 mx-5 pt-4">
        <div class="card p-3" >
        <div class="row g-0">
            <div class="col-md-6 border border-2 ">
                <img src="../images/<?= $_SESSION["profile"]   ?>" class="img-fluid rounded-start d-block m-auto" alt="...">
            </div>
        <div class="col-md-6">
            <div class="card-body border border-muted h-100 p-5 ">
                <h6 class="card-title p-2"> <i class="fa-solid fa-user mx-2"></i>  Name  : <strong class="text-secondary">  <?= $_SESSION["admin"] ?>  </strong>   </h6>
                <h6 class="card-title p-2"><i class="fa-solid fa-envelope mx-1"></i> Email :<strong class="text-secondary"> <?= $_SESSION["email"]   ?> </strong></h6>
                <h6 class="card-title p-2"> <i class="fa-solid fa-phone mx-2"></i>  Phone : <strong class="text-secondary ">  <?= $_SESSION["phone"]   ?></strong>  </h6>
            </div>
        </div>
        </div>
        </div>
    </div>

    <?php include "footer.php" ; ?>