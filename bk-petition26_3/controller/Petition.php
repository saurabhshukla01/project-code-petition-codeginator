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

	public function start_petition() {

		$user_id = $this->get_user_session();

		if($user_id == 0) {

			redirect("/");
		}

		$this->load->helper('file');
		$this->config->load('custom_config');

		$config['upload_path']          = $this->config->item('PETITION_IMAGES_UPLOAD_PATH');
		$config['allowed_types']        = 'gif|jpg|png|jpeg|PNG';
		$config['max_size']             = 10000;
		$config['max_width']            = 1540;
		$config['max_height']           = 1320;
		$short_base_url = $this->config->item('short_base_url');
		$this->load->library('upload', $config);

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('category_id', 'Topic', 'required');

		$this->form_validation->set_rules('petition_title', 'Title', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('petition_image', 'Petition Images', 'callback_file_check');

		$this->form_validation->set_rules('petition_goal', 'Goal', 'required');
		$this->form_validation->set_rules('petition_description', 'Description', 'required');

		$this->form_validation->set_error_delimiters('', '<br />');

		$category = $this->Petition_model->get_category_list();
		$data = array();
		$data["status"] = 0;
		$data["message"] = "";
		$data['category'] = $category;
		
		if ($this->form_validation->run() == FALSE) {


			  if($this->input->method() == "post") {

				  	$error = validation_errors();
				  	$data["status"] = 1;
					$data["message"] = $error;
					echo json_encode($data);
					exit(0);
			  }
		}
		else {
				
				$petition_id = $this->input->post('petition_id');
				$name           = $_FILES['petition_image']['name'];
				$logo_path_info = pathinfo($_FILES["petition_image"]["name"]);
				$file_name      =  $name;
				$file_name      = trim($file_name);

				//exit(0);
				$uploaded_file = "";

				if ( ! $this->upload->do_upload('petition_image'))
                {
                        $data["status"] = 1;
                        $data["message"] = $this->upload->display_errors();
                        echo json_encode($data);
						exit(0);
                       
                }
                else
                {
                    $upload_data    = $this->upload->data();
					$uploaded_file = $upload_data['file_name'];
                }


				$petition_data['petition_title'] = $this->input->post('petition_title');
				$petition_data['category_id'] = $this->input->post('category_id');
				$petition_data['user_id'] = $_SESSION['petition']['user_id'];
				$petition_data['petition_goal'] = $this->input->post('petition_goal');
				$petition_data['petition_status'] = 0;
				$petition_data['petition_description'] = $this->input->post('petition_description');
				$petition_data['petition_image'] = $uploaded_file;

				if($petition_id > 0) {

					$data['petition_image'] = $uploaded_file;
					$this->Petition_model->update_petition_by_id($petition_id, $petition_data);
					$data["message"] = "Petition Updated Successfully";
					
				} 
				else {
						
					$uniqid =  $this->Petition_model->generate_uid();
					$petition_data['petition_uid'] = $uniqid;
					$petition_id =  $this->Petition_model->insert_data('pt_petitions', $petition_data);
					$short_url = $this->bijective->encode($petition_id);
					$short_url_details = $short_base_url.'st'.$short_url;

					$update_data = array(
										  'petition_url' => $short_url_details
										);

					$this->Petition_model->update_petition_by_id($petition_id, $update_data);
					$data["message"] = "Petition Created Successfully";
					$data['petition_id'] = $petition_id;
					$data['petition_image'] = $file_name;
				}
				
			    //echo "<pre>";print_r($data);
			    //exit(0);
			    $category = $this->Petition_model->get_category_list();
				$data['category'] = $category;

				$data["status"] = 0;
				echo json_encode($data);
				exit(0);
		}

		$this->load->template('start-petition', $data);
	}	


	public function file_check() {

		$this->load->helper('file');
		$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png', 'image/jpg');

		if(isset($_FILES['petition_image']['name']) && $_FILES['petition_image']['name']!= "") {

			$mime = get_mime_by_extension($_FILES['petition_image']['name']);
			if(in_array($mime, $allowed_mime_type_arr)) {

				return true;
			}
			else {

				$this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
				return false;
			}
		}
		else {

			$this->form_validation->set_message('file_check', 'Please upload Petition Image');
		    return false;
		}
	}


	public function update_petition($petition_uid){

		$user_id = $this->get_user_session();

		$this->load->model('Petition_signed_model');
		$petition_data = $this->Petition_model->get_petition_by_uid($petition_uid);

        $category = $this->Petition_model->get_category_list();

        $data['petition'] = $petition_data; 
		$data['category'] = $category;

		if($user_id == 0) {

			redirect("/");
		}

		if($petition_data['petition_status'] == 2) {

			redirect("/");
		}

		$this->load->helper('file');
		$this->config->load('custom_config');

		$config['upload_path']          = $this->config->item('PETITION_IMAGES_UPLOAD_PATH');
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 1540;
		$config['max_height']           = 1320;

		$short_base_url = $this->config->item('short_base_url');
		$this->load->library('upload', $config);

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('category_id', 'Topic', 'required');
		$this->form_validation->set_rules('petition_title', 'Title', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('petition_goal', 'Goal', 'required');
		$this->form_validation->set_rules('petition_description', 'Description', 'required');

		if($this->input->post('petition_image') != "") {

			$this->form_validation->set_rules('petition_image', 'Petition Images', 'callback_file_check');
		}

		$this->form_validation->set_error_delimiters('', '<br />');

		if ($this->form_validation->run() == FALSE) {

			if($this->input->method() == "post") {

				  	$error = validation_errors();
				  	$data["status"] = 1;
					$data["message"] = $error;
					echo json_encode($data);
					exit(0);
			  }
		}
		else {

				$petition_update_data =  array(
												'category_id'   => $this->input->post('category_id'),
												'petition_title'   => $this->input->post('petition_title'),
												'petition_goal' => $this->input->post('petition_goal'),
												'petition_status' => '1',
												'petition_description'   => $this->input->post('petition_description')
						    		 		);

				$petition_id      =  $petition_data['petition_id'];
				$petition_image   = $_FILES['petition_image']['name'];


				if($petition_image != "") {

					$name           = $_FILES['petition_image']['name'];
					$logo_path_info = pathinfo($_FILES["petition_image"]["name"]);
					$file_name      =  $name;
					$file_name      = trim($file_name);
				

					if ( ! $this->upload->do_upload('petition_image'))
					{
						$data["status"] = 1;
						$data["message"] = $this->upload->display_errors();
						echo json_encode($data);
						exit(0);
					}
					else
					{
						$upload_data    = $this->upload->data();
						//echo "<pre>";print_r($upload_data);

						$petition_image = $upload_data['file_name'];
					}
					//echo "inside update image";

					$petition_update_data['petition_image'] = $petition_image;
				}

			 $this->Petition_model->update_petition_by_uid($petition_uid, $petition_update_data);
			 $data["petition_id"] = $petition_id;
			 $data["petition_image"] = $petition_image;
			 $data["message"] = "Petition update Successfully";
			 $data["status"] = 0;
			 echo json_encode($data);
			 exit(0);
		}

		$this->load->template('update-petition', $data); 

	}

	public function publish_petition() {

		$user_id = $this->get_user_session();

		if($user_id == 0) {

			redirect("/");
		}

		 if($this->input->method() == "post") {

		 	$petition_data = array();
		 	$petition_data['petition_status'] = 1;

		 	$petition_id = $this->input->post('petition_id');
		    $this->Petition_model->update_petition_by_id($petition_id, $petition_data);
			$data["message"] = "Petition Updated Successfully";

		    $data["status"] = 0;
			echo json_encode($data);
			exit(0);
		}
	}	


	public function petition_list() { 
		$this->load->library("pagination");
		$this->load->model("Petition_signed_model");
		$param = array("petition_status" => 2);
		$config = array();
        $config["base_url"] = base_url() . "petition/petition-list";
		$config["total_rows"] = $this->Petition_model->get_count($param);
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		/*$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '« First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';         
		$config['last_link'] = 'Last »';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next →';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '← Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		*/
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$petitions = $this->Petition_model->get_petition($param, $config["per_page"], $page);
		$petition_data = array(); 
		foreach($petitions as $petition) {
			$petition_id = $petition['petition_id'];
			$petition_signed_count = $this->Petition_signed_model->get_petition_signed_count($petition_id);
			$petition['petition_signed_count'] = $petition_signed_count;
			array_push($petition_data, $petition);
		}
		$data = array("petitions" => $petition_data, "links" => $this->pagination->create_links());
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
		$petitions = $this->Petition_model->get_petition($param ,5,0);
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

    public function petition_comment() {

    	$this->load->template('details-comment-1');

    }

	public function petition_details($petition_uid) { 

		//print_r($_SERVER);
		$this->load->model('Petition_signed_model');
		$this->load->helper('url_helper');

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

        $petition_signed_comments = $this->Petition_signed_model->get_top_petition_singed($petition_id,20);
        $petition_comment_data = array();



        if(count($petition_signed_comments ) > 0) {

        	foreach($petition_signed_comments as $petition_signed_comment) {

        		$comment_details = array();
        		$created_date = $petition_signed_comment["created_date"];
        		$created_date_timestamp = strtotime($created_date);
        		$time_elasped = get_time_elasped($created_date_timestamp);
        		$comment_details["user_name"] = $petition_signed_comment["user_name"];
        		$comment_details["user_pic"] = $petition_signed_comment["user_picture"];
        		$comment_details["comment_time_elasped"] = $time_elasped;
        		$comment_details["comment_description"] = $petition_signed_comment["description"];
        		array_push($petition_comment_data, $comment_details);
        	}
        }

        $data["comments"] = $petition_comment_data;

        //echo "<pre>";print_r($data);
        //die();

        //$this->load->template('details-common1', $data);
        //$this->load->template('detail-comment', $data);
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

			/*if(empty($petition_comment)) {

				array_push($error_message , "Comment field cannot be empty");
				$this->session->set_flashdata('message', 'Comment field cannot be empty');
			}*/
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

    public function petition_comments($petition_uid) { 

    	$this->load->model('Petition_signed_model');
		$this->load->helper('url_helper');

		$petition_data = $this->Petition_model->get_petition_by_uid($petition_uid);
		$petition_id =  $petition_data['petition_id'];

    	$data = array();
        $data['petition'] = $petition_data;

        $petition_signed_comments = $this->Petition_signed_model->get_top_petition_singed($petition_id,200);
        $petition_comment_data = array();

        if(count($petition_signed_comments ) > 0) {

        	foreach($petition_signed_comments as $petition_signed_comment) {

        		$comment_details = array();
        		$created_date = $petition_signed_comment["created_date"];
        		$created_date_timestamp = strtotime($created_date);
        		$time_elasped = get_time_elasped($created_date_timestamp);
        		$comment_details["user_name"] = $petition_signed_comment["user_name"];
        		$comment_details["user_pic"] = $petition_signed_comment["user_picture"];
        		$comment_details["comment_time_elasped"] = $time_elasped;
        		$comment_details["comment_description"] = $petition_signed_comment["description"];
        		array_push($petition_comment_data, $comment_details);
        	}
        }

        $data["comments"] = $petition_comment_data;
    	$this->load->template("comment-list",$data);
    }
}
?>
