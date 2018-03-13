<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_live_btbp extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_origin($origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin($origin)
	{
		$sql = "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND DROURATE_ACTIVE='Y'
				AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
				GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function generate_simulai_btbp_after($origin)
	{
		
		$sql = "SELECT
		        ORIGIN, CITY_ZONE_CODE, CITY_ZONE_3CODE, CITY_ZONE_KABKOTA,CITY_ZONE_KECAMATAN, CITY_ZONE_ID,LINEHAUL, LINEHAUL_NEXT, TRANSIT, 
		        DL_BEFORE_OKE,DL_BEFORE_REG, DL_BEFORE_YES, DL_BEFORE_SPS, NVL(DL_BEFORE_NEXT_SPS,0) DL_BEFORE_NEXT_SPS
		        FROM
		        (                
		        SELECT SUBSTR(DROURATE_CODE,1,8) ORIGIN, CITY_ZONE_CODE, CITY_ZONE_3CODE, CITY_ZONE_KABKOTA,
		        CITY_ZONE_KECAMATAN, CITY_ZONE_ID,
		        nvl(DROURATE_LINEHAUL,0) LINEHAUL, nvl(DROURATE_LINEHAUL_NEXT,0) LINEHAUL_NEXT,nvl(DROURATE_TRANSIT,0) TRANSIT,
		        CASE 
		            WHEN DROURATE_SERVICE LIKE 'OKE%' THEN DROURATE_DELIVERY
		            ELSE 0
		        END DL_BEFORE_OKE,
		        CASE 
		            WHEN DROURATE_SERVICE LIKE 'REG%' THEN DROURATE_DELIVERY
		            ELSE 0
		        END DL_BEFORE_REG,
		        CASE 
		            WHEN DROURATE_SERVICE LIKE 'YES%' THEN DROURATE_DELIVERY
		            ELSE 0
		        END DL_BEFORE_YES,
		        CASE 
		            WHEN DROURATE_SERVICE LIKE 'SPS%' THEN DROURATE_DELIVERY
		            ELSE 0
		       END DL_BEFORE_SPS,
		        CASE 
		            WHEN DROURATE_SERVICE LIKE 'SPS%' THEN DROURATE_DELIVERY_NEXT
		            ELSE 0
		        END DL_BEFORE_NEXT_SPS
		        FROM V_TARIF_UTCU
		        WHERE 
		        SUBSTR(DROURATE_CODE,1,8)='".$this->db->escape($origin)."'
		        AND CITY_ZONE_CODE = SUBSTR(DROURATE_CODE,9,8)
		        AND DZONE_LEVEL = '1' AND DZONE_TYPE='1'
		        AND DROURATE_SERVICE IN (SELECT SERVICE_CODE FROM CMS_SERVICE WHERE SERVICE_CODE LIKE 'OKE%' OR SERVICE_CODE LIKE 'REG%' OR SERVICE_CODE LIKE 'YES%' OR SERVICE_CODE LIKE 'SPS%')
		        AND DROURATE_ACTIVE='Y'
		        AND DROURATE_DELIVERY>0                
		        )
		        GROUP BY ORIGIN, CITY_ZONE_CODE, CITY_ZONE_3CODE, CITY_ZONE_KABKOTA,CITY_ZONE_KECAMATAN, LINEHAUL, LINEHAUL_NEXT, TRANSIT, 
		        CITY_ZONE_ID, DL_BEFORE_OKE,DL_BEFORE_REG, DL_BEFORE_YES, DL_BEFORE_SPS, DL_BEFORE_NEXT_SPS
		        ORDER BY CITY_ZONE_CODE";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_live_btbp.php */
/* Location: ./application/modules/live/models/m_live_btbp.php */