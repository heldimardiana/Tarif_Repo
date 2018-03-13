<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_roll_back extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

}

/* End of file m_roll_back.php */
/* Location: ./application/modules/roll_back/models/m_roll_back.php */