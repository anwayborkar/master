$(document).ready(function () {
  
  $("#submit").click(function (e) {
   
    var username = $('#username').val();
    var password = $('#password').val();

    $(".eror").remove()
     
    if (username.length < 1) {
      $('#username').after("<span class='eror' style='color:#FF0000'>This field is required</span>");
       $('#username').focus(); 
        return false;
    }
    
     if (password.length < 1) {
      $('#password').focus();
      $('#password').after("<span class='eror' style='color:#FF0000'>Password is a required field.</span>");
      
      return false;
    }
  });
});



















