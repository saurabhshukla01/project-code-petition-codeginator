<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>callupon.org</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <!-- Favicons -->
      <link href="<?php echo base_url();?>/assets/img/callupon_icon.png" rel="icon">
      <link href="<?php echo base_url();?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i" rel="stylesheet">
      <!-- Bootstrap CSS File -->
      <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Libraries CSS Files -->
      <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/animate/animate.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
      <!-- Main Stylesheet File -->
      <link href="<?php echo base_url();?>assets/css/style.css?.rnd=564" rel="stylesheet">
      <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/model.js?.rnd=3444" type="text/javascript"></script>
       <script src="<?php echo base_url();?>assets/js/common.js?.rnd=3234" type="text/javascript"></script>
       
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.custom.28468.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 50,
               interval	: 6000
				});
			
			});
		</script>	
      <!-- =======================================================
         Theme Name: Rapid
         Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
         Author: BootstrapMade.com
         License: https://bootstrapmade.com/license/
         ======================================================= -->
   </head>
   <body>
      <!--==========================
         Header
         ============================-->
      <header id="header">
         <!--<div id="topbar">
            <div class="container">
               <div class="social-links">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
               </div>
            </div>
         </div>-->
         <div class="container">
            <div class="logo float-left">
               <!-- Uncomment below if you prefer to use an image logo -->
               
             <a href="/" class="scrollto"><img src="<?php base_url();?>/assets/img/callupon_logo.png" alt="" class="img-fluid"></a>
            </div>
            <nav class="main-nav float-right d-none d-lg-block">
               <ul>
                  <li class="active"><a href="/">Home</a></li>
                  <li><a href="javascript:void(0);" onclick="javascript:start_petition();">Start Petition</a></li>
                  <li><a href="javascript:void(0);" onclick="javascript:my_petition();">My Petition</a></li>
                  <li><a href="<?php echo base_url();?>/petition/petition-list">Browse</a></li>
                  <?php 
                   if(empty($this->session->userdata('petition')) && $this->session->userdata('petition')['user_session_id']=='') { ?>
                  		<li><a class="btn big-login ml-4 login-pop" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();"><i class="fa fa-sign-in mr-2" aria-hidden="true"></i> Login</a></li>
                 <?php } else {?>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle p-1" role="button" data-toggle="dropdown">
                        <img class="pic img-rounded img-circle" src="<?php base_url();?>/assets/img/profile-icon.png" alt="...">
                        <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                       <!-- <li>
                           <a href="#" class="text-lowercase font-weight-normal">
                           <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i> My Petitions
                           </a>
                        </li>
                        <li>
                           <a href="#" class="text-lowercase font-weight-normal">
                              <i class="fa fa-cogs mr-2" aria-hidden="true"></i> Settings
                           </a>
                        </li>
                        <li>
                           <a href="#" class="text-lowercase font-weight-normal">
                              <i class="fa fa-user-circle-o mr-2" aria-hidden="true"></i> Username
                           </a>
                        </li>-->
                        <li>
                           <a href="<?php echo base_url();?>/user-registration/logout" class="text-lowercase font-weight-normal">
                              <i class="fa fa-sign-out mr-2" aria-hidden="true"></i> Logout
                           </a>
                        </li>
                     </ul>
                  </li>
                 <?php } ?>

               </ul>
            </nav>
            <!-- .main-nav -->
         </div>
      </header>
      <!-- #header -->
      <!--==========================
         Intro Section
         ============================-->
      <section id="intro" class="clearfix" style="height:auto;">
        
			<div id="da-slider" class="da-slider">
				<div class="da-slide">
					<h2>Stop Renting Forts in Maharashtra</h2>
					<p>The Forts in Maharashtra depict the valour of great leaders like Chhatrapati Shivaji Maharaj and our glorious history. However the Government of Maharashtra has decided to convert these forts Heritage Hotels and Wedding Venue.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?php base_url();?>/assets/petition_images/pad5.jpg" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Delhi Pollution</h2>
					<p>Delhi has been suffering from a severe air pollution issue from last few years now and air quality is degrading ever then. The capital of India is known as the top most polluted cities in the world. Despite this fact, in one of the main festivals of India, Diwali, crackers add more to this pro </p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?php base_url();?>/assets/petition_images/images.jpg" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>A Doctor who Saves Others Life was <br /> Herself Helpless</h2>
					<p>A Doctor who Saves Others Life was Herself Helpless. Priyanka Reddy, a Veterinary Doctor faced a brutal sexual assault, murdered and burnt alive. Today the entire social media is asking for her justice: Justice required for Priyanka Reddy.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?php base_url();?>/assets/petition_images/nirbhaya-rape-case_1531152272.jpg" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Onion Rates Spike</h2>
					<p>Onion’s Chopping Makes Eye Teary but Rising Rates of Onion have Seriously Made Citizens Cry. Indian people are left with the teary eyes because of the rising prices of the onion wherein, the prices have touched ?120-150 per kilo. Moreover, the prices are expected to </p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?php base_url();?>/assets/petition_images/1235662_Wallpaper2.jpg" alt="image01" /></div>
				</div>
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
      </section>
      <!-- #intro -->
      <!-- Model -->
      <div class="modal fade login" id="loginModal">
         <div class="modal-dialog login animated">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Login From</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="forgot login-footer">
                     <span>Don't have an account <a href="javascript:showRegisterForm();">Sign up</a>
                     ?</span>
                  </div>
                  <div class="forgot register-footer" style="display:none">
                     <span>Already have an account?</span>
                     <a href="javascript: showLoginForm();">Login</a>
               </div>
               <div class="modal-body">
                  <div class="box">
                     <div class="content">
                        <div class="alert alert-danger" style="display:none" id="user-login-message"></div>
                        <div class="social">
                           <a id="google_login" class="circle google" href="<?php echo base_url();?>/user-registration/user-google-login">
                           <i class="fa fa-google-plus fa-fw text-white"></i>
                           </a>
                           <a id="facebook_login" class="circle facebook" href="<?php echo base_url();?>/user-registration/user-facebook-login">
                           <i class="fa fa-facebook fa-fw text-white"></i>
                           </a>
                        </div>
                        <div class="division">
                           <div class="line l"></div>
                           <span>or</span>
                           <div class="line r"></div>
                        </div>
                        <div class="error"></div>
                        <div class="form loginBox">
                           <form method="" action="" accept-charset="UTF-8">
                              <input id="user_login_email_param" class="form-control" type="text" placeholder="Email" name="user_login_email_param" required>
                              <input id="user_login_password_param" class="form-control" type="password" placeholder="Password" name="user_login_password_param" required>
                              <span class="w-100 d-block p-2 text-right"><small><a href="<?php echo base_url();?>/user-registration/forgot-password" >Forgot Password?</a></small></span>

                             <!-- <span class="w-100 d-block p-2 text-right"><small><a href="#" data-toggle="modal" data-target="#forgotpassword" class="forgot-password-pop-up" >Forgot Password?</a></small></span>-->
                                    <input class="btn btn-default btn-login" type="button" value="Login" onclick="login()">
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="box">
                     <div class="content registerBox" style="display:none;">
                        <div class="alert alert-danger" style="display:none" id="user-param-message"></div>
                        <div class="form">
                           <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                              <input id="user_name_param" class="form-control" type="text" placeholder="Name" name="user_name_param" required>
                              <input id="user_email_param" class="form-control" type="text" placeholder="Email" name="user_email_param" required>
                              <input id="user_mobile_param" class="form-control" type="text" placeholder="Mobile" name="user_mobile_param" required>
                              <input id="user_password_param" class="form-control" type="password" placeholder="Password" name="user_password_param" required>
                              <input id="user_confirm_password_param" class="form-control" type="password" placeholder="Confirm Password" name="user_confirm_password_param" required>
                              <input class="btn btn-default btn-register" type="button" value="Create account" name="commit" onclick="user_registration();">
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <div class="forgot login-footer">
                     <span>By joining, or logging in via Facebook, you accept callupon.org <a href="<?php echo base_url();?>information/term-and-condition">Terms of Service </a> and <a href="<?php echo base_url();?>information/privacy-policy"> Privacy Policy.</a>
                    </span>
                  </div>
               </div>
            </div>
         </div>
      </div>

         <div class="collapse navbar-collapse" id="navbarCollapse">
                  <div class="navbar-nav ml-auto">
                     <a href="" class="nav-item nav-link p-3 active">Home</a>
                     <a href="" class="nav-item nav-link p-3">About Us</a>
                     <a href="" class="nav-item nav-link p-3">Services</a>
                     <a href="" class="nav-item nav-link p-3">Contact Us</a>
                  </div>
         </div>
      <?php if($this->session->userdata('user') && isset($this->session->userdata('user')['user_session_id'])) {?>
         <li class="nav-item dropdown mr-3">
            <a class="nav-link dropdown-toggle profile-tab" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="#"><?php echo $this->session->userdata('user')['full_name'] ?> </a>
               <?php if($this->session->userdata('user') && isset($this->session->userdata('user')['user_session_id'])) {?>
               <a class="dropdown-item" href="<?php echo base_url()?>/user_registration/logout">Logout</a>
         <?php } ?>
            </div>
         </li>


      <?php } //else { ?>

     	<!--<li class="nav-item">
   		<div class="nav-login btn" onclick="javascript:user_login();" data-toggle="modal" data-target="#modalLoginForm">
   			Login
   		</div>
   	</li>-->
   	<?php //} ?>
