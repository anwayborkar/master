
<?php include('../process/functions.php'); 
     
 include ('../partial/header/header.php');
 ?>
<!DOCTYPE html>
<html>
<head>
  
  <link rel="stylesheet" type="text/css" href="../public/css/style.css">
  <script src="../public/java script/jquery.min.js" type="text/javascript"></script>
  <script src="../public/java script/login.js" type="text/javascript"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>

  <div class="header">
  <!-- <i  style='font-size:24px'   class='fas'>&#xf015;</i> -->
  
    <h2>Login</h2>
  </div>
  <form method="post" action="login.php">
    <?php
   if(isset($_SESSION['msg'])){
   echo $_SESSION['msg'];
   unset($_SESSION["msg"]);
   }

if (isset($_SESSION['user'])){
    header('location:user.php');
  }
  if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ){
     header('location:admin.php');
  }
  ?>
    <?php echo display_error(); ?>

    <div class="input-group">
      <label>Username</label>
      <input type="text" id="username"  name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" id="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" id="submit" class="btn" name="login_btn">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>
<?php include '../partial/footer/footer.php';?>