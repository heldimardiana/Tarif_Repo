<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ubah_zona_regional extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function uzr($user_regional)
	{
		$sql = "SELECT A.NO_REQUEST, A.CREATED, B.BRANCH_CITY, A.ORIGIN, A.CURRENT_ZONE,
				A.MODIF_ZONE, A.SESSION_REQUEST, A.CHILD FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B ON
				A.BRANCH_CODE = B.BRANCH_CODE WHERE A.STATUS_REQUEST = '1' AND 
				STATUS_REGIONAL IS NULL AND A.REGIONAL = '".$this->db->escape($user_regional)."' ORDER BY A.CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_ubah_zona_regional($session)
	{
		$sql = "SELECT A.NO_REQUEST, A.USER_ID, B.BRANCH_CITY, A.CURRENT_ZONE, A.MODIF_ZONE,
				A.ORIGIN, A.CHILD FROM TARIF_UZR A LEFT JOIN ORA_BRANCH B ON A.BRANCH_CODE = B.BRANCH_CODE
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

	public function save_detail_ubah_zona_regional($no_request,$status,$user_id,$notice,$attachment)
	{
		$sql = "UPDATE TARIF_UZR SET STATUS_REGIONAL = '$status', PIC_REGIONAL = '".$this->db->escape($user_id)."',
				UPDATE_STATUS_REGIONAL = SYSDATE, NOTICE_REGIONAL = '$notice',
				ATTACHMENT_REGIONAL = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

}

/* End of file m_ubah_zona_regional.php */
/* Location: ./application/modules/ubah_zona_regional/models/m_ubah_zona_regional.php */