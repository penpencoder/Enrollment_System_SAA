<?php
	session_start();

	$con = mysqli_connect("localhost","root","","enrollment");

	$message = null;

	if(isset($_POST['login_button'], $_POST['username'], $_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = mysqli_query($con,"SELECT `faculty_id`, `lrn`, `username`, `password`, `status`, `role` FROM `users` WHERE `username` = '$username' AND `password` = '$password'");	

		if(mysqli_num_rows($sql) >= 1) {
			while($row = mysqli_fetch_array($sql)){
				
				$_SESSION['username'] = $username;

				if($row['status'] === '0'){
					$message = 'account has not approved yet';
				}
				else if($username == $row['username'] && $password == $row['password'] && $row['role'] == "student"){
					$_SESSION['lrn'] = $row['lrn'];
					header('Location: ../student/schedule.php');
				}
				else if($username == $row['username'] && $password == $row['password'] && $row['role'] == "faculty"){
					$_SESSION['id'] = $row['faculty_id'];
					header('Location: ../faculty/faculty_schedule.php');
				}
				else if($username == $row['username'] && $password == $row['password'] && $row['role'] == "admin"){
					header('Location: ../admin/manage_faculty.php');
				}
				else if($username == $row['username'] && $password == $row['password'] && $row['role'] == "enrollment officer"){
					header('Location: ../enrollment_officer/enrollment_form.php');
				}
			}
		}
		else {
			$message = 'your username or password is incorrect';
		}
	}
	
?>

<?php require 'layouts/login_header.php'; ?>

	<div class="container p-2" style="text-aligh: center; margin-top: 8%;">
		<div class="card border-info mb-3" style="max-width: 50%; display: block; margin-left: auto; margin-right: auto;">
			<div class="card-header lead bg-info text-light" style="text-align: center;">Login</div>
				<div class="card-body">
					<form method="post" action="login.php">
						<img src="../images/logo.jpg" alt="logo" width="100" height="100" style="display: block; margin-left: auto; margin-right: auto;">

						<?php if($message !== null){ ?>
							<input class="form-control mb-2 text-center" type="text" value="<?php echo $message; ?>" placeholder="Readonly input here..." readonly>
						<?php	} ?>

						<div class="form-group">
							<label for="exampleInputPassword1">Username</label>
							<input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username" required>
						</div>
						
						<label for="inlineFormInputGroupUsername">Password</label>
						<div class="input-group">
							<div class="input-group-prepend">
							<div class="input-group-text" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"><i class="far fa-eye"></i></div>
							</div>
							<input type="password" name="password" id="password" class="form-control" id="inlineFormInputGroupUsername" placeholder="password">
						</div>

						<input type="submit" name="login_button" class="btn btn-info w-100 mt-3" value="Login">
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
