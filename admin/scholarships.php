<?php include 'includes/header.php'; ?>
  <?php include 'includes/navbar.php'; 
    
      date_default_timezone_set('Asia/Singapore');
        //selecting all the data in the table
        if(($_SESSION['department']) == "COORDINATOR"){
            
        $result1 = $conn->query("SELECT * FROM `scholarship` WHERE `type` = 'Type I'");
        $result2 = $conn->query("SELECT * FROM `scholarship` WHERE `type` = 'Type II'");
        $result3 = $conn->query("SELECT * FROM `scholarship` WHERE `type` = 'Type III'");
        $result4 = $conn->query("SELECT * FROM `scholarship` WHERE `type` = 'Type IV'");
        ?> 

    <div class="">
    <div class="container p-4 bg-light bg-gradient text-secondary">
        <div class="row">
            <div class="col">
            <h3>Scholarship Type 1</h3>
            </div>
        </div>
        <table class="table table-hover justify-content-center">
            <thead class="table table-default font-size-20">
                <tr>
                    <th>User Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Birth Date</th>
                    <th>Year Level</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
            </thead>
            <?php
                while ($row = $result1->fetch_assoc()):
                    $val = $row['user_id'];
                    $newid = str_pad($val,4,"0",STR_PAD_LEFT);
                    $originalDate = $row['birthdate'];
                    $newDate = date("M-d-Y", strtotime($originalDate));
                ?>
                    <tr>
                        <th scope="row"><?php echo $newid; ?></th>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactnumber']; ?></td>
                        <td><?php echo $newDate; ?></td>
                        <td><?php echo $row['yearlevel']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <!-- <td> <a onclick="return confirm('Are you sure you want to delete this user?')" href="delnormaluser.php?id=<?php echo $row['id'];?>" ><i class="fas fa-user-times pl-3"></i></a></td> -->
                    </tr>
                    <?php endwhile; ?>
        </table>
        <br><br>
        <div class="row">
            <div class="col">
            <h3>Scholarship Type 2</h3>
            </div>
        </div>
        <table class="table table-hover justify-content-center">
            <thead class="table table-default font-size-20">
                <tr>
                    <th>User Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Birth Date</th>
                    <th>Year Level</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
            </thead>
            <?php
                while ($row = $result2->fetch_assoc()):
                    $val = $row['user_id'];
                    $newid = str_pad($val,4,"0",STR_PAD_LEFT);
                    $originalDate = $row['birthdate'];
                    $newDate = date("M-d-Y", strtotime($originalDate));
                ?>
                    <tr>
                        <th scope="row"><?php echo $newid; ?></th>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactnumber']; ?></td>
                        <td><?php echo $newDate; ?></td>
                        <td><?php echo $row['yearlevel']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <!-- <td> <a onclick="return confirm('Are you sure you want to delete this user?')" href="delnormaluser.php?id=<?php echo $row['id'];?>" ><i class="fas fa-user-times pl-3"></i></a></td> -->
                    </tr>
                    <?php endwhile; ?>
        </table>
        <br><br>
        <div class="row">
            <div class="col">
            <h3>Scholarship Type 3</h3>
            </div>
        </div>
        <table class="table table-hover justify-content-center">
            <thead class="table table-default font-size-20">
                <tr>
                    <th>User Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Birth Date</th>
                    <th>Year Level</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
            </thead>
            <?php
                while ($row = $result3->fetch_assoc()):
                    $val = $row['user_id'];
                    $newid = str_pad($val,4,"0",STR_PAD_LEFT);
                    $originalDate = $row['birthdate'];
                    $newDate = date("M-d-Y", strtotime($originalDate));
                ?>
                    <tr>
                        <th scope="row"><?php echo $newid; ?></th>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactnumber']; ?></td>
                        <td><?php echo $newDate; ?></td>
                        <td><?php echo $row['yearlevel']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <!-- <td> <a onclick="return confirm('Are you sure you want to delete this user?')" href="delnormaluser.php?id=<?php echo $row['id'];?>" ><i class="fas fa-user-times pl-3"></i></a></td> -->
                    </tr>
                    <?php endwhile; ?>
        </table>
        <br>
        <div class="row">
            <div class="col">
            <h3>Scholarship Type 4</h3>
            </div>
        </div>
        <table class="table table-hover justify-content-center">
            <thead class="table table-default font-size-20">
                <tr>
                    <th>User Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Birth Date</th>
                    <th>Year Level</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
            </thead>
            <?php
                while ($row = $result4->fetch_assoc()):
                    $val = $row['user_id'];
                    $newid = str_pad($val,4,"0",STR_PAD_LEFT);
                    $originalDate = $row['birthdate'];
                    $newDate = date("M-d-Y", strtotime($originalDate));
                ?>
                    <tr>
                        <th scope="row"><?php echo $newid; ?></th>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactnumber']; ?></td>
                        <td><?php echo $newDate; ?></td>
                        <td><?php echo $row['yearlevel']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <!-- <td> <a onclick="return confirm('Are you sure you want to delete this user?')" href="delnormaluser.php?id=<?php echo $row['id'];?>" ><i class="fas fa-user-times pl-3"></i></a></td> -->
                    </tr>
                    <?php endwhile; ?>
        </table>
    </div>
    </div>
  </div>

  

  <?php }else{
      echo "<SCRIPT>
      window.location.replace('index.php');
  </SCRIPT>";
  } ?>
  <?php include 'includes/script.php'; ?>
  <?php include 'includes/footer.php'; ?>
  