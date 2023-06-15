 
    <!-- header -->
    <?php include 'includes/header.php';  ?>
    

    <!-- highlight -->
    <?php include 'highlight.php';  ?>
    <?php  
        if(isset($_SESSION['user_id'])){
            header("location: userindex.php");
        } 
    ?>  

    <!-- navbar -->
    <?php include 'includes/navbar.php';  ?>

    
    <!-- carousel -->
    <?php include 'carousels.php';  ?>

        
    <!-- welcomepage -->
    <?php include 'welcomepage.php'; ?>


    <!-- course-->
    <?php include 'course.php'; ?>

    <!-- calendar -->
    <?php include 'calendar.php'; ?>

    <!-- facilities starts -->
    <?php include 'facilities.php'; ?>


    <!-- contact us -->
    <?php include 'contactus.php'; ?>

    
    <!-- footer -->
    <?php include 'includes/footer.php'; ?>