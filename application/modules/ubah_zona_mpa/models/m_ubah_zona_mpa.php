<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ubah_zona_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function uzm()
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN, A.CURRENT_ZONE,
				A.MODIF_ZONE, A.SESSION_REQUEST, A.STATUS_MPA, A.STATUS_TESTING, A.CHILD, A.TGL_UBAH_ZONA,
				A.ATTACHMENT_REGIONAL, A.ATTACHMENT_MPA FROM TARIF_UZR A 
				LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_CODE = B.BRANCH_CODE 
				WHERE A.STATUS_REQUEST = '1' AND
				A.STATUS_REGIONAL = '1' AND (A.STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL ORDER BY A.CREATED ASC";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_ubah_zona_mpa($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.CURRENT_ZONE, A.MODIF_ZONE,
				A.ORIGIN, A.CHILD FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_UZR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tarif_status_request()
	{
		$sql = "SELECT * FROM TARIF_STATUS_REQUEST";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_mpa($session)
	{
		$sql = "SELECT A.PIC_MPA, B.STATUS_REQUEST, A.UPDATE_STATUS_MPA, A.TGL_UBAH_ZONA,
				A.NOTICE_MPA FROM TARIF_UZR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_detail_ubah_zona_mpa($no_request,$status,$user_id,$tgl_ubah_zona,$notice,$attachment)
	{
		$sql = "UPDATE TARIF_UZR SET STATUS_MPA = '$status', PIC_MPA = '".$this->db->escape($user_id)."',
				UPDATE_STATUS_MPA = SYSDATE, TGL_UBAH_ZONA = '$tgl_ubah_zona',
				NOTICE_MPA = '$notice', ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function save_testing_detail_ubah_zona_mpa($no_request,$status,$notice,$tgl_live,$tgl_close,$user_id,$attachment)
	{
		$sql = "UPDATE TARIF_UZR SET STATUS_TESTING = '$status', TGL_LIVE_UZR = '$tgl_live',
				PIC_LIVE = '".$this->db->escape($user_id)."', NOTICE_LIVE = '$notice', TGL_APPROVE_TESTING = SYSDATE,
				TGL_CLOSING = '$tgl_close', ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function cek_status_approve($no_request)
	{
		$sql = "SELECT STATUS_MPA FROM TARIF_UZR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}
	
	public function cek_status_testing($no_request)
	{
		$sql = "SELECT STATUS_TESTING FROM TARIF_UZR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_ubah_zona_mpa.php */
/* Location: ./application/modules/ubah_zona_mpa/models/m_ubah_zona_mpa.php */