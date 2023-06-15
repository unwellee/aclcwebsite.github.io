    <!-- header -->
    <?php include 'includes/header.php';  ?>
    <?php  
        if(!isset($_SESSION['user_id'])){
            header("location: login.php");
        } 
    ?>

    <!-- highlight -->
    <?php include 'highlight.php';  ?>


    <!-- navbar -->
    <?php 
    if(!isset($_SESSION['user_id'])){
        include 'includes/navbar.php'; 
    }else{
        include 'loggednav.php';
    } ?>

    <!-- carousel -->
    <?php include 'carousels.php';  ?>

    <!-- welcomepage -->
    <?php include 'welcomepage.php'; ?>


    <!-- course-->
    <?php include 'course.php'; ?>


    <!-- facilities starts -->
    <?php include 'facilities.php'; ?>


    <!-- contact us -->
    <?php include 'contactus.php'; ?>

    
    <!-- footer -->
    <?php include 'includes/footer.php'; ?>