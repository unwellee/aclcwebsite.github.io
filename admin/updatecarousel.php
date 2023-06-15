<?php
   include 'includes/header.php';
   include 'includes/navbar.php';
   

   //for updating the value
   if (isset($_GET['id'])){
    $id = $_GET['id'];
   if(isset($_POST['announcebtn'])){
        $subject = $_POST['subject'];
        $img = $_FILES['img']["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        $folder = "img/" . $img;
        $id = $_GET['id'];
        
        //query update
        $sql = "UPDATE `carousel`
                SET `image`= '$img',`name`='$subject'
                WHERE `id`='$id'";

        //executing the query
        $result = $conn->query($sql);
        // $result = mysqli_query($conn, $sql);
        if ($result == TRUE){
            move_uploaded_file($tempname, $folder);
            $message = 'Successfully Updated!';

            echo "<SCRIPT> //not showing me this
                alert('$message')
                window.location.replace('carousel.php');
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
    $rcd = "SELECT * FROM `carousel` WHERE `id` = '$id'";

    $result = $conn->query($rcd);

    if($result->num_rows >0){

        while($row = $result->fetch_assoc()){
            $name = $row['name'];
            $img = $row['image'];
            $id = $row['id'];
        }
?>

<div class="container-fluid w-50">
        <h2>Fill Up Form</h2> 
        <form action="" enctype="multipart/form-data" method="POST">
                    <div class="form-group pt-2">
                        <label>Carousel Name </label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter News Name" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <label> Image </label><br>
                            <input type="file" name="img" class="">
                        </div> 
                    </div>
                    <div class="row pt-4">
                        <div class="m-3">
                            <a href="carousel.php" class="btn btn-secondary">Cancel</a>
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
  