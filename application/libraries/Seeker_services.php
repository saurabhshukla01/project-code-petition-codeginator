<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seeker_services {

	function __construct()
	{	
		$this->ci =& get_instance();
        $this->master = $this->ci->load->database('master', TRUE);
        $this->slave = $this->ci->load->database('slave', TRUE);
	}

#### Seeker Branding Check ####
    function check_branding_recruiter($args)
    {
        $this->master->select("*");
        $this->master->from("jb_recruiter_branding");
        $this->master->where("service_type = '".$args->service_type."' AND enabled = '1' AND end_date >= CURDATE()");
        $obj = $this->master->get()->result();
        return $obj;
    }

}
