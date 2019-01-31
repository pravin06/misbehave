<?php


include '../Dbconnection/Dbconn.php';
class DataOwner extends Dbconn {
    //put your code here
    public $conn;
    public $filename;
    public $profilepic;
  
    function __construct()
    {
        $c1=  new Dbconn();
         $this ->conn =  $c1->connect();

    }
    
function insertuser($username,$password,$email,$mobile,$address,$dob,$gender){
     $boo = FALSE;
     if($this->fileupload()){
         $sql = "INSERT INTO `ownertable`( `username`, `password`, `email`, `mobile`, `address`, `dob`, `gender`, `propath`) VALUES ('".$username."','".$password."','".$email."','".$mobile."','".$address."','".$dob."','".$gender."','".$this->profilepic."')";
    if ($this ->conn->query($sql) === TRUE) {
   
      return true;
} else {
    echo "Error: " . $sql . "<br>" . $this ->conn->error;
      return false;
}
     }
    

}
function loginuser($username,$password){
    $sql = "SELECT * FROM ownertable WHERE username = '".$username."' AND password= '".$password."'";
    $result = $this ->conn->query($sql);
    if ($result->num_rows>0) {
   $row = $result->fetch_assoc();
   echo  $row['username'];
         $_SESSION['ownername'] = $row['username'];    
         $_SESSION['email'] = $row['email'];
                  $_SESSION['mobile'] = $row['mobile'];

                           $_SESSION['address'] = $row['address'];
                           $_SESSION['profile'] =$row['propath'];


      return true;
} else {
    echo "Error: " . $sql . "<br>" . $this ->conn->error;
      return false;
}
    
}
function fileupload(){
     
    
   $target_dir = "../profilepics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    return false;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
     return false;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
     return false;
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $this->profilepic = "http://localhost/Misbehave/profilepics/".$_FILES["fileToUpload"]["name"];
        return true;
    } else {
        echo "Sorry, there was an error uploading your file.";
        return false;
    }
}
    
}
function newfileupload(){
     $allowedExts = array("pdf","docx");
$temp = explode(".", $_FILES["pdf_file"]["name"]);
$extension = end($temp);
$filepath = "../files/";
$upload_pdf=$_FILES["pdf_file"]["name"];
 if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"],$filepath . $_FILES["pdf_file"]["name"])){
   
     $this->filename = "http://localhost/Misbehave/files/".$_FILES["pdf_file"]["name"];
echo  $this->filename;
return true;
 }else{
     
     return true;
 }

}
function fileregister($filename,$filetitle,$filedate,$filedesc,$location,$user){
    $key ="1234";
 if($this->newfileupload()){
    $sql = "INSERT INTO `filedata`(`filename`, `file_title`, `file_date`, `file_description`, `location`, `file_path`, `file_user`, `file_key`) VALUES ('".$filename."','".$filetitle."','".$filedate."','".$filedesc."','".$location."','".$this->filename."','".$user."','".$key."')";
    if ($this ->conn->query($sql) === TRUE) {

      return true;
} else {
    echo "Error: " . $sql . "<br>" . $this ->conn->error;
      return false;
}
     
 }
    
    
}
function allmyfiles(){
    $sql = "SELECT * FROM filedata";
     $result = $this ->conn->query($sql);
     return $result;
}

function filterquery(){
    $query = "eyeopen";
    $sql = "SELECT * FROM filedata WHERE file_title LIKE '". $query."' OR file_description LIKE '". $query ."'";
    $result = $this ->conn->query($sql);
     return $result;
}

}

