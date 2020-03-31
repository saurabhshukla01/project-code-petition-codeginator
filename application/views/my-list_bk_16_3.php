<main id="main">
   <section id="about" class="">
      <div class="container">
      <div class="row">
      <div class="col-lg-12 p-0" style="margin:0px auto;">
         <div class="blog-list clearfix">
            <div class="section-title">
               <!--<span class="profile-con"><a href="<?php //echo base_url();?>user-registration/edit-profile" class="btn btn-info border col-md-2">Edit profile</a></span>-->
               <h3 class="w-50 d-block m-0 p-2"><a href="#" title="">My Petitions</a></h3>
            </div>
            <!-- end title -->
            <?php if(count($petitions) > 0 ) { 
               foreach ($petitions as $petition) { 
               
                   $petition_title = $petition['petition_title'];
                   $petition_image = $petition['petition_image'];
                   $petition_description = $petition['petition_description'];
                   $petiton_created = $petition['created_date'];
                   $petition_uid = $petition['petition_uid'];
                   $petition_goal = $petition['petition_goal'];
                   $petition_signed_count = $petition['petition_signed_count'];
                   //$petition_signed_count = 2000;
                   $percentage_petition = ($petition_signed_count/$petition_goal) * 100;
               
               ?>
            <div class="blog-box row border m-2 p-2">
               <div class="col-md-4 pl-0 pr-0">
                  <div class="post-media w-100 overflow-hidden" style="max-height:215px;">
                     <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="">
                        <img src="/assets/petition_images/<?php echo $petition_image ?>" alt="" class="img-fluid img-responsive w-100">
                        <div class="hovereffect"></div>
                     </a>
                  </div>
                  <!-- end media -->
               </div>
               <!-- end col -->
               <div class="blog-meta big-meta col-md-8">
                  <h5 class="font-weight-bold"><a href="/petition/petition-details/<?php echo $petition_uid ?>" title=""><?php echo $petition_title ?></a></h5>
                  <div class="large-font">
                  <?php echo substr($petition_description, 0,280)?>&nbsp;
                     <span class="link type-weak d-block mt-2">
                     <a href="/petition/petition-details/<?php echo $petition_uid ?>" class="btn btn-rounded bg-primary mt-2 text-white p-0 pl-2 pr-2"><small>Read more</small></a>
                     </span>
                  </div>
                  <!-- <small><a href="#" title="">Travel</a></small>-->
                  <!-- <small></small>-->
                  <p>
                  <div class="progress">
                     <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentage_petition?>%" aria-valuenow="<?php echo $percentage_petition?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  </p>
                  <p>
                     <strong><?php echo $petition_signed_count?> signed</strong>
                     <span class="type-weak"><?php echo $petition_goal ?> goal </span>
                     
                     <!--<span class="text-right m-0 float-right">
                  <span class="mr-5 text-info"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                  <span class="pt-3 text-info"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
               </span>-->
                  </p>
               </div>
               <!-- end meta -->
            </div>
            <!-- end blog-box -->
           <!-- <hr class="invis">-->
            <?php   
               }
               ?>
            <?php } else {?>
            <div class="blog-box row">
               <div class="col-md-4">
                  <div class="post-media">
                     No Record Found
                  </div>
                  <!-- end media -->
               </div>
               <?php } ?>
               <!-- end blog-box -->
            </div>
            <!-- end blog-list -->
         </div>
         <!-- end col -->
      </div>
   </section>
</main>
<script type="text/javascript">
   $(".post-on-facebook").on('click', function () {
   
       location.href = "facebook/post-facebook"
   
   });
</script>
