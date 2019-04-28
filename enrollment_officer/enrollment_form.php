<?php
	$con = mysqli_connect("localhost","root","","enrollment");
	
	if(isset($_POST['insert'])){
		$lrn = $_POST['lrn'];
		$grade = $_POST['grade_level'];
		$sy = $_POST['school_year'];
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
        //$requirement = $_POST['requirement'];

        $sql ="INSERT INTO `student`(`lrn`, `grade_level_id`, `school_year`, `family_name`, `first_name`, `middle_name`, `bday`, `gender`, `address`, `status`, `mother_tounge`, `religion`, `ethnicity`, `dialect`, `other_details`, `school_id_number`, `school_name`, `adviser_name`, `father_name`, `mother_name`, `guardian_name`, `mobile_number`) 
                VALUES ('$lrn','$grade', '$sy', '$family_name', '$first_name', '$middle_name', '$bday', '$gender', '$address', '$status', '$mother_tounge', '$religion', '$ethnicity', '$dialect', '$other_details', '$school_id_number', '$school_name', '$adviser_name', '$father_name', '$mother_name', '$guardian_name', '$mobile_number');";
        $sql .= "INSERT INTO `clearance`(`lrn`, `grade_level`, `status`) VALUES ('$lrn', '$grade', '0');";
        $sql .= "INSERT INTO `grade`(`student_id`) VALUES ('$lrn')";

        if(mysqli_multi_query($con, $sql))
        {
            header('Location: enrolled_students.php');
        }
        else{
            echo $con->error;
        }
        
	}
	
?>

<?php require 'layouts/header.php'; ?>

    <div class="float-right col-10" style="margin-top: 5%;">
        <div class="card mb-3 bg-info border border-light" style="max-width: col-9;">
            <div class="card-header text-light lead text-center">Enrollment Form</div>
                <div class="card-body bg-light text-dark">
                    <form method="post" action="enrollment_form.php" class="mt-3">
                    <h5 class="mt-3 text-primary">Requirements</h5>
                        <hr>
                        <div class="mb-3">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" value="good moral" name="requirement[]" class="custom-control-input" id="customControlValidation1" required>
                                        <label class="custom-control-label" for="customControlValidation1">Good Moral Certificate</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" value="birth certificate" name="requirement[]" class="custom-control-input" id="customControlValidation2" required>
                                        <label class="custom-control-label" for="customControlValidation2">Birth Certificate</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" value="clearance" name="requirement[]" class="custom-control-input" id="customControlValidation5" required>
                                        <label class="custom-control-label" for="customControlValidation5">Clearance</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" value="form 137" name="requirement[]" class="custom-control-input" id="customControlValidation3" required>
                                        <label class="custom-control-label" for="customControlValidation3">DepEd Form 137</label>
                                        <div class="feedback">for new students only!</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" value="form 138" name="requirement[]" class="custom-control-input" id="customControlValidation4">
                                        <label class="custom-control-label" for="customControlValidation4">DepEd Form 138</label>
                                        <div class="feedback">for transferees only!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-primary mt-3">Basic Information</h5>
                        <hr>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <?php
                                        $lrn = rand(1111111111,999999999); 
                                    ?>
                                    <label for="lrn">LRN Number</label>
                                    <input type="text" readonly class="form-control" name="lrn" id="lrn" aria-describedby="emailHelp" value="<?php echo $lrn; ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Grade Level</label>
                                    <select class="form-control" name="grade_level" id="exampleFormControlSelect1">
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <?php 
                                    $select_school_year = mysqlI_query($con, "SELECT * FROM school_year");
                                ?>
                                <label class="mr-sm-2" for="sy">School Year</label>
                                <select class="custom-select" name="school_year" id="sy">
                                    <?php
                                        while($row = mysqli_fetch_array($select_school_year)){
                                    ?>
                                    <option value="<?php echo $row['school_year_id']; ?>"><?php echo $row['school_year_start'] .'-'. $row['school_year_end'] ?></option>
                                        <?php } ?>
                                </select>
                            </div>
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
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="bday">Date of Birth</label>
                                    <input type="date" class="form-control" name="bday" id="bday" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                        <label class="mr-sm-2" for="gender">Gender</label>
                                        <select class="custom-select mr-sm-2" name="gender" id="gender">
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" required>
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
                                    <input type="text" class="form-control" name="mother_tounge" id="mother_tounge" placeholder="Mother Tounge" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="religion">Religion</label>
                                    <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="ethnicity">Ethnicity</label>
                                    <input type="text" class="form-control" name="ethnicity" id="ethnicity" placeholder="Ethnicity" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="dialect">Dialect</label>
                                    <input type="text" class="form-control" name="dialect" id="dialect" placeholder="Dialect" required>
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
                        <h6 class="mt-4 text-info">Previous Enrollment</h6>
                        
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="name" class="mt-2">School ID Number</label>
                                <input type="number" name="school_id_number" placeholder="School ID Number" class="form-control w-100 rounded">
                            </div>
                            <div class="col">
                                <label for="school_name" class="mt-2">Name of School</label>
                                <input type="text" name="school_name" placeholder="Name of School" class="form-control w-100 rounded">

                                <label for="adviser_name" class="mt-2">Name of Adviser</label>
                                <input type="text" name="adviser_name" placeholder="Name of Advicer" class="form-control w-100 rounded">
                            </div>
                        </div>
                        
                        <h5 class="mt-5 text-primary">Parents/Guardian information</h5>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-4" style="border-right: 1px solid #B7B7B7;">
                                <label for="father_name" class="mt-2">Fathers Name</label>
                                <input type="text" name="father_name" placeholder="Father Name" class="form-control w-100 rounded">
                            </div>
                            <div class="col-4" style="border-right: 1px solid #B7B7B7;">
                                <label for="mother_name" class="mt-2">Mothers Name</label>
                                <input type="text" name="mother_name" placeholder="Mothers Name" class="form-control w-100 rounded">
                            </div>
                            <div class="col-4">
                                <label for="duardianname" class="mt-2">Guardian Name</label>
                                <input type="text" name="guardian_name" placeholder="Guardians Name" class="form-control w-100 rounded">
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col">
                                <button type="submit" name="insert" class="btn btn-success w-100">
                                    <i class="fas fa-check"></i>	Enroll
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require 'layouts/footer.php'; ?>