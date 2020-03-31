<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	//$config['google_client_id']        = '199677817559-5ub7a4ae67h4v75m6a8bfep15mkhnplm.apps.googleusercontent.com';
	//$config['google_client_secret']    = 'JtHa4Q3IM_OmsgzEBGWnhz_L';
	$config['google_client_id']        = '1072222909446-fpp2hps1uecc8b7bbmv42bp7hnsmfq6t.apps.googleusercontent.com';
	$config['google_client_secret']    = 'aUNoNlsFnyzc2yHcp7Bz_xUr';
	$config['google_redirect_uri']     = 'https://callupon.org/user-registration/user-google-login';
	$config['google_application_name'] = 'Petition';
	$config['google_api_key']          = '';
	$config['google_scopes']           =  array(
												'https://www.googleapis.com/auth/userinfo.profile',
												'https://www.googleapis.com/auth/userinfo.email',
												//'https://mail.google.com/'
          									  );
?>
