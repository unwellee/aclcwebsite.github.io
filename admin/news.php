    <!-- header -->
    <?php include 'includes/header.php';  ?>
    <?php include 'includes/navbar.php';  
    
    $result = $conn->query("SELECT * FROM `news` ORDER BY news_date DESC");

    ?>

    <!-- navbar -->

    <div class="">
        <div class="container p-4 bg-light bg-gradient text-secondary">
            <div class="row">
                <div class="col">
                <h1>News</h1>
                </div>
                <div class="col col-lg-2">
                    <form action="addnews.php" class="POST">
                        <button type="submit" name="addnews" class="btn btn-primary">Add News</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover justify-content-center">
                <thead class="table table-default font-size-20">
                    <tr>
                        <th>News</th>
                        <th>Subject</th>
                        <th>Image</th>
                        <th>News Date</th>
                        <th>Edit / Delete</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <!-- <th scope="row"><?php //echo $row['id']; ?></th> -->
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><img src="img/<?php echo $row['img']; ?>" height="80" width="100" alt=""></td>
                            <td><?php echo $row['news_date']; ?></td>
                            <td><a href="updatenews.php?id=<?php echo $row['id'];?>"><i class="fas fa-edit m-2"></i></a><a onclick="return confirm('Are you sure you want to delete this product?')" href="delnews.php?id=<?php echo $row['id'];?>"><i class="fas fa-trash-alt"></i></a></td>                        </tr>
                        <?php endwhile; ?>
            </table>
        </div>
    </div>
    
  </div>



    <?php include 'includes/script.php'; ?>
  <?php include 'includes/footer.php'; ?>