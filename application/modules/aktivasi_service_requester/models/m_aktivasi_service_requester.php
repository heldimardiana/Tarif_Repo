<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aktivasi_service_requester extends CI_Model {

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
				AND SUBSTR(DROURATE_CODE,1,8)='$origin'
				AND DROURATE_ACTIVE='N'
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
				AND SUBSTR(DROURATE_CODE,1,8)='$origin'
				AND DROURATE_ACTIVE='N'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_service_all($params)
	{

		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$params' AND DROURATE_ACTIVE='N'
                AND SERVICE_CODE=DROURATE_SERVICE
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function save_aktivasi_service_requester($seq,$user_id,$username,$user_branch,
										  $user_origin,$user_zone_code,$user_level,$branch_code,$origin,$destination,$service,$session_request,
										  $regional)
	{
		$get_seq = "SELECT SEQ_TARIF_ASR.NEXTVAL AS COUNTS FROM DUAL";
		$query_seq = $this->db->GetArray($get_seq);
		foreach($query_seq as $qs){
			$uctr = $qs['COUNTS'];
		}
		$sequence = $seq.$uctr;

		$sql = "INSERT INTO TARIF_ASR (NO_REQUEST, USER_ID, USER_NAME, USER_BRANCH, USER_ORIGIN,
				USER_ZONE_CODE, USER_LEVEL, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE, SESSION_REQUEST,
				REGIONAL) VALUES 
				('$sequence','$user_id','$username','$user_branch','$user_origin','$user_zone_code',
				'$user_level','$branch_code','$origin','$destination','$service','$session_request',
				'$regional')";
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
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_destination_all($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND SUBSTR(DROURATE_CODE,1,8)='$origin'
				AND DROURATE_ACTIVE='N'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_data_destination_all($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND SUBSTR(DROURATE_CODE,1,8)='$origin'
				AND DROURATE_ACTIVE='N'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
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
        $sql = "SELECT USER_EMAIL FROM TARIF_USER WHERE USER_REGIONAL = '$regional' AND USER_ROLE = '2'
                AND ROWNUM = 1";
        $query = $this->db->GetArray($sql);
        return $query;
    }

    public function get_no_request($user_id)
    {
    	$sql = "SELECT NO_REQUEST FROM (SELECT NO_REQUEST FROM TARIF_ASR WHERE USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED DESC) WHERE ROWNUM = 1";
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

/* End of file m_aktivasi_service_requester.php */
/* Location: ./application/modules/aktivasi_service_requester/models/m_aktivasi_service_requester.php */