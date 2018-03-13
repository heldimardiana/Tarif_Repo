<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_content_dashboard_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	//UTCU
	public function utcu()
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT,
				SESSION_REQUEST, ATTACHMENT_REGIONAL, ATTACHMENT_MPA FROM TARIF_MASTER_UTCU WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1'
				AND STATUS_TESTING = '1') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_utcu($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, ORIGIN, SERVICE FROM TARIF_MASTER_UTCU WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_no_request($session)
	{
		$sql = "SELECT NO_REQUEST FROM TARIF_MASTER_UTCU WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tdetail_utcu($no_request)
	{
		$sql = "SELECT * FROM TARIF_DETAIL_UTCU WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_utcu($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_MASTER_UTCU A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_utcu($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_TARIF_CABANG_UTAMA, C.STATUS_REQUEST AS STATUS_TESTING,
				A.PIC_LIVE, A.TGL_LIVE_UTCU, A.NOTICE_LIVE, A.TGL_CLOSING FROM TARIF_MASTER_UTCU A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST LEFT JOIN TARIF_STATUS_REQUEST C
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UTCR
	public function utcr()
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN, A.SERVICE,
				A.ATTACHMENT, A.SESSION_REQUEST, A.DESTINATION, A.CHILD, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_UTCR A LEFT JOIN
				ORA_BRANCH B ON A.BRANCH_REQUEST = B.BRANCH_CODE WHERE 
				(A.STATUS_REQUEST = '1' AND A.STATUS_REGIONAL = '1' AND A.STATUS_MPA = '1'
				AND A.STATUS_TESTING = '1') ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_utcr($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.PERUBAHAN, A.NILAI_PERUBAHAN_PERSEN, A.NILAI_PERUBAHAN_RUPIAH,
				A.SERVICE, A.DESTINATION, A.CHILD FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_utcr($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UTCR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_utcr($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_TARIF, C.STATUS_REQUEST AS STATUS_TESTING,
				A.PIC_LIVE, A.TGL_LIVE_UTCR, A.NOTICE_LIVE, A.TGL_CLOSING FROM TARIF_UTCR A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST LEFT JOIN TARIF_STATUS_REQUEST C
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UCR

	public function ucr()
	{
		$sql = "SELECT DISTINCT CREATED, NO_REQUEST, USER_ID, SESSION_REQUEST,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_UCR WHERE (STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_ucr($session)
	{
		$sql = "SELECT DISTINCT NO_REQUEST, USER_ID
				FROM TARIF_UCR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_ucr($session)
	{
		$sql = "SELECT DISTINCT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL, B.STATUS_REQUEST
				FROM TARIF_UCR A LEFT JOIN TARIF_STATUS_REQUEST B ON 
				A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_ucr($session)
	{
		$sql = "SELECT DISTINCT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA, B.STATUS_REQUEST,
				A.TGL_UBAH_CODING, C.STATUS_REQUEST AS STATUS_TESTING,
				A.PIC_LIVE, A.TGL_LIVE_UCR, A.NOTICE_LIVE, A.TGL_CLOSING FROM TARIF_UCR A 
				LEFT JOIN TARIF_STATUS_REQUEST B ON 
				A.STATUS_MPA = B.ID_STATUS_REQUEST LEFT JOIN TARIF_STATUS_REQUEST C
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tdetail_ubah_coding_mpa($session)
	{
		$sql = "SELECT DISTINCT CURRENT_CITY_CODE, MODIF_CITY_CODE, CREATED
                FROM TARIF_UCR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function export_detail_ucr($no_request)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, CURRENT_CITY_CODE, MODIF_CITY_CODE, CREATED
				FROM TARIF_UCR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UZR

	public function uzr()
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, A.CURRENT_ZONE, A.MODIF_ZONE, A.SESSION_REQUEST,
				B.BRANCH_CITY, A.ORIGIN, A.CHILD, A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM
				TARIF_UZR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_CODE = B.BRANCH_CODE WHERE (A.STATUS_REQUEST = '1' AND A.STATUS_REGIONAL = '1'
				AND A.STATUS_MPA = '1' AND A.STATUS_TESTING = '1') 
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_uzr($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, A.CURRENT_ZONE, A.MODIF_ZONE,
				A.ORIGIN, B.BRANCH_CITY, A.CHILD
				FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_uzr($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UZR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_uzr($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UBAH_ZONA, C.STATUS_REQUEST
				AS STATUS_TESTING, A.TGL_LIVE_UZR, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_CLOSING FROM TARIF_UZR A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C 
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//NARR

	public function narr()
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.SESSION_REQUEST, A.CHILD, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_NARR A LEFT JOIN
				ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE WHERE 
				(A.STATUS_REQUEST = '1' AND A.STATUS_REGIONAL = '1' AND
				A.STATUS_MPA = '1' AND A.STATUS_TESTING = '1')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_narr($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN_CODE, A.DESTINATION,
				A.CHILD FROM TARIF_NARR A LEFT JOIN ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_narr($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_NARR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_narr($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA, B.STATUS_REQUEST,
				A.TGL_NON_AKTIF_ROUTING, A.PIC_LIVE, A.NOTICE_LIVE,
				A.TGL_LIVE_NARR, C.STATUS_REQUEST AS STATUS_TESTING,
				A.TGL_CLOSING FROM TARIF_NARR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON
				C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";		
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//NASR

	public function nasr()
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE,
				SESSION_REQUEST, CHILD, ATTACHMENT_REGIONAL, ATTACHMENT_MPA FROM TARIF_NASR WHERE (STATUS_REQUEST = '1' AND
				STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1')
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_nasr($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE,
				CHILD FROM TARIF_NASR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_rerional_nasr($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_NASR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_nasr($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA, B.STATUS_REQUEST,
				A.TGL_NON_AKTIF_SERVICE, A.TGL_LIVE_NASR, A.PIC_LIVE,
				A.NOTICE_LIVE, C.STATUS_REQUEST AS STATUS_TESTING, A.TGL_CLOSING FROM TARIF_NASR A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST 
				LEFT JOIN TARIF_STATUS_REQUEST C
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//PSR

	public function psr($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE,
				TARIF, SESSION_REQUEST FROM TARIF_PSR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND PIC_MPA = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_psr($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE, TARIF
				FROM TARIF_PSR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_psr($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_PSR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_psr($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_PENAMBAHAN_SERVICE FROM TARIF_PSR A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//ASR

	public function asr()
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE,
				SESSION_REQUEST, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_ASR WHERE (STATUS_REQUEST = '1' AND
				STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1') 
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_asr($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE
				FROM TARIF_ASR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_asr($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_ASR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_asr($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_AKTIVASI_SERVICE,
				C.STATUS_REQUEST AS STATUS_TESTING, A.TGL_LIVE_ASR, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_CLOSING FROM TARIF_ASR A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C 
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UTIR
	public function utir()
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, ATTACHMENT,
				SESSION_REQUEST, ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_MASTER_UTIR WHERE (STATUS_REQUEST = '1' AND
				STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1') 
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_utir($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, ORIGIN, ATTACHMENT
				FROM TARIF_MASTER_UTIR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_utir($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_MASTER_UTIR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_utir($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_INTRACITY,
				C.STATUS_REQUEST AS STATUS_TESTING, A.TGL_LIVE_INTRACITY, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_CLOSING FROM TARIF_MASTER_UTIR A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C 
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_no_request_utir($session)
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

	// BTBP
	public function btbp()
	{
		$sql = "SELECT NO_REQUEST, CREATED, USER_ID, ORIGIN,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA, SESSION_REQUEST
				FROM TARIF_MASTER_BTBP
				WHERE (STATUS_REQUEST = '1' AND
				STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1') 
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_btbp($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, ORIGIN FROM TARIF_MASTER_BTBP WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_approve_1_btbp($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_MASTER_BTBP A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_approve_2_btbp($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_BTBP,
				C.STATUS_REQUEST AS STATUS_TESTING, A.TGL_LIVE_BTBP, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_CLOSING FROM TARIF_MASTER_BTBP A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C 
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_no($session)
	{
		$sql = "SELECT NO_REQUEST FROM TARIF_MASTER_BTBP WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_btbp_s($no_request)
	{
		$sql = "SELECT * FROM TARIF_DETAIL_BTBP WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_content_dashboard_mpa.php */
/* Location: ./application/modules/content_dashboard_mpa/models/m_content_dashboard_mpa.php */