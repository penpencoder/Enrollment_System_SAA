<?php
    $con = mysqli_connect("localhost", "root", "", "enrollment");

    if($_POST){
        $id = $_POST['id'];

        $sql = "UPDATE `enrollment` SET `status` = 'enrolled' WHERE `student_id` = '$id'";
        $result = $con->query($sql);

        if($result === TRUE){
            header('location: ../enrolled_students.php');
        }
        else{
            $con->error;
        }
    }
?>