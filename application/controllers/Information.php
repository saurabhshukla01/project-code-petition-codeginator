<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model("User_model");
		$this->load->helper('utils_helper');
		$this->load->model("Petition_model");
	}

	public function index($param = null) {             
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


    public function filter_petition($category_id){

        $petition_data = array();
        $this->load->model("Petition_signed_model");

        $petitions= $this->Petition_model->filter_petition_by_category($category_id);
        foreach($petitions as $petition) {

            $petition_id = $petition['petition_id'];
            $petition_signed_count = $this->Petition_signed_model->get_petition_signed_count($petition_id);

            $petition['petition_signed_count'] = $petition_signed_count;
            array_push($petition_data, $petition);
        }

        $data = array("petitions" => $petition_data);
        $this->load->template('home', $data); 

    }

	
	public function Contact_us() {

		$this->load->template('contact-us');
	}

	public function About_us() {
		//set_cookie('cookie_name','cookie_value','86400');
        //echo get_cookie('cookie_name'); 
        //print_r($_SERVER);
		$this->load->template('about-us');
	}

	public function Privacy_policy() {

		$this->load->template('privacy-policy');
	}

	public function Term_and_condition() {

		$this->load->template('term-and-condition');
	}


}
