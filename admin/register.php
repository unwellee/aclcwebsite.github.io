  <?php include 'includes/header.php'; ?>
  <?php include 'includes/navbar.php'; 
      date_default_timezone_set('Asia/Singapore');
        //selecting all the data in the table
        $admin = "ADMIN";
        $teacher = "TEACHER";
        $result = $conn->query("SELECT * FROM `user` WHERE department = '$admin' OR department = '$teacher' ORDER BY user_id ASC");
        ?> 

    <div class="">
    <div class="container p-4 bg-light bg-gradient text-secondary">
        <div class="row">
            <div class="col">
            <h1>Admin and Staffs</h1>
            </div>
            <div class="col col-lg-2">
                <form action="addstaff.php" class="POST">
                    <button type="submit" name="addstaff" class="btn btn-primary">Add Admin/Staff</button>
                </form>
            </div>
        </div>
        <table class="table table-hover justify-content-center">
            <thead class="table table-default font-size-20">
                <tr>
                    <th>Admin Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <?php
                while ($row = $result->fetch_assoc()):
                    $val = $row['user_id'];
                    $newid = str_pad($val,4,"0",STR_PAD_LEFT);
                ?>
                    <tr>
                        <th scope="row"><?php if($row['department'] == "TEACHER"){echo "TEACHER" . $newid;}else{echo "ADMIN" . $newid;} ?></th>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><a href="updateuser.php?id=<?php echo $row['user_id'];?>"><i class="fas fa-user-edit"></i></a> <a onclick="return confirm('Are you sure you want to delete this user?')" href="deleteuser.php?id=<?php echo $row['user_id'];?>"><i class="fas fa-user-times pl-3"></i></a></td>
                    </tr>
                    <?php endwhile; ?>
        </table>
    </div>
    </div>
  </div>


  <?php include 'includes/script.php'; ?>
  <?php include 'includes/footer.php'; ?>
  