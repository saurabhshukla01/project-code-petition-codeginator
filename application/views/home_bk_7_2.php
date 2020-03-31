<link href="<?php echo base_url();?>assets/css/home-style.css?.rnd=564" rel="stylesheet">
<main id="main">
      <!--<section class="text-center pt-5 pb-5" style="background:url('<?php //base_url();?>/assets/img/waves.png')">
         <div class="container pt-5 mt-5">
            <span class="text-center mt-5 text-white b-font">Change the Nation by a Single Petition</span>
            <br />
            <span class="s-font text-white pb-5">Let's Start a <span class="text-danger"> Small Efforts</span></span>
         </div>
         <div class="btn callupon-btn mt-5 mb-5"><a href="">Start a Petition</a></div>
         </div>
      </section>-->
      <section class="pt-3">
         <div class="container">
            <?php 
                  if(count($petitions) > 0 ) { 
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

            <div class="p-3">
               <div id="carousel-one" class="carousel slide grey-border" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#carousel-one" data-slide-to="0" class="active"></li>
                     <li data-target="#carousel-one" data-slide-to="1"></li>
                     <li data-target="#carousel-one" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="card">
                           <div class="card-horizontal">
                              <div class="img-square-wrapper">
                                 <img class="" src="/assets/petition_images/<?php echo $petition_image ?>" alt="image01">
                              </div>
                              <div class="card-body">
                                 <h4 class="card-title"><?php echo $petition_title ?></h4>
                                 <p class="card-text"><?php echo substr($petition_description, 0,280)?>&nbsp; </p>
                                 <a href="<?php base_url();?>/petition/petition-details/5da40852c4d02" class="da-link">Read more</a>
                              </div>
                           </div>
                           <!--<div class="card-footer">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class="col-2"><img src="<?php //base_url();?>/assets/img/BBEkIehRibeUIhE-128x128-noPad.jpg" alt="" class="carousel-profile-image" /></span>
                                       <span class="col-10 float-right">
                                       <span class="name">Ankita Anand</span>
                                       <span class="small sub-text">New Delhi, India</span>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class=""><i class="fa fa-users" aria-hidden="true"></i></span>
                                       <span class="col-11 float-right">
                                       <span class="name">2,485</span>
                                       <span class="small sub-text"><a href="">Supporters</a></span>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class=""><i class="fa fa-comments-o" aria-hidden="true"></i></span>
                                       <span class="col-11 float-right">
                                       <span class="name">Featured in</span>
                                       <span class="small sub-text"><a href="">The New Indian Express</a></span>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>-->
                        </div>
                     </div>
                     <!--<div class="carousel-item ">
                        <div class="card">
                           <div class="card-horizontal">
                              <div class="img-square-wrapper">
                                 <img class="" src="<?php base_url();?>/assets/petition_images/images.jpg" alt="image01">
                              </div>
                              <div class="card-body">
                                 <h4 class="card-title">Delhi Pollution</h4>
                                 <p class="card-text">Delhi has been suffering from a severe air pollution issue from last few years now and air quality is degrading ever then. The capital of India is known as the top most polluted cities in the world. Despite this fact, in one of the main festivals of India, Diwali, crackers add more to this pro </p>
                                 <a href="<?php base_url();?>/petition/petition-details/5db147095c379" class="da-link">Read more</a>
                              </div>
                           </div>
                           <div class="card-footer">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class="col-2"><img src="<?php base_url();?>/assets/img/BBEkIehRibeUIhE-128x128-noPad.jpg" alt="" class="carousel-profile-image" /></span>
                                       <span class="col-10 float-right">
                                       <span class="name">Ankita Anand</span>
                                       <span class="small sub-text">India</span>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class=""><i class="fa fa-users" aria-hidden="true"></i></span>
                                       <span class="col-11 float-right">
                                       <span class="name">2,485</span>
                                       <span class="small sub-text"><a href="">Supporters</a></span>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class=""><i class="fa fa-comments-o" aria-hidden="true"></i></span>
                                       <span class="col-11 float-right">
                                       <span class="name">Featured in</span>
                                       <span class="small sub-text"><a href="">Mid-Day</a></span>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="card">
                           <div class="card-horizontal">
                              <div class="img-square-wrapper">
                                 <img class="" src="<?php base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg" alt="image01">
                              </div>
                              <div class="card-body">
                                 <h4 class="card-title">A Doctor who Saves Others Life was Herself Helpless</h4>
                                 <p class="card-text">A Doctor who Saves Others Life was Herself Helpless. Priyanka Reddy, a Veterinary Doctor faced a brutal sexual assault, murdered and burnt alive. Today the entire social media is asking for her justice: Justice required for Priyanka Reddy.</p>
                                 <a href="<?php base_url();?>/petition/petition-details/5de3907415f18" class="da-link">Read more</a>
                              </div>
                           </div>
                           <div class="card-footer">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class="col-2"><img src="<?php base_url();?>/assets/img/BBEkIehRibeUIhE-128x128-noPad.jpg" alt="" class="carousel-profile-image" /></span>
                                       <span class="col-10 float-right">
                                       <span class="name">Ankita Anand</span>
                                       <span class="small sub-text">India</span>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class=""><i class="fa fa-users" aria-hidden="true"></i></span>
                                       <span class="col-11 float-right">
                                       <span class="name">2,485</span>
                                       <span class="small sub-text"><a href="">Supporters</a></span>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="demo-content no-gutters">
                                       <span class=""><i class="fa fa-comments-o" aria-hidden="true"></i></span>
                                       <span class="col-11 float-right">
                                       <span class="name">Featured in</span>
                                       <span class="small sub-text"><a href="">Mid-Day</a></span>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>-->
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
         <?php   }
                     }
                  ?>
         </div>
      </section>
      <section class="media-content">
         <div class="container">
            <h4 class="text-left p-3 pt-4 mt-3">What's happening on Callupon.org</h4>
            <div class="row">
               <div class="col-md-9">
                  <div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <a href="">Womens rights</a>
                        <span class="float-right pt-1"><a href="">View all</a></span>
                        </small>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <small>Petition to Prasoon Joshi, Prakash Javadekar</small>
                           <h5 class="media-heading pt-1 font-weight-bold"><?php echo $petition_title ?></h5>
                           <p> <?php echo substr($petition_description, 0,280)?>&nbsp; <small><a href="" class="text-danger font-italic">Read More...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg">
                        </div>
                     </div>
                  </div>
                  <?php 
                  if(count($petitions) > 0 ) { 
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
                  <div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <a href="">Womens rights</a>
                        <span class="float-right"><a href="">View all</a></span>
                        </small>
                     </div>
                     <!--<div class="row">
                        <div class="col-md-8">
                           <small>Petition to Prasoon Joshi, Prakash Javadekar</small>
                           <h5 class="media-heading pt-1 font-weight-bold">On-Screen Violence Against Women And Girls Need Statutory Warnings Too</h5>
                           <p> Smoking and drinking are not ok but hitting a woman is absolutely fine. That’s the message you get when you watch a film in India today. <small><a href="" class="text-danger font-italic">Read More...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg">
                        </div>
                     </div>-->
                  </div>
                  <?php   }
                     }
                  ?>

                  <!--<div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <a href="">Womens rights</a>
                        <span class="float-right"><a href="">View all</a></span>
                        </small>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <small>Petition to President of India, Narendra Modi</small>
                           <h5 class="media-heading pt-1 font-weight-bold">#SaveRTI</h5>
                           <p>There is a move to weaken OUR fundamental Right to Information. This will stop us from exposing corruption and getting accountability. <small><a href="" class="text-danger font-italic">Read More...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php // base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg">
                        </div>
                     </div>
                  </div>
                  <div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <a href="">Womens rights</a>
                        <span class="float-right"><a href="">View all</a></span>
                        </small>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <small>Petition to President of India, Narendra Modi</small>
                           <h5 class="media-heading pt-1 font-weight-bold">#SaveRTI</h5>
                           <p>There is a move to weaken OUR fundamental Right to Information. This will stop us from exposing corruption and getting accountability. <small><a href="" class="text-danger font-italic">Read More...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php // base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg">
                        </div>
                     </div>
                  </div>
                  <div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <a href="">Womens rights</a>
                        <span class="float-right"><a href="">View all</a></span>
                        </small>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <small>Petition to President of India, Narendra Modi</small>
                           <h5 class="media-heading pt-1 font-weight-bold">#SaveRTI</h5>
                           <p>There is a move to weaken OUR fundamental Right to Information. This will stop us from exposing corruption and getting accountability. <small><a href="" class="text-danger font-italic">Read More...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php // base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg">
                        </div>
                     </div>
                  </div>
                  <div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <a href="">Womens rights</a>
                        <span class="float-right"><a href="">View all</a></span>
                        </small>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <small>Petition to President of India, Narendra Modi</small>
                           <h5 class="media-heading pt-1 font-weight-bold">#SaveRTI</h5>
                           <p>There is a move to weaken OUR fundamental Right to Information. This will stop us from exposing corruption and getting accountability. <small><a href="" class="text-danger font-italic">Read More...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php// base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg">
                        </div>
                     </div>
                  </div>
                  <div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <a href="">Womens rights</a>
                        <span class="float-right"><a href="">View all</a></span>
                        </small>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <small>Petition to President of India, Narendra Modi</small>
                           <h5 class="media-heading pt-1 font-weight-bold">#SaveRTI</h5>
                           <p>There is a move to weaken OUR fundamental Right to Information. This will stop us from exposing corruption and getting accountability. <small><a href="" class="text-danger font-italic">Read More...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php// base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg">
                        </div>
                     </div>
                  </div>
                  <div class="grey-border load-content p-3 mb-3 white">
                     <div class="alert alert-grey" role="alert">
                        <small>
                        <i class="fa fa-tags" aria-hidden="true"></i> Trending in <a href="">Womens rights</a>
                        <span class="float-right"><a href="">View all</a></span>
                        </small>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <small>Petition to President of India, Narendra Modi</small>
                           <h5 class="media-heading pt-1 font-weight-bold">#SaveRTI</h5>
                           <p>There is a move to weaken OUR fundamental Right to Information. This will stop us from exposing corruption and getting accountability. <small><a href="" class="text-danger font-italic">Read More...</a></small></p>
                           <span class="mr-5 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">Mahika Banerji</small></span>
                           <span class="mr-5 pt-3 text-danger"><i class="fa fa-users" aria-hidden="true"></i> <small class="text-dark">29,047 supporters</small></span>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php// base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg">
                        </div>
                     </div>
                  </div>-->
                  <div class="" role="alert">
                     <span><small><a href="" class="alert alert-secondary text-center media-object loadMore" style="display:block;"><i class="fa fa-suitcase" aria-hidden="true"></i>  Load more</a></small></span>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="alert alert-secondary m-2" role="alert">
                     <i class="fa fa-tags" aria-hidden="true"></i> Topics</span>
                  </div>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Women's rights</a></span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Education</a></span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Environment</a></span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Health</a></span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Child rights</a></span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Human rights</a></span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Civic</a></span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Animals</a></span>
                  <span class="badge badge-pill badge-light grey-border p-2 m-1"><a href="">Lgbt rights</a></span>
               </div>
            </div>
         </div>
      </section>
   </main>
 <script>
         $(document).ready(function() {
             $(".load-content").slice(0, 1).show();
             $(".loadMore").on("click", function(e) {
                 e.preventDefault();
                 $(".load-content:hidden").slice(0, 1).slideDown();
                 if ($(".load-content:hidden").length == 0) {
                     $(".loadMore").text("No more petition").addClass("no-more-petition");
                 }
             });
         })
      </script>
