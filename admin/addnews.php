<?php include 'includes/header.php';  ?>
<?php include 'includes/navbar.php';  


if (isset($_POST['announcebtn'])){
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $img = $_FILES['img']["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $news_date = date("Y-m-d");
    $folder = "img/" . $img;
    // $folder2 = "assets/img/" . $img;
    // $department = $_POST['posOption'];
 
            $sql = "INSERT INTO `news`(`subject`, `description`, `img`, `news_date`) 
                VALUES ('$subject', '$description','$img','$news_date')";
            $result = mysqli_query($conn, $sql);
            if($result){

                move_uploaded_file($tempname, $folder);
                $message = 'Successfully Submitted!';

                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('news.php');
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
                        <label> News Name </label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter News Name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter News Details" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label> Image </label><br>
                        <input type="file" name="img" class="">
                    </div>
                    <!-- <div class="col">
                        <label>Department</label>
                        <select id="inputState" name="posOption" class="form-control" required>
                            <option selected>Choose...</option>
                            <option class="" value="BSIT">BSIT</option>
                            <option class="" value="BSBA">BSBA</option>
                            <option class="" value="BSTM">BSTM</option>
                            <option class="" value="GENERAL">GENERAL</option>
                        </select>     
                    </div> -->
                    </div>
                    <!-- <div class="row pt-3">
                    <div class="col">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    <div class="col">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                    </div> 
                    </div>  -->
                     
                    
                    <div class="row pt-4">
                        <div class="m-3">
                            <a href="news.php" class="btn btn-secondary">Cancel</a>
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