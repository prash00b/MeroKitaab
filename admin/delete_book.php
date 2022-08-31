<?php
$book_id = @$_GET['id'];
if (!isset($blood_id)) {
    header('Location: list_book.php');
}
 
require_once('connect2db.php');
$sql = "DELETE FROM `books` WHERE id='$book_id';";

if (mysqli_query($conn, $sql)) {
    header('Location: list_book.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}