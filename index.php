<?php 
    include "services/adminService.php" ;
    include "includes/function.php" ;

    $userExist = null ;
    $pwdError = null ;
    $notRegistered = null ;
    
    if(isset($_POST["submit"])){
        $userExist = createAdmin() ;
    }
    if(isset($_POST["signIn"])){
        $notRegistered = signAdminIn() ;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>YouCode Library</title>
</head>
<body class="row">
<nav class="navbar navbar-expand-lg bg-dark bg-muted">
    <div class="container">
      <div>
      <img id="logo" src="images/YouCode.png" alt=""> 
        <span class="navbar-brand fw-bold" href="#">Library Managemkent</span>
      </div>
      <button class="btn btn-primary float-right">
        Sign out
      </button>
  </div>
</nav>
    <?= ($notRegistered) ? $notRegistered : null ;   ?>
    <section class="col-8">
    <div class="container w-50">
        <h2>Admin</h2>
        <?php if($userExist) : ?>
        <div class="alert alert-danger">
            <?= $userExist ?>
        </div>
        <?php endif ;  ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input name="phone" type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="06-12-33-45-67">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input name="profile" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="pwd" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="confirmedPwd" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <?php if($pwdError) :  ?>
                <div class="alert alert-danger"><?= $pwdError ?></div>
            <?php endif ; ?>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> 


     <hr>
     <div class="container w-50">
        <h2>add Book</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Publish Date</label>
                <input name="date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <select name="type" class="form-select" aria-label="Default select example">
                <option selected>Book type</option>
                <option value="SC">SC</option>
                <option value="Cartoon">Cartoon</option>
                <option value="IT">IT</option>
            </select>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Book Image</label>
                <input name="bookImage" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button name="addBook" type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div> 
    <hr> 



    <div class="container w-50">
        <h2>Sign in</h2>
        <!--<form method="POST" action="./templates/adminPage.php"> -->
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input name="pwd" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button name="signIn" type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    </section> 
    
    <?php include "templates/footer.php" ?>


    