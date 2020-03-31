<?php
class User_registration_model extends MY_Model {
	
    function __construct()
	{
		parent::__construct();
	}

	public function get_user_by_email_mobile($email, $mobile) {

	        $this->slave->select('*');
	        $this->slave->from('goscore_user');
	        $this->slave->where("email ='".$email."'");
	        $this->slave->where("mobile ='".$mobile."'");

	        $obj = $this->slave->get()->row();
	        return $obj;

	}

	public function get_user_by_session($session) {

	        $this->slave->select('*');
	        $this->slave->from('goscore_user');
	        $this->slave->where("user_session ='".$session."'");

	        $obj = $this->slave->get()->row();
	        return $obj;

	}

	public function update_user_by_session($session_id, $data) {

		$this->master->where('user_session', $session_id);
        $this->master->update('goscore_user', $data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;

	}

    public function update_user_by_email_mobile($email, $mobile, $data) {

        $this->master->where('email', $email);
        $this->master->where('mobile', $mobile);

        $this->master->update($table_name,$data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;

    }

	public function insert_user_data($data) {

        $this->master->insert('goscore_user', $data);
        return  $this->master->insert_id();

    }
}
