<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if($_POST){
        $id = $_POST['id'];
		$name = $_POST['name'];
		$level = $_POST['level'];

		$sql = "UPDATE `section` SET `section_name`='$name',`grade_level`='$level' WHERE `section_id` = '$id'";
	
		if($con->query($sql) === TRUE)
		{
            header('location: ../grade_level.php');
		}
		else{
			echo $con->error;
		}
	}
	
?>