<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if($_POST){
		$family_name = $_POST['family_name'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$address = $_POST['address'];
		$bday = $_POST['bday'];
        $mobile_number = $_POST['mobile_number'];
        
        $faculty_id = $_POST['id'];

		$sql = "UPDATE `faculty` SET `family_name`='$family_name',`first_name`='$first_name',
        `middle_name`='$middle_name',`bday`='$bday',`address`='$address',`mobile_number`='$mobile_number' 
        WHERE `faculty_id` = '$faculty_id'";
	
		if($con->query($sql) === TRUE)
		{
			header('Location: ../manage_faculty.php');
		}
		else{
			$con->error;
		}
	}
	
?>