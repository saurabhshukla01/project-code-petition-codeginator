<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model("Petition_model");
		$this->load->helper('utils_helper');
		$this->load->library('Bijective');
	}

	public function index() {

		echo "<pre>"; print_r($_SESSION);die();	
		$this->config->load('custom_config');
		$TWITTER_CONFIG = $this->config->item('TWITTER_CONFIG');
		require $TWITTER_CONFIG['vendor'];

        $twitteroauth = new Abraham\TwitterOAuth\TwitterOAuth($TWITTER_CONFIG['consumer_key'], $TWITTER_CONFIG['consumer_secret']);

        $request_token = $twitteroauth->oauth(
                'oauth/request_token', [
                'oauth_callback' => $TWITTER_CONFIG['url_callback']
                ]
                );
        if($twitteroauth->getLastHttpCode() != 200) {
            throw new \Exception('There was a problem performing this request');
        }
        $_SESSION['twitter_oauth_token'] = $request_token['oauth_token'];
        $_SESSION['twitter_oauth_token_secret'] = $request_token['oauth_token_secret'];

        $twitter_url = $twitteroauth->url(
                'oauth/authorize', [
                'oauth_token' => $request_token['oauth_token']
                ]
                );
		$data['twitter_url']    = $twitter_url;
		
		$data['TWITTER_DATA'] = $_SESSION['TWITTER_DATA'];

		$this->load->template('twitter.php', $data);
	}


	public function index_twitter()
	{
		$this->config->load('custom_config');
		$TWITTER_CONFIG = $this->config->item('TWITTER_CONFIG');

		require $TWITTER_CONFIG['vendor'];

		$oauth_verifier = filter_input(INPUT_GET, 'oauth_verifier');
		$connection = new Abraham\TwitterOAuth\TwitterOAuth(
				$TWITTER_CONFIG['consumer_key'],
				$TWITTER_CONFIG['consumer_secret'],
				$_SESSION['twitter_oauth_token'],
				$_SESSION['twitter_oauth_token_secret']
				);
		$token = $connection->oauth(
				'oauth/access_token', [
				'oauth_verifier' => $oauth_verifier
				]
				);

		$details = array(
				'twitter_consumer_key' => $TWITTER_CONFIG['consumer_key'],
				'twitter_consumer_secret' => $TWITTER_CONFIG['consumer_secret'],
				'twitter_access_token' => $token['oauth_token'],
				'twitter_access_token_secret' => $token['oauth_token_secret'],
				);
             $this->session->set_userdata('petition', $details);

		redirect("/twitter/index", $details);
	}



}

?>
