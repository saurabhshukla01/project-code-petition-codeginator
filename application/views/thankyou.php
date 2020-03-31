<style>
  .home-banner {display: none;}
  .thankyou .trend-heading {font-size: 14px; height: 70px; display: block;}
  .thankyou .trend-img {width:100%;height: 150px; display: block;}

</style>
<main id="main" class="mt-5 pt-5">
   <!--<section id="about" class="border-top">
      <div class="container pl-0 pr-0">
         <div class="row">
         	<h2> Thankyou for sign petition </h2>
         </div>
     </div>
 </section>-->
 <section class="text-dark border-top">
         <div class="container pt-4">
            <h2 class="media-heading pt-1 font-weight-bold text-center" style="color:#097298">Thankyou For Your Small Effort Towards A Better Nation !!</h2>
            <div class="row p-3 mb-3 white text-dark text-center">
               <!--<div class="text-center m-auto">

                  <h3 class="p-1" role="alert"></h3>
                  <p>
                     <img class="w-25" src="images/TDRYYLbcAjrTDnv-800x450-noPad.jpg" alt="Card image" style="width:100%">
                  </p>
                  <p class="mb-2 btn btn-primary p-2">
                     <i class="fa fa-twitter"></i>
                     <a href="javascript:void(0);" class="text-white" onclick="javascript:post_on_twitter('<?php //echo $twitter_url; ?>');"> Tweet to your followers</a>
                  </p>
                  <p class="mb-2 btn btn-default border"><i class="fa fa-link"></i>
                     <a href="javascript:void(0);" onclick="javascript:copyLink();" class="text-dark"> Copy Link</a>
                  </p>
               </div>-->
            </div>
         </div>
      </section>

      <section class="pt-3 bg-light thankyou">
         <div class="container">
            <div class="row">
            	<h4 class="col-md-12 text-left mb-4">Trending petitions</h4>
              <?php 
                if(count($petitions) > 0 ) { 
                   $i = 1;
                   foreach ($petitions as $petition) { 
                
                    $petition_title = $petition['petition_title'];
                    $petition_image = $petition['petition_image'];
                    $petition_uid = $petition['petition_uid'];
                ?>
               <div class="col-md-3">
                  <div class="home-tooltip">
                     <img class="img-thumbnail trend-img" src="/assets/petition_images/<?php echo $petition_image ?>" alt="Petition image">
                     <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="" class="home-tooltiptext trend-heading"><?php echo $petition_title ?></a>
                  </div>
               </div>
                <?php  

                        $i++;
                        if($i>=21) {
                          break;
                         }

                        }
                     }
                  ?>
            </div>
         </div>
         <input type="hidden" name="petition_url" id="petition_url" value="<?php echo $petition['petition_url']; ?>">

      </section>
</main>
