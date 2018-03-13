<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_tarif_cabang_utama_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function data_utcu()
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT,
				SESSION_REQUEST, STATUS_MPA, STATUS_TESTING, TGL_UPDATE_TARIF_CABANG_UTAMA,
				ATTACHMENT_REGIONAL, ATTACHMENT_MPA
				FROM TARIF_MASTER_UTCU WHERE (STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1') AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_update_tarif_cabang_utama_mpa($session)
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

	public function tdetail_update_tarif_cabang_utama_mpa($no_request)
	{
		$sql = "SELECT * FROM TARIF_DETAIL_UTCU WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function status_proses()
	{
		$sql = "SELECT * FROM TARIF_STATUS_REQUEST";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_regional($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_MASTER_UTCU A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.NOTICE_MPA,
				B.STATUS_REQUEST, A.TGL_UPDATE_TARIF_CABANG_UTAMA FROM TARIF_MASTER_UTCU A 
				LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//Testing
	public function save_detail_update_tarif_cabang_utama_mpa($no_request,
								  $status, $user_id, $notice, $tgl_update_tarif_cabang_utama, $attachment)
	{
		$sql = "UPDATE TARIF_MASTER_UTCU SET STATUS_MPA = '$status', PIC_MPA = '".$this->db->escape($user_id)."',
				UPDATE_STATUS_MPA = SYSDATE, TGL_UPDATE_TARIF_CABANG_UTAMA = '$tgl_update_tarif_cabang_utama',
				NOTICE_MPA = '$notice', ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	//Live
	public function save_testing_detail_update_tarif_cabang_utama_mpa(
									$no_request, $status, $user_id, $notice, $tgl_live_utcu, $tgl_close, $attachment
								  )
	{
		$sql = "UPDATE TARIF_MASTER_UTCU SET STATUS_TESTING = '$status', TGL_LIVE_UTCU = '$tgl_live_utcu',
				PIC_LIVE = '".$this->db->escape($user_id)."', NOTICE_LIVE = '$notice', TGL_APPROVE_TESTING = SYSDATE,
				TGL_CLOSING = '$tgl_close', ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function cek_status_approve($no_request)
	{
		$sql = "SELECT STATUS_MPA FROM TARIF_MASTER_UTCU WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function cek_status_testing($no_request)
	{
		$sql = "SELECT STATUS_TESTING FROM TARIF_MASTER_UTCU WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_update_tarif_cabang_utama_mpa.php */
/* Location: ./application/modules/update_tarif_cabang_utama_mpa/models/m_update_tarif_cabang_utama_mpa.php */