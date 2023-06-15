<?php
   include 'includes/header.php';
   include 'includes/navbar.php';
   

   //for updating the value
   if (isset($_GET['id'])){
    $id = $_GET['id'];
   if(isset($_POST['update'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pwd = ($_POST['password']);
        $cpwd = ($_POST['confirmpassword']);
        
        //query update
        $sql = "UPDATE `user` 
                SET `fullname`= '$fullname',`email`='$email',`username`='$username',`password`='$pwd',
                WHERE `id` ='$id'";

        //executing the query
        $result = $conn->query($sql);

        if ($result == TRUE){
            $message = 'Successfully Updated!';

            echo "<SCRIPT> //not showing me this
                alert('$message')
                window.location.replace('register.php');
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

    $rcd = "SELECT * FROM `user` WHERE `id` = '$id'";

    $result = $conn->query($rcd);

    if($result->num_rows >0){

        while($row = $result->fetch_assoc()){
            $fname = $row['fullname'];
            $emailadd = $row['email'];
            $uname = $row['username'];
            $pwd = $row['password'];
            $id = $row['id'];
        }
?>

<div class="container-fluid w-50">
        <h2>Fill Up Form</h2> 
        <form action="" method="POST">
                    <div class="form-group pt-2">
                        <label> Full Name </label>
                        <input type="text" name="fullname" class="form-control" placeholder="Enter Fullname" value="<?php echo $fname; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email" value="<?php echo $emailadd; ?>" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $uname; ?>" required> 
                    </div>
                    <div class="col">
                        <label for="inputState">Position</label>
                        <select id="inputState" name="posOption" class="form-control" required>
                            <option selected>Choose...</option>
                            <option class="" name="option1" value="Admin" <?php if($pos == 'Admin'){echo "selected";} ?>>Admin</option>
                            <option class="" name="option2" value="Staff" <?php if($pos == 'Staff'){echo "selected";} ?>>Staff</option>
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
                            <a href="register.php" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="m-3">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
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
  