<style>

.petitionlogoimage-upload {
  position: relative;
 /*  max-width: 205px; */
  margin: 0px auto;
}


.petitionlogoimage-upload .petitionlogoimage-edit {
  /*position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;*/
}

.petitionlogoimage-upload .petitionlogoimage-edit input {
  display: block;
  width: 100%;
}
.petitionlogoimage-upload .petitionlogoimage-edit input + label {
  display: none;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
 /* border-radius: 100%; */
  background: #FFFFFF;
  border: 1px solid transparent;
  /* box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12); */
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.petitionlogoimage-upload .petitionlogoimage-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
/*.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
*/
.petitionlogoimage-upload .petitionlogoimage-preview {
  width: 100%;
  height: 200px;
  position: relative;
 /* border-radius: 100%; */
  border: 6px solid #F8F8F8;
 /* box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1); */
}
.petitionlogoimage-upload .petitionlogoimage-preview > div {
  width: 100%;
  height: 100%;
 /* border-radius: 100%; */
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>
<script src="<?php base_url();?>/assets/ckeditor/ckeditor.js"></script>
<main id="main">
    <section id="about" class="pt-5">
      <div class="container">
        <div class="row">
          <form action="<?php base_url();?>/petition/start-petition" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row pl-4 pr-4">
                            <div class="col-md-6">
                                <div class="form-group helptooltip">
                                    <label for="exampleInputEmail1">Topic<span class="text-danger">*</span></label>
                                    <select id="category_id" name="category_id" class="form-control" tabindex="1" required>
                                        <option disabled selected>Choose a Petition Topic</option>
                                        <?php if(isset($category)) { foreach($category as $obj) { ?>
                                                <option value="<?php echo $obj->category_id; ?>" <?php //if($obj->selected){echo 'selected';} ?>><?php echo $obj->category_name; ?></option>
                                        <?php }} ?>
                                            </select>
                                        <!--<span class="helptooltiptext">Topic selected by category</span>-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Url<span class="text-danger"></span></label>
                                    <input type="text" class="form-control " name="petition_url" value="" id="petition_url" placeholder="Ex- https://callupon.org/" tabindex="3"  maxlength="255">
                                    <!--<span class="helptooltiptext">Url Of website</span>-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--<div class="form-group helptooltip">-->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                    <!--<input type="text" class="form-control " name="petition_title" value="" id="petition_title" required placeholder="Petition of Title" tabindex="2"  maxlength="255">-->
                                     <textarea class="form-control" rows="10" id="petition_title" name="petition_title" tabindex="5" placeholder="Enter the Title"><?php echo isset($petition_title)?$petition_title:''?></textarea>
                                    <!--<span class="helptooltiptext">Title Of Petition</span>-->
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Petition Image<span class="text-danger">*</span></label>
                                    <div class="petitionlogoimage-upload">
                                       <div class="petitionlogoimage-edit">
                                          <input type="file" id="petition_image" accept=".png, .jpg, .jpeg">
                                          <label for="imageUpload"></label>
                                       </div>
                                       <div class="petitionlogoimage-preview">
                                          <div id="petitionlogoimagePreview" style="background-image: url('https://user-images.githubusercontent.com/194400/49531010-48dad180-f8b1-11e8-8d89-1e61320e1d82.png');">
                                          </div>
                                       </div>
                                     </div>
                                   <!-- <input type="file" class="form-control" name="petition_image" id="petition_image" tabindex="2" required>-->
                                    <small>(min. size 200x200 and not more than 100 kb and image format jpeg,png,jpg)</small>
                                    <!--<span class="helptooltiptext">Image Of petition</span>-->
                                </div>
                            </div> 
                            <!--<div class="col-md-6">
                                <div class="form-group helptooltip">
                                    <label for="exampleInputEmail1">Target<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " name="petition_target" value="" id="petition_target" required placeholder="Target" tabindex="3"  maxlength="255">
                                    <span class="helptooltiptext">What is your target</span>
                                </div>
                            </div>-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Goal<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control " name="petition_goal" value="" id="petition_goal" placeholder="Number of Supporters" tabindex="4"  maxlength="10">
                                    <!--<span class="helptooltiptext">Number of Goals</span>-->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="3" id="petition_description" name="petition_description" tabindex="6" placeholder="Description"><?php echo isset($petition_description)?$petition_description:''?></textarea>
                                    <!--<span class="helptooltiptext">Descripition of petition</span>-->
                                </div>
                            </div>                  
                    </div>
                    <div class="box-footer pl-4 pr-4">
                        <button type="submit" class="btn btn-primary  mb-0 aqua m-t-xs bottom15-xs btn-round btnSubmit" value="form_submit" name="save" id="save">Submit</button>
                    </div>
                    </form>
    </div>
    </div>
    </section>
  </main>
  <script>
   function readURL(input) {
   if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#petitionlogoimagePreview').css('background-image', 'url('+e.target.result +')');
        $('#petitionlogoimagePreview').hide();
        $('#petitionlogoimagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
   }
   }
   $("#petition_image").change(function() {
    readURL(this);
   });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace(
            'petition_description',
            {
                toolbar: [
                    ['Font','FontSize', 'Bold','Italic','Underline','NumberedList','BulletedList']
                ],
                width:['1150px'],
                height :['150px']
            },
        );
    });


    $(document).ready(function() {
        CKEDITOR.replace(
            'petition_title',
            {
                toolbar: [
                    ['Font','FontSize', 'Bold','Italic','Underline','NumberedList','BulletedList']
                ],
                width:['1150px'],
                height :['180px']
            },
        );
    });
</script>
<style type="text/css">
    input[type=file] {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: #EEE;
    background: linear-gradient(to top, #FFF, #DDD);
    border: thin solid rgba(0,0,0, .5);
    border-radius: .25em;
    box-shadow: inset .25em .25em .25em rgba(255,255,255, .5), inset -.1em -.1em .1em rgba(0,0,0, 0.1);
    cursor: text;
    padding: .25em;
}
</style>
