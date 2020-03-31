<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1332140303177404"
     data-ad-slot="2884845149"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>-->
<!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-12 p-0">

            <div class="row">

                <div class="col-sm-6">

                  <div class="footer-info">
                    <h3>Petition</h3>
                    <p>
                      Callupon.org is the fastest growing social change platform in <br>
                      the world, empowering more than 200 million people to bring <br>
                      change in their communities.
                    </p>
                  </div>

                  <div class="footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>To subscribe our newsletter, Enter your E-mail id.</p>
					           <form action="" method="POST">
                        <div class="form-group" id="signform">
                            <input class="form-control" name="signemail" id="signemail"  type="email" placeholder="Email Address">
                            <label class="error" for="name" id="signemail_error" style="display: none;">This field is required.</label>
                            <button class="subscribe btn btn-primary">Subscribe</button>
                        </div>
                        <div class="form-group" id="sign_form"></div>
                    </form>
                  </div>

                </div>

                <div class="col-sm-3">
                  <div class="footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                      <li><a href="<?php echo base_url();?>information/index">Home</a></li>
                      <li><a href="<?php echo base_url();?>information/about-us">About us</a></li>
                      <!--<li><a href="#">Services</a></li>-->
                      <li><a href="<?php echo base_url();?>information/term-and-condition">Terms of service</a></li>
                      <li><a href="<?php echo base_url();?>information/privacy-policy">Privacy policy</a></li>
                    </ul>
                  </div>
                </div>
                  <div class="col-sm-3">
                  <div class="footer-links">
                    <h4>Contact Us</h4>
                    <p>
					 <!-- Pru Digital Media<br>
					  Noida One, Sector 62, Noida<br>
                      <strong>Phone:</strong> +1 5589 55488 55<br>-->
                      <strong>Email:</strong> info@callupon.org<br>
                    </p>
                  </div>

                  <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                  </div>

                </div>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright  <strong>Callupon.org</strong>  All Rights Reserved
      </div>
      <!--
      <div class="credits">
        
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
    
          Designed by <a href="">Prudigital Media Pvt Ltd</a>

      </div>
      -->
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- <div id="preloader"></div> -->
<script>
  $(function () {
  $(document).scroll(function () {
	  var $nav = $("#header");
	  $nav.toggleClass('header-scrolled', $(this).scrollTop() > $nav.height());
	});
});
  </script>
  <!-- JavaScript Libraries -->
  <script src="<?php base_url();?>/assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php base_url();?>/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php base_url();?>/assets/lib/easing/easing.min.js"></script>
  <script src="<?php base_url();?>/assets/lib/mobile-nav/mobile-nav.js"></script>
  <script src="<?php base_url();?>/assets/lib/wow/wow.min.js"></script>
  <script src="<?php base_url();?>/assets/lib/waypoints/waypoints.min.js"></script>
  <script src="<?php base_url();?>/assets/lib/counterup/counterup.min.js"></script>
  <script src="<?php base_url();?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php base_url();?>/assets/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php base_url();?>/assets/lib/lightbox/js/lightbox.min.js"></script>
<script>
$(function() {
    $('.error').hide();
    $(".subscribe").click(function() {
      $('.error').hide();
        var signemail = $("input#signemail").val();
        if (signemail == "") {
        $("label#signemail_error").show();
        $("input#signemail").focus();
        return false;
      }
      if(IsEmail(signemail)==false){
        $('label#signemail_check_error').show();
        return false;
        }
      var dataString = 'signemail=' + signemail;
      $.ajax({
        type: "POST",
        url: "/petition/subscribe",
        data: dataString,
        success: function() {
          $('#signform').hide();
          $('#sign_form').html("<div id='message_sign'></div>");
          $('#message_sign').html("<p><i class='fa fa-check' aria-hidden='true'></i> Thank you for Subscribing !!</p>")
          .append("")
          .hide()
          .fadeIn(1500, function() {
            $('#message_sign').append("");
          });
        }
      });
      return false;
    });
  });  


function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
       return false;
    }else{
       return true;
    }
  }
</script>
</body>
</html>
