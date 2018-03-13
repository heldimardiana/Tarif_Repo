<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard_regional extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function utcu($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTCU WHERE STATUS_REGIONAL = '1' AND 
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function utcr($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE STATUS_REGIONAL = '1' AND 
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function ucr($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE STATUS_REGIONAL = '1' AND 
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uzr($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE STATUS_REGIONAL = '1' AND 
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function narr($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE STATUS_REGIONAL = '1' AND 
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function nasr($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE STATUS_REGIONAL = '1' AND
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function psr($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE STATUS_REGIONAL = '1' AND
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function asr($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE STATUS_REGIONAL = '1' AND 
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uti($user_regional,$user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE STATUS_REGIONAL = '1' AND 
				REGIONAL = '".$this->db->escape($user_regional)."'
				AND PIC_REGIONAL = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_dashboard_regional.php */
/* Location: ./application/modules/dashboard_regional/models/m_dashboard_regional.php */