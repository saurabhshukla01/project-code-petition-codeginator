<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$config['PETITION_IMAGES_UPLOAD_PATH'] = '/home/petition/public_html/assets/petition_images/';
	$config['short_base_url']             = 'http://petition.sheenz.in/';


	$config['TWITTER_CONFIG'] = array(
            'vendor'            => '/home/petition/public_html/vendor/autoload.php',
            'consumer_key'      => 'P4veknQvUNLMD9oitQijtpqcQ',
            'consumer_secret'   => 'l2SuHw9GwgWoM3NTFzC0uHO2SLguNnt8ZwHN0IkpgDfYPvaRha',
            'url_login'         => 'http://petition.sheenz.in/',
            'url_callback'      => 'http://petition.sheenz.in/social/index-twitter',
        );

?>
