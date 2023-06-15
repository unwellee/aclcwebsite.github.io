<?php include 'database/database.php'; 
    
    if(isset($_SESSION['user_id'])){
    $user_unique = $_SESSION['unique_id'];
    $outgoing_id = "321123222";
    $admin = $conn->query("SELECT * FROM `user` WHERE unique_id = '$outgoing_id'");
    
    if($admin->num_rows >0){

        while($rows = $admin->fetch_assoc()){
          $LastName[] = $rows['lastname'];
        }
      }

    
    //   if($userlast->num_rows >0){
  
    //       while($rows = $userlast->fetch_assoc()){
    //         $UserLastName[] = $rows['lastname'];
    //       }
    //     }
    // $sql = "SELECT * FROM user WHERE unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $result = $conn->query("SELECT * FROM `notifications` WHERE outgoing_notif_id = {$outgoing_id} AND incoming_notif_id = {$user_unique} ORDER BY notif_id DESC");

    $rslt = $conn->query("SELECT COUNT(*) AS num FROM `notifications` WHERE outgoing_notif_id = {$outgoing_id} AND incoming_notif_id = {$user_unique} ORDER BY notif_id DESC");



        $roww = $rslt->fetch_assoc();
        
        $countnum = $roww['num'];
    

    
    $rsltadmin = $conn->query("SELECT * FROM `user` WHERE NOT unique_id = '$outgoing_id'");

    while($rows = $rsltadmin->fetch_assoc()){
        $unique_user = $rows['unique_id'];
        // echo $unique_user;
        $adminresult = $conn->query("SELECT * FROM `notifications` WHERE outgoing_notif_id = {$unique_user} AND incoming_notif_id = {$outgoing_id} ORDER BY notif_id DESC");
    }
    
    }
    
?>
    <?php  ?>
   <div class="highlight">
            <div class="icons">
            <a href="https://www.facebook.com/Aclcapalit"><i class="fa-brands fa-facebook"></i></a>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-instagram"></i>
            <a href="https://www.youtube.com/@AmaesEduPh"><i class="fa-brands fa-youtube"></i></a>
        </div>

        <!-- <div class="enrollment">
            <h3>Enrollment Ongoing!</h3>
        </div> -->
        <?php if(isset($_SESSION['user_id'])){ ?>
            <div class="dropleft pr-5">
                <?php if($_SESSION['department'] == "ADMIN"){?>
                <a type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bell pr-1"></i><span id="count" class="badge badge-primary"><?php echo $countnum ?></span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   
                    <span class="pl-2">From: <?php //echo $rowws['lastname']; ?></span>
                    <?php// endwhile; ?> 
                    <?php while ($rows = $adminresult->fetch_assoc()):?>
                    <a class="dropdown-item pl-5" href="delnotif.php?id=<?php echo $rows['notif_id'] ?>"><?php echo $rows['notif']; ?></a>
                    <?php endwhile; ?> 
                </div>
                <?php }else{ ?>
                <a type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bell pr-1"></i><span id="count" class="badge badge-primary"><?php echo $countnum ?></span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <span class="pl-2">From: <?php echo $LastName[0]; ?></span>
                    <?php while ($row = $result->fetch_assoc()):?>
                    <a class="dropdown-item pl-5" href="delnotif.php?id=<?php echo $row['notif_id'] ?>"><?php echo $row['notif']; ?></a>
                    <?php endwhile; ?> 
                </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <?php ?>
<script> 

</script>