<?php
if(isset($_POST['Submit'])){
  $name=$_POST['Name'];
  $email=$_POST['email'];
  $msg=$_POST['Message'];
$sql = "INSERT INTO information (`Name`, `user_email`,`message`)
VALUES ('$name','$email', '$msg')";
require_once('admin/connect2db.php');
if (mysqli_query($conn, $sql)) {
    echo "Your request has been submiitted."; exit;
    // header('Location: list_user.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/master.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="images/mybook.png">
	<title>contact us</title>
</head>
<style type="text/css">

</style>
<body>
<div id="header">
  <h1><a href="">Contact Us </a></h1>
</div>
<div id="navigation">
  <ul>
    <li ><a href="index.php">Home</a></li>
	<li ><a href="mybooks.php">My Books</a></li>

    <li class="active"><a href="contact.php">Contact Us</a></li>
  </ul>
</div>
<body bgcolor="#00ccff">
  <style type="text/css">
    *{box-sizing: border-box;}
    .container{
      border-radius: 5px; background-color: #f2f2f2;
      padding: 20px;margin: 50px 420px;
      width: 35%;
    }
  textarea {
    width: 99%;
    margin: 3px -1px;
    padding: 0;
    resize: none;
}
input[type=text], input[type=password]{
  width: 99%;padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-top: 6px;margin-bottom: 6px;
  resize: vertical; 
}
input[type=submit]{
  background-color: #00ccff;
  color: white;padding: 12px 20px;
  border-style: none;
  cursor: pointer;width: 99%;
}
input[type=submit]:hover{
  background-color: #d43f3a;
}
  </style>
<form action="" method="POST">
  <div class="container">
    <p style="font-family: calibri; font-size: 40px;color:#ff986b;margin: 0px">Quick Contact</p>
    <p style="font-family: calibri;margin: 5px">Contact us today, and get reply within 24 hours!</p>
    <input type="text" placeholder="Your Name" name="Name" required>
    <input type="text" placeholder="Your Email Address" name="email" required>
    <input type="text" placeholder="Your Phone Number" name="phone" required>
    <textarea type="text" name="Message" placeholder="Name of book" ></textarea>
    <br><br>
    <input type="submit" value="Submit" name="Submit">
  </div>
<div id="footer">
  <div id="meta">
    <div id="copyright" class="footer"> Design copyright &copy; 2021 by Prashamsa
    </div>
  </div>
</div>
</body>
</html>
