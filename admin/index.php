<?php include 'includes/header.php';?>
<p><a href="index.php" style=" padding-left: 10px;">Home</a>
 &raquo; Dashboard
<span style="float: right; margin-right: 10px;">Welcome <?= ucwords($_SESSION['username']);?>!</span>
</p>
<div class="content">
	<a href="add_book.php"><img id="im" src="images/addbook.png" width="80px" title="Books"></a>
	<a href="list_book.php"><img id="im" src="imgs/book.png" width="80px" title="Manage Books"></a>
	
	<a href="list_user.php"><img id="im" src="images/user.jpg" width="80px" title="Manage User"></a>
	<a href="add_user.php"><img id="im" src="images/user_add.png" width="80px" title="Add User"></a>
	<?php /*for ($i=0; $i < 1; $i++) { 
		?>
		<a href="add_user.php"><img id="im" src="images/add.png" width="80px" title="Add User"></a>
	<?php }*/?>
	<a href="../index.php" target="_Blank"><img id="im" src="images/frontend.png" width="80px" title="Visit FrontEnd"></a>
</div>
<?php include 'includes/footer.php';?>