<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_live_utcu extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_origin_utcu($origin)
	{
		/*
		$sql 	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
                    AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'%$origin%'||'%')
                    AND SUBSTR(CITY_CODE,4,5) = '10000'               
                    GROUP BY CITY_CODE,CITY_NAME";
        */
        $sql 	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
                    AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')              
                    GROUP BY CITY_CODE,CITY_NAME";
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

	public function data_origin_utcu($origin)
	{
		/*
		$sql 	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
                    AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'%$origin%'||'%')
                    AND SUBSTR(CITY_CODE,4,5) = '10000'               
                    GROUP BY CITY_CODE,CITY_NAME";
        */
        $sql 	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
                    AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')              
                    GROUP BY CITY_CODE,CITY_NAME";
		$query 	= $this->db->GetArray($sql);
		return $query;
	}

	public function get_service($origin)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                        WHERE DROURATE_CODE LIKE '$origin%' AND DROURATE_ACTIVE='Y'
                        AND SERVICE_CODE=DROURATE_SERVICE 
                        AND SERVICE_CODE NOT LIKE '%INTL%'
                        AND SERVICE_CODE NOT LIKE '%CML%'
                        AND SERVICE_CODE NOT LIKE '%CTC%'
                        GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function get_destination_utcu($origin,$destination)
	{
		$param = $origin.$destination;
		$sql = "SELECT 
                CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN  
                FROM TARIF_CMS_CITY_ZONE, CMS_DROURATE WHERE
                DROURATE_ACTIVE='Y'
                AND SUBSTR(DROURATE_CODE,1,11)='$param'
                AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8)
                AND SUBSTR(CITY_ZONE_CODE,4,6)='10000' 
                GROUP BY CITY_ZONE_CODE, CITY_ZONE_KECAMATAN";
		$query = $this->db->GetArray($sql);
		return $query;
		return $query;
	}

	public function data_destination_utcu($origin,$destination)
	{
		$param = $origin.$destination;
		$sql = "SELECT 
                CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN  
                FROM TARIF_CMS_CITY_ZONE, CMS_DROURATE WHERE
                DROURATE_ACTIVE='Y'
                AND SUBSTR(DROURATE_CODE,1,11)='$param'
                AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8)
                AND SUBSTR(CITY_ZONE_CODE,4,6)='10000' 
                GROUP BY CITY_ZONE_CODE, CITY_ZONE_KECAMATAN";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_subdestination_utcu($param)
	{
		$sql = "SELECT 
                CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN 
                FROM TARIF_CMS_CITY_ZONE, CMS_DROURATE WHERE
                DROURATE_ACTIVE='Y'
                AND SUBSTR(DROURATE_CODE,1,11)= SUBSTR('$param',1,11)
                AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8)
                AND CITY_ZONE_ID = SUBSTR('$param',12)
                GROUP BY CITY_ZONE_CODE, CITY_ZONE_KECAMATAN";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_service_utcu($params)
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

	public function generate_utcu_live($origin,$service)
	{
		$sql = "SELECT * FROM V_TARIF_DOWNLOAD_LIVE WHERE ORIGIN = '".$this->db->escape($origin)."' AND 
				SERVICE = '".$this->db->escape($service)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_live.php */
/* Location: ./application/modules/live/models/m_live.php */