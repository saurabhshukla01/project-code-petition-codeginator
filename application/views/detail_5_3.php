<style>
  .home-banner {display: none;}
</style>
<main id="main" class="mt-5 pt-5">
   <section id="about" class="border-top">
      <div class="container pl-0 pr-0">
         <div class="row">
         <h4 class="w-100 text-center ml-3 mr-3 mb-0"><?php echo $petition['petition_title'] ?></h4>
            <div class="leftcolumn">
               <div class="card">

                  <div class="card-img text-center"><img src="/assets/petition_images/<?php echo $petition['petition_image']; ?>" alt="" class="img-fluid img-responsive mb-2"></div>
                  
                  <p><?php echo $petition['petition_description'] ?></p>

               </div>
                  <span class="mobile-sign-in mt-3"><button type="button" class="btn btn-danger w-100 submit-signed-petition mobilesignpetition" data-petition-id="<?php echo $petition['petition_id'] ?>" data-petition-uid="<?php echo $petition['petition_uid']; ?>">Sign this Petition</button></span>
            </div>
            <div class="rightcolumn">
              <div class="card">
                  <div class="progress mb-2">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentage_petition?>%" aria-valuenow="<?php echo $percentage_petition?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div>
                  <strong><?php echo $petition_signed_count ?> signed</strong>
                  <span class="type-weak">of <?php echo $petition['petition_goal']  ?> goal</span>
                </div>
               </div>
               <?php if($petition_signed == 0) {?>
               <div class="card description-box">
               <button type="button" class="close" aria-hidden="true">&times;</button>
                <?php if(!empty($this->session->flashdata('message'))) { ?>
                  <span>
                       <p><span class="alert alert-danger p-1" role="alert"><?php echo $this->session->flashdata('message');
                  ?></span></p> 
                  </span>
                  <?php } ?>
                  <span class="mb-2"><b><?php echo !empty($user_name) ? $user_name : '' ?></b></span>
                    <span>
                       <textarea class="form-control z-depth-1" id="petition_comment" name="petition_comment" rows="6" placeholder="Write yor comment..."></textarea>
                    </span>
                    <span class="pl-4 pt-2 pb-2 d-block">
                       <input type="checkbox" class="custom-control-input" id="display_name" name="display_name" value="1">
                       <label class="custom-control-label" for="display_name">Display my name and comment on this petiition</label>
                    </span>
                    <span><button type="button" class="btn btn-danger submit-signed-petition" data-petition-id="<?php echo $petition['petition_id'] ?>" data-petition-uid="<?php echo $petition['petition_uid']; ?>">Sign this Petition</button>
                    </span>                  
               </div>
             <?php } ?>
             <?php if($user_id > 0 && $petition_signed == 1) { ?>
               <div class="card">
                  <?php if(!empty($this->session->flashdata('message'))) { ?>
                  <p><span class="alert alert-primary p-1" role="alert"><?php echo $this->session->flashdata('message');
?></span></p> 
                  <?php } ?>
                  <!--<p class="mb-2 btn btn-primary p-2"> <i class="fa fa-facebook"></i><a href="javascript:void(0);" class="text-white" onclick="javascript:post_on_facebook();"> Share on Facebook</a></p>-->
                  <!--<p><a href="javascript:poptastic('<?php //echo $twitter_url; ?>');">Tweet to your followers</a></p>-->
                  <!--<a href="https://web.whatsapp.com/send?text=https://callupon.org/stbK"> Share on Whatapp</a>-->
                  
                  <p class="mb-2 btn btn-primary p-2"><i class="fa fa-twitter"></i><a href="javascript:void(0);" class="text-white" onclick="javascript:post_on_twitter('<?php echo $twitter_url; ?>');"> Tweet to your followers</a></p>
                  <p class="mb-2 btn btn-default border"><i class="fa fa-link"></i><a href="javascript:void(0);" onclick="javascript:copyLink();" class="text-dark"> Copy Link</a></p>
                
               </div>
             <?php } ?>
             <input type="hidden" name="petition_url" id="petition_url" value="<?php echo $petition['petition_url']; ?>">
            </div>
         </div>
      </div>
   </section>

   <section class="pt-3">
         <div class="container">
            <div class="row">
              <?php 
                        if(count($petitions) > 0 ) { 
                           $i = 0;
                           foreach ($petitions as $petition) { 
                        
                            $petition_title = $petition['petition_title'];
                            $petition_image = $petition['petition_image'];
                            $petition_uid = $petition['petition_uid'];
                  ?>
               <div class="col-md-3">
                  <div class="home-tooltip">
                        <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="" class="home-tooltiptext"><?php echo $petition_title ?></a>
                     <img class="img-thumbnail" src="/assets/petition_images/<?php echo $petition_image ?>" alt="Petition image">
                  </div>
               </div>
                <?php  
                        }
                     }
                  ?>
            </div>
         </div>
      </section>
      
