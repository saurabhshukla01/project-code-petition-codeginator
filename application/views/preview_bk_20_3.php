<style>
  .home-banner {display: none;}
  header:nth-of-type(1){
    display:none;
  }
  footer:nth-of-type(1) {
  display:none;}
}

</style>
<main id="main" class="mt-5 pt-5">
   <section id="about" class="border-top">
      <div class="container pl-0 pr-0">
        <div class="row">   
          <!--preview pop up-->
          <!-- button -->
                  <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#previewpopup">Open Preview Popup</button>-->

                  <!-- Modal -->
                  <div id="previewpopup" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content p-2">
                        <button type="button" class="close text-right" onclick="window.location.href = '<?php base_url();?>/petition/start-petition';" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                          <div class="row">
                           <h4 class="w-100 text-center ml-3 mr-3 mb-0"><?php echo $petition['petition_title'] ?></h4>
                              <div class="">
                                 <div class="card">

                                    <div class="card-img text-center"><img src="/assets/petition_images/<?php echo $petition['petition_image']; ?>" alt="" class="img-fluid img-responsive mb-2"></div> 
                                    <!--<div class="col-md-4">-->
                                    <!--<input type="button" value="Edit" class="btn btn-info">-->
                                    <!--<?/*php if(isset($petition['petition_status']) && $petition['petition_status']=='1') { ?>
                                       <span name="publish-petition-btn" class="btn btn-approve btn-primary"><i class="fa fa-spinner fa-spin"></i> Awaiting For Approval</span>
                                    <?php } */?>-->
                                      <!--</div>-->

                                    <p><?php echo $petition['petition_description'] ?></p>

                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer m-auto text-center border-0">
                          <a href="http://petition.sheenz.in/petition/my_petition_list"><input type="submit" class="btn btn-primary" value="Submit"></a>
                        </div>
                    </div>

                </div>
            </div>
        <!-- preview pop up-->
      </div>
      </div>
   </section>
</main>

<script>
  $(document).ready(function(){
    $("#previewpopup").modal('show');
  });
</script>
</head>





