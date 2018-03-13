<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_non_aktif_routing_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function narm()
	{
		$sql = "SELECT A.CREATED, A.NO_REQUEST, B.BRANCH_CITY, A.ORIGIN_CODE,
				A.DESTINATION, A.SESSION_REQUEST, A.STATUS_MPA, A.STATUS_TESTING,
				A.CHILD, A.TGL_NON_AKTIF_ROUTING, A.ATTACHMENT_REGIONAL,
				A.ATTACHMENT_MPA FROM TARIF_NARR A LEFT JOIN ORA_BRANCH B 
				ON A.BRANCH_CODE = B.BRANCH_CODE WHERE A.STATUS_REQUEST = '1'
				AND A.STATUS_REGIONAL = '1' AND (A.STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL ORDER BY
				A.CREATED ASC";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_non_aktif_routing_mpa($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN_CODE, A.DESTINATION,
				A.CHILD FROM TARIF_NARR A LEFT JOIN ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
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
				B.STATUS_REQUEST FROM TARIF_NARR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_detail_non_aktif_routing_mpa($no_request,$status,$user_id,$tgl_non_aktif_routing,
							  $notice,$attachment)
	{
		$sql = "UPDATE TARIF_NARR SET STATUS_MPA = '$status', PIC_MPA = '".$this->db->escape($user_id)."', UPDATE_STATUS_MPA
				= SYSDATE, TGL_NON_AKTIF_ROUTING = '$tgl_non_aktif_routing', NOTICE_MPA = '$notice',
				ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function testing_detail_non_aktif_routing_mpa($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, A.TGL_NON_AKTIF_ROUTING,
				B.STATUS_REQUEST, A.NOTICE_MPA FROM TARIF_NARR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_MPA = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_testing_detail_non_aktif_routing_mpa($no_request,$status,$user_id,$tgl_live_narr,$tgl_close,$notice,$attachment)
	{
		$sql = "UPDATE TARIF_NARR SET STATUS_TESTING = '$status', TGL_LIVE_NARR = '$tgl_live_narr', PIC_LIVE = '".$this->db->escape($user_id)."',
				NOTICE_LIVE = '$notice', TGL_APPROVE_TESTING = SYSDATE, TGL_CLOSING = '$tgl_close',
				ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function cek_status_approve($no_request)
	{
		$sql = "SELECT STATUS_MPA FROM TARIF_NARR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function cek_status_testing($no_request)
	{
		$sql = "SELECT STATUS_TESTING FROM TARIF_NARR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_non_aktif_routing_mpa.php */
/* Location: ./application/modules/non_aktif_routing_mpa/models/m_non_aktif_routing_mpa.php */