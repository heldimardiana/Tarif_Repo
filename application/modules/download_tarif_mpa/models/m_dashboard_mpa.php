<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_branch($branch)
	{
		$sql 	= "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				   (BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '$branch%')";
		
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

	public function data_branch($branch)
	{
		$sql 	= "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				   (BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '$branch%')";
		$query 	= $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin($branch,$origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin($branch,$origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin_after($cabang_utama,$cabang)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, TARIF_CMS_DROURATE WHERE CITY_MAIN_BRANCH = SUBSTR('$cabang_utama',1,6)  
					AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')
					AND DROURATE_NO_REQUEST = SUBSTR('$cabang_utama',7)                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin_after($cabang_utama,$cabang)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, TARIF_CMS_DROURATE WHERE CITY_MAIN_BRANCH = SUBSTR('$cabang_utama',1,6)  
					AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')
					AND DROURATE_NO_REQUEST = SUBSTR('$cabang_utama',7)                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
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

	public function get_destination_after($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, TARIF_CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)= SUBSTR('$origin',1,8)
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				AND DROURATE_NO_REQUEST = SUBSTR('$origin',9)
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_destination_after($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, TARIF_CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)= SUBSTR('$origin',1,8)
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				AND DROURATE_NO_REQUEST = SUBSTR('$origin',9)
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_service_all($param)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$param' AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE 
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function get_service_after($param)
	{
		$sql = "SELECT DROURATE_SERVICE FROM TARIF_CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE= SUBSTR('$param',1,16) AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE
                AND DROURATE_NO_REQUEST = SUBSTR('$param',17)  
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function generate_tarif($routing,$service)
	{
		$sql = "SELECT * FROM V_TARIF_DETAIL WHERE ROUTING = '".$this->db->escape($routing)."' AND 
				DROURATE_SERVICE = '".$this->db->escape($service)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function generate_tarif_mpa_after($routing,$service,$no_request)
	{
		$sql = "SELECT * FROM V_TARIF_DETAIL_TESTING WHERE ROUTING = '".$this->db->escape($routing)."' 
				AND DROURATE_SERVICE = '".$this->db->escape($service)."' 
				AND DROURATE_NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function generate_tarif_mpa_afters($routing,$service,$no_request)
	{
		$sql = "SELECT * FROM V_TARIF_DETAIL_TESTING_2 WHERE ROUTING = '".$this->db->escape($routing)."' AND 
				DROURATE_SERVICE = '".$this->db->escape($service)."' 
				AND DROURATE_NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_dashboard_mpa.php */
/* Location: ./application/modules/download_tarif_mpa/models/m_dashboard_mpa.php */