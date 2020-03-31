<!--<style>
  .home-banner {
        display: none;
    }
</style>-->
<section class="pt-5 pb-5">
   <div class="container">
      <input id="tab1" type="radio" name="tabs" class="acc-setting" checked>
      <label for="tab1" class="account-setting-label">Edit Profile</label>
      <input id="tab2" type="radio" name="tabs" class="acc-setting">
      <label for="tab2" class="account-setting-label">Change Password</label>
      <input id="tab3" type="radio" name="tabs" class="acc-setting">
      <label for="tab3" class="account-setting-label">Manage E-mail Addresses</label>
      <input id="tab4" type="radio" name="tabs" class="acc-setting">
      <label for="tab4" class="account-setting-label">Disable my Account</label>
      <div id="content1" class="account-setting-wrapper">
         <div class="col-md-12">
            <h4 class="text-center font-weight-bold" style="color: #097298;"> Edit Profile </h4>
            <form action="#">
               <div class="row">
                  <!--<div class="flex-embed-content text-center mb-4">
                     <img class="image-cropper-nodrag position-absolute-center border-rounded-circle " alt="" src="https://static.change.org/profile-img/default-user-profile.svg">
                     </div>-->
                  <div class="col-md-12">
                     <div class="md-4 m-auto">
                        <div class="avatar-upload">
                           <div class="avatar-edit">
                              <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                              <label for="imageUpload"></label>
                           </div>
                           <div class="avatar-preview">
                              <div id="imagePreview" style="background-image: url('http://petition.sheenz.in/assets/img/profile-icon.png');">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group form-group-sm">
                        <label for="firstname" class="control-label">First name</label>
                        <input type="text" class="form-control" id="" placeholder="First name">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="lastname" class="control-label">Last name</label>
                        <input type="text" class="form-control" id="" placeholder="Last name">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="aboutme" class="control-label">About me</label>
                        <textarea class="form-control" id="" placeholder="About me"></textarea>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="city" class="control-label">City</label>
                        <input type="text" class="form-control" id="" placeholder="City">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="country" class="control-label">Country</label>
                        <input type="text" class="form-control" id="" placeholder="Country" />
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="twitter" class="control-label">Twitter</label>
                        <input type="text" class="form-control" id="" placeholder="Twitter">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="profileshortcut" class="control-label">Profile shortcut</label>
                        <input type="text" class="form-control" id="" placeholder="Profile shortcut">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="language" class="control-label">Language</label>
                        <select class="form-control" id="">
                           <option>Language</option>
                           <option>Language</option>
                           <option>Language</option>
                           <option>Language</option>
                           <option>Language</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12" role="alert">
                     <div  class="alert alert-success">
                        <small>
                        <i class="fa fa-info-circle" aria-hidden="true"></i>  <b>Private info</b> (only you and Change.org staff can see this)
                        </small>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="streetaddress" class="control-label">Street address</label>
                        <input type="text" class="form-control" id="" placeholder="Street address">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="postalcode" class="control-label">Postal code</label>
                        <input type="text" class="form-control" id="" placeholder="Postal code">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="postalcode" class="control-label d-block">Phone number (optional)</label>
                        <small>If you're interested, please provide a number for us to reach you regarding campaigns, causes, membership programmes, or other Change.org-related efforts.</small>
                        <input type="text" class="form-control mt-2" id="" placeholder="Phone Number">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-3 mt-2 pl-3">
                     <button type="submit" class="btn btn-primary">Save</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div id="content2" class="account-setting-wrapper">
         <div class="col-md-12">
            <h4 class="text-center font-weight-bold" style="color: #097298;">Change Password</h4>
            <form action="#">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="Old-password" class="control-label">Old Password</label>
                        <input type="password" class="form-control" id="" placeholder="Old Password">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="New-password" class="control-label">New Password</label>
                        <input type="password" class="form-control" id="" placeholder="New Password">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="confirm-New-password" class="control-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="" placeholder="Confirm New password">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-3 mt-2 pl-3">
                     <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div id="content3" class="account-setting-wrapper">
         <div class="col-md-12">
            <h4 class="text-center font-weight-bold" style="color: #097298;">Manage email addresses</h4>
            <form action="#">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="E-mail" class="control-label">Add Email</label>
                        <input type="text" class="form-control" id="" placeholder="Email">
                        <!--<button type="submit" class="btn btn-danger">Add</button>-->
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-3 mt-2 pl-3">
                     <button type="submit" class="btn btn-primary">Add Email</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div id="content4" class="account-setting-wrapper">
         <div class="row mb-3 white text-dark">
            <div class="col-md-12">
            	<h4 class="text-center font-weight-bold" style="color: #097298;">Disable my Account</h4>
               <p>Are you sure you want to disable your account?<br/>
                  When you disable your account you will not be <br/> able to login and support the campaigns you care about and any active memberships will be closed.
               </p>
            </div>
            <div class="row">
               <div class="col-xs-3 mt-2 pl-3">
                  <button type="submit" class="btn btn-primary">Disable My Account</button>
               </div>
            </div>
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
</script>
<script src="<?php base_url();?>/assets/js/user_registration.js"></script>
<script src="<?php base_url();?>/assets/js/jquery.validate.js"></script>
<script src="<?php base_url();?>/assets/js/validation.js"></script>