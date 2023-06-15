    <!-- course starts -->
    <?php include 'database/database.php';  ?>
    <?php 
        if(isset($_SESSION['user_id'])){
            $dept = $_SESSION['department'];
            $result = $conn->query("SELECT * FROM `announcement` WHERE `dept`= '$dept'");
        }else{
            $result = $conn->query("SELECT * FROM `announcement`");
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
        <h1>NEWS</h1>
        <!-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque 
            corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa 
            qui officia deserunt mollitia animi, id est laborum et dolorum fuga</p> -->
    
        <div class="row justify-content-center">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="course-col m-2">
                <h3><?php echo $row['subject'] ?></h3>
                <p><?php // echo $row['announcement'] ?></p>
                <h5><?php echo $row['dept'] . " | " . $row['announce_date']?></h5>
            </div>
            <?php endwhile; ?>
        </div>
       
    </section>

    
    <!-- course ends -->