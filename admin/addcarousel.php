<?php include 'includes/header.php';  ?>
<?php include 'includes/navbar.php';  


if (isset($_POST['announcebtn'])){
    $name = $_POST['subject'];
    $img = $_FILES['img']["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $news_date = date("Y-m-d");
    $folder = "img/" . $img;
 
            $sql = "INSERT INTO `carousel`(`image`, `name`) 
                VALUES ('$img', '$name')";
            $result = mysqli_query($conn, $sql);
            if($result){

                move_uploaded_file($tempname, $folder);
                $message = 'Successfully Submitted!';

                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('carousel.php');
                </SCRIPT>";
                   
                        
                }else{
                    echo "<script>alert('Something Went Wrong.')</script>";
                    
                }

            }
            

?>
<div class="container-fluid w-50">
        <h2>Fill Up Form</h2> 
        <form action="" enctype="multipart/form-data" method="POST">
                    <div class="form-group pt-2">
                        <label>Carousel Name </label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter News Name" required>
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

            <?php include 'includes/script.php'; ?>
<?php include 'includes/footer.php'; ?>