<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penambahan_service_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_destination($user_origin,$destination)
	{
		$sql = "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE SUBSTR(DROURATE_CODE,1,8) = '$user_origin'
				AND CITY_CODE = SUBSTR(DROURATE_CODE,9,16) AND (CITY_CODE LIKE '%$destination%'
				OR CITY_NAME LIKE '%$destination%') GROUP BY CITY_CODE, CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_data_destination($user_origin,$destination)
	{
		$sql = "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE SUBSTR(DROURATE_CODE,1,8) = '$user_origin'
				AND CITY_CODE = SUBSTR(DROURATE_CODE,9,16) AND (CITY_CODE LIKE '%$destination%'
				OR CITY_NAME LIKE '%$destination%') GROUP BY CITY_CODE, CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_service($origin,$destination)
	{
		$parameter = $origin.$destination;

		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$parameter' AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE 
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function save_penambahan_service_requester($seq,$user_id,$username,
										  $user_branch,$user_origin,$user_zone_code,$user_level,$branch_code,$origin,$destination,$service,
										  $tarif,$session_request,$regional)
	{
		$get_seq = "SELECT SEQ_TARIF_PSR.NEXTVAL AS COUNTS FROM DUAL";
		$query_seq = $this->db->GetArray($get_seq);
		foreach($query_seq as $qs){
			$uctr = $qs['COUNTS'];
		}

		$sequence = $seq.$uctr;

		$sql = "INSERT INTO TARIF_PSR (NO_REQUEST, USER_ID, USER_NAME, USER_BRANCH, USER_ORIGIN,
				USER_ZONE_CODE, USER_LEVEL, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE, TARIF,
				SESSION_REQUEST, REGIONAL) VALUES 
				('$sequence','$user_id','$username','$user_branch','$user_origin','$user_zone_code',
				'$user_level','$branch_code','$origin','$destination','$service','$tarif','$session_request',
				'$regional')";
	
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function get_branch($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <>'I'
				AND (BRANCH_CODE LIKE '%$branch%' OR BRANCH_DESC LIKE '%$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_branch($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <>'I'
				AND (BRANCH_CODE LIKE '%$branch%' OR BRANCH_DESC LIKE '%$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
				AND (CITY_CODE LIKE '%$origin%' OR CITY_NAME LIKE '%$origin%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
				AND (CITY_CODE LIKE '%$origin%' OR CITY_NAME LIKE '%$origin%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_destination_all($origin,$destination)
	{
		$sql = "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE SUBSTR(DROURATE_CODE,1,8) = '$origin'
				AND CITY_CODE = SUBSTR(DROURATE_CODE,9,16) AND (CITY_CODE LIKE '%$destination%'
				OR CITY_NAME LIKE '%$destination%') GROUP BY CITY_CODE, CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_data_destination_all($origin,$destination)
	{
		$sql = "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE SUBSTR(DROURATE_CODE,1,8) = '$origin'
				AND CITY_CODE = SUBSTR(DROURATE_CODE,9,16) AND (CITY_CODE LIKE '%$destination%'
				OR CITY_NAME LIKE '%$destination%') GROUP BY CITY_CODE, CITY_NAME";
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

}

/* End of file m_penambahan_service_requester.php */
/* Location: ./application/modules/penambahan_service_requester/models/m_penambahan_service_requester.php */