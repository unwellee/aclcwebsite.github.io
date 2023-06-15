<?php include 'includes/header.php';



    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = ($_POST['password']);
        
        $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['position'] = $row['position'];
            $_SESSION['admin_id'] = $row['id'];
            $message = 'Successfully Logged In!';

            echo "<SCRIPT> //not showing me this
                alert('$message')
                window.location.replace('index.php');
            </SCRIPT>";
            mysql_close();
        }else{
            echo "<script>alert('Email or Password is Incorrect.')</script>";
        }
    }
    if(isset($_SESSION['admin_id'])){
        header("Refresh:0.1; Url=index.php");
    }else{
?>


    <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block"><img src="assets/img/2.png" width="455" height="580" alt=""></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" name="rememberme" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <hr>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
    </div>



<?php include 'includes/script.php'; 
    }
?>

  