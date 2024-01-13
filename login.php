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
	<title>Shelton Tool | Login</title>
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
					<p>Not a member of Shelton? What are you waiting for</p>
					<a href="register.php"><i class="fa fa-user" aria-hidden="true"></i> Join Shelton</a>
				</span>
			</div>
		</div>


		<div class="right">
			<h5>Login</h5>
			<p>Don't have an account? <a href="register.php">Creat Your Account</a> it takes less than a minute</p>
			<form action="backend/signin.php" method="post">
				<div class="inputs">
					<?php
					if(isset($_REQUEST["invalid_credentials"])){
						?>
						<center><span class="text-danger">* Error! Invalid email or password</span></center>
						<?php
					}
					?>
					<input type="text" placeholder="Email" name="email" required>
					<br>
					<input type="password" placeholder="Password" name="password" required>
				</div>

				<br><br>
				<button type="submit" style="cursor:pointer">Login</button>
			</form>
		</div>

	</div>
	<!-- partial -->

</body>

</html>