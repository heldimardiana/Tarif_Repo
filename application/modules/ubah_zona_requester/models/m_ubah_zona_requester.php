<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ubah_zona_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_branch($branch_code)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_CODE = '".$this->db->escape($branch_code)."'";
		$query = $this->db->GetArray($sql);
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

	public function data_cabang($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_zona($cabang)
	{
		$sql = "SELECT CITY_ZONE_ID AS CITY_ZONA FROM TARIF_CMS_CITY_ZONE WHERE CITY_ZONE_CODE = '".$this->db->escape($cabang)."' AND ROWNUM <= 1";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_zona($cabang)
	{
		$sql = "SELECT CITY_ZONE_ID AS CITY_ZONA FROM TARIF_CMS_CITY_ZONE WHERE CITY_ZONE_CODE = '".$this->db->escape($cabang)."' AND ROWNUM <= 1";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_ubah_zona_requester($seq,$user_id,$username,$user_branch,
									  $user_origin,$user_zone_code,$user_level,$branch_code,$origin,$current_zone,$modif_zone,$session_request,$regional,$child)
	{
		$get_seq = "SELECT SEQ_TARIF_UZR.NEXTVAL AS COUNTS FROM DUAL";
		$query_seq = $this->db->GetArray($get_seq);
		foreach($query_seq as $qs){
			$uctr = $qs['COUNTS'];
		}

		$sequence = $seq.$uctr;

		$sql = "INSERT INTO TARIF_UZR (NO_REQUEST, USER_ID, USER_NAME, USER_BRANCH, USER_ORIGIN, USER_ZONE_CODE,
				USER_LEVEL, BRANCH_CODE, ORIGIN, CURRENT_ZONE, MODIF_ZONE, STATUS_REQUEST, SESSION_REQUEST, REGIONAL,CHILD) VALUES 
				('$sequence','$user_id','$username','$user_branch','$user_origin','$user_zone_code',
				'$user_level','$branch_code','$origin','$current_zone','$modif_zone','1','$session_request','$regional','$child')";
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

	public function getchild($param)
	{
		/*
		$sql = "SELECT COUNT(1) AS CNT FROM
				(SELECT SUBSTR(DROURATE_CODE,1,8) KODE
				FROM CMS_DROURATE 
				WHERE 
				DROURATE_CODE LIKE SUBSTR('$param',1,7) || '%'                    
				AND DROURATE_CODE NOT LIKE  '$param' || '%' 
				GROUP BY SUBSTR(DROURATE_CODE,1,8))"; */
		$sql = "SELECT COUNT(CITY_CODE) AS CNT
				FROM CMS_CITY, CMS_DROURATE
                WHERE CITY_ACTIVE = 'Y'
                and SUBSTR(DROURATE_CODE,1,8) = CITY_CODE 
                AND DROURATE_ACTIVE = 'Y'
                AND CITY_CODE != '$param'
                AND CITY_CODE LIKE SUBSTR('$param',1,6) || '%'    
                GROUP BY CITY_CODE";
		$query = $this->db->GetRow($sql);
		return $query;
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
    	$sql = "SELECT NO_REQUEST FROM (SELECT NO_REQUEST FROM TARIF_UZR WHERE USER_ID = '".$this->db->escape($user_id)."'
    			ORDER BY CREATED DESC) WHERE ROWNUM = 1";
    	$query = $this->db->GetArray($sql);
    	return $query;
    }

    public function get_regional($branch_code)
    {
    	$sql = "SELECT BRANCH_OPS_REGION FROM ORA_BRANCH WHERE BRANCH_CODE = '".$this->db->escape($branch_code)."'";
    	$query = $this->db->GetArray($sql);
    	return $query;
    }

}

/* End of file m_ubah_zona_requester.php */
/* Location: ./application/modules/ubah_zona_requester/models/m_ubah_zona_requester.php */