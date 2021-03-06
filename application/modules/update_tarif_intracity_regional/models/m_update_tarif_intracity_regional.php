<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_tarif_intracity_regional extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function data_utir($regional)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, ATTACHMENT, SESSION_REQUEST
				FROM TARIF_MASTER_UTIR WHERE (STATUS_REQUEST = '1' AND STATUS_REGIONAL IS NULL)
				AND REGIONAL = '$regional' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_update_tarif_intracity_regional($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, ORIGIN FROM TARIF_MASTER_UTIR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_request()
	{
		$sql = "SELECT * FROM TARIF_STATUS_REQUEST";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_no_request($session)
	{
		$sql = "SELECT NO_REQUEST FROM TARIF_MASTER_UTIR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function bdetail($no_request)
	{
		$sql = "SELECT DROURATE_CODE, CITY_ZONE_KABKOTA, 
				CITY_ZONE_KECAMATAN, CITY_ZONE_3CODE, CITY_ZONE_ID, SUM(BEFORE_YES) AS BEFORE_YES, SUM(BEFORE_REG) AS BEFORE_REG, 
				SUM(BEFORE_OKE) AS BEFORE_OKE,
				SUM(AFTER_YES) AS AFTER_YES, SUM(AFTER_REG) AS AFTER_REG, SUM(AFTER_OKE) AS AFTER_OKE, 
				SUM(ETD_BEFORE_FROM_YES) AS ETD_BEFORE_FROM_YES, SUM(ETD_BEFORE_FROM_REG) AS ETD_BEFORE_FROM_REG,
				SUM(ETD_BEFORE_FROM_OKE) AS ETD_BEFORE_FROM_OKE, SUM(ETD_BEFORE_THRU_YES) AS ETD_BEFORE_THRU_YES, 
				SUM(ETD_BEFORE_THRU_REG) AS ETD_BEFORE_THRU_REG,
				SUM(ETD_BEFORE_THRU_OKE) AS ETD_BEFORE_THRU_OKE, SUM(ETD_AFTER_FROM_YES) AS ETD_AFTER_FROM_YES, 
				SUM(ETD_AFTER_FROM_REG) AS ETD_AFTER_FROM_REG,
				SUM(ETD_AFTER_FROM_OKE) AS ETD_AFTER_FROM_OKE, SUM(ETD_AFTER_THRU_YES) AS ETD_AFTER_THRU_YES,
				SUM(ETD_AFTER_THRU_REG) AS ETD_AFTER_THRU_REG,
				SUM(ETD_AFTER_THRU_OKE) AS ETD_AFTER_THRU_OKE
				FROM
				(
				SELECT DROURATE_CODE, CITY_ZONE_KABKOTA, 
				CITY_ZONE_KECAMATAN, CITY_ZONE_3CODE, CITY_ZONE_ID, (BEFORE_YES) AS BEFORE_YES, (BEFORE_REG) AS BEFORE_REG, 
				(BEFORE_OKE) AS BEFORE_OKE,
				(AFTER_YES) AS AFTER_YES, (AFTER_REG) AS AFTER_REG, (AFTER_OKE) AS AFTER_OKE, 
				(ETD_BEFORE_FROM_YES) AS ETD_BEFORE_FROM_YES, (ETD_BEFORE_FROM_REG) AS ETD_BEFORE_FROM_REG,
				(ETD_BEFORE_FROM_OKE) AS ETD_BEFORE_FROM_OKE, (ETD_BEFORE_THRU_YES) AS ETD_BEFORE_THRU_YES, 
				(ETD_BEFORE_THRU_REG) AS ETD_BEFORE_THRU_REG,
				(ETD_BEFORE_THRU_OKE) AS ETD_BEFORE_THRU_OKE, (ETD_AFTER_FROM_YES) AS ETD_AFTER_FROM_YES, 
				(ETD_AFTER_FROM_REG) AS ETD_AFTER_FROM_REG,
				(ETD_AFTER_FROM_OKE) AS ETD_AFTER_FROM_OKE, (ETD_AFTER_THRU_YES) AS ETD_AFTER_THRU_YES,
				(ETD_AFTER_THRU_REG) AS ETD_AFTER_THRU_REG,
				(ETD_AFTER_THRU_OKE) AS ETD_AFTER_THRU_OKE
				FROM
				(SELECT SUBSTR(DROURATE_CODE,9,8) AS DROURATE_CODE, CITY_ZONE_KABKOTA, 
				CITY_ZONE_KECAMATAN, CITY_ZONE_3CODE, CITY_ZONE_ID,DROURATE_SERVICE,
				CASE
				    WHEN DROURATE_SERVICE LIKE 'CTCYES%' THEN TO_NUMBER (DROURATE_BEFOR_ZONE) *10  
				    ELSE 0
				END BEFORE_YES,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTC%'  AND DROURATE_SERVICE NOT LIKE 'CTCOKE%' AND DROURATE_SERVICE NOT LIKE 'CTCYES%' THEN TO_NUMBER (DROURATE_BEFOR_ZONE) *10 
				    ELSE 0
				END BEFORE_REG,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTCOKE%' THEN TO_NUMBER (DROURATE_BEFOR_ZONE) *10  
				    ELSE 0
				END BEFORE_OKE,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTCYES%' THEN TO_NUMBER (DROURATE_ZONE) *10
				    ELSE 0
				END AFTER_YES,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTC%'  AND DROURATE_SERVICE NOT LIKE 'CTCOKE%' AND DROURATE_SERVICE NOT LIKE 'CTCYES%'  THEN TO_NUMBER (DROURATE_ZONE) *10 
				    ELSE 0
				END AFTER_REG,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTCOKE%' THEN TO_NUMBER (DROURATE_ZONE) *10 
				    ELSE 0
				END AFTER_OKE,
				CASE
				    WHEN DROURATE_SERVICE LIKE 'CTCYES%' THEN DROURATE_BEFOR_ETD_FROM
				    ELSE 0
				END ETD_BEFORE_FROM_YES,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTC%'  AND DROURATE_SERVICE NOT LIKE 'CTCOKE%' AND DROURATE_SERVICE NOT LIKE 'CTCYES%'  THEN DROURATE_BEFOR_ETD_FROM 
				    ELSE 0
				END ETD_BEFORE_FROM_REG,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTCOKE%' THEN DROURATE_BEFOR_ETD_FROM 
				    ELSE 0
				END ETD_BEFORE_FROM_OKE,
				CASE
				    WHEN DROURATE_SERVICE LIKE 'CTCYES%' THEN DROURATE_BEFOR_ETD_THRU
				    ELSE 0
				END ETD_BEFORE_THRU_YES,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTC%'  AND DROURATE_SERVICE NOT LIKE 'CTCOKE%' AND DROURATE_SERVICE NOT LIKE 'CTCYES%'  THEN DROURATE_BEFOR_ETD_THRU 
				    ELSE 0
				END ETD_BEFORE_THRU_REG,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTCOKE%' THEN DROURATE_BEFOR_ETD_THRU 
				    ELSE 0
				END ETD_BEFORE_THRU_OKE,
				CASE
				    WHEN DROURATE_SERVICE LIKE 'CTCYES%' THEN DROURATE_ETD_FROM
				    ELSE 0
				END ETD_AFTER_FROM_YES,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTC%'  AND DROURATE_SERVICE NOT LIKE 'CTCOKE%' AND DROURATE_SERVICE NOT LIKE 'CTCYES%'  THEN DROURATE_ETD_FROM 
				    ELSE 0
				END ETD_AFTER_FROM_REG,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTCOKE%' THEN DROURATE_ETD_FROM 
				    ELSE 0
				END ETD_AFTER_FROM_OKE,
				CASE
				    WHEN DROURATE_SERVICE LIKE 'CTCYES%' THEN DROURATE_ETD_THRU
				    ELSE 0
				END ETD_AFTER_THRU_YES,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTC%'  AND DROURATE_SERVICE NOT LIKE 'CTCOKE%' AND DROURATE_SERVICE NOT LIKE 'CTCYES%'  THEN DROURATE_ETD_THRU 
				    ELSE 0
				END ETD_AFTER_THRU_REG,
				CASE 
				    WHEN DROURATE_SERVICE LIKE 'CTCOKE%' THEN DROURATE_ETD_THRU 
				    ELSE 0
				END ETD_AFTER_THRU_OKE
				FROM TARIF_CMS_DROURATE,TARIF_CMS_CITY_ZONE
				WHERE DROURATE_NO_REQUEST = '".$this->db->escape($no_request)."'
				AND SUBSTR(DROURATE_CODE,9,8)=CITY_ZONE_CODE
				AND DROURATE_SERVICE NOT LIKE '%TRC%')
				GROUP BY  DROURATE_CODE, CITY_ZONE_KABKOTA, 
				CITY_ZONE_KECAMATAN, CITY_ZONE_3CODE, CITY_ZONE_ID, (BEFORE_YES) , (BEFORE_REG) , 
				(BEFORE_OKE) ,
				(AFTER_YES) , (AFTER_REG) , (AFTER_OKE) , 
				(ETD_BEFORE_FROM_YES) , (ETD_BEFORE_FROM_REG), 
				(ETD_BEFORE_FROM_OKE) , (ETD_BEFORE_THRU_YES) , 
				(ETD_BEFORE_THRU_REG) ,
				(ETD_BEFORE_THRU_OKE) , (ETD_AFTER_FROM_YES)  ,
				(ETD_AFTER_FROM_REG) ,
				(ETD_AFTER_FROM_OKE) , (ETD_AFTER_THRU_YES) ,
				(ETD_AFTER_THRU_REG) ,
				(ETD_AFTER_THRU_OKE) 
				)
				GROUP BY DROURATE_CODE, CITY_ZONE_KABKOTA, 
				CITY_ZONE_KECAMATAN, CITY_ZONE_3CODE, CITY_ZONE_ID";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_detail_update_tarif_intracity_regional($no_request,
								  $status, $user_id, $notice,$attachment)
	{
		$sql = "UPDATE TARIF_MASTER_UTIR SET STATUS_REGIONAL = '$status', PIC_REGIONAL = '".$this->db->escape($user_id)."',
				UPDATE_STATUS_REGIONAL = SYSDATE, NOTICE_REGIONAL = '$notice',
				ATTACHMENT_REGIONAL = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

}

/* End of file m_update_tarif_intracity_regional.php */
/* Location: ./application/modules/update_tarif_intracity_regional/models/m_update_tarif_intracity_regional.php */