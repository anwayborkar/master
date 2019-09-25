<?php

require_once("DBController.php");
$db_handle = new DBController();


if(!empty($_POST["username"])) {
  $query = "SELECT * FROM users WHERE username ='" . $_POST["username"] . "'";
  $user = $db_handle->numRows($query);
  echo ($user);
}
if(!empty($_POST["password"])) {
  $query = "SELECT * FROM users WHERE password ='" . $_POST["password"] . "'";
  $user = $db_handle->numRows($query);
  echo ($user);
}
   /*{
      echo "<span style='color:#FF0000'>Not Available</span>";

  }else{
      echo "<span style='color:#65A737'>Available</span>";
  }
}*/
?>