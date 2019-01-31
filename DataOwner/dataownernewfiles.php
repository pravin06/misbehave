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
          <a class="nav-link" href="dataownerdashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
    
   
     <li class="nav-item active">
        <a class="nav-link" href="#">List Of users</a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="dataownernewfiles.php">Add Files</a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="dataowneruserfeedback.php">Users Feedback</a>
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
      <br>
<?php
include '../Dbconnection/DataOwner.php';
if(isset($_POST["upload"])){
    $filename = $_POST['file_name'];
     $file_title = $_POST['file_title'];
      $file_date= $_POST['file_date'];
       $file_desc = $_POST['file_desc'];
        $location = $_POST['location'];
       $user =  $_SESSION['email'];
$c1 = new DataOwner();
$c1->newfileupload();
$cc = $c1->fileregister($filename, $file_title, $file_date, $file_desc, $location,$user);
    if($cc){
        echo ' <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> new File Uplaoded Success
  </div>';
    }   else{
        echo ' <div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Failed!</strong> File Not Uploaded
  </div>';
    } 
 
}
?> 
    <h1 class="mt-5" align="center">New File Upload</h1>
        <br>    <br>
        <div class="row">
    <div class="col-3">
   
    </div>
    <div class="col-6">
        <form method="POST" action="#" role="form" enctype="multipart/form-data">
    
  <div class="form-group">
    <label for="formGroupExampleInput">File Name</label>
    <input type="text" class="form-control" name="file_name" id="formGroupExampleInput" placeholder="File Name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Title</label>
    <input type="text" class="form-control" name="file_title" id="formGroupExampleInput2" placeholder="Enter the Title">
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Date</label>
    <input type="date" class="form-control" name="file_date" id="formGroupExampleInput2" placeholder="Date">
  </div>
     <div class="form-group">
    <label for="formGroupExampleInput2">Description</label>
    <input type="text" class="form-control" name="file_desc" id="formGroupExampleInput2" placeholder="Enter Description">
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Location</label>
    <input type="text" class="form-control" name="location" id="formGroupExampleInput2" placeholder="Enter Location">
  </div>
    <div class="form-group">
    <label for="formGroupExampleInput2">File</label>
    <input type="file" class="form-control" name="pdf_file" id="pdf_file"  placeholder="Description">
  </div>
    <button type="submit" name="upload" class="btn btn-success">Upload</button>
</form>
    </div>
    <div class="col-3">
        <img src="../file.png" width="100%" height="500"/>
    </div>
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
