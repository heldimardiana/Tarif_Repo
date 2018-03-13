<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard_regional extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_dashboard_regional');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']	= "Dashboard";
				$user_regional	= $this->session->userdata('user_regional');
				$user_id 		= $this->session->userdata('user_id');
				$data['utcu']	= $this->m_dashboard_regional->utcu($user_regional,$user_id);
				$data['utcr']	= $this->m_dashboard_regional->utcr($user_regional,$user_id);
				$data['ucr']	= $this->m_dashboard_regional->ucr($user_regional,$user_id);
				$data['uzr']	= $this->m_dashboard_regional->uzr($user_regional,$user_id);
				$data['narr']	= $this->m_dashboard_regional->narr($user_regional,$user_id);
				$data['nasr']	= $this->m_dashboard_regional->nasr($user_regional,$user_id);
				$data['psr']	= $this->m_dashboard_regional->psr($user_regional,$user_id);
				$data['asr']	= $this->m_dashboard_regional->asr($user_regional,$user_id);
				$data['uti']	= $this->m_dashboard_regional->uti($user_regional,$user_id);
				$data['view']	= "v_dashboard_regional";

				$this->load->view('template',$data);
			}
			else
			{
				redirect('login/c_login');
			}
		}
		else
		{
			redirect('login/c_login');
		}	
	}

}

/* End of file c_dashboard_regional.php */
/* Location: ./application/modules/dashboard_regional/controllers/c_dashboard_regional.php */