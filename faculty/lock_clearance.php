<?php
    $con = mysqli_connect("localhost", "root", "", "enrollment");

    if(isset($_POST['add_grade'])) {
        $a = $_POST['a'];
        //echo $a;
        while($a>0){
            $lrn = $_POST['lrn'.$a];
            $check = $_POST['check'.$a];
            $faculty_id = $_POST['teacher_id'];
            $subject = $_POST['sub_id'];

            echo $subject . '<br>';
            echo $faculty_id .'<br>';
            echo $lrn . '<br>';
            echo $check . '<br>';

            $a--;

            $sql = "UPDATE `clearance` SET `status`='1' WHERE `lrn` = '$lrn' AND '$lrn' == 'check'";
            
            //$sql = "INSERT INTO `grade`(`faculty_id`, `subject_id`, `student_id`, `first_grading`, `second_grading`, `third_grading`, `fourth_grading`) 
            //VALUES ('$faculty_id', '$subject', '$lrn', '$first', '$second', '$third', '$fourth')";

            if($con->query($sql) === TRUE) {
                header('location: clearance.php');
            }
        }
        
    }
?>