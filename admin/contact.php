    <!-- header -->
    <?php include 'includes/header.php'; ?>
  <?php include 'includes/navbar.php'; ?>
    

  
  
    <!-- navbar -->
    <?php 
    
    
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
      }?>




      <div class="chat-container mx-auto p-5">
          <section class="users">
            <header>
              <div class="chat-content">
              <?php 
                $unique_id = $_SESSION['unique_id'];
                $sql = "SELECT * FROM user WHERE unique_id = {$unique_id}";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    $fname = $row['firstname'];
                    $lname = $row['lastname'];
                    $email = $row['email'];
                    $status = $row['status'];
                    $user_id = $row['user_id'];
                    $unique_id = $row['unique_id'];
                    
                  }            
              ?>
          <!-- <img src="php/images/<?php //echo $row['img']; ?>" alt=""> -->
              <div class="details">
                <span><?php echo $fname. " " . $lname; ?></span>
                <p><?php echo $status; ?></p>
              </div>
              </header>
              <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
              </div>
              <div class="users-list">
                  
              </div>
          </section>
        </div>
        <div class="pb-5">

        </div>

<?php } ?>


  <!-- footer -->
  <script src="javascript/contact.js"></script>
  

  <?php include 'includes/footer.php'; ?>
