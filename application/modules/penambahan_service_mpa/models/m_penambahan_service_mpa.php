<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penambahan_service_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function psm()
	{
		$sql = "SELECT CREATED, NO_REQUEST, BRANCH_CODE, ORIGIN, DESTINATION, SERVICE,
				TARIF, SESSION_REQUEST FROM TARIF_PSR WHERE STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1'
				AND STATUS_MPA IS NULL ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_penambahan_service_mpa($session)
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

	public function notice($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, A.NOTICE_REGIONAL,
				B.STATUS_REQUEST FROM TARIF_PSR A LEFT JOIN TARIF_STATUS_REQUEST B
				ON A.STATUS_REGIONAL = B.ID_STATUS_REQUEST WHERE A.SESSION_REQUEST
				= '$session'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_detail_penambahan_service_mpa($no_request,$status,$user_id,
								  $tgl_penambahan_service,$notice)
	{
		$sql = "UPDATE TARIF_PSR SET STATUS_MPA = '$status', PIC_MPA = '$user_id',
				UPDATE_STATUS_MPA = SYSDATE, TGL_PENAMBAHAN_SERVICE = '$tgl_penambahan_service',
				NOTICE_MPA = '$notice' WHERE NO_REQUEST = '$no_request'";
		$query = $this->db->Execute($sql);
		return $query;
	}

}

/* End of file m_penambahan_service_mpa.php */
/* Location: ./application/modules/penambahan_service_mpa/models/m_penambahan_service_mpa.php */