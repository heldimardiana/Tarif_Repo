<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ubah_coding_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function cabang_utama($branch_code)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_CODE = '".$this->db->escape($branch_code)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_data_cabang($branch_code,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch_code' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang($branch_code,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch_code' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_ubah_coding_requester($insert_master,$user_id,$username,
											$user_branch,$user_origin,$user_zone_code,$user_level,$current_code,$modif_code,$session_request,$regional,$use_tarif)
	{

		$sql = "INSERT INTO TARIF_UCR (NO_REQUEST, USER_ID, USER_NAME, USER_BRANCH, USER_ORIGIN, USER_ZONE_CODE,
				USER_LEVEL, CURRENT_CITY_CODE, MODIF_CITY_CODE, SESSION_REQUEST, REGIONAL, USE_TARIF) VALUES ('$insert_master','$user_id',
				'$username','$user_branch','$user_origin','$user_zone_code','$user_level','$current_code',
				'$modif_code','$session_request','$regional','$use_tarif')";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function get_data_cabang_utama($cabang_utama)
	{
		$sql 	= "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				   (BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '%$cabang_utama%')";
		$query	= $this->db->GetArray($sql);
		if($query)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function data_cabang_utama($cabang_utama)
	{
		$sql 	= "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				   (BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '%$cabang_utama%')";
		$query 	= $this->db->GetArray($sql);
		return $query;
	}

	public function get_cabang($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang_all($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_modifcode($cabang)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
                GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_modifcode($cabang)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY WHERE 
				(CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
                GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function cekAktiv($param)
	{
		$sql = "SELECT CITY_ACTIVE FROM CMS_CITY WHERE CITY_CODE = '".$this->db->escape($param)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_temporary($current_code,$modif_code,$save_session,$branch_code)
	{
		$sql = "INSERT INTO TARIF_TMP_UCR VALUES ('$current_code','$modif_code','1','$save_session','$branch_code')";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function get_temporary()
	{
		$sql = "SELECT * FROM TARIF_TMP_UCR WHERE FLAG = '1'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function delete_temp_ucr($save_session)
	{
		$sql = "DELETE FROM TARIF_TMP_UCR WHERE SAVE_SESSION = '".$this->db->escape($save_session)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function deleteall_Temp()
	{
		$sql = "DELETE FROM TARIF_TMP_UCR";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function get_branch()
	{
		$sql = "SELECT BRANCH_CODE FROM (SELECT BRANCH_CODE FROM TARIF_TMP_UCR) WHERE ROWNUM = 1";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_regional($branch)
	{
		$sql = "SELECT BRANCH_OPS_REGION FROM ORA_BRANCH WHERE BRANCH_CODE = '".$this->db->escape($branch)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function insert_master($seq,$user_id)
	{
		$get_seq = "SELECT SEQ_TARIF_UCR.NEXTVAL AS COUNTS FROM DUAL";
		$query_seq = $this->db->GetArray($get_seq);
		foreach($query_seq as $qs){
			$uctr = $qs['COUNTS'];
		}

		$sequence = $seq.$uctr;

		$sql = "INSERT INTO TARIF_MASTER_UCR (NO_REQUEST, USER_ID) VALUES ('$sequence','$user_id')";
		$query = $this->db->Execute($sql);
		return $sequence;
	}

	public function get_nama_requester($user_id)
    {
        $sql = "SELECT USER_NAME FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($user_id)."'";
        $query = $this->db->GetArray($sql);
        return $query;
    }

    public function get_email_regional($regional)
    {
        $sql = "SELECT USER_EMAIL FROM TARIF_USER WHERE USER_REGIONAL = '".$this->db->escape($regional)."' AND USER_ROLE = '2'
                AND ROWNUM = 1";
        $query = $this->db->GetArray($sql);
        return $query;
    }

    public function get_no_request($user_id)
    {
    	$sql = "SELECT NO_REQUEST FROM (SELECT NO_REQUEST FROM TARIF_UCR WHERE USER_ID = '".$this->db->escape($user_id)."' 
    			ORDER BY CREATED DESC) WHERE ROWNUM = 1";
    	$query = $this->db->GetArray($sql);
    	return $query;
    }

}

/* End of file m_ubah_coding_requester.php */
/* Location: ./application/modules/ubah_coding_requester/models/m_ubah_coding_requester.php */