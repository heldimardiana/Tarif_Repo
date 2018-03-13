<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_print_tarif extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_origin($origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin($origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_service1($origin)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE SUBSTR(DROURATE_CODE,1,8)='$origin' AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE 
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
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

	public function get_service($param)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$param' AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE 
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function print_1($origin,$destination,$service)
	{
		$param = $origin.$destination;
		$sql = "SELECT * FROM V_TARIF_DETAIL WHERE ROUTING = '$param' AND DROURATE_SERVICE = '$service'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_2($origin,$destination)
	{
		$param = $origin.$destination;
		$sql = "SELECT * FROM V_TARIF_DETAIL WHERE ROUTING = '$param'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_3($origin,$service)
	{
		$sql = "SELECT * FROM V_TARIF_DETAIL WHERE SUBSTR(ROUTING,1,8) = '$origin' AND DROURATE_SERVICE = '$service'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_4($origin)
	{
		$sql = "SELECT * FROM V_TARIF_DETAIL WHERE SUBSTR(ROUTING,1,8) = '$origin'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_print_tarif.php */
/* Location: ./application/modules/print_tarif/models/m_print_tarif.php */