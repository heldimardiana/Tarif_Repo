<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_simulasi_uz extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_cabang_utama_before_uz($cabang_utama)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				(BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang_utama_before_uz($cabang_utama)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				(BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_cabang_utama_after_uz($cabang_utama)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				(BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang_utama_after_uz($cabang_utama)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				(BRANCH_CODE LIKE '$cabang_utama%' OR BRANCH_DESC LIKE '$cabang_utama%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_cabang_before($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang_before($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$cabang_utama' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_cabang_after_uz($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_ZONE_CODE,CITY_NAME FROM TARIF_CMS_CITY_ZONE_TMP, CMS_DROURATE, CMS_CITY WHERE 
					CITY_MAIN_BRANCH = SUBSTR('$cabang_utama',1,6) AND 
                    CITY_ACTIVE = 'Y'
                    AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_ZONE_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')
                    AND CITY_ZONE_NO_REQUEST = SUBSTR('$cabang_utama',7)
                    AND CITY_CODE = CITY_ZONE_CODE           
                    GROUP BY CITY_ZONE_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_cabang_after_uz($cabang_utama,$cabang)
	{
		$sql	= "SELECT CITY_ZONE_CODE,CITY_NAME FROM TARIF_CMS_CITY_ZONE_TMP, CMS_DROURATE, CMS_CITY WHERE 
					CITY_MAIN_BRANCH = SUBSTR('$cabang_utama',1,6) AND 
                    CITY_ACTIVE = 'Y'
                    AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_ZONE_CODE LIKE '$cabang%' ||'%' OR CITY_NAME LIKE '%'||'$cabang%'||'%')
                    AND CITY_ZONE_NO_REQUEST = SUBSTR('$cabang_utama',7)
                    AND CITY_CODE = CITY_ZONE_CODE           
                    GROUP BY CITY_ZONE_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_zona($cabang)
	{
		$sql = "SELECT CITY_ZONE_ID AS CITY_ZONA FROM TARIF_CMS_CITY_ZONE WHERE CITY_ZONE_CODE = '$cabang' AND ROWNUM <= 1";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_zona_after_uz($cabang)
	{
		$sql = "SELECT CITY_ZONE_ID FROM TARIF_CMS_CITY_ZONE_TMP WHERE CITY_ZONE_CODE = SUBSTR('$cabang',1,8)
				AND CITY_ZONE_NO_REQUEST = SUBSTR('$cabang',9) GROUP BY CITY_ZONE_ID";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_simulasi_uz.php */
/* Location: ./application/modules/simulasi/models/m_simulasi_uz.php */