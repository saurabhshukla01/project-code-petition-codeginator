<?php
class Location_model extends MY_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    public function get_state_city($state_id) {

        $this->slave->select('id,city_name');
        $this->slave->from('goscore_city');
        $this->slave->where("state_id ='".$state_id."'");
        $obj = $this->slave->get()->result_array();
        return $obj;

    }

    public function get_state() {

        $this->slave->select('id,name,code');
        $this->slave->from('goscore_state');
        $obj = $this->slave->get()->result_array();
        return $obj;

    }

    public function get_city() {

        $this->slave->select('id,city_name,state_id');
        $this->slave->from('goscore_city');
        $obj = $this->slave->get()->result_array();
        return $obj;

    }

}
