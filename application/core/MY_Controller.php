<?php
class MY_Controller extends CI_Controller {
	
	private $controller;
	private $model;
	public function __construct()
	{
		parent::__construct();
	    $this->load->library('session');

		$this->load->library('breadcrumbs');
	    $this->load->helper('cookie');
		$this->load->helper('url');

		$this->controller = $this->router->fetch_class();
		$this->model = $this->router->fetch_method();
		
		$non_logged_in = array("user_registration","petition","information","search");

		if(in_array($this->controller, $non_logged_in)) {

		}else{
			$this->isUserLoggedIn();
		}
	}

	public function isUserLoggedIn()
	{
		//echo "<pre>";print_r($_SESSION);
		//	die();
		if($this->session->userdata('petition') && isset($this->session->userdata('petition')['user_id'])) {

		}else{

			redirect("/petition/index");
		}
	}
}
?>
