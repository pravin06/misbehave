<?php
include '../Dbconnection/DataOwner.php';
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
    
   
     <li class="nav-item active">
        <a class="nav-link" href="#">List Of users</a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="dataownernewfiles.php">Add Files</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Users Feedback</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0">
   <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
           <img src="<?php echo $_SESSION['profile'];?>" width="50" height="auto"/>
                </li>
      
   </ul>
           <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="#">Welcome  : <?php echo $_SESSION['email'];?> <span class="sr-only">(current)</span></a>
      </li>
           </ul>
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="logout">Logout</button>
      </form>
  </div>
</nav>
        </div>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
      <?php
     if(isset($_REQUEST['logout'])){
         header("Location: http://localhost/Misbehave/index.php");     }
      ?>
      <?php
      $cc=  new DataOwner();
      $da = $cc->allmyfiles();
      $data = 1;
      
      ?>
     <table class="table table-hover table">
         <h1 align="center"> Users Feedback</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">UserName</th>
      <th scope="col">Feedback</th>
     
    </tr>
  </thead>
  <tbody>
      <?php
      while($row =$da->fetch_assoc()){
          
      
     
      
      ?>
      <tr>
      <th scope="row"><?php echo  $data++;?></th>
      <td><?=$row['filename']?></td>
      <td><?=$row['file_title']?></td>
     
    </tr>
     <?php
      
      }
      ?>
    
   
  </tbody>
</table>
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
