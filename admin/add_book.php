<!DOCTYPE html>
<html>
<body>

<?php

if (isset($_POST['add_book'])) {
	$sr= $_POST['sn'];
	$u = $_POST['bookname'];
	$e = $_POST['author'];
	$p = $_POST['publication'];
	$sql = "";
	$sql = "INSERT INTO `books`
VALUES ('$sr','$u', '$e', '$p')";
require_once("connect2db.php");

if (mysqli_query($conn, $sql)) {echo "Added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<?php include('includes/header.php');?>
<p><a href="index.php" style="text-decoration: none; padding-left: 10px;">Home</a> &raquo; Dashboard</p>
<div class="content">
	<h1>Add Books</h1>
<form action="" method="POST" name="book">
<table>
	<tr>
		<td>Entry Serial No.</td>
		<td><input type="number" name="sn" placeholder="Enter SN" required="required"></td>
	</tr>
	<tr>
		<td>Name:</td>
		<td><input type="text" name="bookname" placeholder="Enter Bookname" required="required"></td>
	</tr>
	<tr>
		<td>Author:</td>
		<td><input type="text" name="author"  required="required"></td>
	</tr>
	<tr>
		<td>Publication:</td>
		<td><input type="text"  name="publication" required="required"></td>
	</tr>
	<tr>
		<td>Availability:</td>
		<td><input type="text" value="yes" name="available" required="required"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add_book" value="ADD BOOK"></td>
	</tr>
</table>
</form>
</div>
<?php include 'includes/footer.php';?>

</body>
</html>