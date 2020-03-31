<style>
    .same-height {max-height:200px;}
    .trending-title {height: 40px;
    overflow: hidden;
    }
</style>
<section>
   <div class="container pl-0 pr-0">
     <div class="row">
         <div class="col-md-8 pl-0">
              <div class="alert alert-secondary mt-2 mb-2 pb-5" role="alert">
                     <span class="mt-2 pt-5"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Start a petition of your own<br>
                     <small>This petition starter stood up and took action. Will you do the same?</small>
                     </span>
                     <span class="ml-5 pull-right"><a href="javascript:void(0);" onclick="javascript:start_petition();" class="btn btn-primary callupon-btn">Start a petition</a></span>
                  </div>

                  <div class="row">
                     <div class="col-md-12">
                        <h5 class="media-heading pt-1 font-weight-bold">Update</h5>
                        <div class="alert alert-grey border" role="alert">
                           <small>
                           <i class="fa fa-tags" aria-hidden="true"></i> <b><?php echo $user_name; ?> </b>started this petition
                           <span class="float-right">10 Days ago</span>
                           </small>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-12">
                        <h5 class="media-heading pt-1 font-weight-bold">Reasons for signing</h5>
                        <?php 
                  if(count($petitions) > 0 ) { 
                     $i = 1;
                     foreach ($petitions as $petition) { 
                  
                      $petition_title = $petition['petition_title'];
                      $petition_image = $petition['petition_image'];
                      $petition_uid = $petition['petition_uid'];
                      $description = $petition['description'];
                      $user_name = $petition['user_name'];
                      //$petiton_viewed_count = $petition['petiton_viewed_count'];
                  ?>
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-md-1">
                                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid w-100">
                                 </div>
                                 <div class="col-md-11">
                                    <p>
                                       <a class="float-left" href="#"></a>
                                       <strong><?php echo $user_name; ?></strong>
                                       <!--<br><small class="text-secondary text-center float-left">15 Minutes Ago</small></a>
                                       <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                       <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                       <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                       <span class="float-right"><i class="text-warning fa fa-star"></i></span>-->
                                    </p>
                                    <div class="clearfix"></div>
                                    <div class="">
                                       <p class="mb-1 collapseSummary font-weight-light" style=""><small><?php echo $description; ?></small></p>
                                       
                                    </div>
                                    <p>
                                       <a class="float-left btn text-white btn-secondary"> <i class="fa fa-heart"></i> <?php echo $petition_signed_count; ?> </a>
                                       <a class="float-left btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php  

                        $i++;
                        if($i>=3) {
                          break;
                         }

                        }
                     }
                  ?>
                     </div>
                  </div>
               </div>
     </div>

   </div>
</section>

<!--<section class="trending-petitions">
         <div class="container pl-0 pr-0">
            <div class="row">
               <h4 class="col-md-12 text-left mt-4 mb-0">Trending petitions</h4>
               <?/*php 
                  if(count($petitions) > 0 ) { 
                     $i = 1;
                     foreach ($petitions as $petition) { 
                  
                      $petition_title = $petition['petition_title'];
                      $petition_image = $petition['petition_image'];
                      $petition_uid = $petition['petition_uid'];
                      $description = $petition['description'];
                      $user_name = $petition['user_name'];
                  */?>
               <div class="col-md-4 mb-2">
                  <div class="card p-2">
                     <small class="mb-2"><b>Trending on Callupon.org</b></small>
                     <img class="card-img-top border same-height" src="/assets/petition_images/<?php //echo $petition_image ?>" alt="Petition image" style="width:100%">
                     <div class="card-body">
                        <h5 class="card-title trending-title"><a href="/petition/petition-details/<?php// echo $petition_uid ?>" title="" class=""><?php //echo $petition_title ?></a></h5>-->
                        <!--<p class="card-text"><a href="" class="font-weight-normal text-secondary">Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets <small class="text-danger font-italic font-weight-bold">Read More...</small></a></p>-->
                        <!--<a href="#" class="btn btn-primary">Sign the petition</a>-->
                        <!--<span><button type="button" class="btn btn-danger submit-signed-petition" data-petition-id="<?php //echo $petition['petition_id'] ?>" data-petition-uid="<?php //echo $petition['petition_uid']; ?>">Sign this Petition</button>
                        </span> 
                     </div>
                  </div>
               </div>
               <?/*php  
                        $i++;
                        if($i>=10) {
                          break;
                         }
                        }
                     }
                  */?>
            </div>
         </div>
         </div>
      </section>-->

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

                      window.location.href = '<?php echo base_url();?>/petition/petition-details/'+petition_uid;
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