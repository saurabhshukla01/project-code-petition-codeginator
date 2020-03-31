<style>
   .home-banner {
   display: none;
   }
</style>
<script src="<?php base_url();?>/assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>/assets/js/parsley.min.js"></script>

<main id="main" class="bg-light pt-5">
   <section id="about" class="pt-5">
      <div class="container">
         <div class="row">
            <h4 class="w-100 text-center p-3 bg-light border font-weight-bold" style="color: #097298;">UPDATE PETITION</h4>
         </div>
         <div class="row" id="error-message-div" style="display:none">
             <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" style="margin-top:2rem" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
                 </button>
                  <span id="span-error-message">
                  </span>
               </div>
             </div>
         </div>

         <div class="row">
            <form action="" enctype="multipart/form-data" id="frm-petition_update" name="frm-petition_update" method="post" accept-charset="utf-8" class="start-petition-form">
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
                  <button type="button" class="btn btn-primary mb-0 aqua m-t-xs bottom15-xs btn-round btnSubmit"  value="Update" name="btn-update" id="btn-update">Update</button>
               </div>
         </div>
         </form>                  
      </div>
      </div>
   </section>
</main>
<form method="post" action="" name="petition-preview" id="petition-preview">
   <div class="modal fade" id="modal-petition-preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header ">
               <h6><b>Petition Preview</b></h6>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body scroll-480" >
               <div class="row">
                  <div class="col-12" id="div-petition-title">
                        
                  </div>
               </div>
               <br/>
               <div class="row">
                  <div class="col-12">
                     <img id="petition_preview_img" src="" style="max-width: 740px;">
                  </div>
               </div>
               <br/>
                <div class="row">
                  <div class="col-12" id="div-petition-description">
                    
                  </div>
               </div>

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-primary" id="btn-publish">Publish</button>
            </div>
         </div>
      </div>
   </div>
</form>
<script type="text/javascript">

    $('form').parsley();


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

   $(document).ready(function() {

        $("#btn-publish").on('click',function(e) {
       
                 e.preventDefault(); 
                 $("#error-message-div").hide();
                 $("#span-error-message").html();
                 $("#btn-publish").html('<i class="fa fa-refresh fa-spin"></i> Sending for admin approval, Please wait.....');
                 $("#btn-publish").attr('disabled', true);
                 var  petition_id  = $(this).attr('data-petition-id');

                 $.ajax( {
                             url: '<?php echo base_url();?>petition/publish-petition',
                             type:'post',
                             dataType:"json",  
                             data:{"petition_id":petition_id,"status":1},
                             success:function(data) {

                                location.href="<?php echo base_url();?>petition/my_petition_list"
                                 
                             },
                             error:function(data) {
                                 $("#btn-publish").html('Publish');
                                 $("#btn-publish").removeAttr('disabled', true);
                             }
                });
            });

        $("#btn-update").on('click',function(e) {
   
            var formdata = new FormData(document.getElementById('frm-petition_update'));
            var petition_title = CKEDITOR.instances.petition_title.getData();
            var petition_description = CKEDITOR.instances.petition_description.getData();

            formdata.append("petition_title", petition_title);
            formdata.append("petition_description", petition_description);

            //$("#btn-save").html('<i class="fa fa-refresh fa-spin"></i> Please wait, processing...');
            //$("#btn-save").attr('disabled', true);

             e.preventDefault(); 
             $("#error-message-div").hide();
             $("#span-error-message").html();
             let petition_img_path = '<?php echo base_url();?>/assets/petition_images/';
             $.ajax({
                 url:"<?php echo base_url();?>petition/update-petition/<?php echo $petition['petition_uid'] ?>",
                 type:"post",
                 dataType:"json",
                 mimeTypes:"multipart/form-data",
                 data:formdata,
                 processData:false,
                 contentType:false,
                 cache:false,
                  success: function(data) {

                        if(data.status == 1) {

                            $("#error-message-div").show();
                            $("#span-error-message").html(data.message);
                            $("#btn-update").html('Update');
                            $("#btn-update").removeAttr('disabled');

                            $("html, body").animate({ scrollTop: 0 }, "fast");
                            return false;
                        }
                        else {

                            var petition_id = data.petition_id;
                            var petition_image = data.petition_image;

                            $("#petition_id").val(petition_id);

                            var petition_title = CKEDITOR.instances.petition_title.getData();
                            var petition_description = CKEDITOR.instances.petition_description.getData();
                            $("#div-petition-title").html(petition_title);

                            $("#div-petition-description").html(petition_description);
                            let petition_full_path = petition_img_path+petition_image;
                            $("#petition_preview_img").attr('src', petition_full_path);
                            $("#modal-petition-preview").modal('show');
                            $("#btn-update").html('Update').attr('disabled', false);
                            $("#btn-publish").attr("data-petition-id",petition_id);
                        }
                   },
                   error: function(data) {


                   }
             });
        });


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