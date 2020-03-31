<?php
class Petition_share_model extends MY_Model {
	
    function __construct() {

		parent::__construct();
	}

	public function insert_petition_share($data) {

        $this->master->insert('pt_petitions_share', $data);
        //print_r($this->master->last_query());
        $petition_share_id = $this->master->insert_id();
        //$encode = $bijective->encode(155665767);
        return $petition_share_id;

    }
}
