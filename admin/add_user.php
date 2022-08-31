<?php

if (isset($_POST['add_user'])) {
	// echo "Nepal";exit();
	$u = $_POST['username'];
	$e = $_POST['email'];
	$p = $_POST['password'];
	$re_p = $_POST['password-re'];
	// echo 'U: '.$u.', E: '.$e.', P: '.$p;exit;
	if ($p != $re_p) {
		echo '<script type="text/javascript">alert("Password & Confirm Password don\'t match.");</script>';
	}

	$sql = "INSERT INTO `user` (`username`, `email`,`password`)
VALUES ('$u', '$e', md5('$p'))";
//echo $sql;
require_once("connect2db.php");
if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully.";
    header('Location: list_user.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<?php include 'includes/header.php';?>
		<p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; <a href="list_user.php">User</a> &raquo; Add</p>
		<div class="content">

<h1>Add User</h1>
<form action="" method="POST" name="user">
<table>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="username" placeholder="Enter Username" required="required"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email" placeholder="Enter Email" required="required"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" required="required"></td>
	</tr>
	<tr>
		<td>Confirm Password:</td>
		<td><input type="password" name="password-re" required="required"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add_user" value="ADD USER"></td>
	</tr>
</table>
</form>
			
		</div>
	<?php include 'includes/footer.php';?>