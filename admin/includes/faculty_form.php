<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if(isset($_POST['insert'])){
		$lrn = $_POST['lrn'];
		$family_name = $_POST['family_name'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$address = $_POST['address'];
		$bday = $_POST['bday'];
		$mobile_number = $_POST['mobile_number'];

		$sql = "INSERT INTO `faculty`(`faculty_id_number`, `family_name`, `first_name`, `middle_name`, `bday`, `address`, `mobile_number`) 
					VALUES ('$lrn', '$family_name', '$first_name', '$middle_name', '$bday', '$address', '$mobile_number')";
	
		if($con->query($sql) === TRUE)
		{
			header('Location: manage_faculty.php');
		}
		else{
			$con->error;
		}
	}
	
?>

	<div class="container mb-4 border border-primary rounded">
		
		<form method="post" action="manage_faculty.php" class="mt-3">
			<h5 class="text-primary">Basic Information</h5>
			<hr>
			
			<div class="form-group">
				<label for="lrn">Faculty Id</label>
				<input type="text" class="form-control" name="lrn" id="lrn" aria-describedby="emailHelp" placeholder="Faculty Id" required>
			</div>

			<div class="row">
				<div class="col-4">
					<div class="form-group">
						<label for="family_name">Family Name</label>
						<input type="text" class="form-control" name="family_name" id="family_name" placeholder="Family Name" required>
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type		="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						<label for="middle_name">Middle Name</label>
						<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label for="bday">Date of Birth</label>
						<input type="date" class="form-control" name="bday" id="bday" required>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="mobile_number">Mobile Number</label>
						<input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" required>
					</div>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-6">
					<button type="submit" name="insert" class="btn btn-primary w-100">
						<i class="fas fa-check"></i> 	Add
					</button>
				</div>
				<div class="col-6">
					<button type="button" class="btn btn-warning w-100" data-dismiss="modal">
						<i class="fas fa-times"></i>    Close
                	</button>
				</div>
			</div>
		</form>
	</div>