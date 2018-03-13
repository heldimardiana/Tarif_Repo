<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ubah_coding_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function ucm()
	{
		$sql = "SELECT DISTINCT CREATED, NO_REQUEST, USER_ID, SESSION_REQUEST, STATUS_MPA,
				STATUS_TESTING, TGL_UBAH_CODING, ATTACHMENT_REGIONAL FROM TARIF_UCR WHERE STATUS_REQUEST = '1'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL ORDER BY CREATED";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_ubah_coding_mpa($session)
	{
		$sql = "SELECT DISTINCT NO_REQUEST, USER_ID
				FROM TARIF_UCR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tdetail_ubah_coding_mpa($session)
	{
		$sql = "SELECT DISTINCT CURRENT_CITY_CODE, MODIF_CITY_CODE, CREATED, USE_TARIF
                FROM TARIF_UCR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
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
		$sql = "SELECT DISTINCT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL, B.STATUS_REQUEST
				FROM TARIF_UCR A LEFT JOIN TARIF_STATUS_REQUEST B ON 
				A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa($session)
	{
		$sql = "SELECT DISTINCT A.PIC_MPA, B.STATUS_REQUEST, A.UPDATE_STATUS_MPA, A.TGL_UBAH_CODING,
				A.NOTICE_MPA FROM TARIF_UCR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//Untuk Testing
	public function save_detail_ubah_coding_mpa($no_request,$status,$user_id,$tgl_ubah_coding,$notice,$attachment)
	{
		$sql = "UPDATE TARIF_UCR SET STATUS_MPA = '$status', PIC_MPA = '".$this->db->escape($user_id)."', UPDATE_STATUS_MPA = SYSDATE,
				TGL_UBAH_CODING = '$tgl_ubah_coding', NOTICE_MPA = '$notice', ATTACHMENT_MPA = '$attachment'
				 WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	//Untuk Live
	public function save_testing_detail_ubah_coding_mpa($no_request, $status, $user_id, $tgl_live_ucr,
									  $tgl_close,$notice,$attachment)
	{
		$sql = "UPDATE TARIF_UCR SET STATUS_TESTING = '$status', TGL_LIVE_UCR = '$tgl_live_ucr',
				PIC_LIVE = '".$this->db->escape($user_id)."', NOTICE_LIVE = '$notice', TGL_APPROVE_TESTING = SYSDATE,
				TGL_CLOSING = '$tgl_close', ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function cek_status_approve($no_request)
	{
		$sql = "SELECT STATUS_MPA FROM TARIF_UCR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function cek_status_testing($no_request)
	{
		$sql = "SELECT STATUS_TESTING FROM TARIF_UCR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function export_detail($no_request)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, CURRENT_CITY_CODE, MODIF_CITY_CODE, CREATED, USE_TARIF
				FROM TARIF_UCR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}


}

/* End of file m_ubah_coding_mpa.php */
/* Location: ./application/modules/ubah_coding_mpa/models/m_ubah_coding_mpa.php */