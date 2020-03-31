<main id="main">
    <section id="about" class="pt-4 pb-4">
      <div class="container">
        <div class="row">
            
              <div class="alert alert-danger col-md-12" id="user-message" style="display:none"></div>
          <form  enctype="multipart/form-data" method="post" accept-charset="utf-8" style="width:100%;">
                    <div class="row pl-4 pr-4">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " name="user_name" value="<?php echo isset($user_name)?$user_name:''?>" id="user_name" required placeholder="Name" tabindex="1"  maxlength="255">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control " name="user_email" value="<?php echo isset($user_email)?$user_email:''?>" id="user_email" required placeholder="Email" tabindex="2"  maxlength="255">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " name="user_mobile" value="<?php echo isset($user_mobile)?$user_mobile:''?>" id="user_mobile" required placeholder="Mobile" tabindex="3"  maxlength="15">
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pasword<span class="text-danger">*</span></label>
                                    <input id="user_password" class="form-control" type="password" placeholder="Password" name="user_password" tabindex="4" required value="">
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Pasword<span class="text-danger">*</span></label>
                                    <input id="user_confirm_password" class="form-control" type="password" placeholder="Confirm Password" name="user_confirm_password" tabindex="5" required>
                                </div>
                            </div> 
                                              
                    </div>
                    <div class="box-footer pl-4 pr-4">
                        <button type="button" class="btn btn-primary  mb-0 aqua m-t-xs bottom15-xs btn-round btnSubmit" value="form_submit" onclick="userSignupAjax();">Submit</button>
                    </div>
                    </form>
    </section>
  </main>
<script type="text/javascript">

    function userSignupAjax() {
        var user_name = $("#user_name").val();
        var user_email = $("#user_email").val();
        var user_mobile = $("#user_mobile").val();
        var user_password = $("#user_password").val();
        var user_confirm_password = $("#user_confirm_password").val();
       
      $.ajax({
         url:"/user-registration/user-signup",
         type:'post',
         dataType:"json",
        data:{"user_name":user_name,"user_email":user_email,"user_mobile":user_mobile,"user_password":user_password,"user_confirm_password":user_confirm_password},
            success:function(response) {
            if(response.status == "1") {
                window.location.href = '/petition/start-petition';
            }
            else {
               $("#user-message").html(response.message);
               $("#user-message").show();
            }
         },
        
         error: function() {
            $("#user-message").html("Not submit");
            $("#user-message").show();
         }
       });
   }
</script>
