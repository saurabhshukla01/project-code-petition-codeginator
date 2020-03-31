<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->helper('cookie');
		$this->load->model("User_registration_model");
		$this->load->helper('utils_helper');
		$this->load->library('session');

	}

	public function index() {
#echo "<pre>"; print_r($_SESSION);die();
		$use_session_id = $this->session->userdata('user')['user_session_id'];

		$user_data = $this->User_registration_model->get_user_by_session($use_session_id);
		$step = '0';
		if($user_data['user_step_1_status'] == '0'){
			$step = '1';
		}
		elseif($user_data['user_step_2_status'] == '0'){
			$step = '2';
		}elseif($user_data['user_step_3_status'] == '0'){
			$step = '3';
		}elseif($user_data['user_step_4_status'] == '0'){
			$step = '4';
		}
		$user_data['step'] = $step;
		#echo "<pre>"; print_r($user_data);die();
		$this->load->template('credit_score_details', $user_data);
	}

	public function detail_report()
	{
		$use_session_id = $this->session->userdata('user')['user_session_id'];

		$user_data = $this->User_registration_model->get_user_by_session($use_session_id);
		//echo "<pre>"; print_r($user_data);die();
		$this->load->template('credit_score_details-1', $user_data);
	}
}
