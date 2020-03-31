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

        $go_topage = get_cookie("go_topage");

        if(empty($go_topage)) {

            if(isset($_SERVER['HTTP_REFERER'])) {
                 set_cookie("go_topage", $_SERVER['HTTP_REFERER'], 84000);
            }
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

                if(!empty($go_topage)) {

                    redirect("$go_topage");
                    delete_cookie("go_topage");
                    exit(0);
                }
            
				redirect('/petition/petition-list');
        
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
        //die();
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

                if(isset($_SERVER['HTTP_REFERER'])) {

                    set_cookie("go_topage", $_SERVER['HTTP_REFERER'], 84000);
                }

                $message = array("status" => 1,"message" => "You are successfully login");
                echo json_encode($message);
                die();

            }
        }  
    }

	public function logout() {

        $this->session->unset_userdata('petition');
        //redirect('petition/petition-list');
        redirect('/');
        /* 
        $this->session->unset_userdata('petition');
        if(isset($_SERVER['HTTP_REFERER'])) {
         header('Location: '.$_SERVER['HTTP_REFERER']);  
        } 
        exit;
        */ 
	}

    public function update_password() {






    }

    public function forgot_password() {


        if($this->input->method() == "post") {

            $email = $this->input->post('email_id');
            //echo "==============".$email;
            
            $user_data = $this->User_model->get_user_by_email($email);

            echo "<pre>";print_r($user_data);
            die();


                // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
             
            // Create email headers
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n";
             
            // Compose a simple HTML email message
            $message ='<!DOCTYPE html>
                <html lang="en">
                   <head>
                      <meta charset="utf-8">
                      <title>Forgot Password</title>
                      <meta content="width=device-width, initial-scale=1.0" name="viewport">
                   </head>
                   <body>
                      <style>
                         body {font-family: "Open Sans", sans-serif;}
                      </style>
                      <table cellpadding="0" cellspacing="0" height="100%" width="600px" style="border: 1px #00bbff solid;">
                         <tbody>
                            <tr>
                               <td style="border-bottom:5px solid #00bbff"></td>
                            </tr>
                            <tr>
                               <td valign="top" style="background:#FFF; box-shadow: 0px 2px 3px 0px #ccc; text-align: left; padding: 10px 0px 0px 20px;"><img
                                  src="http://petition.sheenz.in/assets/img/callupon_logo.png" alt="alt_text" style="width:200px;max-width:200px;height:auto; padding:12px;">
                               </td>
                            </tr>
                            <tr>
                               <td></td>
                            </tr>
                            <tr>
                               <td height="15"></td>
                            </tr>
                            <tr>
                               <td style="font-size:14px;line-height:18px;color:#333333;padding:0 30px">Hi Users, </td>
                            </tr>
                            <tr>
                               <td height="25"></td>
                            </tr>
                            <tr>
                               <td style="font-size:14px;line-height:22px;color:#333333;padding:0 30px">It seems like you forgot your Password for Callupon.org. 
                                  To reset the password click on this link:
                               </td>
                            </tr>
                            <tr>
                               <td height="15"></td>
                            </tr>
                            <tr>
                               <td style="font-size:14px;line-height:22px;color:#333333;padding:0 30px">Your Link Path
                               </td>
                            </tr>
                            <tr>
                               <td height="15"></td>
                            </tr>
                            <tr>
                               <td height="30"></td>
                            </tr>
                            <tr>
                               <td style="font-size:14px;line-height:22px;color:#333333;padding:0 30px">
                                  If you did not ask to reset your password, Please ignore this email.
                               </td>
                            </tr>
                            <tr>
                               <td height="30"></td>
                            </tr>
                            <tr>
                               <td style="font-size:14px;line-height:20px;color:#333333;padding:0 25px">Warm regards,<br> <span
                                  class="il">Callupon.org</span></td>
                            </tr>
                            <tr>
                               <td height="20"></td>
                            </tr>
                            <tr>
                               <td style="font-size:14px;line-height:22px;color:#333333;text-align:center; padding-top:20px; border-top:1px #ccc solid;">
                                    © Copyright <strong>Callupon.org</strong> All Rights Reserved
                               </td>
                            </tr>
                            <tr>
                               <td style="font-size:14px;line-height:22px;color:#333333;padding-bottom:20px;text-align:center;">
                                 <!-- Designed by <a href="">Prudigital Media Pvt Ltd</a>-->
                               </td>
                            </tr>
                            <tr>
                               <td style="border-bottom:5px solid #00bbff"></td>
                            </tr>
                         </tbody>
                      </table>
                   </body>
                 </html>';
 
                // Sending email
                if(mail($to, $subject, $message, $headers)){
                    echo 'Your mail has been sent successfully.';
                } else{
                    echo 'Unable to send email. Please try again.';
                }

            
                $data["message"] = "Email send successfully";
                $data["status"] = 1;
                echo json_encode($data);
                exit(0);
        }

       //$this->load->template("/forgot-password");

    }

    public function edit_profile() {

       $this->load->template("/edit-profile");

    }

    public function account_settings() { 

        $userId =  isset($_SESSION['petition']['user_id'])?$_SESSION['petition']['user_id']:redirect('/');
        $user_details  = $this->User_model->get_user_by_id($userId);
        $uid = $user_details->user_uid;
        if(!isset($user_details)) redirect('/');
        $state_arr       =  $this->User_model->get_state();
        $country_arr     =  $this->User_model->get_country();

        $this->load->helper('file');
        $this->config->load('custom_config');

        $config['upload_path']          = $this->config->item('LOGO_UPLOAD_PATH');
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);


        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('user_name', 'First Name', 'required|min_length[2]|max_length[255]');
        $this->form_validation->set_rules('user_city', 'City', 'required|min_length[2]|max_length[255]');
        $this->form_validation->set_rules('country_id', 'Country', 'required');
        $this->form_validation->set_rules('state_id', 'State', 'required');
        $this->form_validation->set_rules('user_pincode', 'Pin Code', 'required|regex_match[/^[0-9]{6}$/]');
        
        if(isset($_FILES['user_logo']['name']) && $_FILES['user_logo']['name'] != "") {

            $this->form_validation->set_rules('user_logo', 'User Logo', 'callback_file_check');                
        }

        $password       =  $this->input->post('password');
        if($password!=''){
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[40]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');   
        }

        $data['user_name'] = $this->input->post('user_name');
        $data['user_lname'] = $this->input->post('user_lname');
        $data['user_about'] = $this->input->post('user_about');
        $data['user_city'] = $this->input->post('user_city');
        $data['country_id'] = $this->input->post('country_id');
        $data['state_id'] = $this->input->post('state_id');
        $data['user_pincode'] = $this->input->post('user_pincode');
        $data['user_address'] = $this->input->post('user_address');
        $data['user_mobile'] = $this->input->post('user_mobile');
        

        if(isset($_FILES['user_logo']['name']) && $_FILES['user_logo']['name']!= "") {
            $name           = $_FILES['user_logo']['name'];
            $logo_path_info = pathinfo($_FILES["user_logo"]["name"]);
            $file_name      =  $uid."-".time().'.'.$logo_path_info['extension'];
            $file_name      = trim($file_name);
            if($this->upload->do_upload('user_logo')) {
                $upload_data    = $this->upload->data();
                $uploaded_file = $upload_data['file_name'];
                rename(FCPATH.'assets/user_logo/'.$uploaded_file, FCPATH.'assets/user_logo/'.$file_name);

            }
            $data['user_picture'] = $file_name;
        }

        if($password!=''){
            $data['user_password']  = md5($this->input->post('password'));
        }

         $save="";
        if(isset($_POST['save'])){
            $save           = $_POST['save'];
        }

        if ($this->form_validation->run() == FALSE){
            if($save=='form_submit'){
                $data['user_uid']       =   $uid;
                $data['state_arr']          =   $state_arr;
                $data['country_arr']        =   $country_arr;
                $data['message']['error']   ='true';
                $this->load->template('/account_settings',$data);

            }else{
                $user_data          =   $this->User_model->get_user_by_id($userId);
                $country_id         =   $user_data->country_id;
                $state_arr          =   $this->User_model->get_state($country_id);
                $data               =   $user_data;
                $data->state_arr    =   $state_arr;
                $data->country_arr  =   $country_arr;
                $data->user_uid     =   $uid;
                $this->load->template('/account_settings',$data);
            }
        }else{
            $last_inserted_id       =   $this->User_model->update_data('pt_users',$data,$uid);
            $this->session->set_flashdata('message', 'Profile Updated Successfully.');
            redirect('/user-registration/account_settings');
        }

    }

    public function ajax_state($county_id){

        $statearr   =  $this->User_model->get_state($county_id);
        $str        = "<option value=''>-- Select State -- </option>";
        foreach($statearr as $key=>$val){
            $str    .= "<option value=".$val->state_id." >".ucwords(strtolower($val->name))." </option>";
        }
        echo $str;
        exit;
    }

    public function get_session() {

        $user_session = $this->session->userdata('petition');
        $message = array("status" => 0,"message" => "User session does not exists");
            
        if($this->session->userdata('petition') && $this->session->userdata('petition')['user_id']!='') {
            $message = array("status" => 1,"message" => "User session exists");
        }
        echo json_encode($message);
    }

    public function file_check() {
        $this->load->helper('file');
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');

        if(isset($_FILES['user_logo']['name']) && $_FILES['user_logo']['name']!="") {

            $mime = get_mime_by_extension($_FILES['user_logo']['name']);
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }
            else{

                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;

            }
        }
    }

}

?>
