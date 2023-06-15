<?php
include 'includes/header.php';
include 'includes/navbar.php';

if (isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['confirmpassword'];
    $department = $_POST['posOption'];
    $yearlevel = "N/A";
    $status = "Active Now";
    $unique_id = rand(time(), 100000000);
    
    if($pwd == $cpwd){
        $sql = "SELECT * FROM `user` WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0){
            $sql = "INSERT INTO `user`(`unique_id`,`lastname`, `firstname`, `email`, `password`, `yearlevel`, `department`, `status`) 
                          VALUES ('$unique_id', '$lname','$fname','$email','$pwd','$yearlevel','$department','$status')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $message = 'Successfully Registered!';

                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('register.php');
                </SCRIPT>";
                   
                    mysql_close();
                        
                }else{
                    echo "<script>alert('Something Went Wrong.')</script>";
                    
                }
        }else{
            echo "<script>alert('This Email Already Exist.')</script>";
        }
        
    }else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}  



?>

        <div class="container-fluid w-50">
        <h2>Fill Up Form</h2> 
            <form class="frmlgn p-5" method="POST">
                    <div class="row">
                    <div class="col">
                        <label> First Name </label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
                    </div>
                    <div class="col">
                    <label> Last Name </label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
                    </div>
                    </div> 
                    <div class="row pt-4">
                    <div class="col">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="col">
                        <label>Department</label>
                        <select id="inputState" name="posOption" class="form-control" required>
                            <option selected>Choose...</option>
                            <option class="" value="ADMIN">ADMIN</option>
                            <option class="" value="COORDINATOR">SCHOLARSHIP COORDINATOR</option>
                            <option class="" value="TEACHER">TEACHER</option>
                        </select>     
                    </div>
                    <!-- <div class="col">
                        <label>Year Level</label>
                        <select id="inputState" name="posOption2" class="form-control" required>
                            <option selected>Choose...</option>
                            <option class="" value="I">I</option>
                            <option class="" value="II">II</option>
                            <option class="" value="III">III</option>
                            <option class="" value="IV">IV</option>
                        </select>     
                    </div> -->
                    </div>
                    <div class="row pt-3">
                    <div class="col">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    <div class="col">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                    </div> 
                    </div> 
                     
                    
                    <div class="row pt-4">
                        <div class="m-3">
                            <a href="register.php" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="m-3">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                    </div>
  
            </form>

            </div>
            </div>
<?php include 'includes/script.php'; ?>
<?php include 'includes/footer.php'; ?>
  