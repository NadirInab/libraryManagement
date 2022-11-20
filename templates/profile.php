<div id="profileSection" class="col-7 mx-5 pt-4">
        <div class="card p-3" >
        <div class="row g-0">
            <div class="col-md-6 border border-2 ">
                <img src="../images/<?= $_SESSION["profile"]   ?>" class="img-fluid rounded-start d-block m-auto" alt="...">
            </div>
        <div class="col-md-6">
            <div class="card-body border border-muted h-100 p-5 ">
                <h6 class="card-title p-2"> <strong class="text-secondary">  Name  : </strong>  <?= $_SESSION["admin"]   ?> </h6>
                <h6 class="card-title p-2"> <strong class="text-secondary">  Email : </strong> <?= $_SESSION["email"]   ?></h6>
                <h6 class="card-title p-2"> <strong class="text-secondary">  Phone : </strong>  <?= $_SESSION["phone"]   ?></h6>
            </div>
        </div>
        </div>
        </div>
    </div>

    <?php include "footer.php" ; ?>