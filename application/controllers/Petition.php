<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petition extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model("Petition_model");
		$this->load->helper('utils_helper');
		$this->load->library('Bijective');
	}

	public function index() {

		$this->load->template('index.php');

	}

	/*public function preview($petition_uid) { 

		$petition_data = $this->Petition_model->get_petition_by_uid($petition_uid);
		$data['petition'] = $petition_data;
        $this->load->template('preview', $data);

    }
*/

	public function start_petition() {

		$user_id = $this->get_user_session();

		if($user_id == 0) {

			redirect("/");
		}

		$this->load->helper('file');
		$this->config->load('custom_config');

		$config['upload_path']          = $this->config->item('PETITION_IMAGES_UPLOAD_PATH');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$short_base_url = $this->config->item('short_base_url');
		$this->load->library('upload', $config);

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('petition_title', 'Petition Title', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('petition_target', 'Petition Target', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('petition_description', 'Description', 'required');
		$this->form_validation->set_rules('petition_goal', 'Goal', 'required');
		$this->form_validation->set_rules('petition_image', 'Images', 'required');

		if(isset($_FILES['petition_image']['name']) && $_FILES['petition_image']['name'] != "") {

			$this->form_validation->set_rules('petition_image', 'Petition Images', 'callback_file_check');
		}

		$category = $this->Petition_model->get_category_list();
		$data['category'] = $category;

		if ($this->form_validation->run() == FALSE) {

			$data['category_id']   = $this->input->post('category_id');
			$data['petition_title']   = $this->input->post('petition_title');
			$data['petition_target']   = $this->input->post('petition_target');
			$data['petition_description']   = $this->input->post('petition_description');
			$data['petition_goal']   = $this->input->post('petition_goal');
			$this->load->template('start-petition', $data);
		}
		else {
			$uniqid =  $this->Petition_model->generate_uid();
			$data =  array(
					'petition_uid'   => $uniqid,
					'category_id'   => $this->input->post('category_id'),
					'user_id' => $_SESSION['petition']['user_id'],
					'petition_title'   => $this->input->post('petition_title'),
					'petition_target'   => $this->input->post('petition_target'),
					'petition_goal' => $this->input->post('petition_goal'),
					'petition_status' => '1',
					'petition_description'   => $this->input->post('petition_description')
					);


			if(isset($_FILES['petition_image']['name']) && $_FILES['petition_image']['name']!= "") {
				$name           = $_FILES['petition_image']['name'];
				$logo_path_info = pathinfo($_FILES["petition_image"]["name"]);
				$file_name      =  $name;
				$file_name      = trim($file_name);
				if($this->upload->do_upload('petition_image')) {

					$upload_data    = $this->upload->data();
					$uploaded_file = $upload_data['file_name'];
				}
				$data['petition_image'] = $file_name;
			}
			if($this->input->post('petition_url') !='') { 

				$data['petition_url'] = $this->input->post('petition_url');
			}

			$petition_id =  $this->Petition_model->insert_data('pt_petitions', $data);
			$short_url = $this->bijective->encode($petition_id);
			$short_url_details = $short_base_url.$short_url;

			$update_data = array(
									'petition_url' => $short_url_details
								);

			$this->Petition_model->update_petition_by_id($petition_id, $update_data);

			$this->session->set_flashdata('message', 'Petition Added Successfully.');
			$petition_data = $this->Petition_model->get_petition_by_uid($uniqid);
		    $data['petition'] = $petition_data;
		    //echo "<pre>";print_r($data);
		    //exit(0);
		    $category = $this->Petition_model->get_category_list();
			$data['category'] = $category;


			$this->load->template('preview', $data);
			//redirect('/petition/preview/'.$uniqid);
			
			/*
			$petition_data = $this->Petition_model->get_petition_by_uid($uniqid);
			$data['petition'] = $petition_data;
        	$this->load->template('start-petition', $data);
			*/
		}

	}	


	public function file_check() {

		$this->load->helper('file');
		$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png', 'image/jpg');
		if(isset($_FILES['petition_image']['name']) && $_FILES['petition_image']['name']!="") {
			$mime = get_mime_by_extension($_FILES['petition_image']['name']);
			if(in_array($mime, $allowed_mime_type_arr)){
				return true;
			}
			else{
				$this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
				return false;
			}
		}
	}

	


	public function update_petition($petition_uid){

		$this->load->model('Petition_signed_model');
		$petition_data = $this->Petition_model->get_petition_by_uid($petition_uid);
        $data['petition'] = $petition_data; 
        $category = $this->Petition_model->get_category_list();
		$data['category'] = $category;
		//echo "<pre>";print_r($data);
        //die();
		$this->load->template('update-petition', $data); 

	}

	public function update_petition_data($petition_uid){

		$user_id = $this->get_user_session();

		if($user_id == 0) {

			redirect("/");
		}

		$this->load->helper('file');
		$this->config->load('custom_config');

		$config['upload_path']          = $this->config->item('PETITION_IMAGES_UPLOAD_PATH');
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$short_base_url = $this->config->item('short_base_url');
		$this->load->library('upload', $config);

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('petition_title', 'Petition Title', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('petition_target', 'Petition Target', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('petition_description', 'Description', 'required');
		$this->form_validation->set_rules('petition_goal', 'Goal', 'required');
		$this->form_validation->set_rules('petition_image', 'Images', 'optional');

		if(isset($_FILES['petition_image']['name']) && $_FILES['petition_image']['name'] != "") {

			$this->form_validation->set_rules('petition_image', 'Petition Images', 'callback_file_check');
		}

		$category = $this->Petition_model->get_category_list();
		$data['category'] = $category;

		if ($this->form_validation->run() == FALSE) {

			$data['category_id']   = $this->input->post('category_id');
			$data['petition_title']   = $this->input->post('petition_title');
			$data['petition_target']   = $this->input->post('petition_target');
			$data['petition_description']   = $this->input->post('petition_description');
			$data['petition_goal']   = $this->input->post('petition_goal');
			//$this->load->template('start-petition', $data);
		}
		else {
			#$uniqid =  $this->Petition_model->generate_uid();
			$data =  array(
					'category_id'   => $this->input->post('category_id'),
					//'user_id' => $_SESSION['petition']['user_id'],
					'petition_title'   => $this->input->post('petition_title'),
					'petition_target'   => $this->input->post('petition_target'),
					'petition_goal' => $this->input->post('petition_goal'),
					'petition_status' => '1',
					'petition_description'   => $this->input->post('petition_description')
					);


			if(isset($_FILES['petition_image']['name']) && $_FILES['petition_image']['name']!= "") {
				$name           = $_FILES['petition_image']['name'];
				$logo_path_info = pathinfo($_FILES["petition_image"]["name"]);
				$file_name      =  $name;
				$file_name      = trim($file_name);
				if($this->upload->do_upload('petition_image')) {

					$upload_data    = $this->upload->data();
					$uploaded_file = $upload_data['file_name'];
				}
				$data['petition_image'] = $file_name;
			}
			if($this->input->post('petition_url') !='') { 

				$data['petition_url'] = $this->input->post('petition_url');
			}

			$petition_id =  $this->Petition_model->update_petition_by_uid($petition_uid, $data);

			/*
			$short_url = $this->bijective->encode($petition_id);
			$short_url_details = $short_base_url.$short_url;
			
			$update_data = array(
									'petition_url' => $short_base_url,

								);

			$this->Petition_model->update_petition_by_id($petition_uid, $update_data);

			$this->session->set_flashdata('message', 'Petition Updated Successfully.');
			//$petition_data = $this->Petition_model->get_petition_by_uid($uniqid);
		    //$data['petition'] = $petition_data;
		    //echo "<pre>";print_r($data);
		    //exit(0);
		    */

			redirect('petition/my_petition_list');
		}

	}

	public function petition_list() { 

		$this->load->model("Petition_signed_model");
		$param = array("petition_status" => 2);
		$petitions = $this->Petition_model->get_petition($param);
		$petition_data = array(); 

		foreach($petitions as $petition) {

			$petition_id = $petition['petition_id'];
			$petition_signed_count = $this->Petition_signed_model->get_petition_signed_count($petition_id);

			$petition['petition_signed_count'] = $petition_signed_count;
			array_push($petition_data, $petition);
		}

		$data = array("petitions" => $petition_data);
		$this->load->template('list', $data);

	}

	public function my_petition_list() { 

		$user_id = $this->get_user_session();
		if($user_id == 0) {

			redirect("/");
		}

		$this->load->model("Petition_signed_model");
		$user_id = $this->get_user_session();
		$param = array("status" => 2 , "user_id" => $user_id );
		$petitions = $this->Petition_model->get_petition($param);
		$petition_data = array(); 

		foreach($petitions as $petition) {

			$petition_id = $petition['petition_id'];
			$petition_signed_count = $this->Petition_signed_model->get_petition_signed_count($petition_id);

			$petition['petition_signed_count'] = $petition_signed_count;
			array_push($petition_data, $petition);
		}

		$data = array("petitions" => $petition_data);
		//echo "<pre>";print_r($data);

		$this->load->template('my-list', $data);

	}


	public function petition_details($petition_uid) { 
		//print_r($_SERVER);
		$this->load->model('Petition_signed_model');
		$petition_data = $this->Petition_model->get_petition_by_uid($petition_uid);
		//print_r($petition_data);
		//die();
		$data['petition'] = $petition_data;
		$user_id = $this->get_user_session();
		$petition_id = $petition_data['petition_id'];
		$petition_goal =  $petition_data['petition_goal'];
		$petition_signed = 0;
		$petition_user_name = '';
		$petition_signed_count = $this->Petition_signed_model->get_petition_signed_count($petition_id);
		if($user_id > 0) {

			$petition_signed = $this->Petition_signed_model->get_petition_signed_by_id($petition_id, $user_id);

			$petition_user_name = $this->session->userdata('petition')['user_name'];

			$data['twitter_url']    = $this->get_twitter_url();
		}

		$data['petition_signed'] = $petition_signed ;
		$data['petition_signed_count'] = $petition_signed_count ;
		$data['user_id'] = $user_id ;
		$data['user_name'] = $petition_user_name ;

        $percentage_petition = ($petition_signed_count/$petition_goal) * 100;
        $data['percentage_petition'] = $percentage_petition ;

        //echo "<pre>";print_r($data);
        //die();
		$this->load->template('detail', $data);

		/*

		$petition_data = array();
        $this->load->model("Petition_signed_model");
        $this->load->model("Petition_model");

        //$petitions= $this->Petition_model->get_latest_petition(12);
        $petitions= $this->Petition_model->get_petition_latest_list();
        foreach($petitions as $petition) {

            $petition_id = $petition['petition_id'];
            $petition_signed_count = $this->Petition_signed_model->get_petition_signed_count($petition_id);

            $petition['petition_signed_count'] = $petition_signed_count;
            array_push($petition_data, $petition);
        	}

            $data = array("petitions" => $petition_data);
            //echo "<pre>";print_r($data);
        	//die();
        	$this->load->template('details-common1', $data);
        	*/
		
	}

	public function get_twitter_url() {

			$this->config->load('custom_config');

			$TWITTER_CONFIG = $this->config->item('TWITTER_CONFIG');
			require $TWITTER_CONFIG['vendor'];

			$twitteroauth = new Abraham\TwitterOAuth\TwitterOAuth($TWITTER_CONFIG['consumer_key'], $TWITTER_CONFIG['consumer_secret']);

			$request_token = $twitteroauth->oauth(
				'oauth/request_token', [
				//'oauth_callback' => $TWITTER_CONFIG['url_callback']
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

			return $twitter_url;
	}

	public function dashboard($petition_uid) {

    	$this->load->template('dashboard');

    }

    public function signed_petition() {


    	$message = array("status" => 0,"message" => "invalid request");

        if($this->input->method() === 'post') {

        	$user_id = $this->get_user_session();

        	if($user_id == 0) {

        		$message = array("status" => 2,"message" => "Please login to sign the petition");
        		echo json_encode($message);
				die();
        	}

			$petition_comment = trim($this->input->post('petition_comment')) ?  $this->input->post('petition_comment') : '';
			$display_name = $this->input->post('display_name') ? 1 : 0;
			$petition_id = $this->input->post('petition_id') ?  $this->input->post('petition_id') : 0;
			$user_id = $this->session->userdata('petition')['user_id'];

			$message = array("status" => 0,"message" => "Unable to connect to a server try again");

			$error_message = array();

			if(empty($petition_comment)) {

				array_push($error_message , "Comment field cannot be empty");
				$this->session->set_flashdata('message', 'Comment field cannot be empty');
			}
			if(count($error_message) > 0) {

                $error_message = join("</br>" , $error_message);
                $message = array("status" => 0,"message" => $error_message);
            }
            else {
            	$this->load->model("Petition_signed_model");
            	$data_petition_signed = array(
            									'petition_id' => $petition_id,
            									'user_id' => $user_id,
            									'description' => $petition_comment,
            									'display_name' => $display_name,
            									'display_comment' => $display_name
            								 );

            	$this->Petition_signed_model->insert_data('pt_petitions_signed', $data_petition_signed);
            	$this->session->set_flashdata('message', 'Petition Signed Successfully');

            	$message = array("status" => 1,"message" => "Petition Signed Successfully");
            }
		}
		echo json_encode($message);
		die();
	}

    public function get_user_session() {

    	$user_id = 0;

    	if($this->session->userdata('petition') && $this->session->userdata('petition')['user_id']!='') {

    		$user_id = $this->session->userdata('petition')['user_id'];
    	}
    	return $user_id;
    }

    public function share_petition() {

    	$this->load->template('petition-share');
    }

    public function thankyou($petition_uid) {

    	$this->load->model('Petition_signed_model');
		$petition_data = $this->Petition_model->get_petition_by_uid($petition_uid);

    	if(!empty($param)) {

            $this->load->library('Bijective');
    	    $petition_id = array();
            $petition_id = $this->bijective->decode($param);
            $petition_data= $this->Petition_model->get_petition_by_id($petition_id);

            if(!empty($petition_data)) {

                $petition_uid = $petition_data['petition_uid'];
                redirect('petition/thankyou/'.$petition_uid);
            }
        }
        $petition_data = array();
        $this->load->model("Petition_signed_model");

        $petitions= $this->Petition_model->get_latest_petition(20);
        foreach($petitions as $petition) {

            $petition_id = $petition['petition_id'];
            $petition_signed_count = $this->Petition_signed_model->get_petition_signed_count($petition_id);

            $petition['petition_signed_count'] = $petition_signed_count;
            array_push($petition_data, $petition);
        }

        $data = array("petitions" => $petition_data);
        //echo "<pre>"; print_r($data);
        //die();
    	$this->load->template('thankyou',$data);
    }
}
?>
