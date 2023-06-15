<?php include 'includes/header.php';  ?>
<?php include 'includes/navbar.php';  


if (isset($_POST['announcebtn'])){
    $subject = $_POST['subject'];
    $announcement = $_POST['announcement'];
    $img = $_POST['image'];
    $announce_date = date("Y-m-d");
    $department = $_POST['posOption'];
 
            $sql = "INSERT INTO `announcement`(`subject`, `announcement`, `img`, `dept`, `announce_date`) 
                VALUES ('$subject', '$announcement','$img','$department','$announce_date')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $message = 'Successfully Submitted!';
                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('announcement.php');
                </SCRIPT>";
                   
                        
                }else{
                    echo "<script>alert('Something Went Wrong.')</script>";
                    
                }

            }
        

?>
<div class="container-fluid w-50">
        <h2>Fill Up Form</h2> 
        <form action="" method="POST">
                    <div class="form-group pt-2">
                        <label> Announcement Name </label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter Announcement Name" required>
                    </div>
                    <div class="form-group">
                        <label>Announcement</label>
                        <input type="text" name="announcement" class="form-control" placeholder="Enter Announcement Details" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label> Image </label>
                        <input type="file" name="image" class="">
                    </div>
                    <div class="col">
                        <label>Department</label>
                        <select id="inputState" name="posOption" class="form-control" required>
                            <option selected>Choose...</option>
                            <option class="" value="BSIT">BSIT</option>
                            <option class="" value="BSBA">BSBA</option>
                            <option class="" value="BSTM">BSTM</option>
                            <option class="" value="GENERAL">GENERAL</option>
                        </select>     
                    </div>
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
                            <a href="announcement.php" class="btn btn-secondary">Cancel</a>
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