<script type="text/javascript">

   function login() {

      var user_email = $("#user_login_email_param").val();
      var user_password = $("#user_login_password_param").val();
      $.ajax({
               url:"/user_registration/user_login",
               type:'post',
               dataType:"json",
               data:{"user_email":user_email,"user_password":user_password},

               success:function(response) {

                  if(response.status == '1') {

                      window.location.href = '/petition/my_petition_list'
                  }
                  else {
                     
                     $("#user-login-message").html(response.message);
                     $("#user-login-message").show();
                  }
               },
               error: function() {

                  $("#user-login-message").html("Server side error try again");
                  $("#user-login-message").show();
                  
               }
       });
   }

   function user_registration() {

      var user_name = $("#user_name_param").val();
      var user_email = $("#user_email_param").val();
      var user_mobile = $("#user_mobile_param").val();
      var user_password = $("#user_password_param").val();
      var user_confirm_password = $("#user_confirm_password_param").val();
       
      $.ajax({
               url:"/user-registration/user-signup",
               type:'post',
               dataType:"json",
               data:{"user_name":user_name,"user_email":user_email,"user_mobile":user_mobile,"user_password":user_password,"user_confirm_password":user_confirm_password},
                  success:function(response) {

                  if(response.status == "1") {

                      window.location.href = '/petition/start-petition';
                  }
                  else {
                     $("#user-param-message").html(response.message);
                     $("#user-param-message").show();
                  }
               },
              
               error: function() {

                 $("#user-param-message").html(response.message);
                 $("#user-param-message").show();

               }
             });
      }

   function start_petition() {

      $.ajax({
         url:"/user_registration/get_session",
         type:'post',
         dataType:"json",
         success:function(response) {

            if(response.status == '0') {
                openLoginModal();
            }
            else {
               window.location.href = '/petition/start_petition'
            }
         },
         error: function() {
            
         }
       });
   }

   function my_petition() {

      $.ajax({
         url:"/user_registration/get_session",
         type:'post',
         dataType:"json",
         success:function(response) {

            if(response.status == '0') {
                openLoginModal();
            }
            else {
               window.location.href = '/petition/my_petition_list'
            }
         },
         error: function() {
            
         }
       });
   }
</script>

<script>



   </script>

<!-- forgot passaword pop up -->
<div id="forgotpassword" class="modal fade sec-popup"  role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

            <form>
               <div class="row">
               <div class="col-lg-12">
      <h4 class="text-center pt-4">Forgot Password</h4>
      <p class="mb-3">Enter your email address here, then check your inbox for a link to reset your password.</p>
      <div class="row p-3 mb-3 white text-dark">
      <div class="col-md-12">
      <div class="alert alert-danger" role="alert">
                        <small>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error Box
                        </small>
                     </div>
      </div>
               <div class="col-md-12">
                  <form action="#">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group form-group-sm">
                              <label for="firstname" class="control-label">Enter your Email</label>
                              <input type="text" class="form-control" id="" placeholder="Enter you E-mail">
                           </div>
                        </div>
</div>
                     <div class="row">
                        <div class="col-xs-12 mt-2 pl-3">
                           <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
   </div>
                  </div>
               </form>
          </div>
        </div>
      </div>
    </div>

    
