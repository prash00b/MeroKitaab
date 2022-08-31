<?php

if (isset($_POST['add_user'])) {
	$n= $_POST['name'];
	$u = $_POST['uname'];
	$e = $_POST['email'];
	$p = $_POST['pwd'];
	$re_p = $_POST['pwd_r'];
	if ($p != $re_p) {
		echo '<script type="text/javascript">alert("Password & Confirm Password don\'t match.");</script>';
	}

	$sql = "INSERT INTO `user` (`name`,`username`, `email`,`password`)
VALUES ('$n','$u', '$e', md5('$p'))";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pustak_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully."; exit;
    header('Location: list_user.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Be A Member of MK</title>
</head><link rel="shortcut icon" href="images/mybook.png">
<body style="background-image: url('imgs/backg.jpg');background-size: cover;">
	<style type="text/css">
		*{box-sizing: border-box;}
		.container{
			border-radius: 5px; background-color: #f2f2f2;
			padding: 20px;margin: 50px 300px;
		}
input[type=text], input[type=password]{
	width: 50%;padding: 12px;
	border: 1px solid #ccc;
	border-radius: 4px;
	margin-top: 6px;margin-bottom: 6px;
	resize: vertical; 
}
input[type=submit]{
	background-color: #d9534f;
	color: white;padding: 12px 20px;
	border-color: #d43f3a;
	border-radius: 4px;cursor: pointer;
}
input[type=submit]:hover{
	background-color: #d43f3a;
}
	</style>
<form action="../index.php" method="POST" name="user">
	<div class="container">
		<h1>Register</h1>
		<p>Please fill in this form to create an account.</p>
		<hr>
		Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Name" value="Monica Karki" name="name" required><br>
		Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Username" name="uname" value="monn12" required><br>
		Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Enter Email" name="email" value="monn123@gmail.com" required><br>
		Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" placeholder="Enter Password" name="pwd" required value="user"><br>
		Re-Password:<input type="password" placeholder="Repeat Password" name="pwd_r" value="user" required><br>
		<hr>
		<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
		<input type="submit" value="Register" name="add_user">
	</div>
	<div class="container">
		<p>Already have an account?<a href="login.php">Sign In</a>.</p>
	</div>
</form>
</body>
</html>