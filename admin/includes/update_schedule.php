<?php
    //MySQLi Procedural
    $con = mysqli_connect("localhost","root","","enrollment");
?>

<!-- Modal -->
<div class="modal fade" id="update<?php echo $row['schedule_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title text-light" id="exampleModalCenterTitle">Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form method="post" action="schedule.php" class="mt-3">
			<h5 class="text-primary" style="text-align: center;">Add Schedule</h5>
			<hr>
			<!-- teacher -->
			<div class="form-group">
				<select class="custom-select" name="faculty">
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
						<i class="fas fa-check"></i> 	Save Changes
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
        </div>
    </div>
</div>