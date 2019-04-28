<?php
    $con = mysqli_connect("localhost", "root", "", "enrollment");

    if(isset($_POST['add_grade'])) {
        $a = $_POST['a'];
        //echo $a;
        while($a>0){
            $first = $_POST['first_grading'.$a];
            $second = $_POST['second_grading'.$a];
            $third = $_POST['third_grading'.$a];
            $fourth = $_POST['fourth_grading'.$a];
            $lrn = $_POST['lrn'.$a];
            $faculty_id = $_POST['teacher_id'];
            $subject = $_POST['sub_id'];
    
            echo $subject . '<br>';
            echo $faculty_id .'<br>';
            echo $lrn . '<br>';
            echo $first . '<br>';
            echo $second . '<br>';
            echo $third . '<br>';
            echo $fourth . '<br>';

            $a--;

            $sql = "UPDATE `grade` SET `faculty_id` = '$faculty_id',`subject_id` = '$subject', `first_grading` = '$first',
            `second_grading` = '$second', `third_grading` = '$third', `fourth_grading` = '$fourth', `lock` = '1' WHERE `student_id` = '$lrn'";
            
            //$sql = "INSERT INTO `grade`(`faculty_id`, `subject_id`, `student_id`, `first_grading`, `second_grading`, `third_grading`, `fourth_grading`) 
            //VALUES ('$faculty_id', '$subject', '$lrn', '$first', '$second', '$third', '$fourth')";

            if($con->query($sql) === TRUE) {
                header('location: faculty_grades.php');
            }
        }
        
    }
?>