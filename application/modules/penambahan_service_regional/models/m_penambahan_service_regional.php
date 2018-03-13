<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penambahan_service_regional extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function psr($user_regional)
	{
		$sql = "SELECT NO_REQUEST, CREATED, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE, TARIF, SESSION_REQUEST
				FROM TARIF_PSR
				WHERE STATUS_REQUEST = '1' AND STATUS_REGIONAL IS NULL AND REGIONAL = '$user_regional'
				ORDER BY CREATED ASC";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_penambahan_service_regional($session)
	{
		$sql = "SELECT NO_REQUEST, USER_ID, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE, TARIF
				FROM TARIF_PSR WHERE SESSION_REQUEST = '$session'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function tarif_status_request()
	{
		$sql = "SELECT * FROM TARIF_STATUS_REQUEST";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_detail_penambahan_service_regional($no_request,$status,$user_id,$notice)
	{
		$sql = "UPDATE TARIF_PSR SET STATUS_REGIONAL = '$status', PIC_REGIONAL = '$user_id',
				UPDATE_STATUS_REGIONAL = SYSDATE, NOTICE_REGIONAL = '$notice' WHERE NO_REQUEST = '$no_request'";
		$query = $this->db->Execute($sql);
		return $query;
	}

}

/* End of file m_penambahan_service_regional.php */
/* Location: ./application/modules/penambahan_service_regional/models/m_penambahan_service_regional.php */