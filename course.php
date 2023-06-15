    <!-- course starts -->
    <?php include 'database/database.php';  ?>
    <?php 
    
            $result = $conn->query("SELECT * FROM `news` ORDER BY id DESC LIMIT 8");

        if(isset($_SESSION['user_id'])){
            $dept = $_SESSION['department'];
            $rslt = $conn->query("SELECT * FROM `announcement` WHERE `dept`= '$dept' OR `dept` = 'GENERAL' ORDER BY announce_date DESC LIMIT 7");
        }else{
            $rslt = $conn->query("SELECT * FROM `announcement` ORDER BY announce_date DESC LIMIT 7");
        }
        
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

    <section href="#offered" class="course">
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
            <div class="col-md-4 pl-5">
                    <h2 class="">ANNOUNCEMENT</h2>
                    <hr style="margin-left: auto;">
                    <dv class="row justify-content-right pt-2">
                    <?php while ($row = $rslt->fetch_assoc()): ?>
                            <?php 
                            $originalDate = $row['announce_date'];
                            $newDate = date("F d Y", strtotime($originalDate));
                             ?>
                            <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="announce_content">
                                <div class="announced">
                                    <span class="announce_date"><?php echo $newDate . " | " . $row['dept']; ?></span><br>
                                    <h1 class="announce_subject"><?php echo $row['subject']; ?></h1>
                                </div>
                            </div>
                         </div>
                         
                    <?php endwhile; ?>
            </div>
        </div>
        </div>
            <div class="view-more">
                <div class="row pl-4">
                    <div class="col-md-8 pl-5">
                    <a href="news.php"><button type="submit" name="announcement" class="hero-btn">VIEW ALL</button></a>
                    </div>
                    <div class="col-md-4 pl-4">
                    <a href="viewannouncement.php"><button type="submit" name="announcement" class="hero-btn">VIEW ALL</button></a>
                    </div>
                </div>
            </div>
        
    </section>

    
    <!-- course ends -->