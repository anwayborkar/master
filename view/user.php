<?php 
include ('../partial/header/userheader.php');
	
	
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
	if(isLoggedIn()){
		header('location:');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
	<link rel="stylesheet" type="text/css" href="../public/css/user.css">
	
</head>
<body>
	<div class="sidebar">
  <a class="active" href="#home">Home</a>
   </div>
  	<div class="user_info">
		<h1 style="color: #008CBA" align="center">Home Page</h1>

</body>
</html>
<?php include '../partial/footer/footer.php';?>