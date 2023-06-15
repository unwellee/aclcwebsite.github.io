<?php include 'database/database.php';
    //
    if(isset($_GET['id'])){
        $id= $_GET['id'];   
    
    //For deleting data
    $sql = "DELETE FROM `notifications` WHERE `notif_id` = '$id'";

    //executing query
    $result = $conn->query($sql);
    
    if($result == True){
        header("location: contact.php");
    }else{
        echo "Error:" .$sql ."<br>" .$conn->error;
    }


    }
?>