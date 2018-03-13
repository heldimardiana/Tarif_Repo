<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function verify_login($username,$password)
	{
		$sql = "SELECT COUNT(USER_ID) AS UD FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($username)."' AND USER_PASS = '".$this->db->escape($password)."'";
		try{
			$query = $this->db->GetArray($sql);
			foreach($query as $q)
			{
				if($q['UD']>0)
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
		}
		catch(Exception $e){
			
		}
	}

	public function ngflag($username,$password)
	{
		//Check Flag
		$check_flag = "SELECT FLAG_LOGIN FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($username)."' AND USER_PASS = '".$this->db->escape($password)."'";
		$chech = $this->db->GetArray($check_flag);
		foreach($chech as $cf)
		{
			$flag = $cf['FLAG_LOGIN'];
		}
		
		if($flag == "N")
		{
			$sql = "UPDATE TARIF_USER SET FLAG_LOGIN = 'Y', LAST_LOGIN = SYSDATE
					WHERE USER_ID = '".$this->db->escape($username)."' AND USER_PASS = '".$this->db->escape($password)."'";
			$query = $this->db->Execute($sql);
			return $query;
		}
		else
		{
			//Check Time
			$check_time = "SELECT TO_CHAR(LAST_LOGIN, 'YYYY-MM-DD HH24:MI') AS LAST_LOGIN FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($username)."' AND USER_PASS = '".$this->db->escape($password)."'";
			$c_time = $this->db->GetArray($check_time);
			foreach($c_time as $ct)
			{
				$login_time = SUBSTR($ct['LAST_LOGIN'],0,10);
				$login_hour = STR_REPLACE(":","",SUBSTR($ct['LAST_LOGIN'],11,5)) + 100;
			}
			//Today
			$date = date('Y-m-d H:i');
			$today = SUBSTR($date,0,10);
			$tohour = STR_REPLACE(":","",SUBSTR($date,11,5));
	
			if($login_time == $today)
			{
				if($tohour > $login_hour)
				{
					redirect('logout');
				}
				else
				{
					return TRUE;
				}
			}
			else
			{
				//Date Not Match
				return TRUE;
			}
		}
		
	}

	public function data_user($username,$password)
	{
		$sql = "SELECT * FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($username)."' AND USER_PASS = '".$this->db->escape($password)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_user_role($username,$password)
	{
		$sql = "SELECT USER_ROLE FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($username)."' AND USER_PASS = '".$this->db->escape($password)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_login.php */
/* Location: ./application/modules/login/models/m_login.php */