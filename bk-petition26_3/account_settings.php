<section>
   <div class="container">   
<div class="row">

         <div class="col-md-12">
            <h4 class="text-center font-weight-bold" style="color: #097298;"> Edit Profile </h4>
           <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $this->session->flashdata('message')?>
                </div>
                <?php } ?> 
            <?php if (validation_errors()!=''){ ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
                <?php }  echo form_open('/user-registration/account_settings/',['enctype'=>'multipart/form-data']); ?>
               <div class="row">
                  <div class="col-md-12">
                     <div class="md-4 m-auto">
                        <div class="avatar-upload">
                           <div class="avatar-edit">
                              <input type='file' id="imageUpload" name="user_logo" accept=".png, .jpg, .jpeg" />
                              <label for="imageUpload"></label>
                           </div>
                           <div class="avatar-preview">
                              <?php if(isset($user_picture)) { ?>
                              <div id="imagePreview" style="background-image: url('/assets/user_logo/<?php echo $user_picture;?>');">
                              <?php } else { ?>
                                 <div id="imagePreview" style="background-image: url('/assets/img/profile-icon.png');">
                              <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">First name *</label>
                        <input type="text" name="user_name" value="<?php echo isset($user_name)?$user_name:''?>" class="form-control"  placeholder="First name" required="">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="lastname" class="control-label">Last name</label>
                        <input type="text" name="user_lname"  class="form-control"  placeholder="Last name" value="<?php echo isset($user_lname)?$user_lname:''?>">
                     </div>
                  </div>
                   <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger"></span></label>
                            <input type="password" class="form-control" name="password" id="password" parsley-trigger="change"  placeholder="Password"  maxlength="50" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpassword">Confirm Password<span class="text-danger"></span></label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword" parsley-trigger="change" data-parsley-equalto="#password" placeholder="Confirm Password" >
                        </div>
                    </div>

                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="aboutme" class="control-label">About me</label>
                        <textarea class="form-control" name="user_about"  placeholder="About me"><?php echo isset($user_about)?$user_about:''?></textarea>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="city" class="control-label">City *</label>
                        <input type="text" name="user_city" class="form-control"  placeholder="City" required="" value="<?php echo isset($user_city)?$user_city:''?>">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="country" class="control-label">Country *</label>
                         <select id="country_id" name="country_id" class="form-control" required>
                                <option value="">--Select Country--</option>
                                <?php
                                    $country_id  = ($country_id!='')?$country_id:'99';
                                    foreach($country_arr as $key=>$countries){
                                    $selected    = ($countries->country_id==$country_id)?'selected':"";
                                    ?>
                                <option value="<?php echo $countries->country_id ?>" <?php echo $selected ?>><?php echo $countries->name;?></option>
                                <?php
                                    }
                                    ?>
                            </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="country" class="control-label">State *</label>
                        <select id="state_id" name="state_id" class="form-control" required >
                                <option value="">--Select State--</option>
                                <?php
                                    $state_id =(isset($state_id)&&$state_id!='')?$state_id:'';
                                    foreach($state_arr as $key=>$states){
                                    $selected = ($states->state_id==$state_id)?'selected':"";
                                    ?>
                                <option value="<?php echo $states->state_id ?>" <?php echo $selected;?>><?php echo ucwords(strtolower($states->name));?></option>
                                <?php
                                    }
                                    ?>
                            </select>

                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="postalcode" class="control-label">Postal code *</label>
                         <input type="text" class="form-control" name="user_pincode" id="user_pincode" parsley-trigger="change" required placeholder="Pin Code" maxlength="50" value="<?php echo isset($user_pincode)?$user_pincode:''?>" data-parsley-pattern="^[0-9]{2,6}$" data-parsley-error-message="Pincode should be six digits pincode should be in numbers">

                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="streetaddress" class="control-label">Street address</label>
                        <input type="text" value="<?php echo isset($user_address)?$user_address:''?>" class="form-control" name="user_address" id="user_address" parsley-trigger="change" required placeholder="Street address">

                     </div>
                  </div>                  
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="postalcode" class="control-label d-block">Phone number (optional)</label>
                        <small>If you're interested, please provide a number for us to reach you regarding campaigns, causes, membership programmes, or other Change.org-related efforts.</small>
                       <input type="text" value="<?php echo (isset($user_mobile)?$user_mobile:'')?>" class="form-control <?php if(form_error('user_mobile')!=''){ echo "parsley-error"; } ?>" name="user_mobile" id="user_mobile" placeholder="Phone Number" maxlength="11"  data-parsley-pattern="^((\d{10})[,])*(\d{10})$"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return isNumberKey1(event)"> 
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-3 mt-2 pl-3">
                     <button type="submit" class="btn btn-primary" value="form_submit" id="save">Save</button>
                  </div>
               </div>
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</section>

<script>
   function readURL(input) {
   if (input.files && input.files[0]) {
   	var reader = new FileReader();
   	reader.onload = function(e) {
   		$('#imagePreview').css('background-image', 'url('+e.target.result +')');
   		$('#imagePreview').hide();
   		$('#imagePreview').fadeIn(650);
   	}
   	reader.readAsDataURL(input.files[0]);
   }
   }
   $("#imageUpload").change(function() {
   	readURL(this);
   });
   $("#country_id").change(function() {
         var country_id =$("#country_id").val();
         $("#state_id").html('');
        $.ajax({
               url:'/user-registration/ajax_state/'+country_id,
               success:function(data) {
                 $("#state_id").html(data);
                     return true;
             }
         });
     });
    function isNumberKey1(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && charCode !=44 && charCode !=188 && (charCode < 48 || charCode > 57))
            {
                return false;
            }
        return true;
        }

</script>