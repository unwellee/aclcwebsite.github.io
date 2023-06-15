<?php include 'includes/header.php';  ?>
<?php include 'includes/navbar.php';  


if (isset($_POST['announcebtn'])){
    $event = $_POST['event'];
    $eventdetails = $_POST['eventdetails'];
    $eventdate = $_POST['eventdate'];
    $publish_date = date("Y-m-d");
 
            $sql = "INSERT INTO `calendar`(`event`, `description`, `event_date`, `publish_date`) 
                VALUES ('$event', '$eventdetails','$eventdate','$publish_date')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $message = 'Successfully Submitted!';

                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('calendar.php');
                </SCRIPT>";
                   
                        
                }else{
                    echo "<script>alert('Something Went Wrong.')</script>";
                    
                }

            }
        

?>
<div class="container-fluid w-50">
        <h2>Fill Up Form</h2> 
        <form action="" method="POST">
                    <div class="form-group pt-2">
                        <label> Event Name </label>
                        <input type="text" name="event" class="form-control" placeholder="Enter Event Name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="eventdetails" class="form-control" placeholder="Enter Event Details" required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="row">
                    <div class="col">
                        <label for="">Event Date</label>
                        <input class="form-control" type="date" name="eventdate" required>
                    </div>
                    <div class="col">
                        
                    </div>
                    </div>
                     
                    
                    <div class="row pt-4">
                        <div class="m-3">
                            <a href="announcement.php" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="m-3">
                    <button type="submit" name="announcebtn" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
            </form>
            </div>
            </div>

            <?php include 'includes/script.php'; ?>
<?php include 'includes/footer.php'; ?>