<?php

//database variables
$host = 'localhost';
$user = 'root';
$password = '';
$database = "aclcapalit";
    //connecting to database
    $conn = mysqli_connect($host, $user, $password, $database);

    if (!$conn){
        die("Connection Failed:" . mysqli_connect_error());
    }
   
    
    
?>