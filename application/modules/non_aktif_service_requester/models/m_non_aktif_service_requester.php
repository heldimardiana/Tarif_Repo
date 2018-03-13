<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_non_aktif_service_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_destination($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)='$origin'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_destination($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)='$origin'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_service($destination)
	{

		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$destination' AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE 
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function data_service_all($params)
	{

		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$params' AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE 
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function save_non_aktif_service_requester($seq,$user_id,$username,$user_branch,
									  $user_origin,$user_zone_code,$user_level,$branch_code,$origin,$destination,$service,$session_request,$regional,$child)
	{
		$get_seq = "SELECT SEQ_TARIF_NASR.NEXTVAL AS COUNTS FROM DUAL";
		$query_seq = $this->db->GetArray($get_seq);
		foreach($query_seq as $qs){
			$uctr = $qs['COUNTS'];
		}

		$sequence = $seq.$uctr;

		$sql = "INSERT INTO TARIF_NASR (NO_REQUEST, USER_ID, USER_NAME, USER_BRANCH, USER_ORIGIN,
				USER_ZONE_CODE, USER_LEVEL, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE, SESSION_REQUEST,
				REGIONAL, CHILD) VALUES ('$sequence','$user_id','$username','$user_branch','$user_origin',
				'$user_zone_code','$user_level','$branch_code','$origin','$destination','$service',
				'$session_request','$regional','$child')";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function get_branch($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <>'I'
				AND (BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '%$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_branch($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <>'I'
				AND (BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '%$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function getchild($param)
	{
		$sql = "SELECT COUNT(DROURATE_CODE) AS CNT
				FROM CMS_DROURATE 
				WHERE 
				       DROURATE_CODE!='$param'
				AND DROURATE_CODE LIKE  SUBSTR('$param',1,14) || '%'
				AND SUBSTR('$param',-2)='00'";
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
    	$sql = "SELECT NO_REQUEST FROM (SELECT NO_REQUEST FROM TARIF_NASR WHERE USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED DESC) WHERE ROWNUM = 1";
    	$query = $this->db->GetArray($sql);
    	return $query;
    }

    public function get_regional($branch_code)
    {
    	$sql = "SELECT BRANCH_OPS_REGION FROM ORA_BRANCH WHERE BRANCH_CODE = '$branch_code'";
    	$query = $this->db->GetArray($sql);
    	return $query;
    }

}

/* End of file m_non_aktif_service_requester.php */
/* Location: ./application/modules/non_aktif_service_requester/models/m_non_aktif_service_requester.php */