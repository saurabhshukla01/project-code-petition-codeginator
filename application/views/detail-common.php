<section class="trending-petitions">
         <div class="container pl-0 pr-0">
            <div class="row">
               <h4 class="col-md-12 text-left mt-4 mb-0">Trending petitions</h4>
               <?php 
                  if(count($petitions) > 0 ) { 
                     $i = 1;
                     foreach ($petitions as $petition) { 
                  
                      $petition_title = $petition['petition_title'];
                      $petition_image = $petition['petition_image'];
                      $petition_uid = $petition['petition_uid'];
                      $description = $petition['description'];
                      $user_name = $petition['user_name'];
                  ?>
               <div class="col-md-4 mb-2">
                  <div class="card p-2">
                     <small class="mb-2"><b>Trending on Callupon.org</b></small>
                     <img class="card-img-top border same-height" src="/assets/petition_images/<?php echo $petition_image ?>" alt="Petition image" style="width:100%">
                     <div class="card-body">
                        <h5 class="card-title trending-title"><a href="/petition/petition-details/<?php echo $petition_uid ?>" title="" class=""><?php echo $petition_title ?></a></h5>
                        <!--<p class="card-text"><a href="" class="font-weight-normal text-secondary">Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets <small class="text-danger font-italic font-weight-bold">Read More...</small></a></p>-->
                        <!--<a href="#" class="btn btn-primary">Sign the petition</a>-->
                        <span><button type="button" class="btn btn-danger submit-signed-petition" data-petition-id="<?php echo $petition['petition_id'] ?>" data-petition-uid="<?php echo $petition['petition_uid']; ?>">Sign this Petition</button>
                        </span> 
                     </div>
                  </div>
               </div>
               <?php  
                        $i++;
                        if($i>=10) {
                          break;
                         }
                        }
                     }
                  ?>
            </div>
         </div>
         </div>
      </section>-->