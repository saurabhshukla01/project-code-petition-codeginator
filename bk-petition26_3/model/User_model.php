<?php
class User_model extends MY_Model {
	
    function __construct() {

		parent::__construct();
		$this->tableName = 'pt_users';
		
	}

    public function register_user($userData = array()) {


        $user_id = $this->master->insert($this->tableName, $userData);
        return $user_id ? $user_id : FALSE;

    }

    public function check_user_by_email($email) {

        $this->master->select('id');
        $this->master->from($this->tableName);

        $this->master->where(array('user_email'=>$email));
        $user_query = $this->master->get();
        $user_count = $user_query->num_rows();

        return $user_count;
    }

    public function check_login_user($email, $password) {

        $this->master->select('*');
        $this->master->from($this->tableName);

        $this->master->where('user_email', $email);
        $this->master->where('user_password', md5($password));
        $user_data = (array)$this->master->get()->row();
    
        return $user_data;
    }

    /*
     * Insert / Update facebook / google profile data into the database
     * @param array the data for inserting into the table
     */
    public function check_user($user = array()) {

        $userID = 0;
        $user_data = array();

        if(!empty($user)) {
            //check whether user data already exists in database with same oauth info
            $this->master->select('*');
            $this->master->from($this->tableName);
            
            $this->master->where(array('user_email'=>$user['user_email']));
            $prevQuery = $this->master->get();
            $prevCheck = $prevQuery->num_rows();
            
            if($prevCheck > 0) {

                $user_db = $prevQuery->row_array();
                $data = array();

                if(isset($user['google_oauth_uid']) &&  $user['google_oauth_uid'] !='') {

                     $data['google_access_token'] = $user['google_access_token']; 
                     $data['google_oauth_uid'] = $user['google_oauth_uid']; 

                }
                else {

                     $data['facebook_oauth_uid'] = $user['facebook_oauth_uid']; 
                }

                $update = $this->master->update($this->tableName, $data, array('id' => $user_db['id']));

                //get user ID
                $user_data['user_id'] = $user_db['id'];
                $user_data['user_uid'] = $user_db['user_uid'];
                $user_data['user_name'] = $user_db['user_name'];
                $user_data['user_email'] = $user_db['user_email'];

            }
            else {

                $insert = $this->master->insert($this->tableName, $user);
                $user_id = $this->master->insert_id();
                $user_data['user_id'] = $user_id;
                $user_data['user_uid'] = $user['user_uid'];
                $user_data['user_name'] = $user['user_name'];
                $user_data['user_email'] = $user['user_email'];
            }
        }
        
        return $user_data;
    }


    public function find_by_uid($user_uid) {

        $this->slave->select('*');
        $this->slave->from('pt_users');
        $this->slave->where("user_uid='".$user_uid."'");
        $arr = $this->slave->get()->row();
        return  $arr;
    }


    public function generate_uid() {

        $uniqid = uniqid();
        $exists = $this->find_by_uid($uniqid);
        if (!empty($exists)&& count($exists)<1) {
            return $this->generate_uid();
        }
        return $uniqid;
    }

	public function update_user_by_id($user_id, $data) {

        $this->master->where('id', $user_id);
        $this->master->update('pt_users', $data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;

    }

    public function get_user_by_id($user_id) {

        $this->slave->select('id, user_uid, user_name, user_lname, user_mobile, user_picture, user_email, country_id, state_id, user_about, user_city, user_address, user_pincode, twitter_consumer_key, twitter_consumer_secret, twitter_access_token, twitter_access_token_secret');
        $this->slave->from('pt_users');
        $this->slave->where("id", $user_id);
        $this->slave->order_by("id", "desc");
        $obj = $this->slave->get()->row();
        return $obj;

    }


    public function get_state($country_id=null,$state_id=null){
        $this->slave->select('state_id, name');
        $this->slave->from('pt_states');
        if($state_id!=''){
            $this->slave->where("state_id=$state_id");
        }
        if($country_id!=''){
            $this->slave->where("country_id =$country_id");
        }
        $state_arr = $this->slave->get()->result();
        return $state_arr;
    }

    public function get_country($country_id=null){

        $this->slave->select('country_id, name');
        $this->slave->from('pt_countries');
        if($country_id!=''){
            $this->slave->where("country_id =$country_id");
        }
        $country_arr = $this->slave->get()->result();
        return $country_arr;
    }

    public function update_data($table_name,$data,$uid){
        $this->master->where('user_uid',$uid);
        $this->master->update($table_name,$data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function get_user_by_email($email) {

        $this->master->select('id,user_uid,user_name,user_lname,user_password,user_mobile,user_email,user_about,country_id,state_id,user_city,user_picture,user_gender');
        $this->master->from('pt_users');
        $this->master->where(array('user_email'=>$email));
        $obj = $this->master->get()->row();
        //echo $this->master->last_query();
        return $obj;
    }

}
