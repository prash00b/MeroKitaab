<?php
// echo "Nepal";exit();
require_once("connect2db.php");

$sql = "SELECT * FROM `user` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>

<?php include 'includes/header.php';?>
        <p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; <a href="list_user.php">User</a> &raquo; List</p>
        <div class="content">
<h1>Users</h1>
<a href="add_user.php"><img src="images/add.png" height="30px"></a>
<table border="1" cellspacing="0" cellpadding="20">
    <tr>
        <th>S.N.</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

?>
    <tr>
        <td><?= ++$i;?></td>
        <td><?= $row["username"];?></td>
        <td><?= $row["email"];?></td>
        <td><a href="edit_user.php?id=<?= $row['id'];?>">Edit</a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_user.php?id=<?= $row['id'];?>">Delete</a></td>
    </tr>
<?php
    }   
} else {
    ?>
    <tr>
        <td colspan="3">No Record(s) found.</td>
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