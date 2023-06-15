    <!-- header -->
    <?php include 'includes/header.php';  ?>
    <?php include 'includes/navbar.php';  
    
    $result = $conn->query("SELECT * FROM `calendar` ORDER BY event_date DESC");

    ?>

    <!-- navbar -->

    <div class="">
        <div class="container p-4 bg-light bg-gradient text-secondary">
            <div class="row">
                <div class="col">
                <h1>Calendar</h1>
                </div>
                <div class="col col-lg-2">
                    <form action="addevent.php" class="POST">
                        <button type="submit" name="addannouncement" class="btn btn-primary">Add Event</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover justify-content-center">
                <thead class="table table-default font-size-20">
                    <tr>
                        <th>Event</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Edit / Delete</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <!-- <th scope="row"><?php //echo $row['id']; ?></th> -->
                            <td><?php echo $row['event']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['event_date']; ?></td>
                            <td><a href="updateevent.php?id=<?php echo $row['id'];?>"><i class="fas fa-edit m-2"></i></a><a onclick="return confirm('Are you sure you want to delete this product?')" href="delevent.php?id=<?php echo $row['id'];?>"><i class="fas fa-trash-alt"></i></a></td>                        </tr>
                        <?php endwhile; ?>
            </table>
        </div>
    </div>
    
  </div>



    <?php include 'includes/script.php'; ?>
  <?php include 'includes/footer.php'; ?>