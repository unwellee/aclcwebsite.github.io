<?php
   include_once "../includes/header.php";
   include_once "../database/database.php";
   $outgoing_id = "321123222";
   if($_SESSION['unique_id'] == $outgoing_id){
    $sql = "SELECT * FROM user WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output; 
   }else{
    $outgoing_id = "321123222";
    $sql = "SELECT * FROM user WHERE unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }else if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
   }
?>