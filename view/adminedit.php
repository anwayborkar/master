
<?php
      include('../process/connect.php');
      $id = $_REQUEST['id'];   
      $query = "SELECT * from users where id='".$id."'"; 
      $result = mysqli_query($connection, $query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($result);
?>
<?php 

include('../process/functions.php');
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
include ('../partial/header/adminpageheader.php'); 
include('../view/adminsidebar.php');
?>


<!DOCTYPE html>
<html>
   <title>Edit Page</title>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
      <script src="../public/java script/jquery.min.js" type="text/javascript"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!-- <script src="../public/java script/.js" type="text/javascript"></script> -->
     
      <style>
         body{
         background-image: url();
         background-color: #cccccc;
         }  
         form input {
         display: inline-block;
         width: 100px;
         }
         form div {
         margin-bottom: 10px;
         }
         .error {
         color: red;
         margin-left: 5px;
         }
         label.error {
         display: inline;
         }
      </style>
      <script type="text/javascript">
         $(document).ready(function () {
  

     function validateEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
   }

  $('#update').click(function (e) {
   
    var username = $('#username').val();
    var password = $('#password').val();
    var email = $('#email').val();
    
    $(".eror").remove()
         
    if (username.length < 1) {
      $('#username').after("<span class='eror' style='color:#FF0000'>This field is required</span>");
      $('#user-availability-status').hide();
      return false;
    }
    if (email.length < 1) {
      $('#email').after("<span class='eror' style='color:#FF0000'>Email is a required field.</span>");
      return false;
    }; 
   
    if (!validateEmail(email)) {
     $('#email').after("<span class='eror' style='color:#FF0000'>Please enter a valid email address .</span>");
      return false;
     }

    if (password.length < 1) {
      $('#password').after("<span class='eror' style='color:#FF0000'>Password is a required.</span>");
      return false;
    }
                       
            
         
            });
          });
         function checkdata() {
   var username = $('#username').val();
    $(".eror").remove()
    if (username == "") {
        $('#username').after("<span class='eror' style='color:#FF0000'>This field is required</span>");
        $('#user-availability-status').hide();
        return false;
    } else if (username.length < 4) {
        $('#username').after("<span class='eror' style='color:#FF0000'>Username must be atleast 4 characters.</span>");
        $('#user-availability-status').hide();
        return false;
    }
  jQuery.ajax({
    url: "../process/checkdata.php",
    data: {username:username},
    type: "POST",
    success: function (data) {
      if (data == 0) {
    $('#username').after(`<span class="eror" style='color:#65A737'>username available</span>`);      
    $('#submit').attr("disabled",false);
} else if (data != 0) {
$('#username').after(`<span class="eror" style='color:#FF0000'>username already exists</span>`);      
$('#submit').attr("disabled",true);
}
  }
});
}
          
      </script>
   </head>
   <body>
      <div class="form">
      <center>
         <h1><font color="#008CBA">Update Record</font></h1>
      </center>

      <?php
         if(isset($_REQUEST['new']) && $_REQUEST['new']==1) {
         
          $id=$_REQUEST['id'];        
          $username = $_REQUEST['username'];
          $email = $_REQUEST['email'];
          $user_type = $_REQUEST['user_type'];
          $password = md5($_REQUEST['password']);
          $updated_at = date("Y/m/d H:i:s");
         
                              
          $update="update users set username='".$username."', 
          email='".$email."',user_type='".$user_type."',password='".$password."',
          updated_at='".$updated_at."' where id='".$id."'"; 
          $status = mysqli_query($connection, $update);          
         
          
          if($status == true){
            // echo "Data updated successfully.";
            header('location: ../view/user_details.php?success=Data updated successfully.');
            exit;
          } else {
            echo '<p style="text-align:center; color:red;">Failed to Updated record</p>';
          }
          }
         else 
         {
          ?>
      <div>
      <div class="container" align="center">
         <form class="form-horizontal" enctype="multipart/form-data" id="submitbtn" action=" " method="POST">
            <input type="hidden" name="new" value="1" />
            <center>
               <font color="008CBA"></font>
            </center>
            <div class="form-group">
               <label class="control-label col-sm-4" for="firstName"><font size="3" color="008CBA">username: </font></label>
               <div class="col-sm-4" >          
                  <input type="username" class="form-control" id="username" placeholder="Enter Name" name="username" onblur="checkdata()" value="<?php echo $row['username'];?>">
               </div>
            </div>
            
              <div class="form-group">
               <label class="control-label col-sm-4" for="email"><font size="3" color="008CBA">Email ID: </font></label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email'];?>">
               </div>
            </div  value="<?php echo $row['user_type'];?>" >
            <div class="input-group">
      <label>User type</label>
      <select name="user_type" id="user_type" >
        <option value=""></option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
    </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="email"><font size="3" color="008CBA">password: </font></label>
               <div class="col-sm-4">
                  <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $row['password'];?>">
               </div>
            </div>
           <div class="col-sm-offset-4 col-sm-4">
               <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
            </div>
         <?php } ?>
      <br>
      </div>
      
         </form>
   </body>
    
    
</html>
<?php include '../partial/footer/footer.php';?>