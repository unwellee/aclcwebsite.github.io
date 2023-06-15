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
    $rslt = $conn->query("SELECT * FROM `calendar` ORDER BY event_date DESC LIMIT 6");
    // $email = $_SESSION['email'];
    // $rcd = "SELECT * FROM `scholarship` WHERE `email` = '$email'";

    //     $result = $conn->query($rcd);

    //     if($result->num_rows >0){

    //         while($row = $result->fetch_assoc()):
    
    ?>    
    <!-- body -->
    <div class="container pb-5">
        <div class="row pb-5"    >
            <div class="dept col-md-8">
                <div class="row">
                <div class="col">
                <h2>PROGRAMS OFFERED</h2>

                </div>
                <div class="col-md-4">
                        <?php if(isset($_SESSION['user_id'])){?>
                            <a href="scholarship.php"><button type="submit" name="scholarship" class="scholar-btn">Request for Scholarship</button></a>
                        <?php }else{ ?>
                            <a href="login.php"><button type="submit" name="scholarship" class="scholar-btn">Request for Scholarship</button></a>
                        <?php } ?>
                </div>
                </div>
                
                
                <!-- <div class="college m-4 pt-3">
                    <h3>COLLEGE</h3>
                </div> -->
                <div class="offered-course">
                    <div class="department m-4">
                        <h3>ICT DEPARTMENT</h3>
                            <div class="pl-4">
                                <span>BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</span><br>
                                <span>BACHELOR OF SCIENCE IN COMPUTER SCIENCE</span><br>
                                <span>ASSOCIATE IN COMPUTER TECHNOLOGY</span><br>
                            </div>
                    </div>
                    <div class="department m-4">
                        <h3>BUSINESS DEPARTMENT</h3>
                            <div class="pl-4">
                                <span>BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION</span><br>
                                <span>BACHELOR OF SCIENCE IN ENTREPRENEURSHIP</span><br>
                                <span>BACHELOR OF SCIENCE IN ACCOUNTING INFORMATION SYSTEM</span><br>
                            </div>
                    </div>
                    <div class="department m-4">
                        <h3>HOSPITALITY DEPARTMENT</h3>
                            <div class="pl-4">
                                <span>BACHELOR OF SCIENCE IN TOURISM MANAGEMENT</span><br>
                                <span>HOTEL AND RESTAURANT SERVICES</span><br>
                            </div>
                    </div>
                </div>
                
            </div>

            <div class="col-md-3">
                <div class="pl-5">
                    <h2 class="">CALENDAR</h2>
                    <hr class="" style="margin-left: auto;">
                </div>
            
                <div class="row">
                    <?php while ($row = $rslt->fetch_assoc()): 
                    $paymentDate = $row['event_date'];
                    $month = date('M', strtotime($paymentDate));
                    $day = date('d', strtotime($paymentDate));
                    ?> 
                    <div class="col-md-8 col-sm-6 pt-3 pb-3">
                        <span class="date">
                            <span class="month"><?php echo $month; ?></span>
                            <span class="day"><?php echo $day; ?></span>
                            <hr width="100px" style="margin: auto;">
                        </span>
                        <h5 class="pt-2 "><?php echo $row['event']; ?></h5>
                        <!-- <span class="desc ml-5"><?php echo $row['description']; ?></span> -->
                    </div>
                    <?php endwhile; ?>    
                </div>
            </div>

            <div class="col-md-3">
                        

            </div>

  

        </div>
       
    </div>






    <!-- footer -->
    <?php include 'includes/footer.php'; ?>