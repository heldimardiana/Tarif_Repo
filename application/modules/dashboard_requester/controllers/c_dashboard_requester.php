<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_dashboard_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{

				$data['title']		= "Dashboard";
				$user_id			= $this->session->userdata('user_id');

				//UTCU
				$data['tutcu']		= $this->m_dashboard_requester->tutcu($user_id);
				$data['orutcu']		= $this->m_dashboard_requester->orutcu($user_id);
				$data['omutcu']		= $this->m_dashboard_requester->omutcu($user_id);
				$data['autcu']		= $this->m_dashboard_requester->autcu($user_id);
				$data['uautcu']		= $this->m_dashboard_requester->uautcu($user_id);

				//UTCR
				$data['tutcr']		= $this->m_dashboard_requester->tutcr($user_id);
				$data['orutcr']		= $this->m_dashboard_requester->orutcr($user_id);
				$data['omutcr']		= $this->m_dashboard_requester->omutcr($user_id);
				$data['autcr']		= $this->m_dashboard_requester->autcr($user_id);
				$data['uautcr']		= $this->m_dashboard_requester->uautcr($user_id);

				//UCR
				$data['tucr']		= $this->m_dashboard_requester->tucr($user_id);
				$data['orucr']		= $this->m_dashboard_requester->orucr($user_id);
				$data['omucr']		= $this->m_dashboard_requester->omucr($user_id);
				$data['aucr']		= $this->m_dashboard_requester->aucr($user_id);
				$data['uaucr']		= $this->m_dashboard_requester->uaucr($user_id);	

				//UZR
				$data['tuzr']		= $this->m_dashboard_requester->tuzr($user_id);
				$data['oruzr']		= $this->m_dashboard_requester->oruzr($user_id);
				$data['omuzr']		= $this->m_dashboard_requester->omuzr($user_id);
				$data['auzr']		= $this->m_dashboard_requester->auzr($user_id);
				$data['uauzr']		= $this->m_dashboard_requester->uauzr($user_id);

				//NARR
				$data['tnarr']		= $this->m_dashboard_requester->tnarr($user_id);
				$data['ornarr']		= $this->m_dashboard_requester->ornarr($user_id);
				$data['omnarr']		= $this->m_dashboard_requester->omnarr($user_id);
				$data['anarr']		= $this->m_dashboard_requester->anarr($user_id);
				$data['uanarr']		= $this->m_dashboard_requester->uanarr($user_id);

				//NASR
				$data['tnasr']		= $this->m_dashboard_requester->tnasr($user_id);
				$data['ornasr']		= $this->m_dashboard_requester->ornasr($user_id);
				$data['omnasr']		= $this->m_dashboard_requester->omnasr($user_id);
				$data['anasr']		= $this->m_dashboard_requester->anasr($user_id);
				$data['uanasr']		= $this->m_dashboard_requester->uanasr($user_id);

				//PSR
				$data['tpsr']		= $this->m_dashboard_requester->tpsr($user_id);
				$data['orpsr']		= $this->m_dashboard_requester->orpsr($user_id);
				$data['ompsr']		= $this->m_dashboard_requester->ompsr($user_id);
				$data['apsr']		= $this->m_dashboard_requester->apsr($user_id);
				$data['uapsr']		= $this->m_dashboard_requester->uapsr($user_id);

				//ASR
				$data['tasr']		= $this->m_dashboard_requester->tasr($user_id);
				$data['orasr']		= $this->m_dashboard_requester->orasr($user_id);
				$data['omasr']		= $this->m_dashboard_requester->omasr($user_id);
				$data['aasr']		= $this->m_dashboard_requester->aasr($user_id);
				$data['uaasr']		= $this->m_dashboard_requester->uaasr($user_id);

				//UTIR
				$data['tuti']		= $this->m_dashboard_requester->tuti($user_id);
				$data['oruti']		= $this->m_dashboard_requester->oruti($user_id);
				$data['omuti']		= $this->m_dashboard_requester->omuti($user_id);
				$data['auti']		= $this->m_dashboard_requester->auti($user_id);
				$data['uauti']		= $this->m_dashboard_requester->uauti($user_id);

				
				$data['view']		= "v_dashboard_requester";
				$this->load->view('template', $data);
				
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

/* End of file c_dashboard.php */
/* Location: ./application/modules/dashboard/controllers/c_dashboard.php */