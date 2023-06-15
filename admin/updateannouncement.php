<?php
   include 'includes/header.php';
   include 'includes/navbar.php';
   

   //for updating the value
   if (isset($_GET['id'])){
    $id = $_GET['id'];
   if(isset($_POST['announcebtn'])){
        $subject = $_POST['subject'];
        $announcement = $_POST['announcement'];
        $department = ($_POST['posOption']);
        $image = ($_POST['image']);
        $id = $_GET['id'];
        
        //query update
        
        $sql = "UPDATE `announcement`
                SET `subject`= '$subject',`announcement`='$announcement',`img`='$image',`dept`='$department'
                WHERE `id`='$id'";

        //executing the query
        $result = $conn->query($sql);
        // $result = mysqli_query($conn, $sql);
        if ($result == TRUE){
            $message = 'Successfully Updated!';

            echo "<SCRIPT> //not showing me this
                alert('$message')
                window.location.replace('announcement.php');
            </SCRIPT>";
                mysql_close();
        }else{
            echo "Error:" .$sql ."<br>" .$conn->error;
        }
    }
   }

   //for fetching the value of each row using $id
   if (isset($_GET['id'])){
    
    $id = $_GET['id'];
    $rcd = "SELECT * FROM `announcement` WHERE `id` = '$id'";

    $result = $conn->query($rcd);

    if($result->num_rows >0){

        while($row = $result->fetch_assoc()){
            $subject = $row['subject'];
            $announcement = $row['announcement'];
            $dept = $row['dept'];
            $img = $row['img'];
            $id = $row['id'];
        }
?>

<div class="container-fluid w-50">
        <h2>Fill Up Form</h2> 
        <form action="" method="POST">
                    <div class="form-group pt-2">
                        <label> Announcement Name </label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter Announcement Name" value="<?php echo $subject ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Announcement</label>
                        <input type="text" name="announcement" class="form-control" placeholder="Enter Announcement Details" value="<?php echo $announcement ?>" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label> Image </label>
                        <input type="file" name="image" class="" value="<?php echo $img?>">
                    </div>
                    <div class="col">
                        <label>Department</label>
                        <select id="inputState" name="posOption" class="form-control" required>
                            <option selected>Choose...</option>
                            <option class="" value="BSIT" <?php if($dept == 'BSIT'){echo "selected";} ?>>BSIT</option>
                            <option class="" value="BSBA" <?php if($dept == 'BSBA'){echo "selected";} ?>>BSBA</option>
                            <option class="" value="BSTM" <?php if($dept == 'BSTM'){echo "selected";} ?>>BSTM</option>
                            <option class="" value="GENERAL" <?php if($dept == 'GENERAL'){echo "selected";} ?>>GENERAL</option>
                        </select>     
                    </div>
                    </div>
                    
                    <div class="row pt-4">
                        <div class="m-3">
                            <a href="announcement.php" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="m-3">
                    <button type="submit" name="announcebtn" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
            </form>
            </div>
            </div>

            <?php

}

}

?>

<?php include 'includes/script.php'; ?>
<?php include 'includes/footer.php'; ?>
  