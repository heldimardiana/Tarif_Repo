<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	//UTCU
	public function tutcu($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTCU WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function orutcu($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTCU WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function omutcu($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTCU WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA = '1' OR STATUS_MPA IS NULL)
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function autcu($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTCU WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1'";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uautcu($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTCU WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND (STATUS_REGIONAL = '2' OR STATUS_MPA = '2' OR STATUS_TESTING = '2')";
		$query = $this->db->GetArray($sql);
		return $query;
	}


	//UTCR
	public function tutcr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function orutcr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function omutcr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA = '1' OR STATUS_MPA IS NULL)
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function autcr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1'";

		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uautcr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UTCR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND (STATUS_REGIONAL = '2' OR STATUS_MPA = '2' OR STATUS_TESTING = '2')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UCR

	public function tucr($user_id)
	{
		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function orucr($user_id)
	{
		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING
				IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function omucr($user_id)
	{
		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function aucr($user_id)
	{
		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uaucr($user_id)
	{
		$sql = "SELECT COUNT(DISTINCT NO_REQUEST) AS NO_REQ FROM TARIF_UCR WHERE (STATUS_REGIONAL = '2'
                OR STATUS_MPA = '2' OR STATUS_TESTING = '2') AND USER_ID = '".$this->db->escape($user_id)."'";
        
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UZR

	public function tuzr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function oruzr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function omuzr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function auzr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1' ";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uauzr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_UZR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND (STATUS_REGIONAL = '2' OR STATUS_MPA = '2' OR STATUS_TESTING = '2')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//NARR

	public function tnarr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function ornarr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function omnarr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function anarr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uanarr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NARR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND (STATUS_REGIONAL = '2' OR STATUS_MPA = '2' OR STATUS_TESTING = '2')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//NASR

	public function tnasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function ornasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function omnasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function anasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uanasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_NASR WHERE (STATUS_REGIONAL = '2'
                OR STATUS_MPA = '2' OR STATUS_TESTING = '2') AND USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//PSR

	public function tpsr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function orpsr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function ompsr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function apsr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uapsr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_PSR WHERE STATUS_REGIONAL = '2'
                OR STATUS_MPA = '2' AND USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//ASR

	public function tasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function orasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function omasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function aasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uaasr($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_ASR WHERE (STATUS_REGIONAL = '2'
                OR STATUS_MPA = '2' OR STATUS_TESTING = '2') AND USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	//UTIR
	public function tuti($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function oruti($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL IS NULL AND STATUS_MPA IS NULL AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function omuti($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND STATUS_TESTING IS NULL";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function auti($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE USER_ID = '".$this->db->escape($user_id)."'
				AND STATUS_REGIONAL = '1' AND STATUS_MPA = '1' AND STATUS_TESTING = '1'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function uauti($user_id)
	{
		$sql = "SELECT COUNT(NO_REQUEST) AS NO_REQ FROM TARIF_MASTER_UTIR WHERE (STATUS_REGIONAL = '2'
                OR STATUS_MPA = '2' OR STATUS_TESTING = '2') AND USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

}

/* End of file m_dashboard_requester.php */
/* Location: ./application/modules/dashboard_requester/models/m_dashboard_requester.php */