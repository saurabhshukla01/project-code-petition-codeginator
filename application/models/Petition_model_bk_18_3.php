<?php
class Petition_model extends MY_Model {
	
    function __construct() {

		parent::__construct();
        $this->load->model("User_model");
	}

	public function get_petition_by_uid($uid) {

	        $this->slave->select('*');
	        $this->slave->from('pt_petitions');
	        $this->slave->where("petition_uid ='".$uid."'");
	        $obj = $this->slave->get()->row();
	        return (array) $obj;

	}

	public function get_petition_by_id($id) {

	        $this->slave->select('*');
	        $this->slave->from('pt_petitions');
	        $this->slave->where("petition_id", $id);
	        $obj = $this->slave->get()->row();
	        return (array) $obj;

	}

	public function update_petition_by_id($petition_id, $data) {

		$this->master->where('petition_id', $petition_id);
        $this->master->update('pt_petitions', $data);
        #print_r($this->master->last_query()); die();
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;

	}

    public function update_petition_share_count($petition_uid) {

        $this->master->set('petition_share_count', 'petition_share_count+1', FALSE);
        $this->master->where('petition_uid', $petition_uid);
        $this->master->update('pt_petitions');
        #print_r($this->master->last_query()); die();
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;

    }

    public function update_petition_uid($petition_uid, $data) {

        $this->master->where('petition_uid', $petition_uid);

        $this->master->update('pt_petitions', $data);
        echo $this->master->last_query();

        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;

    }

	public function insert_petition_data($data) {

        $this->master->insert('pt_petitions', $data);
        //print_r($this->master->last_query());
        $petition_id = $this->master->insert_id();
        //$encode = $bijective->encode(155665767);
        return $petition_id;

    }

    public function get_petitions_by_status_user($user_id, $status) {

        $this->slave->select('*');
        $this->slave->from('pt_petitions');
        $this->slave->where("user_id", $user_id);
        $this->slave->where("petition_status", $status);
        $this->slave->order_by("petition_id", "desc");
        $obj = $this->slave->get()->result_array();
        return $obj;

    }

    public function get_latest_petition($count) {

        $this->slave->select('*');
        $this->slave->from('pt_petitions');
        $this->slave->join('pt_category', 'pt_petitions.category_id = pt_category.category_id');
        //$this->slave->join('pt_users', 'pt_category.category_id = pt_users.user_uid');
        $this->slave->where("petition_status", 2);
        $this->slave->order_by("petition_id", "desc")->limit($count);
        $obj = $this->slave->get()->result_array();
        //echo "QUERY ---> ".$this->slave->last_query();
        //die();
        //$this->slave->last_query();
        return $obj;

    }

    public function filter_petition_by_category($category_id) {

        $this->slave->select('*');
        $this->slave->from('pt_petitions');
        $this->slave->join('pt_category', 'pt_petitions.category_id = pt_category.category_id');
        $this->slave->where("pt_category.category_id", $category_id);
        $this->slave->where("petition_status=2");
        $obj = $this->slave->get()->result_array();
        //echo "QUERY ---> ".$this->slave->last_query();
        //die();
        //$this->slave->last_query();
        return $obj;

    }

    public function get_all_publish_petitions() {

        $this->slave->select('*');
        $this->slave->from('pt_petitions');
        $this->slave->where("petition_status = 2");
        $obj = $this->slave->get()->result_array();
        return $obj;

    }
	
    public function get_petitions_by_user($user_id) {

        $this->slave->select('*');
        $this->slave->from('pt_petitions');
        $this->slave->where("user_id", $user_id);
        $this->slave->order_by("petition_id", "desc");
        $obj = $this->slave->get()->result_array();
        return $obj;

    }

	public function get_category_list() { 

		$this->slave->select('category_id, category_name');
		$this->slave->from('pt_category');
		$obj= $this->slave->get()->result();
		return $obj;
	}

	public function find_by_uid($petition_uid) {
        
        $this->slave->select('*');
        $this->slave->from('pt_petitions');
        $this->slave->where("petition_uid='".$petition_uid."'");
        $arr = $this->slave->get()->row();
        return  $arr;
    }

	public function generate_uid() {

        $uniqid = uniqid();
        $exists = $this->find_by_uid($uniqid);
        if (!empty($exists)&& count($exists)<1) {
            return $this->generateUid();
        }
        return $uniqid;
    }

	public function insert_data($table_name, $data){

        $data['created_date'] = date('Y-m-d H:i:s');
        $this->master->insert($table_name,$data);
        return  $this->master->insert_id();
    }

        public function get_petition_latest_list($data = array()) {

            //echo "<pre>";print_r($data);
            //$this->slave->select('pt.petition_id,pt.petition_uid,pt.petition_title,pt.petition_image,pu.user_name,pt.petition_signed_count,pt.petition_share_count,ps.description');
            $this->slave->select('*');
            $this->slave->from('pt_petitions AS pt');
            $this->slave->join('pt_petitions_signed AS ps', 'pt.user_id = ps.user_id');
            $this->slave->join('pt_users AS pu','pt.user_id = pu.user_uid');
            /*
            if(isset($data['pt.petition_status']) && $data['pt.petition_status'] != '') {

                $this->slave->where("petition_status", $data['pt.petition_status']);

            }
            if(isset($data['pt.user_id']) && $data['pt.user_id'] != '') {

                $this->slave->where("user_id", $data['pt.user_id']);
            }
            */
            //$this->slave->order_by("pt.petition_id", "desc");
            $this->slave->where("pt.petition_status", 2);
            $this->slave->order_by("pt.petition_id", "desc");
            $obj= $this->slave->get()->result_array();
           //echo "QUERY ---> ".$this->slave->last_query();
           //die();
            return $obj;
    }


    public function get_petition($data = array()) {

            //echo "<pre>";print_r($data);
            $this->slave->select('*');
            $this->slave->from('pt_petitions');
            if(isset($data['petition_status']) && $data['petition_status'] != '') {

                $this->slave->where("petition_status", $data['petition_status']);

            }
            if(isset($data['user_id']) && $data['user_id'] != '') {

                $this->slave->where("user_id", $data['user_id']);
            }
           $this->slave->order_by("petition_id", "desc");
           $obj= $this->slave->get()->result_array();
           //echo $this->slave->last_query();
           return $obj;
    }


	public function get_user_by_id($user_id) {

        $this->slave->select('twitter_consumer_key, twitter_consumer_secret, twitter_access_token, twitter_access_token_secret');
        $this->slave->from('pt_users');
        $this->slave->where("id", $user_id);
        $this->slave->order_by("id", "desc");
        $obj = $this->slave->get()->row();
        return $obj;

    }


}
