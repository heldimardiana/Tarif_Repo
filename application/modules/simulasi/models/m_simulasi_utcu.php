<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_simulasi_utcu extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
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

	public function get_service_after($no_request)
	{
		$sql = "SELECT DROURATE_SERVICE FROM TARIF_CMS_DROURATE WHERE DROURATE_NO_REQUEST = '".$this->db->escape($no_request)."'
				GROUP BY DROURATE_SERVICE";
		$query = $this->db->GetArray($sql);
		return $query;
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

	public function get_origin_utcu_a($origin,$no_request)
	{
		$sql 	= "SELECT CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN
                    FROM TARIF_CMS_CITY_ZONE, TARIF_CMS_DROURATE WHERE
                    CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_ZONE_CODE LIKE '$origin%' ||'%' OR CITY_ZONE_KECAMATAN LIKE '%'||'$origin%'||'%')
                    AND DROURATE_NO_REQUEST = '$no_request'             
                    GROUP BY CITY_ZONE_CODE,CITY_ZONE_KECAMATAN";
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

	public function data_origin_utcu_a($origin,$no_request)
	{
		$sql 	= "SELECT CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN
                    FROM TARIF_CMS_CITY_ZONE, TARIF_CMS_DROURATE WHERE
                    CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_ZONE_CODE LIKE '$origin%' ||'%' OR CITY_ZONE_KECAMATAN LIKE '%'||'$origin%'||'%')
                    AND DROURATE_NO_REQUEST = '$no_request'             
                    GROUP BY CITY_ZONE_CODE,CITY_ZONE_KECAMATAN";
		$query 	= $this->db->GetArray($sql);
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

	public function get_destination_utcu_a($origin,$destination)
	{
		$param = $origin.$destination;
		$satu = SUBSTR($param,0,8);
		$dua = SUBSTR($param,-3);
		$tiga = $satu.$dua;
		$empat = SUBSTR($param,0,-3);
		$lima = SUBSTR($empat,8);

		/*
		$sql = "SELECT 
                CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN  
                FROM TARIF_CMS_CITY_ZONE, TARIF_CMS_DROURATE WHERE
                DROURATE_ACTIVE='Y'
                AND SUBSTR(DROURATE_CODE,1,11)='$tiga'
                AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8)
                AND DROURATE_NO_REQUEST = '$lima'
                GROUP BY CITY_ZONE_CODE, CITY_ZONE_KECAMATAN";
        */
        $sql = "SELECT CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN
                FROM TARIF_CMS_CITY_ZONE, TARIF_CMS_DROURATE
                WHERE DROURATE_ACTIVE='Y'
                AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8)
                AND DROURATE_NO_REQUEST = 'BDO/UTCU/214'
                AND (CITY_ZONE_CODE LIKE '$destination%' ||'%' OR CITY_ZONE_KECAMATAN LIKE '%'||'$destination%'||'%')
                GROUP BY CITY_ZONE_CODE, CITY_ZONE_KECAMATAN";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_destination_utcu_a($origin,$destination)
	{
		$param = $origin.$destination;
		$satu = SUBSTR($param,0,8);
		$dua = SUBSTR($param,-3);
		$tiga = $satu.$dua;
		$empat = SUBSTR($param,0,-3);
		$lima = SUBSTR($empat,8);

		/*
		$sql = "SELECT 
                CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN  
                FROM TARIF_CMS_CITY_ZONE, TARIF_CMS_DROURATE WHERE
                DROURATE_ACTIVE='Y'
                AND SUBSTR(DROURATE_CODE,1,11)='$tiga'
                AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8)
                AND DROURATE_NO_REQUEST = '$lima'
                GROUP BY CITY_ZONE_CODE, CITY_ZONE_KECAMATAN";
        */
        $sql = "SELECT CITY_ZONE_CODE,UPPER(CITY_ZONE_KECAMATAN) AS CITY_ZONE_KECAMATAN
                FROM TARIF_CMS_CITY_ZONE, TARIF_CMS_DROURATE
                WHERE DROURATE_ACTIVE='Y'
                AND CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8)
                AND DROURATE_NO_REQUEST = 'BDO/UTCU/214'
                AND (CITY_ZONE_CODE LIKE '$destination%' ||'%' OR CITY_ZONE_KECAMATAN LIKE '%'||'$destination%'||'%')
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

	public function data_service_utcu_a($params)
	{
		$sql = "SELECT DROURATE_SERVICE FROM TARIF_CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE= SUBSTR('$params',1,16) AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE
                AND DROURATE_NO_REQUEST = SUBSTR('$params',17)  
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

	public function gettarif_a($param)
	{
		$sql = "SELECT TARIF_TRIAL_REQUEST ('$param') AS TARIF_NEW FROM DUAL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function generate_utcu($no_request,$origin_after)
	{
		$sql = "SELECT * FROM V_TARIF_DOWNLOAD WHERE NO_REQUEST = '".$this->db->escape($no_request)."' AND 
				ORIGIN = '".$this->db->escape($origin_after)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function generate_utcu_before($origin,$service)
	{
		$sql = "SELECT * FROM V_TARIF_DOWNLOAD_LIVE WHERE ORIGIN = '".$this->db->escape($origin)."' AND 
				SERVICE = '".$this->db->escape($service)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_simulasi_utcu.php */
/* Location: ./application/modules/simulasi/models/m_simulasi_utcu.php */