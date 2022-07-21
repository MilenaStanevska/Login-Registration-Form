<?php
  
session_start(); 
echo 'Wellcom, ' . $_SESSION["username"]. '!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Form</title>
</head>
<body>
<button class="btn"> <a href="logout.php">Logout</a></button>
</body>
</html>