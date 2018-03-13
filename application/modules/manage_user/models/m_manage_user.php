<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manage_user extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function data_user($user_id)
	{
		$sql = "SELECT USER_ID FROM ORA_USER WHERE USER_ACTIVE = 'Y' AND USER_ID LIKE '".$this->db->escape($user_id)."%'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function user_data($user_id)
	{
		$sql = "SELECT USER_ID FROM ORA_USER WHERE USER_ACTIVE = 'Y' AND USER_ID LIKE '".$this->db->escape($user_id)."%'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_user($user_id)
	{
		$sql = "SELECT USER_NAME, USER_PSWD, USER_BRANCH, USER_ZONE_CODE, USER_ORIGIN, BRANCH_OPS_REGION 
				FROM ORA_USER,ORA_BRANCH  WHERE USER_ID = '".$this->db->escape($user_id)."' AND USER_BRANCH = BRANCH_CODE";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_role()
	{
		$sql = "SELECT * FROM TARIF_ROLE ORDER BY ID_ROLE ASC";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_level()
	{
		$sql = "SELECT * FROM TARIF_LEVEL_USER ORDER BY ID_LEVEL_USER ASC";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_branch()
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <> 'I' ORDER BY BRANCH_CODE";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin($branch)
	{
		$sql = "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_datauser()
	{
		$sql = "SELECT A.USER_ID, A.USER_NAME, B.ROLE, A.USER_BRANCH,A.USER_ORIGIN, C.LEVEL_USER,
				A.USER_ZONE_CODE,A.USER_SESSION, A.USER_REGIONAL, A.USER_EMAIL FROM TARIF_USER A LEFT JOIN TARIF_ROLE B ON A.USER_ROLE = B.ID_ROLE
				LEFT JOIN TARIF_LEVEL_USER C ON C.ID_LEVEL_USER = A.USER_LEVEL ORDER BY A.USER_NAME ASC";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function create_user($user_id,$user_name,$password,$user_branch,$user_origin,
																$user_zone_code,$role,$level,$user_regional,$session, $user_email)
	{
		$sql = "SELECT COUNT(USER_ID) AS UD FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($user_id)."' OR 
				USER_NAME = '".$this->db->escape($user_name)."'";
		$query = $this->db->Execute($sql);

		foreach($query as $q)
		{
			if($q['UD']>0)
			{
				redirect('manage_user/c_manage_user/duplicate_user');
			}
			else
			{
				$sql = "INSERT INTO TARIF_USER (USER_ID, USER_NAME, USER_PASS, USER_BRANCH, USER_ORIGIN,
						USER_ZONE_CODE, USER_ROLE, USER_LEVEL, USER_REGIONAL, USER_SESSION, USER_EMAIL,FLAG_LOGIN) VALUES 
						('$user_id','$user_name','$password','$user_branch','$user_origin','$user_zone_code',
						'$role','$level','$user_regional','$session','$user_email','N')";
				$query = $this->db->Execute($sql);
			}
		}
		return TRUE;
	}

	public function edit_user($session)
	{
		$sql = "SELECT * FROM TARIF_USER WHERE USER_SESSION = '".$this->db->escape($session)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function save_edit_user($user_id,$username,$role,$level,$session,$email,$user_regional)
	{
		$sql = "UPDATE TARIF_USER SET USER_ROLE = '$role', USER_LEVEL = '$level', USER_EMAIL = '$email',
				USER_REGIONAL = '$user_regional' WHERE USER_SESSION = '".$this->db->escape($session)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function delete_user($session)
	{
		$sql = "DELETE FROM TARIF_USER WHERE USER_SESSION = '".$this->db->escape($session)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function reset_password($session)
	{
		$sql = "UPDATE TARIF_USER SET USER_PASS = '202cb69kjsu84kd94mmd3202cb962ac59075b964b07152d234b70asffm834523i4c2934u23hwr'
				WHERE USER_SESSION = '".$this->db->escape($session)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	//Regional
	public function update_tarif_cabang_utama_regional($user_regional)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ 
                FROM TARIF_MASTER_UTCU WHERE STATUS_REQUEST = '1'
                AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function update_tarif_cabang_regional($user_regional)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function ubah_coding_regional($user_regional)
	{

		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function ubah_zona_regional($user_regional)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function non_aktif_routing_regional($user_regional)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function non_aktif_service_regional($user_regional)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function penambahan_service_regional($user_regional)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function aktivasi_service_regional($user_regional)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function update_intracity_regional($user_regional)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."'";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function btbp_approve_1()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_BTBP WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	//MPA
	public function update_tarif_cabang_utama_mpa()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ 
                FROM TARIF_MASTER_UTCU WHERE STATUS_REQUEST = '1'
                AND STATUS_REGIONAL = '1' AND (STATUS_MPA = '1' OR STATUS_MPA IS NULL )
                AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function update_tarif_cabang_mpa()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA = '1' OR STATUS_MPA IS NULL )
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function ubah_coding_mpa()
	{
		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1') 
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function ubah_zona_mpa()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function non_aktif_routing_mpal()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1') 
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function non_aktif_service_mpa()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function penambahan_service_mpa()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function aktivasi_service_mpa()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function update_intracity_mpa()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

	public function btbp_approve_2()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_BTBP WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		foreach($query as $q)
		{
			return $q['NO_REQ'];
		}
	}

}

/* End of file m_manage_user.php */
/* Location: ./application/modules/manage_user/models/m_manage_user.php */