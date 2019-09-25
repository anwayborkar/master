<?php
 include('../process/functions.php');
include('../process/connect.php');

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
}include ('../partial/header/adminpageheader.php');
include('../view/adminsidebar.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
	<style>
		.header {
			background: #008CBA;
		}
		button[name=register_btn] {
			background: #008CBA;
		}
	</style>
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="../public/java script/jquery.min.js" type="text/javascript"></script>
      <script src="../public/java script/admin_reg.js" type="text/javascript"></script>
    
</head>
<body>
	<div class="header">
		<h2> create User/Admin</h2>
	</div>
	
	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" id="username" name="username"  onblur="checkdata()" value="<?php echo $username; ?>">
			 <span id="user-availability-status"></span>
               <div id="username_status">
               </div>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" id="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" id="password_1" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" id="password_2" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" id="submit" name="register_btn"> + Create user</button>
		</div>
	</form>
</body>
</html>
<?php include '../partial/footer/footer.php';?>