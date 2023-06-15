   <!-- header -->
   <?php include 'includes/header.php';  ?>
    <?php include 'database/database.php';  ?>
    

    <!-- highlight -->
    <?php include 'highlight.php';  ?>


    <!-- navbar -->
    <?php 
    if(!isset($_SESSION['user_id'])){
        include 'includes/navbar.php'; 
    }else{
        include 'loggednav.php';
    } 
    
            $result = $conn->query("SELECT * FROM `news` ORDER BY id DESC");

            $rslt = $conn->query("SELECT * FROM `calendar` ORDER BY event_date DESC LIMIT 6");
        
        // if(isset($_SESSION['user_id'])){
        //         $dept = $_SESSION['department'];
        //         $result = $conn->query("SELECT * FROM `announcement` WHERE `dept`= '$dept'");
        // }else{
        // }

        // if(isset($_SESSION['user_id'])){
        //     $dept = "BSIT";
        //     $result = $conn->query("SELECT * FROM `announcement` WHERE `dept`= '$dept'");
        // }else if(isset($_SESSION['user_id'])){
        //     $dept = "BSBA";
        //     $result = $conn->query("SELECT * FROM `announcement` WHERE `dept`= '$dept'");
        // }else if(isset($_SESSION['user_id'])){
        //     $dept = "BSTM";
        //     $result = $conn->query("SELECT * FROM `announcement` WHERE `dept`= '$dept'");
        // }else{
        //     $result = $conn->query("SELECT * FROM `announcement`");
        // }

        
    ?>

    <section href="#offered" class="course pb-5">
        <div class="container">
        <div class="row">
            <div class="col-md-8">
                    <h2>NEWS</h2>
                    <hr style="margin-left: auto;">
                    <div class="row">
                        <?php while ($row = $result->fetch_assoc()): 
                              $originalDate = $row['news_date'];
                              $newDate = date("F d Y", strtotime($originalDate));    
                        ?>
                            <div class="col-xs-12 col-sm-6 col-md-6 pt-3">
                                <a href="viewnews.php?id=<?php echo $row['id'];?>">
                                <div class="announce-col ">
                                        <figure><img id="newsimg" src="admin/img/<?php echo $row['img']; ?>"  height="220" width="350" alt=""></figure>
                                    <div class="news_content">
                                        <span class="news_title"><?php echo $row['subject']?></span>
                                        <span class="news_date"><?php echo $newDate?></span>
                                        <p class="news_description"></p>
                                    </div>
                                </div></a>
                        </div>
                        <?php endwhile; ?>    
                        
                    </div>
            </div>
            <div class="col-md-4">
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
        </div>
        </div>
            <div class="view-more pb-5">
                
            </div>
        
    </section>

    
    <!-- course ends -->

    

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>