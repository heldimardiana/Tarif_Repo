<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_simulasi_ass extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_branch_ass($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <>'I'
				AND (BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_branch_ass($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <>'I'
				AND (BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_branch_ass_after($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <>'I'
				AND (BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_branch_ass_after($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION <>'I'
				AND (BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}
	
	public function get_origin_ass($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin_ass($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin_ass_after($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, TARIF_CMS_DROURATE WHERE CITY_MAIN_BRANCH = SUBSTR('$branch',1,6) AND CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
				AND DROURATE_NO_REQUEST = SUBSTR('$branch',7)                
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin_ass_after($branch,$origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, TARIF_CMS_DROURATE WHERE CITY_MAIN_BRANCH = SUBSTR('$branch',1,6) AND CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
				AND DROURATE_NO_REQUEST = SUBSTR('$branch',7)                
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_destination_ass($origin,$destination)
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

	public function data_destination_ass($origin,$destination)
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

	public function get_destination_ass_after($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, TARIF_CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND SUBSTR(DROURATE_CODE,1,8)= SUBSTR('$origin',1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				AND DROURATE_NO_REQUEST = SUBSTR('$origin',9)
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_destination_ass_after($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, TARIF_CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND SUBSTR(DROURATE_CODE,1,8)= SUBSTR('$origin',1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				AND DROURATE_NO_REQUEST = SUBSTR('$origin',9)
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_service_ass($params)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$params' AND DROURATE_ACTIVE='N'
                AND SERVICE_CODE=DROURATE_SERVICE
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function get_service_ass_after($params)
	{
		$sql = "SELECT DROURATE_SERVICE FROM TARIF_CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE= SUBSTR('$params',1,16) AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE
                AND DROURATE_NO_REQUEST = SUBSTR('$params',17)
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	

}

/* End of file m_simulasi_ass.php */
/* Location: ./application/modules/simulasi/models/m_simulasi_ass.php */