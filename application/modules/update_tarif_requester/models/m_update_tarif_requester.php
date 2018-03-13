<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_tarif_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}
	
	public function get_data_cabang_utama($cabang_utama)
	{
		$sql 	= "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				   (BRANCH_CODE LIKE '%$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
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
				   (BRANCH_CODE LIKE '%$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		$query 	= $this->db->GetArray($sql);
		return $query;
	}

	public function get_cabang($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY,CMS_DROURATE WHERE CITY_MAIN_BRANCH='$cabang_utama'AND 
				   (CITY_CODE LIKE '%$cabang%' OR CITY_NAME LIKE '%$cabang%') AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                   GROUP BY CITY_CODE, CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY,CMS_DROURATE WHERE CITY_MAIN_BRANCH='$cabang_utama'AND 
				   (CITY_CODE LIKE '%$cabang%' OR CITY_NAME LIKE '%$cabang%') AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                   GROUP BY CITY_CODE, CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_service($service)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
				WHERE SUBSTR(DROURATE_CODE,1,8)='$service' AND DROURATE_ACTIVE='Y'
				AND SERVICE_CODE=DROURATE_SERVICE 
				GROUP BY DROURATE_SERVICE, SERVICE_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_update_tarif_requester.php */
/* Location: ./application/modules/update_tarif_requester/models/m_update_tarif_requester.php */