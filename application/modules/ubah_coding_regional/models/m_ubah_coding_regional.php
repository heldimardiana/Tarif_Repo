<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ubah_coding_regional extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function data_ucr($user_regional)
	{
		$sql = "SELECT DISTINCT CREATED,NO_REQUEST,USER_ID,SESSION_REQUEST FROM TARIF_UCR
				WHERE STATUS_REQUEST = '1' AND STATUS_REGIONAL IS NULL AND
				REGIONAL = '".$this->db->escape($user_regional)."' ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_ubah_coding_regional($session)
	{
		$sql = "SELECT DISTINCT NO_REQUEST, USER_ID
				FROM TARIF_UCR WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tdetail_ubah_coding_regional($session)
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

	public function save_detail_ubah_coding_regional($no_request,$status,$user_id,$notice,$attachment)
	{
		$sql = "UPDATE TARIF_UCR SET STATUS_REGIONAL = '$status', PIC_REGIONAL = '".$this->db->escape($user_id)."',
				UPDATE_STATUS_REGIONAL = SYSDATE, NOTICE_REGIONAL = '$notice',
				ATTACHMENT_REGIONAL = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
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

/* End of file m_ubah_coding_regional.php */
/* Location: ./application/modules/ubah_coding_regional/models/m_ubah_coding_regional.php */