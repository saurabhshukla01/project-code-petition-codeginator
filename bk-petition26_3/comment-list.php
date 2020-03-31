<style>
   .home-banner {display: none;}
</style>
<main id="main" class="bg-light" style="margin-top: 100px;" data-spy="scroll">
   <section class="" >
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <a href="<?php echo base_url();?>/petition/petition-details/<?php echo $petition['petition_uid'] ?>" ><b><</b></a> <?php echo strip_tags($petition['petition_title']); ?>
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
               <h5 class="media-heading pt-1 font-weight-bold">Reasons for signing</h5>
               <?php if(count($comments) > 0 )  { 
                        foreach ($comments as $comment) {
                      ?>
                         <div class="card mb-3">
                            <div class="card-body">
                              
                                   <div class="row">
                                      <div class="col-md-1">
                                         <img src="<?php echo base_url();?>/assets/img/def_face.jpg" class="img img-rounded img-fluid w-100"/>
                                      </div>
                                      <div class="col-md-11">
                                         <p>
                                            <strong><?php echo ucfirst($comment["user_name"]); ?></strong><br /><small class="text-secondary text-center float-left"><?php echo $comment["comment_time_elasped"] ?></small>
                                         </p>
                                         <div class="clearfix"></div>
                                         <div class="read-more">
                                            <p >
                                               <?php echo $comment["comment_description"]; ?>
                                            </p>
                                         </div>
                                      </div>
                                   </div>
                           </div>
                         </div>
                     <?php } ?>
                  <?php  } 
                  else { ?>
                    <div class="card mb-3">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <b>No Record Found</b>
                              </div>
                           </div>
                        </div>
                    </div>
                <?php } ?>
               <!--end-->
            </div>
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




