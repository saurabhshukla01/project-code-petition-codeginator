<section class="text-dark">
	<div class="container pt-4">
	   <div class="row p-3 mb-3 white text-dark">
		  <div class="col-md-12">
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