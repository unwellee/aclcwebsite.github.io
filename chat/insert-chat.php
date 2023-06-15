<?php 
  include_once "../includes/header.php";
  include_once "../database/database.php";
    if(isset($_SESSION['unique_id'])){
        include_once "database/database.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')");

            $sequel = mysqli_query($conn, "INSERT INTO notifications (incoming_notif_id, outgoing_notif_id, notif)
            VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }




?>