<?php
    $con = mysqli_connect("localhost", "root", "", "enrollment");

    if(isset($_POST['update'])) {
        $username = $_POST['username'];
        $password = $_POST['pass'];

        $lrn = $_POST['id'];

        $update_sql = "UPDATE `users` SET `username`='$username',`password`='$password' WHERE `lrn` = '$lrn'";

        if($con->query($update_sql) === TRUE) {
            header('location: account.php');
        }
        else {
            echo $con->error;
        }
    }
?>