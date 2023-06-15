      <!-- header -->
      <?php include 'includes/header.php';  ?>
      
      <!-- database -->
      <?php include 'database/database.php';  ?>
      
      <!-- highlight -->
      <?php include 'highlight.php';  ?>


      <!-- navbar -->
      <?php include 'includes/navbar.php';  ?>
      <?php  
            
            if(isset($_SESSION['user_id'])){
                  header("location: userindex.php");
            } 
      ?>
      <?php 
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = ($_POST['password']);

            
            $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['unique_id'] = $row['unique_id'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['yearlevel'] = $row['yearlevel'];
                $_SESSION['department'] = $row['department'];
                $_SESSION['contact'] = $row['contact'];
                
                $adminkey = "ADMIN";
                $teacherkey = "TEACHER";
                $coordinatorkey = "COORDINATOR";
                if($_SESSION['department'] == $adminkey){
                    header("Refresh:0.1; Url=admin/index.php");
                    $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE user SET status = '{$status}' WHERE unique_id = {$_SESSION['unique_id']}");
        
                $message = 'Admin Successfully Logged In!';    
                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('admin/index.php');
                </SCRIPT>";
                mysql_close();
                }else if($_SESSION ['department'] == $teacherkey ||$_SESSION ['department'] == $coordinatorkey ){
                    header("Refresh:0.1; Url=admin/index.php");
                    $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE user SET status = '{$status}' WHERE unique_id = {$_SESSION['unique_id']}");
        
                $message = 'Admin Successfully Logged In!';    
                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('admin/index.php');
                </SCRIPT>";
                mysql_close();
                }
                else{
                    
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE user SET status = '{$status}' WHERE unique_id = {$_SESSION['unique_id']}");
        
                $message = 'Successfully Logged In!';    
                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('userindex.php');
                </SCRIPT>";
                mysql_close();                    
                }

            }else{
                echo "<script>alert('Email or Password is Incorrect.')</script>";
            }
        }
        if(isset($_SESSION['user_id'])){
            header("Refresh:0.1; Url=userindex.php");
        }else{
      ?>

      <!-- login start -->
        <!-- <div class="container login">
            <div class="row justify-content-center pb-5">
                <div class="col-xl-10 pb-5">
                    <div class="card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block"><img src="assets/img/aclc.jpg" width="450" height="450" alt=""></div>
                                    <div class="col-lg-6">
                                        <div class="p-2">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                            </div>
                                                <form class="user" method="POST">
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control form-control-user"
                                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                                            placeholder="Enter Email Address..." required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" class="form-control form-control-user"
                                                            id="exampleInputPassword" placeholder="Password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="c">
                                                            <span class="sup"><a href="signup.php">Dont have an account? Click Here</a></span>
                                                        </div>
                                                    </div>
                                                    <button name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 -->

     <section class="login">  
            <form class="frmlgn" method="POST">
                  <input class="inputlgn" name="email" type="text" placeholder="Enter your email" required><br><br>
                  <input class="inputlgn" name="password" type="password" placeholder="Enter your password" required><br><br>
                  <button class="lgnbtn" name="login" >LOGIN</button><br>
                  <span class="sup"><a href="signup.php">Dont have an account? Click Here</a></span>
            </form>
     </section>

    <br><br>
      
     <!-- footer -->
     <?php include 'includes/footer.php'; ?>
     <?php } ?>