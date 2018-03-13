<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_live_utc extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_cabang_utama_utc($cabang_utama)
	{
		$sql 	= "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				   (BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		
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

	public function data_cabang_utama_utc($cabang_utama)
	{
		$sql 	= "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				   (BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		$query 	= $this->db->GetArray($sql);
		return $query;
	}

	public function get_cabang_utc($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang_utc($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_destination_utc($origin,$destination)
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

	public function data_destination_utc($origin,$destination)
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

	public function data_service_utc($params)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$params' AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE 
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function gettarif($param)
	{
		$sql = "SELECT TARIF_NEW ('$param') AS TARIF_NEW FROM DUAL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_live_utc.php */
/* Location: ./application/modules/live/models/m_live_utc.php */