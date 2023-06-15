    <!-- header -->
    <?php include 'includes/header.php';  ?>
    <?php include 'includes/navbar.php';  
    
    $result = $conn->query("SELECT * FROM `contact`");

    ?>

    <!-- navbar -->

    <div class="">
        <div class="container p-4 bg-light bg-gradient text-secondary">
            <div class="row">
                <div class="col">
                <h1>Facility</h1>
                </div>
                <!-- <div class="col col-lg-2">
                    <form action="addcontactus.php" class="POST">
                        <button type="submit" name="addnews" class="btn btn-primary">Add Facility</button>
                    </form>
                </div> -->
            </div>
            <table class="table table-hover justify-content-center">
                <thead class="table table-default font-size-20">
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <!-- <th scope="row"><?php //echo $row['id']; ?></th> -->
                            <td><?php echo $row['header']; ?></td>
                            <td><img src="img/<?php echo $row['img']; ?>" height="80" width="100" alt=""></td>
                            <td><a href="updatecontact.php?id=<?php echo $row['id'];?>"><i class="fas fa-edit m-2"></i></a>
                            <!-- <a onclick="return confirm('Are you sure you want to delete this product?')" href="delcarousel.php?id=<?php// echo $row['id'];?>"><i class="fas fa-trash-alt"></i></a></td>                        </tr> -->
                        <?php endwhile; ?>
            </table>
        </div>
    </div>
    
  </div>



    <?php include 'includes/script.php'; ?>
  <?php include 'includes/footer.php'; ?>