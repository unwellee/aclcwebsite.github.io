<?php 
    include 'database/database.php';
    //
    if(isset($_GET['id'])){
        $id= $_GET['id'];   
    
    $result = $conn->query("SELECT * FROM `pendingrequest` WHERE `id` = '$id'");

    if ($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $approve_id = $row['id'];
        $subject = $row['subject'];
        $announcement = $row['announcement'];
        $img = $row['img'];
        $dept = $row['dept'];
        $status = "Approved";
        $announce_date = $row['announce_date'];
        
        $sql = "INSERT INTO `announcement`(`subject`, `announcement`, `img`, `dept`, `announce_date`) 
                VALUES ('$subject', '$announcement','$img','$dept','$announce_date')";

        $sequel = "UPDATE `pendingrequest`
                SET `subject`= '$subject',`announcement`='$announcement',`img`='$img',`status`='$status',`dept`='$dept'
                WHERE `id`='$id'";

            $rslt = mysqli_query($conn, $sequel);

            $result = mysqli_query($conn, $sql);
            if($result){
                $message = 'Successfully Approved!';

                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('requestannouncement.php');
                </SCRIPT>"; 
                }else{
                    echo "<script>alert('Something Went Wrong.')</script>";
                    
                }
    
    }

    //For deleting data
    // $sql = "DELETE FROM `user` WHERE `id` = '$id'";

    // //executing query
    // $result = $conn->query($sql);
    
    // if($result == True){
    //     $message = 'Successfully Deleted!';

    //         echo "<SCRIPT> //not showing me this
    //             alert('$message')
    //             window.location.replace('register.php');
    //         </SCRIPT>";
    //         mysql_close();
    // }else{
    //     echo "Error:" .$sql ."<br>" .$conn->error;
    // }


    }