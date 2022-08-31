<?php
$server = "localhost";
$username = "root";
$pwd = "";
$db = "pustak_db";
$conn = mysqli_connect($server, $username, $pwd, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}