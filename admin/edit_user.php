<?php
$user_id = @$_GET['id'];
if (!isset($user_id)) {
	header('Location: list_user.php');
}
require_once("connect2db.php");
$sql = "SELECT * FROM `user` WHERE `id`='$user_id' Limit 0, 10";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);
// echo "<pre>"; print_r($prev_data);exit;


if (isset($_POST['edit_user'])) {
	$user_id = $_GET['id'];
	// echo "$user_id";exit();
	$u = $_POST['username'];
	$e = $_POST['email'];
	// $p = $_POST['password'];
	// $re_p = $_POST['password-re'];
	// // echo 'U: '.$u.', E: '.$e.', P: '.$p;exit;
	// if ($p != $re_p) {
	// 	echo '<script type="text/javascript">alert("Password & Confirm Password don\'t match.");</script>';
	// }

	$sql = "UPDATE `user` SET `username`='$u', `email`='$e' WHERE `id`='$user_id';";
	// echo $sql;exit;

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
    // echo "Record updated successfully";
    header('Location: list_user.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<?php include 'includes/header.php';?>
		<p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; <a href="list_user.php">User</a> &raquo; Update</p>
		<div class="content">

<h1>Update User#<?= $prev_data['id'];?></h1>
<form action="" method="POST" name="user">
<table>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="username" placeholder="Enter Username" required="required" value="<?= $prev_data['username'];?>"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email" required="required" value="<?= $prev_data['email'];?>"></td>
	</tr>
	<!-- <tr>
		<td>Password:</td>
		<td><input type="password" name="password" required="required" value=""></td>
	</tr>
	<tr>
		<td>Confirm Password:</td>
		<td><input type="password" name="password-re" required="required" value=""></td>
	</tr> -->
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="edit_user" value="UPDATE"></td>
	</tr>
</table>
</form>
			
		</div>
	<?php include 'includes/footer.php';?>