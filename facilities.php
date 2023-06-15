<?php include 'database/database.php';  ?>
    <?php 
    
        $result = $conn->query("SELECT * FROM `facility`");

        if($result->num_rows >0){

            while($row = $result->fetch_assoc()){
              $ImgArray[] = $row['img'];
              $NameArray[] = $row['facility_name'];
            }
          }
    ?>


<section class="facilities">

        <h1>Our Facilities</h1>
   
        <div class="row">
            <div class="facilities-col">
                <img src="admin/img/<?php echo $ImgArray[0]; ?>">
                <h3 class="pt-2"><?php echo $NameArray[0]; ?></h3>
                <!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking</p> -->
            </div>
            <div class="facilities-col">
                <img src="admin/img/<?php echo $ImgArray[1]; ?>">
                <h3 class="pt-2"><?php echo $NameArray[1]; ?></h3>
                <!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking</p> -->
            </div>
            <div class="facilities-col">
                <img src="admin/img/<?php echo $ImgArray[2]; ?>">
                <h3 class="pt-2"><?php echo $NameArray[2]; ?></h3>
                <!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking</p> -->
            </div>
        </div>
    
    </section>

    <!-- facilities ends -->