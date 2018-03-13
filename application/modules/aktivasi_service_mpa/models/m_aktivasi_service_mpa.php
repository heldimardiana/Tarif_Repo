<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aktivasi_service_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function asm()
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE,
				SESSION_REQUEST, STATUS_MPA, STATUS_TESTING, TGL_AKTIVASI_SERVICE,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA FROM TARIF_ASR 
				WHERE STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1'
				AND (STATUS_MPA IS NULL OR STATUS_MPA = '1') AND STATUS_TESTING
				IS NULL ORDER BY CREATED ASC";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_aktivasi_service_mpa($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE
				FROM TARIF_ASR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tarif_status_request()
	{
		$sql = "SELECT * FROM TARIF_STATUS_REQUEST";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_ASR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_detail_aktivasi_service_mpa($no_request,$status,$user_id,$tgl_aktivasi_service,
								  $notice,$attachment)
	{
		$sql = "UPDATE TARIF_ASR SET STATUS_MPA = '$status', PIC_MPA = '".$this->db->escape($user_id)."', UPDATE_STATUS_MPA
				= SYSDATE, TGL_AKTIVASI_SERVICE = '$tgl_aktivasi_service', NOTICE_MPA = '$notice',
				ATTACHMENT_MPA = '$attachment'
				WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function testing_detail_aktivasi_service_mpa($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, B.STATUS_REQUEST, A.TGL_AKTIVASI_SERVICE,
				A.NOTICE_MPA FROM TARIF_ASR A LEFT JOIN TARIF_STATUS_REQUEST B ON
				A.STATUS_MPA = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_testing_detail_aktivasi_service_mpa($no_request, $status, $notice, $tgl_live_asr, $tgl_close, $user_id,$attachment)
	{
		$sql = "UPDATE TARIF_ASR SET STATUS_TESTING = '$status', NOTICE_LIVE = '$notice',
				TGL_LIVE_ASR = '$tgl_live_asr', TGL_CLOSING = '$tgl_close', PIC_LIVE = '".$this->db->escape($user_id)."', 
				TGL_APPROVE_TESTING = SYSDATE, ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function cek_status_approve($no_request)
	{
		$sql = "SELECT STATUS_MPA FROM TARIF_ASR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function cek_status_testing($no_request)
	{
		$sql = "SELECT STATUS_TESTING FROM TARIF_ASR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_aktivasi_service_mpa.php */
/* Location: ./application/modules/aktivasi_service_mpa/models/m_aktivasi_service_mpa.php */