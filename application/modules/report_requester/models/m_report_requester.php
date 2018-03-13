<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function report_utcu($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, STATUS_REGIONAL,
				STATUS_MPA, STATUS_TESTING, PIC_REGIONAL, PIC_MPA, PIC_LIVE,
				UPDATE_STATUS_REGIONAL, UPDATE_STATUS_MPA, TGL_UPDATE_TARIF_CABANG_UTAMA,
				TGL_LIVE_UTCU FROM TARIF_MASTER_UTCU WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_report_utcu($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, STATUS_REGIONAL,
				STATUS_MPA, STATUS_TESTING, PIC_REGIONAL, PIC_MPA, PIC_LIVE,
				UPDATE_STATUS_REGIONAL, UPDATE_STATUS_MPA, TGL_UPDATE_TARIF_CABANG_UTAMA,
				TGL_LIVE_UTCU FROM TARIF_MASTER_UTCU WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function report_utcr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.DESTINATION, A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN,
				A.SERVICE, A.STATUS_REGIONAL, A.STATUS_MPA, A.STATUS_TESTING,
				A.PIC_REGIONAL, A.PIC_MPA, A.PIC_LIVE, A.UPDATE_STATUS_REGIONAL,
				A.UPDATE_STATUS_MPA, A.TGL_UPDATE_TARIF, A.TGL_LIVE_UTCR, A.CHILD
				FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(A.CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_report_utcr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST, A.DESTINATION,
				A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN, A.SERVICE,
				A.CREATED, C.STATUS_REQUEST, A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL,
				A.NOTICE_REGIONAL, D.STATUS_REQUEST AS STATUS_MPA, A.PIC_MPA,
				A.UPDATE_STATUS_MPA, A.NOTICE_MPA, A.TGL_UPDATE_TARIF,
				E.STATUS_REQUEST AS STATUS_TESTING, A.TGL_LIVE_UTCR, A.CHILD
				FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_REQUEST = B.BRANCH_CODE
				LEFT JOIN TARIF_STATUS_REQUEST C ON
				C.ID_STATUS_REQUEST = A.STATUS_REGIONAL
				LEFT JOIN TARIF_STATUS_REQUEST D ON
				D.ID_STATUS_REQUEST = A.STATUS_MPA
				LEFT JOIN TARIF_STATUS_REQUEST E ON 
				E.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.USER_ID = '".$this->db->escape($user_id)."' AND TRUNC(A.CREATED)
				BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function report_ucr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT DISTINCT A.CREATED, A.NO_REQUEST, A.CURRENT_CITY_CODE, A.MODIF_CITY_CODE,
				B.STATUS_REQUEST AS STATUS_REGIONAL, C.STATUS_REQUEST AS STATUS_MPA,
				D.STATUS_REQUEST AS STATUS_TESTING , A.PIC_REGIONAL, A.PIC_MPA,
				A.PIC_LIVE, A.UPDATE_STATUS_REGIONAL, A.UPDATE_STATUS_MPA,
				A.TGL_UBAH_CODING, A.TGL_LIVE_UCR FROM TARIF_UCR A 
				LEFT JOIN TARIF_STATUS_REQUEST B ON
				A.STATUS_REGIONAL = B.ID_STATUS_REQUEST LEFT JOIN
				TARIF_STATUS_REQUEST C ON
				C.ID_STATUS_REQUEST = A.STATUS_MPA LEFT JOIN
				TARIF_STATUS_REQUEST D ON 
				D.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(A.CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_report_ucr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT DISTINCT A.CREATED, A.NO_REQUEST, A.CURRENT_CITY_CODE, A.MODIF_CITY_CODE,
				B.STATUS_REQUEST AS STATUS_REGIONAL, C.STATUS_REQUEST AS STATUS_MPA,
				D.STATUS_REQUEST AS STATUS_TESTING , A.PIC_REGIONAL, A.PIC_MPA,
				A.PIC_LIVE, A.UPDATE_STATUS_REGIONAL, A.UPDATE_STATUS_MPA,
				A.NOTICE_REGIONAL, A.NOTICE_MPA,
				A.TGL_UBAH_CODING, A.TGL_LIVE_UCR FROM TARIF_UCR A 
				LEFT JOIN TARIF_STATUS_REQUEST B ON
				A.STATUS_REGIONAL = B.ID_STATUS_REQUEST LEFT JOIN
				TARIF_STATUS_REQUEST C ON
				C.ID_STATUS_REQUEST = A.STATUS_MPA LEFT JOIN
				TARIF_STATUS_REQUEST D ON 
				D.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(A.CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function report_uzr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.STATUS_REGIONAL,
				A.STATUS_MPA, A.STATUS_TESTING, A.PIC_REGIONAL,
				A.PIC_MPA, A.PIC_LIVE, A.UPDATE_STATUS_REGIONAL,
				A.UPDATE_STATUS_MPA, A.NOTICE_REGIONAL, A.NOTICE_MPA,
				A.TGL_UBAH_ZONA, A.TGL_LIVE_UZR, A.CHILD
				FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_CODE = B.BRANCH_CODE WHERE A.USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(A.CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_report_uzr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.STATUS_REGIONAL,
				A.STATUS_MPA, A.STATUS_TESTING, A.PIC_REGIONAL,
				A.PIC_MPA, A.PIC_LIVE, A.UPDATE_STATUS_REGIONAL,
				A.UPDATE_STATUS_MPA, A.NOTICE_REGIONAL, A.NOTICE_MPA,
				A.TGL_UBAH_ZONA, A.TGL_LIVE_UZR, A.CHILD
				FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_CODE = B.BRANCH_CODE WHERE A.USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(A.CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function report_narr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.CHILD, A.STATUS_REGIONAL, A.STATUS_MPA,
				A.STATUS_TESTING, A.PIC_REGIONAL, A.PIC_MPA, A.PIC_LIVE,
				A.UPDATE_STATUS_REGIONAL, A.UPDATE_STATUS_MPA,
				A.TGL_NON_AKTIF_ROUTING, A.TGL_LIVE_NARR
				FROM TARIF_NARR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_CODE = B.BRANCH_CODE WHERE A.USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(A.CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_report_narr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.CHILD, A.STATUS_REGIONAL, A.STATUS_MPA,
				A.STATUS_TESTING, A.PIC_REGIONAL, A.PIC_MPA, A.PIC_LIVE,
				A.UPDATE_STATUS_REGIONAL, A.UPDATE_STATUS_MPA,
				A.NOTICE_REGIONAL, A.NOTICE_MPA,
				A.TGL_NON_AKTIF_ROUTING, A.TGL_LIVE_NARR
				FROM TARIF_NARR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_CODE = B.BRANCH_CODE WHERE A.USER_ID = '".$this->db->escape($user_id)."'
				AND TRUNC(A.CREATED) BETWEEN TO_DATE('$date_from','YYYY/MM/DD')
				AND TO_DATE('$date_thru','YYYY/MM/DD')
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function report_nasr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				CHILD, SERVICE, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING,
				PIC_REGIONAL, PIC_MPA, PIC_LIVE, UPDATE_STATUS_REGIONAL,
				UPDATE_STATUS_MPA, TGL_NON_AKTIF_SERVICE, TGL_LIVE_NASR
				FROM TARIF_NASR WHERE USER_ID = '".$this->db->escape($user_id)."' AND TRUNC(CREATED)
				BETWEEN TO_DATE('$date_from','YYYY/MM/DD') AND
				TO_DATE('$date_thru','YYYY/MM/DD') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_report_nasr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				CHILD, SERVICE, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING,
				PIC_REGIONAL, PIC_MPA, PIC_LIVE, UPDATE_STATUS_REGIONAL,
				NOTICE_REGIONAL, NOTICE_MPA,
				UPDATE_STATUS_MPA, TGL_NON_AKTIF_SERVICE, TGL_LIVE_NASR
				FROM TARIF_NASR WHERE USER_ID = '".$this->db->escape($user_id)."' AND TRUNC(CREATED)
				BETWEEN TO_DATE('$date_from','YYYY/MM/DD') AND
				TO_DATE('$date_thru','YYYY/MM/DD') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function report_asr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING,
				PIC_REGIONAL, PIC_MPA, PIC_LIVE, UPDATE_STATUS_REGIONAL,
				UPDATE_STATUS_MPA, TGL_AKTIVASI_SERVICE, TGL_LIVE_ASR
				FROM TARIF_ASR WHERE USER_ID = '".$this->db->escape($user_id)."' AND TRUNC(CREATED)
				BETWEEN TO_DATE('$date_from','YYYY/MM/DD') AND
				TO_DATE('$date_thru','YYYY/MM/DD') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_report_asr($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING,
				PIC_REGIONAL, PIC_MPA, PIC_LIVE, UPDATE_STATUS_REGIONAL,
				NOTICE_REGIONAL, NOTICE_MPA,
				UPDATE_STATUS_MPA, TGL_AKTIVASI_SERVICE, TGL_LIVE_ASR
				FROM TARIF_ASR WHERE USER_ID = '".$this->db->escape($user_id)."' AND TRUNC(CREATED)
				BETWEEN TO_DATE('$date_from','YYYY/MM/DD') AND
				TO_DATE('$date_thru','YYYY/MM/DD') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function report_uti($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING,
				PIC_REGIONAL, PIC_MPA, PIC_LIVE, UPDATE_STATUS_REGIONAL, UPDATE_STATUS_MPA,
				NOTICE_REGIONAL, NOTICE_MPA, TGL_UPDATE_INTRACITY, TGL_LIVE_INTRACITY
				FROM TARIF_MASTER_UTIR WHERE USER_ID = '".$this->db->escape($user_id)."' AND TRUNC(CREATED)
				BETWEEN TO_DATE('$date_from','YYYY/MM/DD') AND
				TO_DATE('$date_thru','YYYY/MM/DD') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function print_report_uti($date_from,$date_thru,$user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING,
				PIC_REGIONAL, PIC_MPA, PIC_LIVE, UPDATE_STATUS_REGIONAL, UPDATE_STATUS_MPA,
				NOTICE_REGIONAL, NOTICE_MPA, TGL_UPDATE_INTRACITY, TGL_LIVE_INTRACITY
				FROM TARIF_MASTER_UTIR WHERE USER_ID = '".$this->db->escape($user_id)."' AND TRUNC(CREATED)
				BETWEEN TO_DATE('$date_from','YYYY/MM/DD') AND
				TO_DATE('$date_thru','YYYY/MM/DD') ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}


}

/* End of file m_report_requester.php */
/* Location: ./application/modules/report_requester/models/m_report_requester.php */