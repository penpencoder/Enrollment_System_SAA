<?php require 'layouts/admin_header.php'; ?>

<?php
	$con = mysqli_connect("localhost","root","","enrollment");

	$message = null;

    if(isset($_POST['register_button'])){
		$id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
		$role = $_POST['role'];
		$status = 1;

		function validateUsrename($username) {
			return strlen($username) >= 6;
		}

		function validatePassword($password) {
			return ctype_alnum($password) 
			&& strlen($password) >= 8;
		}
		
		// check if id exist
		$check = mysqli_query($con, "SELECT `faculty_id_number` FROM `faculty` WHERE `faculty_id_number` = '$id'");

		//check if account exist 
		$check2 = mysqli_query($con, "SELECT `faculty_id`, `role` FROM `users` WHERE `faculty_id` = '$id' AND `role` = '$role'");

		if(mysqli_num_rows($check) < 1) {
			$message = "Invalid ID number";
		}
		else if(mysqli_num_rows($check2) >= 1) {
			$message = "Account already exist";
		}
		else {
			$sql = "INSERT INTO `users`(`faculty_id`, `username`, `password`, `status`, `role`) 
			VALUES ('$id', '$username', '$password', '$status', '$role')";
			
			if(!validateUsrename($_POST['username'])) {
				$message = "username must be at least 6 characters";
			}
			else if(!validatePassword($_POST['password'])) {
				$message = "password must be at least 8 characters";
			}
			else if($con->query($sql) === TRUE){
				$message = 'Account created';
			}
		}
    }
?>

<div class="float-right col-10" style="margin-top: 5%;">
	<div class="card border-info mb-3" style="max-width: 50%; margin: 0 auto; margin-top: 3%;">
		<div class="card-header bg-info text-light">Faculty Account</div>
		<div class="card-body text-info">
			<h5 class="card-title text-center">Please Fill Out Form</h5>

			<?php if($message !== null){ ?>
				<input class="form-control mb-2 text-center" type="text" value="<?php echo $message; ?>" placeholder="Readonly input here..." readonly>
			<?php	} ?>

			<form action="faculty_account.php" method="post">
				<div class="form-group">
					<label for="example">ID Number</label>
					<input type="number" name="id" class="form-control" id="example" aria-describedby="emailHelp" placeholder="ID Number">
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
						</div>
					</div>

					<div class="col-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="exampleFormControlSelect1">Account Type</label>
					<select class="form-control" name="role" id="exampleFormControlSelect1">
						<option value="faculty">Faculty</option>
						<option value="enrollment officer">Enrollment Officer</option>
					</select>
				</div>

				<button type="submit" name="register_button" class="btn btn-info w-100">Submit</button>
			</form>
		</div>
	</div>
</div>
<?php require 'layouts/admin_footer.php'; ?>

