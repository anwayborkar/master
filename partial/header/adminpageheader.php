<style type="text/css">.head {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 10px 10px;
}
.head a {
  float: left;
  color: black;
  text-align: center;
  padding: 10px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 20px;
  border-radius: 4px;
}
.head a.logo {
  font-size: 30px;
  font-weight: bold;
}
.head a:hover {
  background-color: #ddd;
  color: black;
}
.head a.active {
  background-color: dodgerblue;
  color: white;
}
.head-right {
  float: right;
}
@media screen and (max-width: 500px) {
.head a {
    float: none;
    display: block;
    text-align: left;
  }
  .head-right {
    float: none;
  }
}
</style>



<div class="head">
  <a href="/index.php"  >
 <IMG SRC="../public/image/logo.png" WIDTH=160 HEIGHT=70></a>

    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
    <!-- logged in user information -->
  <div class="profile_info">
  <img src="../public/image/user-default.png"><br>
  <i style="font-size: 27px;color:#008CBA " >WELCOME !!! </i>
  <?php  if (isset($_SESSION['user'])) : ?>
  <strong style="font-size: 35px; color:green"><?php echo $_SESSION['user']['username']; ?></strong>
 <?php endif ?>
  <div class="head-right">
   
   &nbsp;<a href="login.php?logout='1'" class="glyphicon glyphicon-log-out" style="color: red;">Logout</a>
  </div>

  </div>
</div>