$(document).ready(function () {
  

     function validateEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
   }

  $('#submit').click(function (e) {
   
    var username = $('#username').val();
    var password = $('#password').val();
    var email = $('#email').val();
    var password_2 = $('#password_2').val();

    $(".eror").remove()
         
    if (username.length < 1) {
      $('#username').after("<span class='eror' style='color:#FF0000'>This field is required</span>");
       $('#username').focus(); 
      $('#user-availability-status').hide();
      return false;
    }
    if (email.length < 1) {
      $('#email').focus(); 
      $('#email').after("<span class='eror' style='color:#FF0000'>Email is a required field.</span>");
      return false;
    }; 
   
    if (!validateEmail(email)) {
      $('#email').focus(); 
     $('#email').after("<span class='eror' style='color:#FF0000'>Please enter a valid email address .</span>");
      return false;
     }

    if (password.length < 1) {
      $('#password').focus(); 
      $('#password').after("<span class='eror' style='color:#FF0000'>Password is a required.</span>");
      return false;
    }
    if (password.length < 5){
      $('#password').focus(); 
      $('#password').after("<span class='eror' style='color:#FF0000'>Password must be atleast 5 character</span>");
      return false;
    }
    if (password_2.length < 1){
      $('#password_2').focus(); 
      $('#password_2').after("<span class='eror' style='color:#FF0000'>please enter confrim password</span>");
      return false;
    }
    if (password.length != password_2.length ) {
      $('#password_2').focus(); 
      $('#password_2').after("<span class='eror' style='color:#FF0000'>Password doesn't match..</span>");
      return false;
    }
    
    
    });

    
  });
/*$("#email").click(function(){
  $(".error").html("");
  });
   function validateEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
   }
   $('#submit').click(function (e) {
   var email = $('#email').val();
     $(".error").remove();
   if (!validateEmail(email)) {
     $('#email').after("<span style='color:#FF0000'>Please enter a valid email address .</span>");
      return false;
     }
       });*/




//});

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