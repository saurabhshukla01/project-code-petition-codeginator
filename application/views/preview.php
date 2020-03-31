<style>
  .home-banner {display: none;}
}
</style>
<script src="<?php base_url();?>/assets/ckeditor/ckeditor.js"></script>
<main id="main" class="mt-5 pt-5">
   <section id="about" class="border-top">
      <div class="container pl-0 pr-0">
        <div class="row">   
          <!--preview pop up-->
          <!-- button -->
                  <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#previewpopup">Open Preview Popup</button>-->
                  <!-- Modal -->
                  <div id="previewpopup" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content p-2">
                        <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                          <div class="row">
                           <h4 class="w-100 text-center ml-3 mr-3 mb-0"><?php echo $petition['petition_title'] ?></h4>
                              <div class="">
                                 <div class="card">
                                    <div class="card-img text-center">
                                      <img src="/assets/petition_images/<?php echo $petition['petition_image']; ?>" alt="" class="img-fluid img-responsive mb-2">
                                    </div> 
                                    <p><?php echo $petition['petition_description'] ?></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer m-auto text-center border-0">
                          <a href="http://petition.sheenz.in/petition/my_petition_list"><input type="submit" class="btn btn-primary" value="Submit"></a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- preview pop up-->
      </div>
      </div>
   </section>

  <section id="about" class="pt-5">
      <div class="container">
            <div class="row"><h4 class="w-100 text-center p-3 bg-light border font-weight-bold" style="color: #097298;">START PETITION</h4></div>
        <div class="row">
          <form action="<?php base_url();?>/petition/update_petition_data/<?php echo $petition['petition_uid'] ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="start-petition-form">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Topic<span class="text-danger">*</span></label>
                                    <select id="category_id" name="category_id" class="form-control" tabindex="1" required>
                                        <option disabled selected>Choose a Petition Topic</option>
                                        <?php if(isset($category)) { foreach($category as $obj) { ?>
                                                <option value="<?php echo $obj->category_id; ?>" <?php if($petition['category_id'] == $obj->category_id){
                                                    echo "selected";
                                                }?>><?php echo $obj->category_name; ?></option>
                                        <?php }} ?>
                                            </select>
                                        <!--<span class="helptooltiptext">Topic selected by category</span>-->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Url<span class="text-danger"></span></label>
                                    <input type="text" class="form-control " name="petition_url" value="<?php echo $petition['petition_url'] ?>" id="petition_url" placeholder="Ex- https://callupon.org/" tabindex="2"  maxlength="255">
                                    <!--<span class="helptooltiptext">Url Of website</span>-->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!--<div class="form-group helptooltip">-->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                    <!--<input type="text" class="form-control " name="petition_title" value="" id="petition_title" required placeholder="Petition of Title" tabindex="2"  maxlength="255">-->

                                     <textarea class="form-control" rows="5" id="petition_title" name="petition_title" tabindex="3" placeholder="Enter the Title"><?php echo $petition['petition_title'] ?></textarea>
                                    <!--<span class="helptooltiptext">Title Of Petition</span>-->
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Petition Image<span class="text-danger">*</span></label>
                                    <div class="petitionlogoimage-upload">
                                       <div class="petitionlogoimage-edit">
                                          <input type="file" class="form-control" name="petition_image" id="petition_image" tabindex="4"  accept=".jpeg,.png,.jpg,.gif" value="image1">
                                          <label for="imageUpload"></label>
                                       </div>
                                       <div class="petitionlogoimage-preview">
                                          <div id="petitionlogoimagePreview" style="background-image:url('<?php base_url();?>/assets/petition_images/<?php echo $petition['petition_image'] ?>');">
                                          </div>
                                       </div>
                                     </div>
                                   <!--<input type="file" class="form-control" name="petition_image" id="petition_image" tabindex="2" required>-->
                                    <small>(min. size 200x200 and not more than 100 kb and image format jpeg,png,jpg)</small>
                                    <!--<span class="helptooltiptext">Image Of petition</span>-->
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Target<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " name="petition_target" value="<?php echo $petition['petition_target'] ?>" id="petition_target" required placeholder="Target" tabindex="5"  maxlength="255">
                                    <!--<span class="helptooltiptext">What is your target</span>-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Goal<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control " name="petition_goal" value="<?php echo $petition['petition_goal'] ?>" id="petition_goal" placeholder="Number of Supporters" tabindex="6"  maxlength="10">
                                    <!--<span class="helptooltiptext">Number of Goals</span>-->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="3" id="petition_description" name="petition_description" tabindex="6" placeholder="Description"><?php echo $petition['petition_description'] ?></textarea>
                                    <!--<span class="helptooltiptext">Descripition of petition</span>-->
                                </div>
                            </div>                  
                    </div>


                    <div class="box-footer pl-4 pr-4">
                        <button type="submit" class="btn btn-primary mb-0 aqua m-t-xs bottom15-xs btn-round btnSubmit"  value="form_submit" name="save" id="save">Submit</button>
                        <button type="submit" class="btn btn-primary mb-0 aqua m-t-xs bottom15-xs btn-round btnSubmit"><a class="text-white" href="<?php base_url();?>/petition/start-petition">Cancel</a></button>
                    </div>
                    </div>

                    </form>                  
                </div>
            </div>
    </section> 
</main>

  <script>
   function imgupload(input) {
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
   imgupload(this);
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

<script>
  $(document).ready(function(){
    /*$("#previewpopup").modal({
        show: false,
        backdrop: 'static'
    });*/
    $("#previewpopup").modal('show');
    });
</script>






