<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model("Petition_model");
		$this->load->helper('utils_helper');
	}

	public function index() {

		$this->load->template('search');

	}
}
?>
