    <!-- header -->
    <?php include 'includes/header.php';  ?>
    

    <!-- highlight -->
    <?php include 'highlight.php';  ?>


    <!-- navbar -->
    <?php 
    if(!isset($_SESSION['user_id'])){
        include 'includes/navbar.php'; 
    }else{
        include 'loggednav.php';
    } ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">

            </div>
            <div class="col-md-6 col-lg-6">
                
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>