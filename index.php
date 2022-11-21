<?php 
    include __DIR__."/services/adminService.php" ;
    include "includes/function.php" ;

    $userExist = null ;
    $pwdError = null ;
    $notRegistered = null ;
    
    if(isset($_POST["submit"])){
        $userExist = createAdmin() ;
        // header("location :http://localhost/schoolLibrary/libraryManagement/index.php") ;
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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>YouCode Library</title>
</head>
<body class="row">
    <?php if(!isConnected()) : ?>
    <nav class="navbar navbar-expand-lg bg-dark bg-muted">
        <div class="container-fluid">
        <div class="mx-5">
        <img id="logo" src="images/theLogo.png" alt=""> 
            <span class="navbar-brand fw-bold text-white " href="#">Library Management</span>
        </div>
    </div>
    </nav>
    <?php else : ?>
        <nav class="navbar navbar-expand-lg bg-dark bg-muted">
            <div class="container-fluid">
                <div class="mx-5">
                    <img id="logo" src="images/theLogo.png" alt=""> 
                    <span class="navbar-brand fw-bold text-white " href="#">Library Management</span>
                </div>
            </div>
        </nav>
    <?php endif ; ?>

    <?= ($notRegistered) ? $notRegistered : null ;   ?>
    <section id="signUpForm" class="row col-10 m-5">
    <div  id="form" class="col-xs-12 col-sm-10 col-md-5 col-lg-6 container w-50 border border-2 pb-3">
    <h4 class="text-center ">Sign Up </h4>
        <?php if($userExist) : ?>
        <div class="alert alert-danger">
            <?= $userExist ?>
        </div>
        <?php endif ;  ?>
        <form style="font-size: 1.2vw;" method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
            <div class="mb-3 col-">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input name="name" type="text" class="form-control input-group input-group-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address <i class="fa-solid fa-circle-envelope"></i></label>
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
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input name="confirmedPwd" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <?php if($pwdError) :  ?>
                <div class="alert alert-danger"><?= $pwdError ?></div>
            <?php endif ; ?>
            <button name="submit" type="submit" class="btn btn-primary">Sign Up</button>
            <span  class="text-muted ">Already Sign Up ? <a class="text-primary" id="signInLink" >Sign In</a> </span>
        </form>
    </div> 
    <img id="img"  class="d-none d-md-inline col-md-4 col-lg-4" src="images/Bibliophile.gif" alt="">
    </section> 

    <div id="signInForm" class="container w-50">
        <h2 class="text-center ">Sign In</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <div class="mb-3 w-75 ">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-75">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input name="pwd" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button name="signIn" type="submit" class="btn btn-primary mt-2">Sign In</button>
            <span  class="text-muted ">Don't have an account ? <a class="text-primary" id="singUp12" >Sign Up</a> </span>

            
        </form>
    </div> 
   
    
    <?php include "templates/footer.php" ?>


    