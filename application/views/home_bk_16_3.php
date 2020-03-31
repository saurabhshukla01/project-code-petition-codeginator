<link href="<?php echo base_url();?>assets/css/home-style.css?.rnd=564" rel="stylesheet">
<main id="main">
      <section class="pt-3">
         <div class="container">           
            <div class="">
               <div id="carousel-one" class="carousel slide grey-border" data-ride="carousel">
                  <div class="carousel-inner">
                      <?php 
                  if(count($petitions) > 0 ) { 
                     $i = 0;
                     foreach ($petitions as $petition) { 

                      $petition_title = $petition['petition_title'];
                      $petition_image = $petition['petition_image'];
                      $petition_description = $petition['petition_description'];
                      $petiton_created = $petition['created_date'];
                      $petition_uid = $petition['petition_uid'];
                      $petition_goal = $petition['petition_goal'];
                      $petition_signed_count = $petition['petition_signed_count'];
                      $petition_category = $petition['category_name'];
                      $percentage_petition = ($petition_signed_count/$petition_goal) * 100;
                      
                      $active = '';                      
                      if($i == 0) {
                        $active = 'active';
                      }
                      ?>

                     <div class="carousel-item <?php echo $active; ?>">
                        <div class="card">
                           <div class="card-horizontal">
                              <div class="img-square-wrapper">
                                <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="">
                                 <img class="border" src="/assets/petition_images/<?php echo $petition_image ?>" alt="image01">
                                 <div class="hovereffect"></div>
                                </a>
                              </div>
                              <div class="card-body">
                                 <!--<h4 class="card-title"><?php //echo $petition_title ?></h4>-->
                                 <h4 class="card-title"><a href="/petition/petition-details/<?php echo $petition_uid ?>" title=""><?php echo $petition_title ?></a></h4>
                                 <p class="card-text"><?php echo substr($petition_description, 0,275)?>&nbsp; </p>
                                 <a href="/petition/petition-details/<?php echo $petition_uid ?>" class="da-link text-white btn-primary btn-sm float-right mb-4 mr-4">Read more</a>
                              </div>
                           </div>
                           <div class="card-footer">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="demo-content no-gutters">
                                       <span class="text-danger"><i class="fa fa-users" aria-hidden="true"></i></span>
                                       <span class="col-11 float-right">
                                       <span class="name"><strong><?php echo $petition_signed_count?>&nbsp;Signed</strong></span>
                                       <!--<span class="small sub-text"><a href="">signed</a></span>-->
                                       </span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="demo-content no-gutters">
                                       <span class="text-danger"><i class="fa fa-bullseye" aria-hidden="true"></i></span>
                                       <span class="col-11 float-right">
                                       <span class="name"><strong><?php echo $petition_goal ?>&nbsp;Goal</strong></span>
                                       <!--<span class="small sub-text"><a href="">goal</a></span>-->
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php   
                           $i++; 
                        }
                     }
                  ?>
                  </div>
                  <a class="carousel-control-prev" href="#carousel-one" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-one" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </section>

      <section class="pt-3">
         <div class="container">
            <div class="row">
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
                        <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="" class="home-tooltiptext"><?php echo $petition_title ?></a>
                     <img class="img-thumbnail" src="/assets/petition_images/<?php echo $petition_image ?>" alt="Petition image">
                  </div>
               </div>
                <?php  

                        $i++;
                        if($i>=5) {
                          break;
                         }

                        }
                     }
                  ?>
            </div>
         </div>
      </section>

      <section class="media-content">
         <div class="container">
            <h4 class="text-left p-3 pt-4 mt-3">Changes on Callupon.org</h4>
            <div class="row">
               <div class="col-md-9">
                  <?php 
                        if(count($petitions) > 0) { 
                            $i=1;
                           foreach ($petitions as $petition) { 
                            
                            $petition_title = $petition['petition_title'];
                            $petition_image = $petition['petition_image'];
                            $petition_description = $petition['petition_description'];
                            $petiton_created = $petition['created_date'];
                            $petition_uid = $petition['petition_uid'];
                            $petition_goal = $petition['petition_goal'];
                            $petition_signed_count = $petition['petition_signed_count'];
                            $petition_category = $petition['category_name'];
                            //$petition_signed_count = 2000;
                            $percentage_petition = ($petition_signed_count/$petition_goal) * 100;

                  ?>
                  <div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <b><?php echo $petition_category ?></b>
                        <!--<span class="float-right mt-2 pb-1"><a href="<?php //base_url();?>/petition/petition-list">View all</a></span>-->
                        </small>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                          <h4 class="media-heading pt-1 font-weight-bold"><a href="/petition/petition-details/<?php echo $petition_uid ?>" title=""><?php echo $petition_title ?></a></h4>
                           <!--<h5 class="media-heading pt-1 font-weight-bold"><?php // echo $petition_title ?></h5>-->
                           <p><?php echo substr($petition_description, 0,275)?>&nbsp; <small><a href="/petition/petition-details/<?php echo $petition_uid ?>" class="text-danger font-italic text-white">Read More ...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark"><strong><?php echo $petition_signed_count?>&nbsp;Signed</strong></small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-bullseye" aria-hidden="true"></i> <small class="text-dark"><strong> <?php echo $petition_goal ?>&nbsp;Goal</strong></small></span>
                        </div>
                        <div class="col-md-4">
                          <a href="/petition/petition-details/<?php echo $petition_uid ?>" title="">
                           <img src="/assets/petition_images/<?php echo $petition_image ?>" class="border">
                           <div class="hovereffect"></div>
                          </a>
                        </div>
                     </div>
                  </div>
                  <?php  
                        }
                     }
                  ?>
                  <div class="" role="alert">
                     <span><small><a href="" class="alert alert-secondary text-center media-object loadMore" style="display:block;"><i class="fa fa-suitcase" aria-hidden="true"></i>  Load more</a></small></span>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="alert alert-secondary m-2" role="alert">
                     <i class="fa fa-tags" aria-hidden="true"></i> Topics
                  </div>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1">Animal</span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1">Human rights</span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1">Health</span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1">Econamic Justice</span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1">Politics</span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1">Local</span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1">Eniveroment</span>
               </div>
            </div>
         </div>
      </section>
   </main>
 <script>
       $(document).ready(function() {
           $(".load-content").slice(0, 3).show();
           $(".loadMore").on("click", function(e) {
               e.preventDefault();
               $(".load-content:hidden").slice(0, 2).slideDown();
               if ($(".load-content:hidden").length == 0) {
                   $(".loadMore").text("No more petition").addClass("no-more-petition");
               }
           });
       })
 </script>
