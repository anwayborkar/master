$(document).ready(function(){
  $("#name").click(function(){
  $(".error").html("");
});
 function validateName(name) {
              var regex = /^[a-zA-Z]+$/;
            return regex.test(first_name);
         }
  
         $("#email").click(function(){
  $(".error").html("");
});
         $("#subject").click(function(){
  $(".error").html("");
});
         $("#message").click(function(){
  $(".error").html("");
});
       


   $('#first_form').submit(function(e) {
    e.preventDefault();
    var name = $('#name').val();
   
    var email = $('#email').val();
    var subject = $('#subject').val();
    var message = $('#message').val();
   
   


    $(".error").remove();
  if (name.length < 1) {
      $('#name').after('<span class="error">This field is required</span>');
      return false; 
    }
    if (!validateName(name)){
               $('#name').after('<span class="error">Enter only Alphabet</span>');
               return false; }     

    
    if (email.length < 1) {
      $('#email').after('<span class="error">Please enter a valid email address.</span>');return false;
    
    } else if (email.length > 1) {
      var regEx = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
      var email = regEx.test(email);
      if (!email) {
        $('#email').after('<span class="error">invalid email.</span>');
        
      return false;
      }
    }
  
    if (subject.length == 0) {
      $('#subject').after('<span class="error"> this field is empty</span>');
      return false;
    }
    
    if (message.length == 0) {
      $('#message').after('<span class="error"> this field is empty</span>');
      return false;
    }
    
     function submitForm () {
     frm.submit(); // Submit
     $('#first_form input[type="text"]').val('');
     }