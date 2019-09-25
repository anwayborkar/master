<?php

require('connect.php');
$id = $_REQUEST['id'];
$query = "update users set status= 'inactive' where id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ( mysqli_error($connection));

header("Location: ../view/user_details.php"); 
 
//end function
/*$query = "DELETE FROM user WHERE id=$id"; 
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: welcome.php"); */
?>
