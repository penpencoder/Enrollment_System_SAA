<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if($_POST){
        
        $student_id = $_POST['id'];

		$grade_level = $_POST['grade_level'];
		$family_name = $_POST['family_name'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$address = $_POST['address'];
		$bday = $_POST['bday'];
		$gender = $_POST['gender'];
		$mobile_number = $_POST['mobile_number'];
		$status = $_POST['status'];
		$mother_tounge = $_POST['mother_tounge'];
		$religion = $_POST['religion'];
		$ethnicity = $_POST['ethnicity'];
		$dialect = $_POST['dialect'];
		$other_details = $_POST['other_details'];
		$school_id_number = $_POST['school_id_number'];
		$school_name = $_POST['school_name'];
		$adviser_name = $_POST['adviser_name'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		$guardian_name = $_POST['guardian_name'];
		
		$sql =" UPDATE `student` SET `grade_level_id` = '$grade_level', `family_name`='$family_name', `first_name`='$first_name',
                            `middle_name` = '$middle_name', `bday`='$bday', `gender`='$gender', `address`='$address', `status`='$status',
                            `mother_tounge`='$mother_tounge', `religion`='$religion', `ethnicity`='$ethnicity', `dialect`='$dialect',
                            `other_details`='$other_details', `school_id_number`='$school_id_number', `school_name`='$school_name',
                            `adviser_name`='$adviser_name', `father_name`='$father_name', `mother_name`='$mother_name', `guardian_name`='$guardian_name',
                            `mobile_number`='$mobile_number' WHERE `student_id` = '$student_id' ";
	
		if($con->query($sql) === TRUE)
		{
			header('Location: ../enrolled_students.php');
		}
		else{
			echo "Error while updating record: ". $con->error;
		}
		$con->close();
	}
?>
