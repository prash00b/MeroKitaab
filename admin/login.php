<?php
if(isset($_COOKIE["member_login"])){	
	if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $_COOKIE["member_login"];
	echo "<script>window.location='index.php';</script>";
	exit;
}

if(isset($_POST['submit'])){
	$u = $_POST['username'];
	$p = md5($_POST['password']);

	$sql = "SELECT * FROM `user` WHERE `username`='$u' AND `password`='$p' ";
	require_once('connect2db.php');
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {

		if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $u;
		$row = mysqli_fetch_assoc($result);
		//echo "<pre>"; print_r($row);exit;
		$_SESSION['u_id'] = $row['id'];
		if(!empty($_POST["remember_me"])) {
				setcookie ("member_login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
		echo "<script>window.location='index.php';</script>";		
        exit; 
	}else{
		echo "<script>alert('Username or Password Incorrect!');</script>";
		echo "<script>window.location='login.php';</script>";
		exit;
	}
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>merokitaab - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="shortcut icon" href="images/mybook.png">
</head>
<body bgcolor="#f2f2f2" style="background-image: url('imgs/backg.jpg');background-size: cover;">
	<div class="body_wrapper" style="background-color: #78BBBB">
		<div class="header" style="background-color: #78BBBB;">
			<a href="../index.php" ><img src="imgs/home.png" style="height: 25px;width: 25px;"></a><h1 style="color: #fff; text-align: center;">LOGIN</h1>            
		</div>
		<hr>
		<p style="background-color:;color: white;"><a href="index.php" style="text-decoration: none; padding-left: 10px;">MK</a> &raquo; Login</p>
		<div class="content" style="text-align: center;">
			<form action="" method="POST">
				<input type="text" name="username" value="prash" id="lf" required="required" autofocus="true"><br>
				<input type="password" name="password" value="nrsh" id="lf" required="required"><br>
				<input type="checkbox" name="remember_me" id="lf" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
				<label for="lf-me">Remember me</label><br>
				<input type="submit" name="submit" value="Login" id="lf">
			</form>
		</div>
	</div>
<style type="text/css">
	#lf{
		margin-top: 10px;
	}
</style>
</body>
</html>