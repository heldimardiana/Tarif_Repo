<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_simulasi_uti extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_origin_utir($origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin_utir($origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin_utir_a($no_request,$origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, TARIF_CMS_DROURATE, TARIF_MASTER_UTIR
                    WHERE CITY_ACTIVE = 'Y'
                    AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
                    AND DROURATE_NO_REQUEST = '$no_request'
                    AND DROURATE_NO_REQUEST = NO_REQUEST 
                    AND INTRACITY_FLAG = 'Y'        
                    GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin_utir_a($no_request,$origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, TARIF_CMS_DROURATE, TARIF_MASTER_UTIR
                    WHERE CITY_ACTIVE = 'Y'
                    AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
                    AND DROURATE_ACTIVE='Y'
                    AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
                    AND DROURATE_NO_REQUEST = '$no_request'
                    AND DROURATE_NO_REQUEST = NO_REQUEST 
                    AND INTRACITY_FLAG = 'Y'        
                    GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_destination_utir($origin,$destination)
	{
		$param = SUBSTR($origin,0,3);
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)='$origin'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				AND DROURATE_SERVICE LIKE 'CTC%'
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_destination_utir($origin,$destination)
	{
		$param = SUBSTR($origin,0,3);
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)='$origin'
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				AND DROURATE_SERVICE LIKE 'CTC%'
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_destination_utir_a($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, TARIF_CMS_DROURATE, TARIF_MASTER_UTIR WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)= SUBSTR('$origin',1,8)
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				AND DROURATE_NO_REQUEST = SUBSTR('$origin',9)
				AND DROURATE_NO_REQUEST = NO_REQUEST 
                AND INTRACITY_FLAG = 'Y'
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_destination_utir_a($origin,$destination)
	{
		$sql = "SELECT 
				CITY_CODE,CITY_NAME  
				FROM CMS_CITY, TARIF_CMS_DROURATE, TARIF_MASTER_UTIR WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,9,8)
				AND DROURATE_ACTIVE='Y'
				AND SUBSTR(DROURATE_CODE,1,8)= SUBSTR('$origin',1,8)
				AND (CITY_CODE LIKE '$destination%' ||'%' OR CITY_NAME LIKE '%'||'$destination%'||'%')
				AND DROURATE_NO_REQUEST = SUBSTR('$origin',9)
				AND DROURATE_NO_REQUEST = NO_REQUEST 
                AND INTRACITY_FLAG = 'Y'
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_service_utir($params)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE='$params' AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE AND DROURATE_SERVICE LIKE '%CTC%'
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function data_service_utir_a($params)
	{
		$sql = "SELECT DROURATE_SERVICE FROM TARIF_CMS_DROURATE, CMS_SERVICE 
                WHERE DROURATE_CODE= SUBSTR('$params',1,16) AND DROURATE_ACTIVE='Y'
                AND SERVICE_CODE=DROURATE_SERVICE
                AND DROURATE_NO_REQUEST = SUBSTR('$params',17)  
                GROUP BY DROURATE_SERVICE, SERVICE_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function gettarif_utir($param)
	{
		$sql = "SELECT TARIF_NEW ('$param') AS TARIF_NEW FROM DUAL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function gettarif_utir_a($param)
	{
		$sql = "SELECT TARIF_TRIAL_REQUEST ('$param') AS TARIF_NEW FROM DUAL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_simulasi_uti.php */
/* Location: ./application/modules/simulasi/models/m_simulasi_uti.php */