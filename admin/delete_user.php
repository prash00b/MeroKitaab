<?php
$user_id = @$_GET['id'];
if (!isset($user_id)) {
	header('Location: list_user.php');
}
 
require_once('connect2db.php');
$sql = "DELETE FROM `user` WHERE id='$user_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: list_user.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}