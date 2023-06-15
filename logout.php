<?php

// session_start();
// unset($_SESSION['user_id']);
// unset($_SESSION['unique_id']);

// header("Refresh:0.5; Url=index.php");
//header("Location: login.php");

?>
<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "database/database.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE user SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../userindex.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>