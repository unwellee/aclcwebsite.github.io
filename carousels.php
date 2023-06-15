<?php include 'database/database.php';  ?>
    <?php 
    
        $result = $conn->query("SELECT * FROM `carousel` ORDER BY id DESC");

        if($result->num_rows >0){

            while($row = $result->fetch_assoc()){
              $ImageArray[] = $row['image'];
            }
          }
    ?>

<div class="carousel-background">
  <div id="carouselExampleIndicators" class="carousel slide" style="" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="admin/img/<?php echo $ImageArray[0] ?>" height="600px" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="admin/img/<?php echo $ImageArray[1] ?>"height="600px" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="admin/img/<?php echo $ImageArray[2] ?>" height="600px" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="admin/img/<?php echo $ImageArray[3] ?>" height="600px" alt="Fourth slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

