<?php 
    include 'database/database.php';
    //
    if(isset($_GET['id'])){
        $id= $_GET['id'];   
    
    //For deleting data
    $sql = "DELETE FROM `carousel` WHERE `id` = '$id'";

    //executing query
    $result = $conn->query($sql);
    
    if($result == True){
        $message = 'Successfully Deleted!';

            echo "<SCRIPT> //not showing me this
                alert('$message')
                window.location.replace('carousel.php');
            </SCRIPT>";
            mysql_close();
    }else{
        echo "Error:" .$sql ."<br>" .$conn->error;
    }


    }