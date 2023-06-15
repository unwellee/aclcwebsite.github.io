    <!-- header -->
    <?php include 'includes/header.php';  ?>
    <!-- highlight -->
    <?php include 'highlight.php';  ?>
    <!-- navbar -->
    <?php 



    if(!isset($_SESSION['user_id'])){
        include 'includes/navbar.php'; 
    }else{
        include 'loggednav.php';
    } 

        $email = $_SESSION['email'];
        $rcd = "SELECT * FROM `scholarship` WHERE `email` = '$email'";
    
        $result = $conn->query($rcd);
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $email = $row['email'];
            }
        if($_SESSION['email'] == $email){
            header("location: courses.php");
        }
        
    }
    
    
    if(isset($_POST['register'])){
        $userid = $_SESSION['user_id'];
        $fname = $_SESSION['firstname'];
        $lname = $_SESSION['lastname'];
        $email = $_SESSION['email'];
        $contactnumber = $_SESSION['contact'];
        $bdate = $_POST['bdate'];
        $gender = $_POST['posOption3'];
        $yearlevel = $_SESSION['yearlevel'];
        $department = $_SESSION['department'];
        $type = $_POST['posOption4'];
        $address = $_POST['address'];
        


      
                  $sql = "INSERT INTO `scholarship` (`user_id`,`firstname`,`lastname`, `email`, `contactnumber`, `birthdate`,`gender`, `yearlevel`, `department`, `type`, `address`) 
                      VALUES ('$userid', '$fname', '$lname','$email','$contactnumber','$bdate','$gender','$yearlevel','$department','$type','$address')";
                  $result = mysqli_query($conn, $sql);
                  if($result){
                      $message = 'Successfully Submitted!';
      
                      echo "<SCRIPT> //not showing me this
                          alert('$message')
                          window.location.replace('courses.php');
                      </SCRIPT>";
                         
                          mysql_close();
                              
                      }else{
                          echo "<script>alert('Something Went Wrong.')</script>";
                          
                      }
                    }
            
    
    //   $id = $_SESSION['user_id'];
    //   $rcd = "SELECT * FROM `admin` WHERE `id` = '$id'";

    //   $result = $conn->query($rcd);

    //   if($result->num_rows >0){

    //       while($row = $result->fetch_assoc()){
    //           $lname = $row['lastname'];
    //           $fname = $row['firstname'];
    //           $email = $row['email'];
    //           $yearlevel = $row['yearlevel'];
    //           $dept = $row['department'];
    //           $id = $row['id'];
    //       }
    
    
    ?>

    
    
    
    <div class="container-fluid w-50">
        <h2>Scholarship Form</h2> 
        <form action="" method="POST">
                    <div class="row">
                        <div class="col">
                            <label> First Name </label>
                            <input type="text" name="fname" class="form-control" value="<?php if(isset($_SESSION['user_id'])){ echo $_SESSION['firstname'];} ?>" placeholder="Enter First Name" disabled>
                        </div>
                        <div class="col">
                        <label> Last Name </label>
                            <input type="text" name="lname" class="form-control" value="<?php if(isset($_SESSION['user_id'])){echo $_SESSION['lastname'];} ?>" placeholder="Enter Last Name" disabled>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control checking_email" value="<?php if(isset($_SESSION['user_id'])){echo $_SESSION['email'];} ?>" placeholder="Enter Email" disabled>
                            <small class="error_email" style="color: red;"></small>
                        </div>
                        <div class="col">
                        <label> Contact Number </label>
                            <input type="text" name="contactnumber"onkeyup="onlyNumbers(this)" minlength="11" maxlength="11" class="form-control" value="<?php if(isset($_SESSION['user_id'])){echo $_SESSION['contact'];} ?>" placeholder="Enter Contact Number" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Birth Date</label>
                            <input type="date" name="bdate" class="form-control" placeholder="Enter Birthdate" required>
                        </div>
                        <div class="col">
                            <label>Gender</label>
                            <select id="inputState" name="posOption3" class="form-control" required>
                                <option selected>Choose...</option>
                                <option class="" value="MALE">MALE</option>
                                <option class="" value="FEMALE">FEMALE</option>
                            </select>     
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Department</label>
                            <select id="inputState" name="posOption" class="form-control" disabled>
                                <option selected>Choose...</option>
                                <option class="" value="BSIT" <?php if(isset($_SESSION['user_id'])){ if($_SESSION['department'] == 'BSIT'){echo "selected";}} ?>>BSIT</option>
                                <option class="" value="BSTM" <?php if(isset($_SESSION['user_id'])){if($_SESSION['department'] == 'BSTM'){echo "selected";}} ?>>BSTM</option>
                                <option class="" value="BSBA" <?php if(isset($_SESSION['user_id'])){if($_SESSION['department']== 'BSBA'){echo "selected";}} ?>>BSBA</option>
                            </select>     
                        </div>
                        <div class="col">
                            <label>Year Level</label>
                            <select id="inputState" name="posOption2" class="form-control" disabled>
                                <option selected>Choose...</option>
                                <option class="" value="I" <?php if(isset($_SESSION['user_id'])){if($_SESSION['yearlevel'] == 'I'){echo "selected";}} ?>>I</option>
                                <option class="" value="II" <?php if(isset($_SESSION['user_id'])){if($_SESSION['yearlevel'] == 'II'){echo "selected";}} ?>>II</option>
                                <option class="" value="III" <?php if(isset($_SESSION['user_id'])){if($_SESSION['yearlevel'] == 'III'){echo "selected";}} ?>>III</option>
                                <option class="" value="IV" <?php if(isset($_SESSION['user_id'])){if($_SESSION['yearlevel'] == 'IV'){echo "selected";}} ?>>IV</option>
                            </select>     
                        </div>
                        <div class="col">
                        <label>Type of Scholarship</label>
                        <select id="inputState" name="posOption4" class="form-control">
                            <option selected>Choose...</option>
                            <option class="" value="Type I">Type I</option>
                            <option class="" value="Type II">Type II</option>
                            <option class="" value="Type III">Type III</option>
                            <option class="" value="Type IV">Type IV</option>
                        </select>     
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label>Complete Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter Complete Address" required>
                    </div>
                    </div> 
                     
                    
                    <div class="row justify-content-end pb-5">
                        <div class="m-3">
                            <a href="courses.php" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="m-3">
                    <button type="submit" name="register" class="btn btn-primary">Submit</button>
                    </div>
  
            </form>
            </div>
            </div>

            <?php

// }

?>
<script>
    function onlyNumbers(input){
        var regex = /[^0-9]/gi;
        input.value = input.value.replace(regex, "");
    }
    
</script>

<?php include 'includes/footer.php'; ?>