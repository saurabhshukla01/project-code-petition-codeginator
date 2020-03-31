<style>
  .home-banner {display: none;}
</style>
<main id="main" class="bg-light" style="margin-top: 100px;" data-spy="scroll">
  <section class="" >
    <div class="container">
      <div class="row">
        <div class="col-md-4 m-auto text-center pt-4">
          <a href="#my" class="btn btn-info btn-md font-weight-bold">My Petitions</a>
          <a href="#signed" class="btn btn-info btn-md font-weight-bold">Signed Petitions</a>
        </div>
      </div>
      <div class="row mt-5" id="my">
        <h4 class="w-100 p-3 text-center bg-light border font-weight-bold" style="color: #097298;">MY PETITION</h4>
        <div class="col-md-12">
          <?php if(count($petitions) > 0 ) { 
            foreach ($petitions as $petition) { 
              $i = 0;
              $petition_title = $petition['petition_title'];
              $petition_image = $petition['petition_image'];
              $petition_description = $petition['petition_description'];
              $petiton_created = $petition['created_date'];
              $petition_uid = $petition['petition_uid'];
              $petition_goal = $petition['petition_goal'];
              $petition_signed_count = $petition['petition_signed_count'];
              $petition_status = $petition['petition_status'];
              //$petition_signed_count = 2000;
              $percentage_petition = ($petition_signed_count/$petition_goal) * 100;
             
              if($petition_signed_count == 0 && $petition_status != 0) {
                      $petition_signed_count = $petition_signed_count;
                      //$petition_status = $petition_status;
              ?>
                <div class="blog-box row border mt-2 mb-2 p-2">
                  <div class="col-md-4 pl-0 pr-0">
                    <div class="post-media border p-0 w-100 overflow-hidden" style="max-height:215px;">
                      <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="">
                        <img src="/assets/petition_images/<?php echo $petition_image ?>" alt="" class="img-fluid img-responsive col-md-12 p-0">
                        <div class="hovereffect"></div>
                      </a>
                    </div>
                    <!-- end media -->
                  </div>
                  <!-- end col -->
                  <div class="blog-meta big-meta col-md-8 font-weight-normal">
                  <h5 class="mb-3 font-weight-bold">
                    <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="" style="color: #097298;"><?php echo $petition_title ?>
                    </a>
                  </h5>
                      
                  <div class="large-font"><?php echo substr($petition_description, 0,350)?></div>&nbsp;
                  <div class="d-inline">
                    <span class="link type-weak mt-2">
                      <a href="/petition/petition-details/<?php echo $petition_uid ?>" class="btn btn-rounded bg-info mt-2 text-white p-0 pl-2 pr-2"><small>Read more</small>
                      </a>
                    </span>

                    <?php if( $petition_status ==1 || $petition_status ==0){?>
                    <!--<form action="<?php //base_url();?>/petition/start-petition" enctype="multipart/form-data" method="get" accept-charset="utf-8" class="start-petition-form">
                    <input type="hidden" name="petition-uid" id="petition-uid" value="<?php //echo $petition_uid ?>" />-->
                    <span class="link type-weak mt-2">
                      <a href="<?php base_url();?>/petition/update-petition/<?php echo $petition_uid ?>" class="btn btn-rounded bg-secondary mt-2 text-white p-0 pl-2 pr-2"><small>Edit Petition</small>
                      </a>
                    </span>

                    <?php }?>
                  </div>

                  <div class="pb-2 pt-2">
                    <span class="mr-5 text-danger"><i class="fa fa-user-plus" aria-hidden="true"></i> <small class="text-dark"><strong><?php echo $petition_signed_count?>&nbsp;Signed</strong></small></span>
                    <span class="mr-5 pt-3 text-danger"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <small class="text-dark"><strong> <?php echo $petition_goal ?>&nbsp;Goal</strong></small></span>
                    <!--<span class="mr-5 pt-3 text-danger"><i class="fa fa-pause" aria-hidden="true"></i> <small class="text-dark"><strong> &nbsp;Status</strong></small></span>-->
                    <?php if( $petition_status == 0){
                      $petition_status = 'Draft';
                        echo '<span class="mr-5 pt-3 text-danger"><i class="fa fa-file" aria-hidden="true"></i><small class="text-dark"><strong>&nbsp;&nbsp'.$petition_status.'</strong></small></span>';
                      } 
                      else if( $petition_status == 1 ){
                        $petition_status = 'Awaiting admin approval'; 
                          echo '<span class="mr-5 pt-3 text-danger"><i class="fa fa-spinner" aria-hidden="true"></i><small class="text-dark"><strong>&nbsp;&nbsp;'.$petition_status.'</strong></small></span>';
                      }
                      else if( $petition_status == 2 ){
                        $petition_status = 'Published'; 
                          echo '<span class="mr-5 pt-3 text-danger"><i class="fa fa-telegram" aria-hidden="true"></i><small class="text-dark"><strong>&nbsp;&nbsp;'.$petition_status.'</strong></small></span>';
                      }
                    ?>
                  </div>
                </div>
              </div>
                <?php 
                    } 
                  $i++;  
                     }
                   }
                 ?>
            </div>
          </div>

          <div class="row mt-5" id="signed">
            <h4 class="w-100 p-3 text-center bg-light border font-weight-bold" style="color: #097298;">SIGNED PETITION</h4>
            <div class="col-md-12">    
              <?php if(count($petitions) > 0 ) { 
               foreach ($petitions as $petition) { 
                  $i = 0;
                  $petition_title = $petition['petition_title'];
                  $petition_image = $petition['petition_image'];
                  $petition_description = $petition['petition_description'];
                  $petiton_created = $petition['created_date'];
                  $petition_uid = $petition['petition_uid'];
                  $petition_goal = $petition['petition_goal'];
                  $petition_signed_count = $petition['petition_signed_count'];
                  //$petition_signed_count = 2000;
                  $percentage_petition = ($petition_signed_count/$petition_goal) * 100;
                  if($petition_signed_count > 0) {
                  $petition_signed_count = $petition_signed_count;
                ?>
                  <div class="blog-box row border mt-2 mb-2 p-2">
                    <div class="col-md-4 pl-0 pr-0">
                      <div class="post-media border p-0 w-100 overflow-hidden" style="max-height:215px;">
                        <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="">
                          <img src="/assets/petition_images/<?php echo $petition_image ?>" alt="" class="img-fluid img-responsive col-md-12 p-0">
                          <div class="hovereffect"></div>
                        </a>
                      </div>
                      <!-- end media -->
                    </div>
                    <!-- end col -->
                    <div class="blog-meta big-meta col-md-8 font-weight-normal">
                      <h5 class="mb-3 font-weight-bold" >
                        <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="" style="color: #097298;"><?php echo $petition_title ?></a>
                      </h5>
                      <div class="large-font"><?php echo substr($petition_description, 0,350)?></div>&nbsp;
                      <div class="d-inline">
                        <span class="link type-weak mt-2">
                          <a href="/petition/petition-details/<?php echo $petition_uid ?>" class="btn btn-rounded bg-info mt-2 text-white p-0 pl-2 pr-2"><small>Read more</small>
                          </a>
                        </span>
                      </div>
                      <div class="pb-3 pt-2">
                        <span class="mr-5 text-danger"><i class="fa fa-user-plus" aria-hidden="true"></i> <small class="text-dark"><strong><?php echo $petition_signed_count?>&nbsp;Signed</strong></small></span>
                        <span class="mr-5 pt-3 text-danger"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <small class="text-dark"><strong> <?php echo $petition_goal ?>&nbsp;Goal</strong></small></span>
                      </div>
                    </div>
                  </div>
                <?php 
                  }
                  $i++;  
                 }
               }
            ?>
          </div>
        </div>
  </section>
</main>

<script type="text/javascript">
  $('a[href^="#"]').on('click',function (e) {
    // e.preventDefault();

    var target = this.hash,
    $target = $(target);

   $('html, body').stop().animate({
     'scrollTop': $target.offset().top-110
    }, 900, 'swing', function () {
     window.location.hash = target;
    });
  });

  $(".post-on-facebook").on('click', function () {

     location.href = "facebook/post-facebook"

  });
</script>




