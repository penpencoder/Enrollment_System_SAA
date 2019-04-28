<?php
    $con = mysqli_connect("localhost", "root", "", "enrollment");

    if(isset($_POST['update'])) {
        echo $username = $_POST['username'];
        echo $password = $_POST['pass'];

        echo $id = $_POST['id'];

        $update_sql = "UPDATE `users` SET `username`='$username',`password`='$password' WHERE `faculty_id` = '$id'";

        if($con->query($update_sql) === TRUE) {
            header('location: account.php');
        }
        else {
            echo $con->error;
        }
    }
?>