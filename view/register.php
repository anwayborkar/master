<?php 
include('../process/functions.php');
include ('../partial/header/header.php');

 include('../process/connect.php'); 

if (isset($_SESSION['user'])){
    header('location:user.php');
  }
  if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ){
     header('location:admin.php');
  }
  
/*if (!isLoggedIn()) {
   $_SESSION['msg'] = "You must lo first";
   header('location: login.php');
}*/
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="../public/css/style.css">
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
   <script src="../public/java script/jquery.min.js" type="text/javascript"></script>
   <script src="../public/java script/register.js" type="text/javascript"></script>
   <script src='https://kit.fontawesome.com/a076d05399.js'></script> 
</head>
<body>
<div class="header">
  
   <h2>Register</h2>
</div>
<form  method="post" action="register.php">
  
     <?php echo display_error(); ?>
   <div class="input-group">
   
      <label>Username</label>
      <input type="text" name="username" id="username" onblur="checkdata()" value="<?php echo $username; ?>">
      <span id="user-availability-status"></span>
               <div id="username_status">
               </div>
   </div>
   <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" id="email" value="<?php echo $email; ?>">
   </div>
   <div class="input-group">
      <label>Password</label>
      <input type="password" id="password" name="password_1">
   </div>
    <div class="input-group">
      <label> confirm Password</label>
      <input type="password" id="password_2" name="password_2">
   </div>
  
   <div class="input-group">
      <button type="submit" class="btn" id="submit" name="register_btn">Register</button>
   </div>
   <p>
      Already a member? <a href="login.php">login</a>
   </p>
</form>
</body>
<?php include '../partial/footer/footer.php';?>
</html>