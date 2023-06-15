    <!-- header -->
    <?php include 'includes/header.php';  ?>
    <?php include 'includes/navbar.php';  
    
    $result = $conn->query("SELECT * FROM `announcement` ORDER BY announce_date DESC");

    ?>

    <!-- navbar -->

    <div class="">
        <div class="container p-4 bg-light bg-gradient text-secondary">
            <div class="row">
                <div class="col">
                <h1>Announcement</h1>
                </div>
                <div class="col col-lg-2">
                    <form action="addannouncement.php" class="POST">
                        <button type="submit" name="addannouncement" class="btn btn-primary">Add Announcement</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover justify-content-center">
                <thead class="table table-default font-size-20">
                    <tr>
                        <th>Department</th>
                        <th>Subject</th>
                        <th>Announcement</th>
                        <!-- <th>Image</th> -->
                        <th>Edit / Delete</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <!-- <th scope="row"><?php //echo $row['id']; ?></th> -->
                            <td><?php echo $row['dept']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['announcement']; ?></td>
                           
                            <!-- <td><img src="<?php //echo $row['img']; ?>" width="80" height="80" alt=""></td>-->
                            <td><a href="updateannouncement.php?id=<?php echo $row['id'];?>"><i class="fas fa-edit m-2"></i></a><a onclick="return confirm('Are you sure you want to delete this product?')" href="delannouncement.php?id=<?php echo $row['id'];?>"><i class="fas fa-trash-alt"></i></a></td>                        </tr>
                        <?php endwhile; ?>
            </table>
        </div>
    </div>
    
  </div>



    <?php include 'includes/script.php'; ?>
  <?php include 'includes/footer.php'; ?>