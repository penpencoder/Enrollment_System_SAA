<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if(isset($_POST['insert'])){
		$name = $_POST['name'];
		$level = $_POST['level'];

		$sql = "INSERT INTO `section`(`section_name`, `grade_level`) 
		VALUES ('$name', '$level')";
	
		if($con->query($sql) === TRUE)
		{
		}
		else{
			echo $con->error;
		}
	}
	
?>

	<div class="container mb-4 border border-primary rounded">
		
		<form method="post" action="grade_level.php" class="mt-3">
			<h5 class="text-primary" style="text-align: center;">Grade Level Information</h5>
			<hr>
			
			<div class="form-group">
				<label for="lrn">Section Name</label>
				<input type="text" class="form-control" name="name" id="lrn" aria-describedby="emailHelp" placeholder="Section Name" required>
			</div>

			<div class="form-group">
				<label for="lrn">Grade Level</label>
				<input type="number" class="form-control" name="level" id="lrn" aria-describedby="emailHelp" placeholder="Grade Level" required>
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