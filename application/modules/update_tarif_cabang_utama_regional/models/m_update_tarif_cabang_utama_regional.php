<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_tarif_cabang_utama_regional extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function data_utcu($regional)
	{
		$sql = "SELECT DISTINCT CREATED, NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT,
				SESSION_REQUEST
				FROM TARIF_MASTER_UTCU WHERE (STATUS_REQUEST = '1'
				AND STATUS_REGIONAL IS NULL AND REGIONAL = '$regional')
				ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_update_tarif_cabang_utama_regional($session)
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

	public function tdetail_update_tarif_cabang_utama_regional($no_request)
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

	public function save_detail_update_tarif_cabang_utama_regional($no_request,
									  $status, $pic_regional, $notice,$attachment)
	{
		$sql = "UPDATE TARIF_MASTER_UTCU SET STATUS_REGIONAL = '$status', PIC_REGIONAL = '".$this->db->escape($pic_regional)."',
				UPDATE_STATUS_REGIONAL = SYSDATE, NOTICE_REGIONAL = '$notice', ATTACHMENT_REGIONAL = '$attachment'
				WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

}

/* End of file m_update_tarif_cabang_utama_regional.php */
/* Location: ./application/modules/update_tarif_cabang_utama_regional/models/m_update_tarif_cabang_utama_regional.php */