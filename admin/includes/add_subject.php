<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if(isset($_POST['insert'])){
		$code = $_POST['code'];
		$name = $_POST['name'];
		$level = $_POST['grade_level'];

		$sql = "INSERT INTO `subject`(`subject_code`, `subject_name`, `grade_level`) 
		VALUES ('$code','$name','$level')";
	
		if($con->query($sql) === TRUE)
		{
		}
		else{
			echo $con->error;
		}
	}
	
?>

	<div class="container mb-4 border border-primary rounded">
		
		<form method="post" action="manage_subject.php" class="mt-3">
			<h5 class="text-primary" style="text-align: center;">Subject Information</h5>
			<hr>
			
			<div class="form-group">
				<label for="lrn">Subject Code</label>
				<input type="number" class="form-control" name="code" id="lrn" aria-describedby="emailHelp" placeholder="Subject Code" required>
			</div>

			<div class="form-group">
				<label for="lrn">Subject Name</label>
				<input type="text" class="form-control" name="name" id="lrn" aria-describedby="emailHelp" placeholder="Subject Name" required>
			</div>

			<div class="form-group">
				<label for="lrn">Grade Level</label>
				<input type="number" class="form-control" name="grade_level" id="lrn" aria-describedby="emailHelp" placeholder="Grade Level" required>
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