<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_tarif_cabang_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function data_utcm()
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_REQUEST, A.NILAI_PERUBAHAN_RUPIAH,
				A.NILAI_PERUBAHAN_PERSEN, A.SERVICE, A.ATTACHMENT, A.SESSION_REQUEST, A.DESTINATION,
				A.STATUS_MPA, A.STATUS_TESTING, A.TGL_UPDATE_TARIF, A.CHILD, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_UTCR A
				LEFT JOIN ORA_BRANCH B ON A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.STATUS_REQUEST = '1'
				AND A.STATUS_REGIONAL = '1' AND (A.STATUS_MPA = '1' OR A.STATUS_MPA IS NULL)
				AND A.STATUS_TESTING IS NULL ORDER BY A.CREATED ASC";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_update_tarif_cabang_mpa($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN_REQUEST,
				A.PERUBAHAN, A.NILAI_PERUBAHAN_PERSEN, A.NILAI_PERUBAHAN_RUPIAH,
				A.SERVICE, A.DESTINATION, A.CHILD FROM TARIF_UTCR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tarif_status_request()
	{
		$sql = "SELECT * FROM TARIF_STATUS_REQUEST";
		$query = $this->db->GetArray($sql);
		return $query;
	}


	public function notice_regional($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL, B.STATUS_REQUEST
				FROM TARIF_UTCR A LEFT JOIN TARIF_STATUS_REQUEST B ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function testing_detail_update_tarif_cabang_mpa($session)
	{
		$sql = "SELECT A.PIC_MPA, B.STATUS_REQUEST, A.UPDATE_STATUS_MPA,
				A.TGL_UPDATE_TARIF, A.NOTICE_MPA FROM TARIF_UTCR A
				LEFT JOIN TARIF_STATUS_REQUEST B ON
				A.STATUS_MPA = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//Untuk Testing
	public function save_detail_update_tarif_cabang_mpa($no_request,$status,$user_id,
									  $tgl_update_tarif,$notice,$attachment)
	{
		$sql = "UPDATE TARIF_UTCR SET STATUS_MPA = '$status', PIC_MPA = '".$this->db->escape($user_id)."', 
				UPDATE_STATUS_MPA = SYSDATE, TGL_UPDATE_TARIF = '$tgl_update_tarif',
				NOTICE_MPA = '$notice', ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		
		$query = $this->db->Execute($sql);
		return $query;
	}

	//Untuk Live

	public function save_testing_detail_update_tarif_cabang_mpa($no_request,$status,$notice,$tgl_live_utcr,
									$tgl_close,$user_id,$attachment)
	{
		$sql = "UPDATE TARIF_UTCR SET STATUS_TESTING = '$status', NOTICE_LIVE = '$notice',
				TGL_LIVE_UTCR = '$tgl_live_utcr',TGL_CLOSING = '$tgl_close', PIC_LIVE = '".$this->db->escape($user_id)."',
				TGL_APPROVE_TESTING = SYSDATE, ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function cek_status_approve($no_request)
	{
		$sql = "SELECT STATUS_MPA FROM TARIF_UTCR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function cek_status_testing($no_request)
	{
		$sql = "SELECT STATUS_TESTING FROM TARIF_UTCR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_update_tarif_cabang_mpa.php */
/* Location: ./application/modules/update_tarif_cabang_mpa/models/m_update_tarif_cabang_mpa.php */