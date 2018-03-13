<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_change_password extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_old_password($user_id)
	{
		$sql = "SELECT USER_PASS FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_change_password($user_id,$new_password)
	{
		$sql = "UPDATE TARIF_USER SET USER_PASS = '$new_password' WHERE USER_ID = '".$this->db->escape($user_id)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

}

/* End of file m_change_password.php */
/* Location: ./application/modules/change_password/models/m_change_password.php */