<div class="container mb-4 border border-primary rounded">
	
	<form method="post" action="schedule.php" class="mt-3">
		<h5 class="text-primary" style="text-align: center;">Add Schedule</h5>
		<hr>
		<!-- teacher -->
		<div class="form-group">
			<select class="custom-select" name="faculty">
			<?php
				$con = mysqli_connect("localhost","root","","enrollment");

				if(isset($_POST['insert'])){
					$faculty = $_POST['faculty'];
					$subject = $_POST['subject'];
					$time = $_POST['time'];
					$schoolyear = $_POST['schoolyear'];
					
					$sql = "INSERT INTO `schedule`(`faculty_id`, `subject_id`, `time_id`, `school_year_id`) 
							VALUES ('$faculty','$subject','$time','$schoolyear')";
				
					if($con->query($sql) === TRUE) {
									
					}
					else{
						echo $con->error;
					}
				}
				
			?>
				<?php
					$result = mysqli_query($con, "SELECT * FROM faculty");
					while($row = mysqli_fetch_array($result)){
				?>
				<option value="<?php echo $row['faculty_id'];?>"><?php echo $row["family_name"];?>, <?php echo $row["first_name"];?></option>
				<?php } ?>
			</select>
		</div>
		
		<div class="row">
			<div class="col-6">
				<!-- subject -->
				<div class="form-group">
					<select class="custom-select" name="subject">
						<?php
							$subject = mysqli_query($con, "select subject_id, subject_name, grade_level from subject");
							while($row = mysqli_fetch_array($subject)){
								//$gl = $row['grade_level'];
						?>
						<option select="selected" value="<?php echo $row['subject_id'];?>"><?php echo $row["subject_name"] .' - '.'Grade '. $row['grade_level'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="col-6">
				<!-- time -->
				<div class="form-group">
					<select class="custom-select" name="time">
						<?php
							$result = mysqli_query($con, "SELECT * FROM time");
							while($row = mysqli_fetch_array($result)){
						?>
						<option value="<?php echo $row['time_id'];?>"><?php echo $row["start_time"];?> - <?php echo $row["end_time"];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		
		<!-- school year -->
		<div class="form-group">
			<select class="custom-select" name="schoolyear">
				<?php
					$result = mysqli_query($con, "SELECT * FROM school_year");
					while($row = mysqli_fetch_array($result)){
				?>
				<option value="<?php echo $row['school_year_id'];?>"><?php echo $row["school_year_start"];?> - <?php echo $row["school_year_end"];?></option>
				<?php } ?>
			</select>
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