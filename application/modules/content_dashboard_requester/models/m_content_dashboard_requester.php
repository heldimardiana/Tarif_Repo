<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_content_dashboard_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	//UTCU
	public function total_utcu_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT,
				STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_MASTER_UTCU
				WHERE USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_utcu_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT,
				STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING, 
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA FROM TARIF_MASTER_UTCU
				WHERE (STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL
				AND STATUS_TESTING IS NULL) AND USER_ID = '".$this->db->escape($user_id)."' 
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_utcu_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT,
				SESSION_REQUEST, STATUS_MPA, STATUS_TESTING, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_MASTER_UTCU
				WHERE STATUS_REGIONAL
				= '1' AND (STATUS_MPA = '1' OR STATUS_MPA IS NULL)
				AND STATUS_TESTING IS NULL AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa_utcu($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, ORIGIN, SERVICE FROM TARIF_MASTER_UTCU
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_no_request($session)
	{
		$sql = "SELECT NO_REQUEST FROM TARIF_MASTER_UTCU WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tdetail_out_mpa_utcu($no_request)
	{
		$sql = "SELECT * FROM TARIF_DETAIL_UTCU WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa_utcu($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_MASTER_UTCU A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_out_mpa_utcu($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_TARIF_CABANG_UTAMA, A.PIC_LIVE,
				A.TGL_LIVE_UTCU, C.STATUS_REQUEST AS STATUS_TESTING, A.NOTICE_LIVE
				FROM TARIF_MASTER_UTCU A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_utcu_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT,
				SESSION_REQUEST, ATTACHMENT_REGIONAL, ATTACHMENT_MPA FROM TARIF_MASTER_UTCU WHERE 
				(STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1') 
				AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_utcu_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT, SESSION_REQUEST, 
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_MASTER_UTCU WHERE (STATUS_REGIONAL = '2' OR STATUS_MPA = '2' OR STATUS_TESTING = '2')
				AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove_utcu($session)
	{
		$sql = "SELECT STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING FROM TARIF_MASTER_UTCU WHERE
				SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UTCR
	public function total_utcr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN, A.SERVICE,
				A.ATTACHMENT, A.STATUS_REGIONAL, A.STATUS_MPA, A.DESTINATION,
				A.STATUS_TESTING, A.CHILD, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_UTCR A
				LEFT JOIN ORA_BRANCH B ON A.BRANCH_REQUEST = B.BRANCH_CODE
				WHERE A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_utcr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN, A.SERVICE,
				A.ATTACHMENT, A.DESTINATION, A.CHILD, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.STATUS_REGIONAL
				IS NULL AND A.STATUS_MPA IS NULL AND A.STATUS_TESTING IS NULL
				AND A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_utcr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN, A.SERVICE,
				A.ATTACHMENT, A.SESSION_REQUEST, A.DESTINATION, A.STATUS_MPA,
				A.STATUS_TESTING, A.CHILD, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.STATUS_REGIONAL
				= '1' AND (A.STATUS_MPA = '1' OR A.STATUS_MPA IS NULL)
				AND A.STATUS_TESTING IS NULL AND A.USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY A.CREATED";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.BRANCH_REQUEST,
				A.ORIGIN_REQUEST, A.PERUBAHAN, A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN,
				A.SERVICE, A.DESTINATION, A.CHILD FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UTCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_out_mpa($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_TARIF FROM TARIF_UTCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_utcr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN, A.SERVICE,
				A.ATTACHMENT, A.SESSION_REQUEST, A.DESTINATION, A.CHILD,
				A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_REQUEST = B.BRANCH_CODE WHERE (A.STATUS_REGIONAL
				= '1' AND A.STATUS_MPA = '1' AND A.STATUS_TESTING = '1' 
				AND A.USER_ID = '".$this->db->escape($user_id)."') ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_approve($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.BRANCH_REQUEST,
				A.ORIGIN_REQUEST, A.PERUBAHAN, A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN,
				A.SERVICE, A.DESTINATION, A.CHILD FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_approve($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UTCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_approve($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_TARIF, C.STATUS_REQUEST AS STATUS_TESTING,
				A.PIC_LIVE, A.TGL_LIVE_UTCR, A.NOTICE_LIVE FROM TARIF_UTCR A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST LEFT JOIN TARIF_STATUS_REQUEST C
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_utcr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN, A.SERVICE,
				A.ATTACHMENT, A.SESSION_REQUEST, A.DESTINATION, A.CHILD,
				A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_REQUEST = B.BRANCH_CODE WHERE (A.STATUS_REGIONAL
				= '2' OR A.STATUS_MPA = '2' OR A.STATUS_TESTING = '2') AND A.USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_unapprove($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.BRANCH_REQUEST,
				A.ORIGIN_REQUEST, A.PERUBAHAN, A.NILAI_PERUBAHAN_RUPIAH, A.NILAI_PERUBAHAN_PERSEN,
				A.SERVICE, A.DESTINATION, A.CHILD FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_unapprove($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UTCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_unapprove($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_TARIF, C.STATUS_REQUEST AS STATUS_TESTING,
				A.PIC_LIVE, A.TGL_LIVE_UTCR, A.NOTICE_LIVE FROM TARIF_UTCR A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST LEFT JOIN TARIF_STATUS_REQUEST C
				ON C.ID_STATUS_REQUEST = A.STATUS_TESTING WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove($session)
	{
		$sql = "SELECT STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING FROM TARIF_UTCR WHERE
				SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UCR
	public function total_ucr_req($user_id)
	{
		$sql = "SELECT DISTINCT CREATED, NO_REQUEST, ATTACHMENT_REGIONAL, ATTACHMENT_MPA,
				SESSION_REQUEST, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING, USER_ID
				FROM TARIF_UCR WHERE USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_ucr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ATTACHMENT_REGIONAL, ATTACHMENT_MPA,
				USER_ID
				FROM TARIF_UCR WHERE STATUS_REGIONAL IS NULL AND
				STATUS_MPA IS NULL AND STATUS_TESTING IS NULL AND
				USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_ucr_req($user_id)
	{
		$sql = "SELECT DISTINCT CREATED, NO_REQUEST, USER_ID, ATTACHMENT_REGIONAL, ATTACHMENT_MPA,
				SESSION_REQUEST, STATUS_MPA, STATUS_TESTING
				FROM TARIF_UCR WHERE STATUS_REGIONAL = '1' AND
				(STATUS_MPA IS NULL OR STATUS_MPA = '1') AND STATUS_TESTING IS NULL
				AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa_ucr($session)
	{
		$sql = "SELECT DISTINCT NO_REQUEST, USER_ID
				FROM TARIF_UCR WHERE SESSION_REQUEST = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa_ucr($session)
	{
		$sql = "SELECT DISTINCT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function testing_detail_out_mpa_ucr($session)
	{
		$sql = "SELECT DISTINCT A.PIC_MPA, B.STATUS_REQUEST, A.UPDATE_STATUS_MPA,
				A.TGL_UBAH_CODING, A.NOTICE_MPA FROM TARIF_UCR A
				LEFT JOIN TARIF_STATUS_REQUEST B ON
				A.STATUS_MPA = B.ID_STATUS_REQUEST WHERE
				A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_ucr_req($user_id)
	{
		$sql = "SELECT DISTINCT CREATED, NO_REQUEST, USER_ID, ATTACHMENT_REGIONAL, ATTACHMENT_MPA,
				SESSION_REQUEST FROM TARIF_UCR WHERE (STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1') AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_approve_ucr_req($session)
	{
		$sql = "SELECT DISTINCT NO_REQUEST, USER_ID
				FROM TARIF_UCR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_approve_ucr_req($session)
	{
		$sql = "SELECT DISTINCT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_approve_ucr_req($session)
	{
		$sql = "SELECT DISTINCT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UBAH_CODING, C.STATUS_REQUEST
				AS STATUS_TESTING, A.PIC_LIVE, A.TGL_LIVE_UCR,
				A.NOTICE_LIVE FROM TARIF_UCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON
				C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_ucr_req($user_id)
	{
		$sql = "SELECT DISTINCT CREATED, NO_REQUEST, USER_ID, ATTACHMENT_REGIONAL, ATTACHMENT_MPA,
				SESSION_REQUEST FROM TARIF_UCR WHERE (STATUS_REGIONAL = '2' OR
				STATUS_MPA = '2' OR STATUS_TESTING = '2') AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_unapprove_ucr_req($session)
	{
		$sql = "SELECT DISTINCT NO_REQUEST, USER_ID
				FROM TARIF_UCR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_unapprove_ucr_req($session)
	{
		$sql = "SELECT DISTINCT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_unapprove_ucr_req($session)
	{
		$sql = "SELECT DISTINCT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UBAH_CODING, C.STATUS_REQUEST
				AS STATUS_TESTING, A.PIC_LIVE, A.NOTICE_LIVE FROM TARIF_UCR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST
				= A.STATUS_TESTING WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove_ucr_req($session)
	{
		$sql = "SELECT DISTINCT STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING FROM TARIF_UCR WHERE
				SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tdetail_ubah_coding_requester($session)
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
	public function total_uzr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.SESSION_REQUEST,
				A.STATUS_REGIONAL, A.STATUS_MPA, A.STATUS_TESTING, A.CHILD,
				A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM
				TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE
				WHERE A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_uzr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.SESSION_REQUEST, 
				A.STATUS_REGIONAL, A.STATUS_MPA, A.STATUS_TESTING, A.CHILD,
				A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM
				TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE WHERE A.STATUS_REGIONAL IS NULL AND 
				A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_uzr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.SESSION_REQUEST, 
				A.STATUS_REGIONAL, A.STATUS_MPA, A.STATUS_TESTING, A.CHILD,
				A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM
				TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE WHERE A.STATUS_REGIONAL = '1' AND 
				(A.STATUS_MPA IS NULL OR A.STATUS_MPA = '1') AND
				A.STATUS_TESTING IS NULL AND
				A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa_uzr_req($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.CHILD
				FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE 
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa_uzr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UZR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_uzr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.SESSION_REQUEST, 
				A.STATUS_REGIONAL, A.STATUS_MPA, A.STATUS_TESTING, A.CHILD,
				A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM
				TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE 
				WHERE (A.STATUS_REGIONAL = '1' 
				AND A.STATUS_MPA = '1' 
				AND A.STATUS_TESTING = '1') 
				AND A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_approve_uzr_req($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.CHILD
				FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE 
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_approve_uzr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UZR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_approve_uzr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UBAH_ZONA, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_UZR, C.STATUS_REQUEST AS
				STATUS_TESTING FROM TARIF_UZR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_uzr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.SESSION_REQUEST, 
				A.STATUS_REGIONAL, A.STATUS_MPA, A.STATUS_TESTING, A.CHILD,
				A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM
				TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE 
				WHERE (A.STATUS_REGIONAL = '2' 
				OR A.STATUS_MPA = '2' 
				OR A.STATUS_TESTING = '2') 
				AND A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_unapprove_uzr_req($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN,
				A.CURRENT_ZONE, A.MODIF_ZONE, A.CHILD
				FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE 
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_unapprove_uzr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UZR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_unapprove_uzr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UBAH_ZONA, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_UZR, C.STATUS_REQUEST AS
				STATUS_TESTING FROM TARIF_UZR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove_uzr_req($session)
	{
		$sql = "SELECT STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING FROM TARIF_UZR
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//NARR
	public function total_narr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.SESSION_REQUEST, A.STATUS_REGIONAL,
				A.STATUS_MPA, A.STATUS_TESTING, A.CHILD, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_NARR A LEFT JOIN
				ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE WHERE
				A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_narr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.SESSION_REQUEST, A.STATUS_REGIONAL,
				A.STATUS_MPA, A.CHILD, A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA
				FROM TARIF_NARR A LEFT JOIN
				ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE WHERE
				A.STATUS_REGIONAL IS NULL AND A.USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_narr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.SESSION_REQUEST, A.STATUS_REGIONAL,
				A.STATUS_MPA, A.CHILD, A.STATUS_TESTING, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_NARR A LEFT JOIN
				ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE WHERE
				A.STATUS_REGIONAL = '1' AND (A.STATUS_MPA IS NULL OR 
				A.STATUS_MPA = '1') AND A.STATUS_TESTING IS NULL AND
				A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa_narr_req($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY,
				A.ORIGIN_CODE, A.DESTINATION, A.CHILD FROM TARIF_NARR A
				LEFT JOIN ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa_narr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_NARR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_narr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.SESSION_REQUEST, A.STATUS_REGIONAL,
				A.STATUS_MPA, A.CHILD, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_NARR A LEFT JOIN
				ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE WHERE
				(A.STATUS_REGIONAL = '1'AND A.STATUS_MPA = '1' AND 
				A.STATUS_TESTING = '1') AND A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_approve_narr_req($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY,
				A.ORIGIN_CODE, A.DESTINATION, A.CHILD FROM TARIF_NARR A
				LEFT JOIN ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_approve_narr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_NARR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_approve_narr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_NON_AKTIF_ROUTING, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_NARR, C.STATUS_REQUEST AS STATUS_TESTING
				FROM TARIF_NARR A 
				LEFT JOIN TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_narr_req($user_id)
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.SESSION_REQUEST, A.STATUS_REGIONAL, A.STATUS_MPA,
				A.STATUS_TESTING, A.CHILD, A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM TARIF_NARR A LEFT JOIN
				ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE WHERE
				(A.STATUS_REGIONAL = '2' OR A.STATUS_MPA = '2' OR A.STATUS_TESTING = '2')
				AND A.USER_ID = '".$this->db->escape($user_id)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_unapprove_narr_req($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.CHILD FROM TARIF_NARR A LEFT JOIN ORA_BRANCH B
				ON A.BRANCH_CODE = B.BRANCH_CODE WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove_narr_req($session)
	{
		$sql = "SELECT STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING FROM TARIF_NARR WHERE 
				SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_unapprove_narr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_NARR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_unapprove_narr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_NON_AKTIF_ROUTING, A.PIC_LIVE,
				A.NOTICE_LIVE, C.STATUS_REQUEST AS STATUS_TESTING FROM TARIF_NARR A 
				LEFT JOIN TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//NASR
	public function total_nasr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, SESSION_REQUEST, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING,
				CHILD, ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_NASR WHERE USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_nasr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, SESSION_REQUEST, STATUS_REGIONAL, STATUS_MPA, CHILD,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_NASR WHERE STATUS_REGIONAL IS NULL AND 
				USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_nasr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, SESSION_REQUEST, STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING,
				CHILD, ATTACHMENT_REGIONAL, ATTACHMENT_MPA FROM TARIF_NASR WHERE STATUS_REGIONAL = '1' AND 
				(STATUS_MPA IS NULL OR STATUS_MPA = '1') 
				AND STATUS_TESTING IS NULL AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa_nasr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, CHILD FROM TARIF_NASR WHERE
				SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa_nasr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_NASR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_nasr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, SESSION_REQUEST, STATUS_REGIONAL, STATUS_MPA, CHILD,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_NASR WHERE (STATUS_REGIONAL = '1' AND 
				STATUS_MPA = '1' AND STATUS_TESTING = '1') AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_approve_nasr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, CHILD FROM TARIF_NASR WHERE
				SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_approve_nasr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_NASR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_approve_nasr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_NON_AKTIF_SERVICE, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_NASR, C.STATUS_REQUEST
				AS STATUS_TESTING FROM TARIF_NASR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON
				C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_nasr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, SESSION_REQUEST, STATUS_REGIONAL, STATUS_MPA, CHILD,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_NASR WHERE (STATUS_REGIONAL = '2' OR 
				STATUS_MPA = '2' OR STATUS_TESTING = '2') AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_unapprove_nasr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, STATUS_REGIONAL, STATUS_MPA, CHILD FROM TARIF_NASR
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove_nasr_req($session)
	{
		$sql = "SELECT STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING FROM TARIF_NASR WHERE
				SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_unapprove_nasr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_NASR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_unapprove_nasr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_NON_AKTIF_SERVICE, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_NASR, C.STATUS_REQUEST
				AS STATUS_TESTING FROM TARIF_NASR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON
				C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//PSR
	public function total_psr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, TARIF, STATUS_REGIONAL, STATUS_MPA, SESSION_REQUEST
				FROM TARIF_PSR WHERE USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_psr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, TARIF, STATUS_REGIONAL, STATUS_MPA, SESSION_REQUEST
				FROM TARIF_PSR WHERE STATUS_REGIONAL IS NULL AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_psr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, TARIF, STATUS_REGIONAL, STATUS_MPA, SESSION_REQUEST
				FROM TARIF_PSR WHERE STATUS_REGIONAL = '1' AND STATUS_MPA
				IS NULL AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa_psr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, TARIF FROM TARIF_PSR
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa_psr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_PSR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_psr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, TARIF, STATUS_REGIONAL, STATUS_MPA, SESSION_REQUEST
				FROM TARIF_PSR WHERE STATUS_REGIONAL = '1' AND STATUS_MPA
				= '1' AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_approve_psr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, TARIF FROM TARIF_PSR
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_approve_psr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_PSR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_approve_psr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_PENAMBAHAN_SERVICE FROM TARIF_PSR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_psr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, TARIF, STATUS_REGIONAL, STATUS_MPA, SESSION_REQUEST
				FROM TARIF_PSR WHERE STATUS_REGIONAL = '2' OR STATUS_MPA
				= '2' AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_unapprove_psr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, TARIF FROM TARIF_PSR
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove_psr_req($session)
	{
		$sql = "SELECT STATUS_REGIONAL, STATUS_MPA FROM TARIF_PSR
				WHERE STATUS_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_unapprove_psr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_PSR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_unapprove_psr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_PENAMBAHAN_SERVICE FROM TARIF_PSR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//ASR
	public function total_asr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, STATUS_REGIONAL, STATUS_MPA,
				SESSION_REQUEST, STATUS_TESTING, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_ASR
				WHERE USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_asr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, STATUS_REGIONAL, STATUS_MPA,
				SESSION_REQUEST, STATUS_TESTING, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_ASR WHERE STATUS_REGIONAL
				IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL
				AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_asr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, STATUS_REGIONAL, STATUS_MPA,
				SESSION_REQUEST, STATUS_TESTING, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_ASR WHERE STATUS_REGIONAL
				= '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa_asr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE, STATUS_MPA, STATUS_TESTING FROM TARIF_ASR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa_asr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_ASR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_asr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, STATUS_REGIONAL, STATUS_MPA,
				SESSION_REQUEST, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_ASR WHERE (STATUS_REGIONAL
				= '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1')
				AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_approve_asr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE FROM TARIF_ASR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_approve_asr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_ASR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_approve_asr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_AKTIVASI_SERVICE, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_ASR, C.STATUS_REQUEST AS
				STATUS_TESTING FROM TARIF_ASR A 
				LEFT JOIN TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_asr_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN,
				DESTINATION, SERVICE, STATUS_REGIONAL, STATUS_MPA,
				SESSION_REQUEST, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_ASR WHERE (STATUS_REGIONAL
				= '2' OR STATUS_MPA = '2' OR STATUS_TESTING = '2')
				AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_unapprove_asr_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION,
				SERVICE FROM TARIF_ASR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove_asr_req($session)
	{
		$sql = "SELECT STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING 
				FROM TARIF_ASR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_unapprove_asr_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_ASR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_unapprove_asr_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_AKTIVASI_SERVICE, A.PIC_LIVE,
				A.NOTICE_LIVE, C.STATUS_REQUEST AS STATUS_TESTING FROM TARIF_ASR A 
				LEFT JOIN TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UTIR
	public function total_utir_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, ATTACHMENT,
				STATUS_REGIONAL, STATUS_MPA, SESSION_REQUEST, 
				STATUS_TESTING, ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_MASTER_UTIR
				WHERE USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_utir_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, ATTACHMENT,
				STATUS_REGIONAL, STATUS_MPA, SESSION_REQUEST, STATUS_TESTING,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA 
				FROM TARIF_MASTER_UTIR WHERE (STATUS_REGIONAL
				IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL)
				AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function out_mpa_utir_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, ATTACHMENT,
				STATUS_REGIONAL, STATUS_MPA,
				SESSION_REQUEST, STATUS_TESTING,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_MASTER_UTIR WHERE STATUS_REGIONAL
				= '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function approve_utir_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, ATTACHMENT,
				STATUS_REGIONAL, STATUS_MPA,
				SESSION_REQUEST, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_MASTER_UTIR WHERE (STATUS_REGIONAL
				= '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1')
				AND USER_ID = '".$this->db->escape($user_id)."'
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function unapprove_utir_req($user_id)
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, ATTACHMENT,
				STATUS_REGIONAL, STATUS_MPA,
				SESSION_REQUEST, ATTACHMENT_REGIONAL,
				ATTACHMENT_MPA FROM TARIF_MASTER_UTIR WHERE (STATUS_REGIONAL
				= '2' OR STATUS_MPA = '2' OR STATUS_TESTING = '2')
				AND USER_ID = '".$this->db->escape($user_id)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_out_mpa_utir_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, ORIGIN
				FROM TARIF_MASTER_UTIR 
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_out_mpa_utir_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_MASTER_UTIR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
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

	public function notice_mpa_detail_approve_utir_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_INTRACITY, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_INTRACITY, C.STATUS_REQUEST AS
				STATUS_TESTING FROM TARIF_MASTER_UTIR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_approve_utir_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, ORIGIN
				FROM TARIF_MASTER_UTIR 
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_approve_utir_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_MASTER_UTIR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_approve_utir_req_2($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_INTRACITY, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_INTRACITY, C.STATUS_REQUEST AS
				STATUS_TESTING FROM TARIF_MASTER_UTIR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_unapprove_utir_req($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, ORIGIN
				FROM TARIF_MASTER_UTIR 
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional_detail_unapprove_utir_req($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_MASTER_UTIR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa_detail_unapprove_utir_req($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_INTRACITY, A.PIC_LIVE,
				A.NOTICE_LIVE, A.TGL_LIVE_INTRACITY, C.STATUS_REQUEST AS
				STATUS_TESTING FROM TARIF_MASTER_UTIR A LEFT JOIN 
				TARIF_STATUS_REQUEST B ON A.STATUS_MPA = B.ID_STATUS_REQUEST
				LEFT JOIN TARIF_STATUS_REQUEST C ON C.ID_STATUS_REQUEST = A.STATUS_TESTING
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_detail_unapprove_utir_req($session)
	{
		$sql = "SELECT STATUS_REGIONAL, STATUS_MPA, STATUS_TESTING FROM TARIF_MASTER_UTIR
				WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_content_dashboard_requester.php */
/* Location: ./application/modules/content_dashboard_requester/models/m_content_dashboard_requester.php */