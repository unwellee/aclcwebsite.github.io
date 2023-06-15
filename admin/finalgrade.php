<?php 
    include 'database/database.php'; 
    
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM `user` WHERE `user_id` = $id");
    while($row = $result->fetch_assoc()):

    
    $prelim = $row['prelim'];
    $midterm = $row['midterm'];
    $prefinal = $row['prefinal'];
    $final = $row['final'];
    endwhile;

    $finalgrade = ($prelim*0.2)+($midterm*0.2)+($prefinal*0.2)+($final*0.4);
       
    $grade = $finalgrade;
    if ($grade <= 100 && $grade >= 95){
        $remark = " (A+)";

    }elseif ($grade <=94 && $grade >= 90){
        $remark = " (A)";

    }elseif ($grade <=89 && $grade >= 85){
        $remark = " (A-)";

    }elseif ($grade <= 84 && $grade >= 80){
        $remark = " (B+)";

    }elseif ($grade <=79 && $grade >= 75){
        $remark = " (B)";

    }elseif ($grade <=74 && $grade >= 70){
        $remark = " (B-)";

    }elseif ($grade <=69 && $grade >= 65){
        $remark = " (C+)";

    }elseif ($grade <=69 && $grade >= 65){
        $remark = " (C)";

    }elseif ($grade <=64 && $grade >= 60){
        $remark = " (C-)";

    }elseif ($grade <=59 && $grade >= 55){
        $remark = " (D+)";

    }elseif ($grade <=54 && $grade >= 51){
        $remark = " (D)";

    }elseif ($grade =50){
        $remark = " (F)";
    }
    
    $sql = "UPDATE `user` 
    SET `finalgrade`= '$finalgrade' , `remark` = '$remark'
    WHERE `user_id` = $id";

    $result = $conn->query($sql);
    header("Refresh:0.1; Url=wadgrades.php");

    ?>