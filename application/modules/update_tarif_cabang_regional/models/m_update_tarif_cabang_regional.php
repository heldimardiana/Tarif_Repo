<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_tarif_cabang_regional extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function data_utcr($user_regional)
	{
		$sql = "SELECT A.NO_REQUEST, A.CREATED, B.BRANCH_CITY, A.ORIGIN_REQUEST, A.NILAI_PERUBAHAN_RUPIAH,
				A.NILAI_PERUBAHAN_PERSEN, A.SERVICE, A.ATTACHMENT, A.STATUS_REQUEST, A.SESSION_REQUEST, A.DESTINATION,
				A.CHILD FROM TARIF_UTCR A
				LEFT JOIN ORA_BRANCH B ON A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.STATUS_REQUEST = '1'
				AND A.STATUS_REGIONAL IS NULL AND REGIONAL = '".$this->db->escape($user_regional)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_update_tarif_cabang_regional($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.ORIGIN_REQUEST, A.PERUBAHAN,
				A.NILAI_PERUBAHAN_PERSEN, A.NILAI_PERUBAHAN_RUPIAH, A.SERVICE, A.DESTINATION, A.CHILD FROM TARIF_UTCR A
				LEFT JOIN ORA_BRANCH B ON A.BRANCH_REQUEST = B.BRANCH_CODE WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
				
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tarif_status_request()
	{
		$sql = "SELECT * FROM TARIF_STATUS_REQUEST";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_detail_update_tarif_cabang_requester($no_request,$status,$user_id,$notice,$attachment)
	{
		$sql = "UPDATE TARIF_UTCR SET STATUS_REGIONAL = '$status', PIC_REGIONAL = '".$this->db->escape($user_id)."',
				UPDATE_STATUS_REGIONAL = SYSDATE ,NOTICE_REGIONAL = '$notice',
				ATTACHMENT_REGIONAL = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

}

/* End of file m_update_tarif_cabang_regional.php */
/* Location: ./application/modules/update_tarif_cabang_regional/models/m_update_tarif_cabang_regional.php */