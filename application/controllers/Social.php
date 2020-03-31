<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends MY_Controller {

	function __construct() {

		parent::__construct();
        $this->load->model("User_model");
	}

	public function index() {
	
    
    }

    public function index_twitter()
    {
        $this->config->load('custom_config');
        $this->load->model("Petition_model");
        $this->load->model("Petition_share_model");
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

		$twitter_data = array(
                				'twitter_consumer_key' => $TWITTER_CONFIG['consumer_key'],
                				'twitter_consumer_secret' => $TWITTER_CONFIG['consumer_secret'],
                				'twitter_access_token' => $token['oauth_token'],
                				'twitter_access_token_secret' => $token['oauth_token_secret'],
		                    );

        //print_r($twitter_data);

        $update = $this->User_model->update_user_by_id($_SESSION['petition']['user_id'], $twitter_data);
        $petition_url = $this->session->tempdata('post_twitter_short_url');
        $petition_uid = $this->session->tempdata('petition_uid');
        $petition_title = $this->session->tempdata('petition_title');
        $petition_image = $this->session->tempdata('petition_image');
        $petition_id = $this->session->tempdata('petition_id');
        $user_data = $this->Petition_model->get_user_by_id($_SESSION['petition']['user_id']);

        if(isset($user_data) && $user_data !='') {

                $connection = new Abraham\TwitterOAuth\TwitterOAuth($user_data->twitter_consumer_key, $user_data->twitter_consumer_secret, $user_data->twitter_access_token, $user_data->twitter_access_token_secret);
                $tweet = $petition_title;
                $imageMedia = $connection->upload('media/upload', array('media' => "/home/callupon/public_html/assets/petition_images/".$petition_image));
                $parameters = array(
                                    "status" => $tweet,
                                    "media_ids" => $imageMedia->media_id_string
                                );
                $post_tweets = $connection->post("statuses/update", $parameters);
                if(isset($post_tweets->id) && $post_tweets->id !='' && $post_tweets->text!='') {
                     

                        $this->Petition_model->update_petition_share_count($petition_uid);
                        $petition_share_data = array(
                                                       'petition_id' => $petition_id,
                                                       'user_id' => $_SESSION['petition']['user_id'],
                                                       'share_type' => 3
                                                    );

                        $this->Petition_share_model->insert_petition_share($petition_share_data);
                }
        }

        //echo "<script>window.close();</script>";
        redirect("/petition/petition-details/$petition_uid");
    }

    public function post_twitter() {

        $twitter_url = $this->input->post('twitter_url');
        $short_url = $this->input->post('short_url');
        $petition_uid = $this->input->post('petition_uid');
        $petition_title = $this->input->post('petition_title');
        $petition_image = $this->input->post('petition_image');
        $petition_id = $this->input->post('petition_id');
        $this->session->set_tempdata('post_twitter_short_url', $short_url, 600);
        $this->session->set_tempdata('petition_uid', $petition_uid, 600);
        $this->session->set_tempdata('petition_image', $petition_image, 600);
        $this->session->set_tempdata('petition_title', $petition_title, 600);
        $this->session->set_tempdata('petition_id', $petition_id, 600);
        $response = array("status" => 1, "message"=> "success", "twitter_url"=>$twitter_url);
        echo json_encode($response);
        die();
    }
	
	public function post_facebook() {

	   $this->load->library('Facebook');
       if($this->input->method() === 'post') {

            $petition_url = $this->input->post('petition_url');
            $petition_uid = $this->input->post('petition_uid');
            $petition_title = $this->input->post('petition_title');
            $petition_image = $this->input->post('petition_image');
            $petition_id = $this->input->post('petition_id');
            $petition_description = $this->input->post('petition_description');
            $this->session->set_tempdata('petition_id', $petition_id, 1200);
            $this->session->set_tempdata('petition_uid', $petition_uid, 1200);

        }
       else {

            $this->load->model('Petition_model');
            $petition_id = $this->session->tempdata('petition_id');
            $petition_data = $this->Petition_model->get_petition_by_id($petition_id);
            $petition_url = $petition_data['petition_url'];
            $petition_uid = $petition_data['petition_uid'];
            $petition_title = $petition_data['petition_title'];
            $petition_description = $petition_data['petition_description'];
        }

        if(!$this->facebook->is_authenticated()) {

            $fb_login_url = $this->facebook->login_url();

            $response = array("status" => 2, "message"=> 'Token missing', 'fb_login_url' => $fb_login_url);
            echo json_encode($response);
            die();
        }
                
        $response = array("status" => 1, "message"=> "success");
       
		$wall_post = array(
                            'message' => 'callupon.org',
                            'name' => $petition_title,
                            'link' => $petition_url,
                            'description' => $petition_description,
                            'picture' =>  base_url().'assets/petition_images/'.$petition_image
                          );  

		try {

			$result = $this->facebook->post($wall_post);
	    }
		catch(FacebookResponseException $e) {

            $response = array("status" => 0, "message"=> 'Facebook SDK returned an error :'. $e->getMessage());
		}
		catch(FacebookSDKExection $e) {

            $response = array("status" => 0, "message"=> 'Facebook SDK returned an error :'. $e->getMessage());

		}
        echo json_encode($response);
        die();
	}

	public function test() {

		$this->load->template('fb');
	}

}

?>
