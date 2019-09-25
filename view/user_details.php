<?php 

include('../process/functions.php');
include ('../partial/header/adminpageheader.php'); 
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

include('../process/connect.php');
include('../view/adminsidebar.php');

?>
<?php

include('../process/connect.php');
$showRecordPerPage = 3;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT * FROM users";
$allEmpResult = mysqli_query($connection, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$empSQL = "SELECT * FROM users LIMIT $startFrom, $showRecordPerPage";
$result = mysqli_query($connection, $empSQL);
?>
<?php
if(isset($_POST['save'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($connection,"DELETE FROM users WHERE id='".$del_id."'");
	$message = "Data deleted successfully !";
}
}
/*$result = mysqli_query($connection,"SELECT * FROM users");*/
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>



</style>
<title>User details </title>
</head>

<h1 align="center" style='color:#008CBA'  >User Details </h1>
<body>
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div class='rows'>
	<div class='col-lg-3'>
    <!-- <a href="create_user.php" style="color:black;background:#008CBA;padding: 10px 15px;" > + Add User</a><br> -->
    
    </div>
	<div class='col-lg-3'>
    <a href="create_user.php" style="color:black;background:#008CBA;padding: 10px 15px;" > + Add User</a><br>
    </div>

    </div><br>
<!-- <form method="post" action=""> -->
	<div style="padding: 40px;">
<table class="table table-bordered">
<thead>
<tr>
    <th><input type="checkbox" id="checkAl"> Select All</th>
	<th>Id</th>
	<th>UserName</th>
	<th>User_type</th>
	<th>Email id</th>
    <th>Status</th>
	<th>Edit</th>
	<th>Action</th>
</tr>
</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id"]; ?>"></td>
	<td><?php echo $row["id"]; ?></td>
	<td><?php echo $row["username"]; ?></td>
	<td><?php echo $row["user_type"]; ?></td>
	<td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
	<td align="center">
            <a href="../view/adminedit.php?id=<?php echo $row["id"]; ?>"  style='color:#008CBA'>Edit</a>
         </td>
    <td align="center">
            <a href="../process/active.php?id=<?php echo $row["id"]; ?>" onclick="return confirm(' Are you sure you want to activate?');"  style='color:#008CBA'>activate</a>/
            <a href="../process/deactive.php?id=<?php echo $row["id"]; ?>" onclick="return confirm(' Are you sure you want to deactivate?');"  style='color:#008CBA'>deactivate</a>
         </td>     
</tr>
<?php
$i++;
}
?>
</table>
</div>

<div align="center">
<nav  aria-label="Page navigation" >
<ul  class="pagination">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>
<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
</ul>
</nav>
</div>

<p align="center" ><button style="background: red" type="submit" class="btn btn-success" onclick="return confirm(' Are you sure you want to delete?');"  name="save"> <i class="glyphicon glyphicon-trash"></i> DELETE</button></p>
<!-- </form> -->
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>
<?php include '../partial/footer/footer.php';?>