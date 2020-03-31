<main id="main">
   <section>
      <br><br>
    <div class="container">
      <div class="row">
		<div class="col-md-8">
    <h4 class="font-weight-bold pb-3"><?php echo $petition['petition_title'];?></h4>
          <img src="/assets/petition_images/<?php echo $petition['petition_image']; ?>" alt="" class="img-fluid img-responsive">
        </div>
        <div class="col-md-4">
          <!--<input type="button" value="Edit" class="btn btn-info">-->
		  <?php if(isset($petition['petition_status']) && $petition['petition_status']=='1') { ?>
         <span name="publish-petition-btn" class="btn btn-approve btn-primary"><i class="fa fa-spinner fa-spin"></i> Awaiting For Approval</span>
		  <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <section>
    <br><br>
    <div class="container">
			<?php echo $petition['petition_description'];?>
    </div>
  </section> 
  </main>
