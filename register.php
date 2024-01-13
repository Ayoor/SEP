<?php
	session_start();
	if(isset($_SESSION["user"])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Shelton Tool | Register</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/auth.css">
</head>

<body>
	<!-- partial:index.partial.html -->
	<div class="box-form">
		<div class="left">
			<div class="overlay">
				<h1>Shelton Tool</h1>
				<span>
					<p>Already Have an account? Login now</p>
					<a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> Login Now</a>
				</span>
			</div>
		</div>


		<div class="right">
			<h5>Register</h5>
			
			<form action="backend/register.php" method="post">
				<div class="inputs">
					<?php
					if(isset($_REQUEST["email_already_exist"])){
						?>
						<center><span class="text-danger">* Sorry! This email is already registered</span></center>
						<?php
					} else if(isset($_REQUEST["saved"])){
						?>
						<center><span class="text-success">*Account created successfully</span></center>
						<?php
					}
					?>
					<input type="text" placeholder="First Name" name="fname" required>
					<br>
                    <input type="text" placeholder="Last Name" name="lname" required>
					<br>
                    <input type="text" placeholder="Phone Number" name="phone" required>
					<br>
                    <input type="email" placeholder="Email" name="email" required>
					<br>
                    <br>
                   <span> Date of Birth</span>
                    <input type="date" placeholder="Date of Birth" name="dob" required style="margin-top:0px !important">
					<br>
                    <input type="text" placeholder="Postal code" name="postal" required>
					<br> <br>
                    <textarea name="address" id="" cols="26" rows="4" placeholder="Enter Address" required></textarea>
					<br> <br>
                    <select name="gender" style="width:230px;height:30px">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
					<br>
					<input type="password" placeholder="Password" name="password" required>
				</div>

				<br><br>
				<button type="submit" style="cursor:pointer">Create Account</button>
			</form>
		</div>

	</div>
	<!-- partial -->

</body>

</html>