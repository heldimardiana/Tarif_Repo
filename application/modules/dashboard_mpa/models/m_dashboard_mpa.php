<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function utcu()
	{
		
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ 
                FROM TARIF_MASTER_UTCU WHERE STATUS_REQUEST = '1'
                AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1'AND STATUS_TESTING = '1'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function utcr()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function ucr()
	{
		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uzr()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function narr()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function nasr()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	/*
	public function psr()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}
	*/

	public function asr()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uti()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function btbp()
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_BTBP WHERE
				(STATUS_REQUEST = '1' AND STATUS_REGIONAL = '1' AND
				STATUS_MPA = '1' AND STATUS_TESTING = '1')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_dashboard_mpa.php */
/* Location: ./application/modules/dashboard_mpa/models/m_dashboard_mpa.php */