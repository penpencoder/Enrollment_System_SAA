<?php
	$con = mysqli_connect("localhost","root","","enrollment");

	$message = null;
 
    if(isset($_POST['register_button'])){
			$lrn = $_POST['lrn'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$role = 'student';
			$status = '0';

			function validateUsrename($username) {
				return strlen($username) >= 6;
			}

			function validatePassword($password) {
				return ctype_alnum($password) 
				&& strlen($password) >= 8;
			}
			
			// check no ada account nan
			$check = mysqli_query($con, "SELECT `lrn` FROM `users` WHERE `lrn` = '$lrn'");
			
			// mang check no ada metlang djay lrn
			$check2 = mysqli_query($con, "SELECT `lrn` FROM `student` WHERE `lrn` = '$lrn'");

			if(mysqli_num_rows($check) > 0) {
				$message = "account already exist";
			}
			else if(mysqli_num_rows($check2) < 1) {
				$message = "LRN is not enrolled";
			}
			else {
				$sql = "INSERT INTO `users`(`lrn`, `username`, `password`, `status`, `role`) 
				VALUES ('$lrn', '$username', '$password','$status', '$role')";
				
				if(!validateUsrename($_POST['username'])) {
					$message = "username must be at least 6 characters";
				}
				else if(!validatePassword($_POST['password'])) {
					$message = "password must be at least 8 characters";
				}
				else if($con->query($sql) === TRUE){
					$message = 'please wait for the confirmation of your account';
				}
			}
		}
?>

<?php require 'layouts/login_header.php'; ?>

	<div class="container p-2" style="text-aligh: center; margin-top: 8%;">
		<div class="card border-info mb-3" style="max-width: 50%; display: block; margin-left: auto; margin-right: auto;">
			<div class="card-header lead bg-info text-light" style="text-align: center;">
				Register
			</div>
				<div class="card-body">
					<form method="post" action="register.php">
						<img src="../images/logo.jpg" alt="logo" width="100" height="100" style="display: block; margin-left: auto; margin-right: auto;">
						
							<?php if($message !== null){ ?>
								<input class="form-control mb-2 text-center" type="text" value="<?php echo $message; ?>" placeholder="Readonly input here..." readonly>
							<?php	} ?>

						<div class="form-group">
							<label for="exampleInputPassword1">LRN</label>
							<input type="number" name="lrn" class="form-control" id="exampleInputPassword1" placeholder="LRN" required>
						</div>

						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="exampleInputPassword1">Username</label>
									<input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username" required>
								</div>
							</div>
							<div class="col-6">
								<label for="inlineFormInputGroupUsername">Password</label>
								<div class="input-group">
									<div class="input-group-prepend">
									<div class="input-group-text" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"><i class="far fa-eye"></i></div>
									</div>
									<input type="password" name="password" id="password" class="form-control" id="inlineFormInputGroupUsername" placeholder="password">
								</div>
							</div>
						</div>

						<input type="submit" name="register_button" class="btn btn-info w-100" value="Register">
					</form>
				</div>
			</div>
		</div>	
	</div>

	<script>
        function mouseoverPass(obj) {
			var obj = document.getElementById('password');
			obj.type = "text";
		}
		
		function mouseoutPass(obj) {
		var obj = document.getElementById('password');
		obj.type = "password";
        }
    </script>

<?php require 'layouts/login_footer.php'; ?>
