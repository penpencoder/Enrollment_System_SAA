<?php
    $con = mysqli_connect("localhost","root","","enrollment");

    if(isset($_POST['btnAnnounce'])){
        $announcement = $_POST['inputAnnounce'];
        
        $sql = "INSERT INTO `announcement`(`announce_id`, `announcement`) 
                VALUES ('','$announcement')";
    
        if($con->query($sql) === TRUE) {           
            header('Location: ../admin_lock_grades.php');      
        }
        else{
            echo $con->error;
        }
    }
    
?>