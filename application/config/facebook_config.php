<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	//$config['facebook_app_id']                = '973203469700486';
	//$config['facebook_app_secret']            = '163e9407e94d19b48df401b7cda968c3';

	//$config['facebook_app_id']                = '2366110146984328';
	//$config['facebook_app_secret']            = '5fc9d7221daaf5fc014fdbcc52bb43f3';

	$config['facebook_app_id']                = '972972893095129';

	$config['facebook_app_secret']            = 'e481cccc437a9bbdc0df9f861711fc94';

	//$config['facebook_app_id']                = '1906643462919227';
	//$config['facebook_app_secret']            = 'dcf7ed73b718e85d418cb3874c71df7e';

	$config['facebook_login_redirect_url']    = 'https://callupon.org/user-registration/user-facebook-login';
	//$config['facebook_login_redirect_url']    = 'https://callupon.org';

	$config['facebook_logout_redirect_url']   = 'https://callupon.org/logout';
	$config['facebook_login_type']            = 'web';
	//$config['facebook_permissions']           = array('email','publish_actions');
	$config['facebook_permissions']           = array('email','publish_actions');
	$config['facebook_graph_version']         = 'v3.2';
	$config['facebook_auth_on_load']          = TRUE;
?>
