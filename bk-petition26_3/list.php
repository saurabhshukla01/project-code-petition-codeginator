<style>
  .home-banner {display: none;}
  #carousel-two .carousel-control-next, #carousel-two .carousel-control-prev {display:none !important}
</style>
<main id="main" class="bg-light">
	<!--<main id="main" class="pt-5" style="background-color: #F5F5F5;">-->
	<section style="background-image: url('<?php echo base_url();?>/assets/img/waves.jpg'); background-size: cover; background-repeat: no-repeat; margin-top:80px;">
		<div class="container">
		    <div class="row">
				<div id="carousel-two" class="carousel slide grey-border pointer-event" data-ride="carousel" style="width:100%; min-height:400px;">
				    <div class="carousel-inner">
				        
				       <div class="carousel-item active text-center text-white pt-5 pb-5">
				         <h2>Callupon.org, people connect to the geographical</h2>
				         <h3>and cultural boundaries they care about</h3>
				       </div>

				       <div class="carousel-item text-center text-white pt-5 pb-5">
				          <h2>Callupon.org is the fastest growing social change platform in the world</h2>
				           <h3>empowering more than 200 million people to bring change in their communities</h3>
				        </div>
				        
				       <div class="carousel-item text-center text-white pt-5 pb-5">
				          <h2>We are building any company that a company has not built before </h2>
				          <h3>the most accomplished team of social change agents in the world as well</h3> 
				          <h5>as a world-class team of technologists and creators</h5> 
				        </div>
					</div>
					    <a class="carousel-control-prev" href="#carousel-two" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
					    <span class="sr-only">Previous</span>
					    </a>
					    <a class="carousel-control-next" href="#carousel-two" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
					    <span class="sr-only">Next</span>
					    </a>
					</div>
				</div>
			</div>
	</section>

   	<section id="about">
       <div class="container">
			<div class="row pt-5">
			<h4 class="w-100 p-3 text-center bg-light border font-weight-bold" style="color: #097298;">PETITION LIST</h4>
			<div class="col-md-12">
				<div class="blog-list clearfix">
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
	                    //echo "Start ( ".$petition_description ." ) END <br />";
	                ?>
					<!--<hr class="invis">-->
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
								<a href="/petition/petition-details/<?php echo $petition_uid ?>" title="" style="color: #097298;"><?php echo $petition_title ?></a>
							</h5>				
							<div class="large-font"><?php echo substr($petition_description, 0,300)?>&nbsp;<span class="link type-weak d-block mt-2"><a href="/petition/petition-details/<?php echo $petition_uid ?>" class="btn btn-rounded bg-info mt-2 text-white p-0 pl-2 pr-2"><small>Read more</small></a></span></div>
							<div class="progress mt-3">
								<!--<div class="progress-bar bg-danger" role="progressbar">-->
								<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $percentage_petition?>%" aria-valuenow="<?php echo $percentage_petition?>" aria-valuemin="0" aria-valuemax="100">
								</div>
							</div>
							<div class="pb-3 pt-2">
		                        <span class="mr-5 text-danger"><i class="fa fa-user-plus" aria-hidden="true"></i><small class="text-dark"><strong>&nbsp;<?php echo $petition_signed_count?>&nbsp;Signed</strong></small></span>
		                        <span class="mr-5 pt-3 text-danger"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <small class="text-dark"><strong>&nbsp;<?php echo $petition_goal ?>&nbsp;Goal</strong></small></span>
		                    </div>

						</div>
					</div>
					<!--</div>--> 
						 <?php   
								}
						  ?>
						 
							
      					<p align="right"><?php echo $links; ?></p>
					  
					<?php } else {?>
				<div class="blog-box row">
				   <div class="col-md-4">
					  <div class="post-media">
						 No Record Found
					  </div>
					  <!-- end media -->
				   </div>
			   </div>
				   <?php } 
				   ?>
				<!-- end blog-box -->
				</div>
            <!-- end blog-list -->
			</div>
         <!-- end col -->
		</div>
	  </div>
   </section>
</main>


<script type="text/javascript">
    $('#carousel-two').carousel({
  	interval: 1000
	});
</script>