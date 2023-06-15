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
    
            $result = $conn->query("SELECT * FROM `announcement` ORDER BY id DESC");
        
        
    ?>

    <section href="#offered" class="announce pb-5">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                        <h2>YEAR</h2>
            </div>
            <div class="col-md-8">
                    <h2>ANNOUNCEMENT</h2>
                    <hr style="margin-left: auto;">
                    <div class="row">
                        <?php while ($row = $result->fetch_assoc()): 
                        $originalDate = $row['announce_date'];
                        $newDate = date("F d Y", strtotime($originalDate));    
                        ?>
                         <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="announce_content">
                                <div class="announced">
                                    <span class="announce_date"><?php echo $newDate . " | " . $row['dept']; ?></span>
                                    <h2 class="announce_subject"><?php echo $row['subject']; ?></h2>
                                </div>
                            </div>
                         </div>
                         <?php endwhile; ?>
                    </div>
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