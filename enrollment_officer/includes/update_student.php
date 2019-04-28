<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if($_GET['id']){
		$id = $_GET['id'];
		
		$sql = "SELECT * FROM `student` WHERE `student_id` = {$id}";
		$result = $con->query($sql);
		
		$data = $result->fetch_assoc();
		
		//$con->close();
?>

<?php require '../layouts/header.php'; ?>

<div class="float-right col-10" style="margin-top: 5%;">
    <div class="card mb-3 bg-info" style="max-width: col-9;">
        <div class="card-header text-light lead text-center">Enrollment Form</div>
            <div class="card-body bg-light text-dark">
                <form method="post" action="update_student_info.php" class="mt-3">
                    <h5 class="text-primary">Basic Information</h5>
                    <hr>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="lrn">LRN Number</label>
                                <input type="text" readonly class="form-control" name="lrn" id="lrn" aria-describedby="emailHelp" value="<?php echo $data['lrn']; ?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="gl">Grade Level</label>
                                <input type="number" class="form-control" name="grade_level" id="gl" aria-describedby="emailHelp" value="<?php echo $data['grade_level_id']; ?>" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <?php 
                                $select_school_year = mysqlI_query($con, "SELECT * FROM school_year where school_year = ");
                            ?>
                            <label class="mr-sm-2" for="sy">School Year</label>
                            <select class="custom-select" name="school_year" id="sy">
                                <?php
                                    while($row = mysqli_fetch_array($select_school_year)){
                                ?>
                                <option value="<?php $row['school_year_id']; ?>"><?php echo $row['school_year_start'] .'-'. $row['school_year_end'] ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="family_name">Family Name</label>
                                <input type="text" class="form-control" name="family_name" id="family_name" value="<?php echo $data['family_name']; ?>" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type		="text" class="form-control" name="first_name" id="first_name" value="<?php echo $data['first_name']; ?>" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" id="middle_name" value="<?php echo $data['middle_name']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $data['address']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="bday">Date of Birth</label>
                                <input type="date" class="form-control" name="bday" id="bday" value="<?php echo $data['bday']; ?>" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                    <label class="mr-sm-2" for="gender">Gender</label>
                                    <select class="custom-select mr-sm-2" name="gender" id="gender" value="<?php echo $data['gender']; ?>">
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="number" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo $data['mobile_number']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <h5 class="mt-4 text-primary">Other Details</h5>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="status" value="Regular" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadio1">Regular</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="status" value="Transferee" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Transferee</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="status" value="Balik Aral" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">Balik-Aral</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="status" value="Repeater" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio4">Repeater</label>
                            </div>
                        </div>
                        
                        <div class="col-7">
                            <div class="form-group">
                                <label for="mother_tounge">Mother Tounge</label>
                                <input type="text" class="form-control" name="mother_tounge" id="mother_tounge" value="<?php echo $data['mother_tounge']; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control" name="religion" id="religion" value="<?php echo $data['religion']; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="ethnicity">Ethnicity</label>
                                <input type="text" class="form-control" name="ethnicity" id="ethnicity" value="<?php echo $data['ethnicity']; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="dialect">Dialect</label>
                                <input type="text" class="form-control" name="dialect" id="dialect" value="<?php echo $data['dialect']; ?>" required>
                            </div>
                        </div>

                        <div class="col-2">

                            <div class="custom-control custom-radio">
                                <input type="radio" id="custom1" name="other_details" value="none" class="custom-control-input" checked>
                                <label class="custom-control-label" for="custom1">None</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="custom2" name="other_details" value="4ps" class="custom-control-input">
                                <label class="custom-control-label" for="custom2">4P's</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="custom3" name="other_details" value="ips" class="custom-control-input">
                                <label class="custom-control-label" for="custom3">IP's</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="custom4" name="other_details" value="ecd" class="custom-control-input">
                                <label class="custom-control-label" for="custom4">ECD</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="custom5" name="other_details" value="pwd" class="custom-control-input">
                                <label class="custom-control-label" for="custom5">PWD</label>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mt-4 text-primary">Enrollment Profile</h5>
                    <hr>
                    <h6 class="mt-4" style="width: 100%; text-align: center;">Previous Enrollment</h6>
                    
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="name" class="mt-2">School ID Number</label>
                            <input type="number" name="school_id_number" value="<?php echo $data['school_id_number']; ?>" class="form-control w-100 rounded">
                        </div>
                        <div class="col">
                            <label for="school_name" class="mt-2">Name of School</label>
                            <input type="text" name="school_name" value="<?php echo $data['school_name']; ?>" class="form-control w-100 rounded">

                            <label for="adviser_name" class="mt-2">Name of Adviser</label>
                            <input type="text" name="adviser_name" value="<?php echo $data['adviser_name']; ?>" class="form-control w-100 rounded">
                        </div>
                    </div>
                    
                    <h5 class="mt-5 text-primary">Parents/Guardian information</h5>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-4" style="border-right: 1px solid #B7B7B7;">
                            <label for="father_name" class="mt-2">Fathers Name</label>
                            <input type="text" name="father_name" value="<?php echo $data['father_name']; ?>" class="form-control w-100 rounded">
                        </div>
                        <div class="col-4" style="border-right: 1px solid #B7B7B7;">
                            <label for="mother_name" class="mt-2">Mothers Name</label>
                            <input type="text" name="mother_name" value="<?php echo $data['mother_name']; ?>" class="form-control w-100 rounded">
                        </div>
                        <div class="col-4">
                            <label for="duardianname" class="mt-2">Guardian Name</label>
                            <input type="text" name="guardian_name" value="<?php echo $data['guardian_name']; ?>" class="form-control w-100 rounded">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id" value="<?php echo $data['student_id'] ?>">
			                <button class="w-100 btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php'; ?>

<?php } ?>