<?php include 'database/database.php';  ?>
    <?php 
    
            $result = $conn->query("SELECT * FROM `calendar` ORDER BY event_date DESC LIMIT 4");

    ?>

<section class="calendar">

<h1>Campus Calendar</h1>
<hr style="margin-left: auto;">

<div class="row">
    <?php while ($row = $result->fetch_assoc()): 
    $paymentDate = $row['event_date'];
    $month = date('M', strtotime($paymentDate));
    $day = date('d', strtotime($paymentDate));
    ?> 
    <div class="col-md-3 col-sm-6 pt-3">
        <span class="date">
            <span class="month"><?php echo $month; ?></span>
            <span class="day"><?php echo $day; ?></span>
            <hr width="100px" style="margin: auto;">
        </span>
        <h5 class="pt-3"><?php echo $row['event']; ?></h5>
        <span class="desc"><?php echo $row['description']; ?></span>
    </div>
    <?php endwhile; ?>    
</div>

</section>

<!-- facilities ends -->