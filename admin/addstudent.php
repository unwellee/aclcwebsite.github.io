<?php
include 'includes/header.php';
include 'includes/navbar.php';

if (isset($_POST['addbtn'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = ($_POST['password']);
    $cpwd = ($_POST['confirmpassword']);
    $regdate = date("Y-m-d");
    $yearlevel = $_POST['posOption'];
    $prelim = "";
    $midterm = "";
    $final = "";
    $finalgrade = "";
    $remark = "";
   
    

    if($pwd == $cpwd){
        $sql = "SELECT * FROM `admin` WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

            $sql = "INSERT INTO `user`(`fullname`, `email`,`username`,`password`,`yearlevel`,`prelim`,`midterm`,`final`,`finalgrade`,`remark`,`register_date`) 
                VALUES ('$fullname', '$email','$username','$pwd','$yearlevel','$prelim','$midterm','$final','$finalgrade','$remark','$regdate')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $message = 'Successfully Registered!';

                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('users.php');
                </SCRIPT>";
                   
                    mysql_close();
                        
                }else{
                    echo "<script>alert('Something Went Wrong.')</script>";
                    
                }
        
        
    }else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
        
}  



?>

        <div class="container-fluid w-50">
        <h2>Fill Up Form</h2> 
        <form action="" method="POST">
                    <div class="form-group pt-2">
                        <label> Full Name </label>
                        <input type="text" name="fullname" class="form-control" placeholder="Enter Fullname" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    </div>
                    <div class="col">
                        <label>Year Level</label>
                        <select id="inputState" name="posOption" class="form-control" required>
                            <option selected>Choose...</option>
                            <option class="" value="1styear">1st Year</option>
                            <option class="" value="2ndyear">2nd Year</option>
                            <option class="" value="3rdyear">3rd Year</option>
                            <option class="" value="4thyear">4th Year</option>
                        </select>     
                    </div>
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
                            <a href="users.php" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="m-3">
                    <button type="submit" name="addbtn" class="btn btn-primary">Add Student</button>
                    </div>
                    </div>
            </form>
            </div>
            </div>
<?php include 'includes/script.php'; ?>
<?php include 'includes/footer.php'; ?>
  