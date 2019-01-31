<?php
class Dbconn {
    public  $servername="localhost";
    public $username ="root";
    public $password="";
    public $db ="misbehave";
    public $conn;
    function __construct() {
        $this->connect();
    }
            function connect(){
                $this->con = mysqli_connect("$this->servername","$this->username","$this->password","$this->db");
                if($this->con){
              
                }else{
                    echo 'not connected';
                }
                return $this->con;
       
   }
   
}



  