</main>

<script type="text/javascript">

 function copyLink() {

        var copyLink = document.getElementById("petition_url");
        var copyText = copyLink.value;
        var textarea = document.createElement('textarea');
        textarea.textContent = copyText;
        document.body.appendChild(textarea);

        var selection = document.getSelection();
        var range = document.createRange();
        //range.selectNodeContents(textarea);
        range.selectNode(textarea);
        selection.removeAllRanges();
        selection.addRange(range);

        document.execCommand('copy');
        selection.removeAllRanges();

        document.body.removeChild(textarea);
        copyLink.select();
        //window.location.href=$_SERVER['HTTP_REFERER'];
    }

   function post_on_facebook() {

      $.ajax({
              url:"/social/post-facebook",
              type:'post',
              dataType:"json",
              data:{"petition_url":"<?php echo $petition['petition_url']; ?>","petition_uid":"<?php echo $petition['petition_uid']; ?>","petition_title":"<?php echo $petition['petition_title']; ?>","petition_image":"<?php echo $petition['petition_image']; ?>","petition_id":"<?php echo $petition['petition_id']; ?>","petition_description":""},
              success:function(response) {

                  if(response.status == 2) {

                      var fb_login_url = response.fb_login_url;
                      window.location.href = fb_login_url;
                  }
                
              },
              error: function() {
                
              }
        });
   }

   function post_on_twitter(twitter_url) {

      $.ajax({
              url:"/social/post-twitter",
              type:'post',
              dataType:"json",
              data:{"twitter_url":twitter_url,"short_url":"<?php echo $petition['petition_url']; ?>","petition_uid":"<?php echo $petition['petition_uid']; ?>",'petition_title':"<?php echo $petition['petition_title']; ?>",'petition_image':"<?php echo $petition['petition_image']; ?>","petition_id":"<?php echo $petition['petition_id']; ?>"},
              success:function(response) {
                  window.location.href = response.twitter_url;
              },
              error: function() {
                
              }
        });
   }

   $(".submit-signed-petition").on("click", function (e) {

      e.preventDefault();

      var petition_id = $(this).attr("data-petition-id");
      var petition_uid = $(this).attr("data-petition-uid");
      var petition_comment = $("#petition_comment").val()
      var display_name = $("#display_name").is(":checked") ? 1 : 0;

      console.log("petition_id" +petition_id);
      console.log("petition_uid" +petition_uid);

      $.ajax({
              url:"/petition/signed-petition",
              type:'post',
              dataType:"json",
              data:{"petition_id":petition_id,"petition_uid": petition_uid,"petition_comment":petition_comment,"display_name":display_name},
              success:function(response) {

                   if(response.status == 2) {
                       openLoginModal();
                   }

                   if(response.status == 1) {

                      window.location.href = '<?php echo base_url();?>/petition/petition-details/'+petition_uid;
                   }

                   if(response.status == 0) {

                      window.location.href = '<?php //echo base_url();?>/petition/petition-details/'+petition_uid;
                   }

              },
              error: function() {
                
              }
        });
   });


   $(".mobilesignpetition").click(function(){
  $(".description-box").show();
});

$(".close").click(function(){
  $(".description-box").hide();
});
    
</script>
