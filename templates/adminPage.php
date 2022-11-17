<?php 
    // require "../index.php"  ;
    // include "../includes/autoloader.php" ;

?>
<aside class="col-">
        <?php require "aside.php"  ?>
    </aside>

    <main class="col- col-sm-3 col-md-6 col-lg-9 pt-5">
        <div class="row d-flex justify-content-around">
            <div class="col- mx-1 card" style="width: 16rem;">
                 <img src="images/pain_nu.jpg" class="card-img-top" style="height: 15rem ;" alt="...">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong>Isbn &nbsp;&nbsp;&nbsp; :</strong> </li>
                        <li class="list-group-item"> <strong>Title &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong>Type &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong> Publish-Date : </strong> </li>
                        <li class="list-group-item"> <strong> Added-at &nbsp;&nbsp;:  </strong> </li>
                    </ul>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary">update</button>
                    <button class="btn btn-danger">delete</button>
                </div>

            </div>

            <div class="col-3 mx-1 card" style="width: 18rem;">
                 <img src="images/bread.jpg" class="card-img-top" style="height: 15rem ;" alt="...">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong>Isbn &nbsp;&nbsp;&nbsp; :</strong> </li>
                        <li class="list-group-item"> <strong>Title &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong>Type &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong> Publish-Date : </strong> </li>
                        <li class="list-group-item"> <strong> Added-at &nbsp;&nbsp;:  </strong> </li>
                    </ul>
                </div>
            </div>

            <div class="col-3 card" style="width: 18rem;">
                 <img src="images/pain_nu.jpg" class="card-img-top" style="height: 15rem ;" alt="...">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong>Isbn &nbsp;&nbsp;&nbsp; :</strong> </li>
                        <li class="list-group-item"> <strong>Title &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong>Type &nbsp;&nbsp;&nbsp;:</strong> </li>
                        <li class="list-group-item"> <strong> Publish-Date : </strong> </li>
                        <li class="list-group-item"> <strong> Added-at &nbsp;&nbsp;:  </strong> </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    

<?php
    require "footer.php" ;
?>