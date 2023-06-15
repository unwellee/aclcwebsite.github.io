    <!-- header -->
    <?php include 'includes/header.php';  ?>
    <?php include 'database/database.php';  ?>
    

    <!-- highlight -->
    <?php include 'highlight.php';  ?>


    <!-- navbar -->
    <?php 
    if(!isset($_SESSION['user_id'])){
        include 'includes/navbar.php'; 
    }else{
        include 'loggednav.php';
    } 


    //for fetching the value of each row using $id
   if (isset($_GET['id'])){
    
    $id = $_GET['id'];
    $rcd = "SELECT * FROM `news` WHERE `id` = '$id'";

    $result = $conn->query($rcd);

    if($result->num_rows >0){

        while($row = $result->fetch_assoc()){
            $subj = $row['subject'];
            $desc = $row['description'];
            $img = $row['img'];
            $date = $row['news_date'];
            $id = $row['id'];
        }
    
    ?>    



    <!-- body -->
    <div class="container">
        <?php if(isset($_SESSION['user_id'])){ ?>
            <a href="userindex.php"><button type="button" class="news-btn">BACK</button></a>
        <?php }else{ ?>
            <a href="index.php"><button type="button" class="news-btn">BACK</button></a>
        <?php } ?>
        <div class="viewnews">
            <img src="admin/img/<?php echo $img; ?>" height="400" alt="">
            <div class="newsubj">
                <h3 class="pb-2"><?php echo $subj; ?></h3>
                <p class="newsdesc"><?php echo $desc; ?></p>
            </div>
        </div>
    </div>
    
<?php
    }
   }
?>





    <!-- footer -->
    <?php include 'includes/footer.php'; ?>