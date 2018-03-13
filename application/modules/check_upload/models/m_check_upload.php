<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_check_upload extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function utcu($no_request)
	{
		$sql = "SELECT JML_TESTING, JML_LIVE FROM TARIF_MASTER_UTCU WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function utc($no_request)
	{
		$sql = "SELECT JML_TESTING, JML_LIVE FROM TARIF_UTCR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uc($no_request)
	{
		$sql = "SELECT JML_TESTING, JML_LIVE FROM TARIF_UCR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uz($no_request)
	{
		$sql = "SELECT COUNT(A.CITY_ZONE_ID) AS JML_TESTING, COUNT(B.JML_LIVE) AS JML_LIVE
				FROM TARIF_CMS_CITY_ZONE_TMP A
				LEFT JOIN TARIF_UZR B 
				ON A.CITY_ZONE_NO_REQUEST = B.NO_REQUEST
				WHERE B.NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function narr($no_request)
	{
		$sql = "SELECT JML_TESTING, JML_LIVE FROM TARIF_NARR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function nasr($no_request)
	{
		$sql = "SELECT JML_TESTING, JML_LIVE FROM TARIF_NASR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function asr($no_request)
	{
		$sql = "SELECT JML_TESTING, JML_LIVE FROM TARIF_ASR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uti($no_request)
	{
		$sql = "SELECT JML_TESTING, JML_LIVE FROM TARIF_MASTER_UTIR WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function btbp($no_request)
	{
		$sql = "SELECT JML_TESTING, JML_LIVE FROM TARIF_MASTER_BTBP WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_check_upload.php */
/* Location: ./application/modules/check_upload/models/m_check_upload.php */