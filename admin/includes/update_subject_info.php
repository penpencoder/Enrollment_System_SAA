<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if($_POST){
        $id = $_POST['id'];
		$code = $_POST['code'];
		$name = $_POST['name'];
		$level = $_POST['level'];

		$sql = "UPDATE `subject` SET `subject_code`= '$code',
        `subject_name`= '$name',`grade_level`= '$level' WHERE `subject_id` = '$id'";
	
		if($con->query($sql) === TRUE)
		{
            header('location: ../manage_subject.php');
		}
		else{
			echo $con->error;
		}
	}
	
?>