<style>
   #forgot_password_error {
    float: left;
    width: 100%;
    color: #ff0000;
}
</style>
<main id="main">
<section class="pt-3">
   <div class="container">
   <div class="col-lg-12">
      <h4 class="w-100 p-3 text-center bg-light border font-weight-bold" style="color: #097298;">Forgot Password</h4>
      <!--<h4 class="text-center pt-4">Forgot Password</h4>-->
      <p class="mb-3 text-center">Enter your email address here, then check your inbox for a link to reset your password.</p>
      <div class="pt-3 pb-3 mb-3 white text-dark">
         <!--<div class="col-md-6 p-0">
               <div class="alert alert-danger" role="alert">
                  <small>
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error Box
                  </small>
               </div>
            </div>-->
         <div class="col-md-12 p-0">
            <form action="" method="post">
                  <div class="col-md-6 pl-0">
                     <div class="form-group" id="forgotpasswordform">
                        <input type="text" class="form-control" id="forgotpasswordemail" placeholder="Enter you E-mail">
                        <label class="error" for="name" id="forgot_password_error" style="display: none;">This field is required.</label>
                        <button type="submit" class="forgotpassword btn btn-primary mt-2">Reset Password</button>
                     </div>
                  </div>

                  <div class="form-group" id="forgot_password_form"></div>
            </form>

         </div>
      </div>
   </div>
</div>
</section>
</main>



<script>
$(function() {
    $('.error').hide();
    $(".forgotpassword").click(function() {
      $('.error').hide();
        var forgotpasswordemail = $("input#forgotpasswordemail").val();
        if (forgotpasswordemail == "") {
        $("label#forgot_password_error").show();
        $("input#forgotpasswordemail").focus();
        return false;
      }
      if(IsEmail(forgotpasswordemail)==false){
        $('label#forgotpasswordemail_check_error').show();
        return false;
        }
      var dataString = 'forgotpasswordemail=' + forgotpasswordemail;
      $.ajax({
        type: "POST",
        url: "/user-registration/forgot-password",
        data: dataString,
        success: function() {
          $('#forgotpasswordform').hide();
          $('#forgot_password_form').html("<div id='message_sign'></div>");
          $('#message_sign').html("<p><i class='fa fa-check' aria-hidden='true'></i>&nbsp;Please check mail reset password by using link on her mail !!</p>")
          .append("")
          .hide()
          .fadeIn(1500, function() {
            $('#message_sign').append("");
          });
        }
      });
      return false;
    });
  });  


function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
       return false;
    }else{
       return true;
    }
  }
</script>