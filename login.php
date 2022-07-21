<?php 
include 'config.php';
session_start();          

if (isset($_SESSION['username'])) {   
    header("Location: index.php");
}
$msg = '';
if (isset($_POST['submit'])) {     
	$name = $_POST['username'];			
	$password = ($_POST['password']);
	$sql = "SELECT * FROM form WHERE username='$name' AND password='$password'"; 
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {  		
		$row =$result->fetch_assoc();  
		$_SESSION['username'] = $row['username'];  
		header("Location: index.php");
	} else {
		$msg='Woops! Name or Password is Wrong';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<title>Login Form</title>
</head>
<body>
	<section class="container-login-register">
		<img src="assets/img/image.png" alt="image">
		<form action="" method="POST" class="login-account">
			<p class="login-text" >Login</p>
			<div class="input-field">
			<input type="text" placeholder="Username" name="username" placeholder="username" required>
			</div>
			<div class="input-field">
				<input type="password" placeholder="Password" name="password" placeholder="password"  required>
			</div>
			<div class="input-field">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="message"><?= $msg ?></p>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</section>
</body>
</html>