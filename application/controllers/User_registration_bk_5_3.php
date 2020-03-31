<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registration extends MY_Controller {

	function __construct() {

		parent::__construct();
        $this->load->model("User_model");
		$this->load->helper('utils_helper');
        $this->load->model("Petition_model");
	}

	public function index($param=null) {             
    	if(!empty($param)) {

            $this->load->library('Bijective');
    	    $petition_id = array();
            $petition_id = $this->bijective->decode($param);
            $petition_data= $this->Petition_model->get_petition_by_id($petition_id);

            if(!empty($petition_data)) {

                $petition_uid = $petition_data['petition_uid'];
                redirect('petition/petition-details/'.$petition_uid);
            }
        }
        $petition_data = array();
        $this->load->model("Petition_signed_model");

        $petitions= $this->Petition_model->get_latest_petition(12);
        foreach($petitions as $petition) {

            $petition_id = $petition['petition_id'];
            $petition_signed_count = $this->Petition_signed_model->get_petition_signed_count($petition_id);

            $petition['petition_signed_count'] = $petition_signed_count;
            array_push($petition_data, $petition);
        }

        $data = array("petitions" => $petition_data);
        $this->load->template('home', $data);
	}

	public function user_facebook_login() {

		$this->load->library('facebook');
	    $user_data = array();

        //echo "<pre>";print_r($_SERVER);        
        // Check if user is logged in
        if($this->facebook->is_authenticated()) {
        	
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');

            $user_data['facebook_oauth_uid']      = !empty($fbUser['id'])? $fbUser['id'] : '';
            $first_name = !empty($fbUser['first_name'])?$fbUser['first_name'] : '';
            $last_name = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $user_data['user_name']      = $first_name." ".$last_name;

            $user_data['user_email']     = !empty($fbUser['email'])? $fbUser['email'] : '';
            $user_data['user_gender']    = !empty($fbUser['gender']) ? $fbUser['gender'] : '';
            $user_data['user_picture']   = !empty($fbUser['picture']['data']['url'])? $fbUser['picture']['data']['url'] : '';
            $user_data['user_uid']       = $this->User_model->generate_uid();
            // Insert or update user data
            $user_session = $this->User_model->check_user($user_data);
            
             $this->set_session_data($user_session);
             #redirect('/petition/dashboard');
			 redirect('/petition/petition-list');
        }
        else {
            // Get login URL
            $data['authURL'] =  $this->facebook->login_url();
            redirect($data['authURL']);
        }
	}

    public function user_google_login() {

        $this->load->library('google');

        $set_url_cookie = $_SERVER['HTTP_REFERER'];
        set_cookie('singin_cookie',$set_url_cookie,'86400');
        $get_url_cookie = get_cookie('singin_cookie');
        if($get_url_cookie === $set_url_cookie){
            //echo $get_url_cookie;
            unset($_COOKIE['singin_cookie']);
            redirect("$get_url_cookie");
        }

        if($this->input->get('code')) {

            $code = $this->input->get('code');

            if($this->google->getAuthenticate($code)) {

                $access_token = $this->google->getAccessToken();
                $access_token_json = json_encode($access_token);

                // Get user info from google
                $google_user_data = $this->google->getUserInfo();
                
                // Preparing data for database insertion
                $user_data['google_oauth_uid']  = $google_user_data['id'];
                $user_data['google_access_token'] = $access_token_json;
                $user_data['user_name']      = $google_user_data['given_name']." ".$google_user_data['family_name'];
                $user_data['user_email']     = $google_user_data['email'];
                $user_data['user_gender']    = !empty($google_user_data['gender']) ? $google_user_data['gender'] : '';
                $user_data['user_locale']    = !empty($google_user_data['locale']) ? $google_user_data['locale'] : '';
                $user_data['user_link']      = !empty($google_user_data['link']) ? $google_user_data['link'] : '';
                $user_data['user_picture']   = !empty($google_user_data['picture']) ? $google_user_data['picture'] : '';
                $user_data['user_uid']       =  $this->User_model->generate_uid();
                // Insert or update user data to the database
                $user_session = $this->User_model->check_user($user_data);
               
                $this->set_session_data($user_session);
                
                // Redirect to profile page
                #redirect('/petition/dashboard');
				redirect('/petition/petition-list');
                //unset($_COOKIE['singin_cookie']);
                //redirect("$get_url_cookie");
            }
        }

        // Google authentication url
        $data['loginURL'] = $this->google->loginURL();

        redirect($data['loginURL']);
    }

    public function set_session_data($user_data = array()) {

    		$details = array(
                                'user_email'    => $user_data['user_email'],
                                'user_name'     => $user_data['user_name'],
                                'user_id'       => $user_data['user_id'],
                                'user_uid'      => $user_data['user_uid'],
                                'logged_in'     => TRUE
                               );

            $this->session->set_userdata('petition', $details);

    }

    public function check_login() {

        //print_r($_SERVER);
        if($this->session->userdata('petition') && $this->session->userdata('petition')['user_id']!='') {
            //redirect('/petition/petition-list');
            redirect($_SERVER['REQUEST_URI']);
            //header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

	public function user_signup() {

        $this->check_login();
        if($this->input->method() === 'post') {
            
			$user_name = trim($this->input->post('user_name') ?  $this->input->post('user_name') : '');
            $user_email = trim($this->input->post('user_email'));
			$user_mobile = trim($this->input->post('user_mobile') ? $this->input->post('user_mobile') : '' );
            $user_password =  trim($this->input->post('user_password'));
            $user_confirm_password = trim($this->input->post('user_confirm_password'));

            $message = array("status" => 0,"message" => "Unable to connect to a server try again");

            $error_message = array();

            if(empty($user_name)) {

                array_push($error_message , "Please enter name");
            }

            if(empty($user_email)) {

                array_push($error_message , "Please enter email");
            }

            if(empty($user_password)) {

                array_push($error_message , "Please enter password");
            }

            if(empty($user_confirm_password)) {

                array_push($error_message , "Please enter confirm password");
            }

            if(!empty($user_password) && !empty($user_confirm_password) && $user_password != $user_confirm_password) {

                array_push($error_message , "Password and confirm Password does not match");
            }

            if(!empty($user_email) && !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $user_email)) {

                array_push($error_message , "Please enter valid email");
            }

            if(count($error_message) > 0) {

                $error_message = join("</br>" , $error_message);
                $message = array("status" => 0,"message" => $error_message);
                echo json_encode($message);
                die();
            }

            $user_count = $this->User_model->check_user_by_email($user_email);

            if($user_count == 0) {

                $user_uid =  $this->User_model->generate_uid();
                $data = array(
                    'user_uid'  => $user_uid,
    				'user_name' => $user_name,
    				'user_mobile' => $user_mobile,
                    'user_email' => $user_email,
                    'user_password' => md5($user_password),
                );

                $user_id = $this->User_model->register_user($data);

                $user_data = $data;
                $user_data['user_id'] = $user_id;
                $this->set_session_data($user_data);
                
                $message = array("status" => 1,"message" => "User registration done successfully");

            }
            else {
                 $message = array("status" => 0,"message" => "Email already exists");
            }

            echo json_encode($message);
            die();
        }

        $this->load->template("/signup");

	}

    public function user_login() {
        $this->check_login();

        if($this->input->method() === 'post') {
            
            $user_email = trim($this->input->post('user_email'));
            $user_password =  trim($this->input->post('user_password'));

            $message = array("status" => 0,"message" => "Unable to connect to a server try again");

            $error_message = array();

            if(empty($user_email)) {

                array_push($error_message , "Please enter email");
            }

            if(empty($user_password)) {

                array_push($error_message , "Please enter password");
            }

            if(count($error_message) > 0) {

                $error_message = join("<br />" , $error_message);
                $message = array("status" => 0,"message" => $error_message);
                echo json_encode($message);
                die();
            }

            $user_data = $this->User_model->check_login_user($user_email, $user_password);

            if(empty($user_data)) {

                $message = array("status" => 0,"message" => "Email or Password does not match");
                echo json_encode($message);
                die();

            }
            else {

                $data = array(
                                'user_uid'  => $user_data['user_uid'],
                                'user_id'       => $user_data['id'],
                                'user_name' => $user_data['user_name'],
                                'user_mobile' => $user_data['user_mobile'],
                                'user_email' => $user_data['user_email']
                             );

                $user_data = $data;
                $this->set_session_data($user_data);

                $message = array("status" => 1,"message" => "You are successfully login");
                echo json_encode($message);
                die();

            }
        }  
    }

	public function logout() {

        //redirect('petition/petition-details');
         
        $this->session->unset_userdata('petition');
        if(isset($_SERVER['HTTP_REFERER'])) {
         header('Location: '.$_SERVER['HTTP_REFERER']);  
        } 
        exit; 
	}

    public function forgot_password() {

       $this->load->template("/forgot-password");

    }

     public function edit_profile() {

       $this->load->template("/edit-profile");

    }

    public function get_session() {

        $user_session = $this->session->userdata('petition');
        $message = array("status" => 0,"message" => "User session does not exists");
            
        if($this->session->userdata('petition') && $this->session->userdata('petition')['user_id']!='') {
            $message = array("status" => 1,"message" => "User session exists");
        }
        echo json_encode($message);
    }
}

?>
