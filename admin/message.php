    <!-- header -->
    <?php include 'includes/header.php'; ?>
  <?php include 'includes/navbar.php'; ?>
    

  
  
    <!-- navbar -->
    <?php 
    
    
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
      }?>
    

    <?php 
  


    
?>

      <div class="chat-container mx-auto">
        <section class="chat-area">
          <header>
          <?php 
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = {$user_id}");
                if(mysqli_num_rows($sql) > 0){
                  $row = mysqli_fetch_assoc($sql);
                }else{
                  header("location: contact.php");
                }           
            ?>

          <a href="contact.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <!-- <img src="php/images/<?php echo $row['img']; ?>" alt=""> -->
            <div class="details">
              <span><?php echo $row['firstname']. " " . $row['lastname'] ?></span>
              <p><?php echo $row['status']; ?></p>
            </div>
          </header>
          <div class="chat-box">

          </div>
          <form action="#" class="typing-area">
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
          </form>
        </section>  
              </div>

    <div class="pb-5">

    </div>          

    

  <?php

  ?>

    <script src="javascript/chat.js"></script>
    <!-- footer -->
    <?php include 'includes/footer.php'; ?>