<?php
require_once("connect2db.php");
$sql = "SELECT * FROM `books` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
?>

<?php include 'includes/header.php';?>
        <p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; <a href="list_blood.php">Books</a> &raquo; List</p>
        <div class="content">
<h1>Books</h1>
<a href="add_book.php"><img src="images/add.png" height="30px"></a>
<table border="1" cellspacing="0" cellpadding="20">
    <tr>
        <th>S.N.</th>
        <th>Book Name</th>
        <th>Author</th>
        <!-- <th>Published On</th> -->
        <th>Publication</th>
        <!-- <th>Availability</th> -->
        <th>Actions</th>        
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {

?>
    <tr>
        <td><?= ++$i;?></td>
        <td><?= $row["bookname"];?></td>
        <td><?= $row["author"];?></td>
        <!-- <td><?= $row["published_date"];?></td> -->
        <td><?= $row["publication"];?></td>
        <td><!-- <a href="edit_book.php?id=<?= $row['id'];?>">Edit</a> -->  <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_book.php?id=<?= $row['id'];?>">Delete</a></td>
    </tr>
<?php
    }   
} else {
    ?>
    <tr>
        <td colspan="5">No Record(s) found.</td>
    </tr>
    <?php
}
?>
<?php 
mysqli_close($conn);
?>
</table>
            
        </div>
    <?php include 'includes/footer.php';?>