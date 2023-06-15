<?php include 'includes/header.php'; 
      include 'highlight.php'; 
      include 'includes/navbar.php';  
      include 'database/database.php';

      if(isset($_POST['register'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $contact = $_POST['contactnumber'];
            $pwd = $_POST['password'];
            $cpwd = $_POST['confirmpassword'];
            $department = $_POST['posOption'];
            if($department == "INQUIRER"){
                $yearlevel = "none";
            }else{
                $yearlevel = $_POST['posOption2'];
            }
            $status = "Active Now";
            $unique_id = rand(time(), 100000000);

            if($department == "INQUIRER"){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $contact = $_POST['contactnumber'];
                    
                $sequel = "INSERT INTO `inquiries`(`firstname`, `lastname`, `email`, `contact`) 
                                  VALUES ('$fname','$lname','$email','$contact')";
                $rslt = mysqli_query($conn, $sequel);
              }

            if($pwd == $cpwd){
                  $sql = "SELECT * FROM `user` WHERE email = '$email'";
                  $result = mysqli_query($conn, $sql);
                  if (!$result->num_rows > 0){
                        $sql = "INSERT INTO `user`(`unique_id`,`lastname`, `firstname`, `email`, `contact`, `password`, `yearlevel`, `department`, `status`) 
                          VALUES ('$unique_id', '$lname','$fname','$email','$contact','$pwd','$yearlevel','$department','$status')";
                      $result = mysqli_query($conn, $sql);
                      if($result){
                          $message = 'Successfully Registered!';
          
                          echo "<SCRIPT> //not showing me this
                              alert('$message')
                              window.location.replace('login.php');
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


    <section class="login">  
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
                    <div class="row">
                    <div class="col">
                        <label>Email</label>
                        <input type="email"  name="email" class="form-control checking_email" placeholder="Enter Email" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="col">
                        <label>Contact Number</label>
                        <input type="text" id="contact" name="contactnumber" class="form-control" pattern="[0-9]{11}" placeholder="Enter Contact Number" onkeyup="onlyNumbers(this)" minlength="11" maxlength="11">
                        <!-- <small class="error_email" style="color: red;"></small> -->
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label>Department</label>
                        <select id="department" name="posOption" onChange="disableYearLevel()" class="form-control" required>
                            <option selected>Choose...</option>
                            <option class="" value="BSIT">BSIT</option>
                            <option class="" value="BSTM">BSTM</option>
                            <option class="" value="BSBA">BSBA</option>
                            <option class="" value="INQUIRER">INQUIRER</option>
                        </select>     
                    </div>
                    <div class="col">
                        <label>Year Level</label>
                        <select id="yearlevel" name="posOption2" class="form-control">
                            <option selected>Choose...</option>
                            <option class="" value="I">I</option>
                            <option class="" value="II">II</option>
                            <option class="" value="III">III</option>
                            <option class="" value="IV">IV</option>
                        </select>     
                    </div>
                    </div>
                    <div class="row">
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
                            <a href="login.php" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="m-3">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                    </div>
  
            </form>
     </section>


<script>
    function disableYearLevel(){
        if(document.getElementById('department').value!='INQUIRER')
            document.getElementById('yearlevel').disabled=false;
        else
            document.getElementById('yearlevel').disabled=true;
    }
    function onlyNumbers(input){
        var regex = /[^0-9]/gi;
        input.value = input.value.replace(regex, "");
    }
    
</script>

<?php include 'includes/footer.php'; 
?>