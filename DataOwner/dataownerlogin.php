<?php
session_start();
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Sticky Footer Navbar Template · Bootstrap</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
      
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #11c19f">
  <a class="navbar-brand" href="#">St Peters College</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="">Data user</a>
          <a class="dropdown-item" href="#">Data Owner</a>
          
        </div>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    
  </div>
</nav>
        </div>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <?php
    include '../Dbconnection/DataOwner.php';
    if(isset($_POST['login'])){
        $username=  $_POST['username'];
        $password = $_POST['password'];
        if($username=="" || $password ==""){
             echo ' <div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> Please Enter All field
  </div>';
        }else{
            
            $c1  = new DataOwner();
            if($c1->loginuser($username, $password)){
          
      header("Location: http://localhost/Misbehave/DataOwner/dataownerdashboard.php");
//die();
              // header("Location : http://localhost/Misbehave/DataOwner/dataownerdashboard.php");
            }else{
             echo ' <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> Login Failed
  </div>';
            }
        }
        
    }
    ?>
    <h1 class="mt-5" align="center">Data Owner Login</h1>
        <br>    <br>
    <div class="row justify-content-center">
        <form method="POST" action="#">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Username</label>
     <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword" name="username" placeholder="Enter username">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword"  class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
        <div class="form-group row">

    <button type="submit"  name="login" class="btn btn-success col align-self-end " style="margin: 10px;">Login</button>
   <button type="button" class="btn btn-danger col align-self-end " style="margin: 10px;">Cancel</button>
  </div>
        <div class="form-group row">

            <a href="dataownerregister.php" class="col center" align="center">New Register</a>
   </div>
</form>
      
  </div>
          
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script></body>
</html>
