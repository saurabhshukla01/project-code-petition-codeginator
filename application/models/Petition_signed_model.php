<?php
class Petition_signed_model extends MY_Model {
	
    function __construct() {

		parent::__construct();
        $this->table_name = 'pt_petitions_signed';
	}

	public function get_petition_signed_by_id($petition_id, $user_id) {

	        $this->master->select('*');
	        $this->master->from($this->table_name);
	        $this->master->where("petition_id", $petition_id);
            $this->master->where("user_id", $user_id);
            $petition_signed_query = $this->master->get();
            $petition_signed_count = $petition_signed_query->num_rows();

            return $petition_signed_count;
	}

	public function insert_data($table_name, $data){

        $this->master->insert($table_name,$data);
        return  $this->master->insert_id();
    }

    public function get_petition_signed_count($petiton_id) {

        $this->master->select('count(*) as petition_cnt');
        $this->master->from($this->table_name);
        $this->master->where('petition_id', $petiton_id);
        $data = $this->master->get()->row();
        $count = $data->petition_cnt;
        return $count;
        //echo "====".$this->master->last_query();
    }

}
