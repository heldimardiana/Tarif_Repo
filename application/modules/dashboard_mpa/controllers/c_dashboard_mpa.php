<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_dashboard_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Dashboard";
				//$user_id 		= $this->session->userdata('user_id');

				$data['utcu']	= $this->m_dashboard_mpa->utcu();
				$data['utcr']	= $this->m_dashboard_mpa->utcr();
				$data['ucr']	= $this->m_dashboard_mpa->ucr();
				$data['uzr']	= $this->m_dashboard_mpa->uzr();
				$data['narr']	= $this->m_dashboard_mpa->narr();
				$data['nasr']	= $this->m_dashboard_mpa->nasr();
				//$data['psr']	= $this->m_dashboard_mpa->psr();
				$data['asr']	= $this->m_dashboard_mpa->asr();
				$data['uti']	= $this->m_dashboard_mpa->uti();
				$data['btbp']	= $this->m_dashboard_mpa->btbp();

				$data['view']	= "v_dashboard_mpa";

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

/* End of file c_dashboard_mpa.php */
/* Location: ./application/modules/dashboard_mpa/controllers/c_dashboard_mpa.php */