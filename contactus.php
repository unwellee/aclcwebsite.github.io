<?php include 'database/database.php';  ?>
    <?php 
    
        $result = $conn->query("SELECT * FROM `contact`");

        if($result->num_rows >0){

            while($row = $result->fetch_assoc()){
              $ImgArray[] = $row['img'];
              $HeaderArray[] = $row['header'];
            }
          }
    ?>

    <section class="contact">
        <h1><?php echo $HeaderArray[0]; ?></h1>
        <a href="" class="hero-btn">Contact Us</a>
    </section>