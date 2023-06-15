      <!-- header -->
      
      <!-- database -->
      <?php include 'database/database.php';  ?>
      <?php 
                $unique_id = $_SESSION['unique_id'];
                $sql = "SELECT * FROM user WHERE unique_id = {$unique_id}";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    $fname = $row['firstname'];
                    $lname = $row['lastname'];
                    $email = $row['email'];
                    $status = $row['status'];
                    $user_id = $row['user_id'];
                    $unique_id = $row['unique_id'];
                    
                  }            
              ?>

<nav>
                  
        <div class="nav-links pt-2 pb-2 " id="navLinks">
            <i class="fas fa-times" onclick="hideMenu()"></i>
            <ul class="nav justify-content-end m-1">
              <?php if($_SESSION['department'] == "ADMIN"){ ?>
                <li><a href="adminmessage.php">CONTACT</a></li>
                <li><a href="logout.php?logout_id=<?php echo $unique_id; ?>">LOGOUT</a></li>
              <?php }else{ ?>
                <li><a href="userindex.php">HOME</a></li>
                <li><a href="courses.php">ADMISSION</a></li>
                <!-- <li><a href="about.php">ABOUT US</a></li> -->
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="logout.php?logout_id=<?php echo $unique_id; ?>">LOGOUT</a></li>
              <?php } ?>
                
            </ul>
        </div>
        <i class="fas fa-bars" onclick="showMenu()"></i>
    </nav>

    <?php } ?>