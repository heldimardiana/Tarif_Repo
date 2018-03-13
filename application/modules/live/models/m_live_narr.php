<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_live_narr extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_cabang_utama_before_nar($cabang_utama)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				(BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang_utama_before_nar($cabang_utama)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				(BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_cabang_before_nar($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang_before_nar($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_destination_before_nar($cabang,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)='$cabang'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_destination_before_nar($cabang,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)='$cabang'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_live_narr.php */
/* Location: ./application/modules/live/models/m_live_narr.php */