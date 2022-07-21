<?php 

include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
$msg = '';
if (isset($_POST['submit'])) {
	$username = ($_POST['username']);
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);

	if ($password == $cpassword) {			
		$sql = "SELECT * FROM form WHERE username ='$username'";  	
		$result = $conn->query($sql); 
		if (!$result->num_rows > 0) { 	
			$sql = "INSERT INTO form (username, password) 
			VALUES ('$username', '$password')";  
			$result = $conn->query($sql);   
			if ($result) {                         
				header("Location: login.php");
			} else {
				$msg='Woops! Something Wrong Went.';
			}
		} else{
			$msg='Woops! Something Wrong.';
		}
	} else {
		$msg='Password Not Matched.';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<title>Register Form</title>
</head>
<body>
	<section class="container-login-register">
	<img src="assets/img/image.png" alt="image">
		<form action="" method="POST" class="login-account">
            <p class="login-text">Register</p>
			<div class="input-field">
				<input type="text" placeholder="Username" name="username" placeholder="username" required>
			</div>
			<div class="input-field">
				<input type="password" placeholder="Password" name="password" placeholder="password" required>
            </div>
            <div class="input-field">
				<input type="password" placeholder="Confirm Password" name="cpassword" placeholder="confirm password" required>
			</div>
			<div class="input-field">
				<button name="submit" class="btn">Register</button>
			</div>
			<p><?= $msg ?></p>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</section>
</body>
</html>