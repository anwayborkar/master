
<?php
include ('../partial/header/adminheader.php'); 

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


if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

include('../view/adminsidebar.php')
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form style="color: red;background: yellow; padding: 10px;width: 300px;height: 200px;font-style:italic; font-size: 30px">
	<h2 style="color: blue">Total Users:</h2>
<div align="right">
	<i  style="font-size:60px;color: black;" class="fa">&#xf234;</i>
</div>
<p align="left"  style="font-size: 50px;width: 100px;height: 100px;margin: auto; align-content: center;" >
<?php 
    // Setting up connection with database Geeks 
    $connection = mysqli_connect("localhost", "root", "123456",  
                                                 "multi_login"); 
  // Check connection 
    if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    } 
     $query = "SELECT Username, Password FROM users"; 
     $result = mysqli_query($connection, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row = mysqli_num_rows($result); 
          
        printf("" . $row); 
    
        // close the result. 
        mysqli_free_result($result); 
    } 
      // Connection close  
    mysqli_close($connection); 
?> 

</p>
</form>

</body>
</html>

<?php include '../partial/footer/footer.php';?>