<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_content_dashboard_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_content_dashboard_requester');
	}

	public function index()
	{
		
	}

	public function total_utcu_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request Update Tarif Cabang Utama";
				$user_id				= $this->session->userdata('user_id');
				$data['total_utcu_req']	= $this->m_content_dashboard_requester->total_utcu_req($user_id);
				$data['view']			= "v_total_utcu";

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

	public function out_utcu_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_utcu_req']	= $this->m_content_dashboard_requester->out_utcu_req($user_id);
				$data['view']			= "v_out_utcu_req";

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

	public function out_mpa_utcu_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Outstanding MPA";
				$user_id					= $this->session->userdata('user_id');
				$data['out_mpa_utcu_req']	= $this->m_content_dashboard_requester->out_mpa_utcu_req($user_id);
				$data['view']				= "v_out_mpa_utcu_req";

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

	public function detail_out_mpa_utcu($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_utcu($session);
				$no_req 			= $this->m_content_dashboard_requester->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_content_dashboard_requester->tdetail_out_mpa_utcu($no_request);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_utcu($session);
				$data['view']		= "v_detail_out_mpa_utcu_req";

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

	public function detail_testing_mpa_utcu($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Testing MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_utcu($session);
				$no_req 			= $this->m_content_dashboard_requester->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_content_dashboard_requester->tdetail_out_mpa_utcu($no_request);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_utcu($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_out_mpa_utcu($session);
				$data['view']		= "v_testing_detail_out_mpa_utcu_req";

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

	public function approve_utcu_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_utcu_req']	= $this->m_content_dashboard_requester->approve_utcu_req($user_id);
				$data['view']				= "v_approve_utcu_req";

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

	public function detail_approve_utcu($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Detail Approve";
				$data['detail']				= $this->m_content_dashboard_requester->detail_out_mpa_utcu($session);
				$no_req 					= $this->m_content_dashboard_requester->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']			= $this->m_content_dashboard_requester->tdetail_out_mpa_utcu($no_request);
				$data['regional']			= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_utcu($session);
				$data['mpa']				= $this->m_content_dashboard_requester->notice_mpa_detail_out_mpa_utcu($session);	
				$data['view']				= "v_detail_approve_utcu_req";

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

	public function unapprove_utcu_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Not Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_utcu_req']	= $this->m_content_dashboard_requester->unapprove_utcu_req($user_id);
				$data['view']				= "v_unapprove_utcu_req";

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

	public function detail_unapprove_utcu($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Detail Not Approve";
				$data['detail']				= $this->m_content_dashboard_requester->detail_out_mpa_utcu($session);
				$no_req 					= $this->m_content_dashboard_requester->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']			= $this->m_content_dashboard_requester->tdetail_out_mpa_utcu($no_request);
				$data['regional']			= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_utcu($session);
				$data['mpa']				= $this->m_content_dashboard_requester->notice_mpa_detail_out_mpa_utcu($session);
				$data['status']				= $this->m_content_dashboard_requester->status_detail_unapprove_utcu($session);	
				$data['view']				= "v_detail_unapprove_utcu";

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

	//UTCR
	public function total_utcr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request Update Tarif Cabang";
				$user_id				= $this->session->userdata('user_id');
				$data['total_utcr_req']	= $this->m_content_dashboard_requester->total_utcr_req($user_id);
				$data['view']			= "v_total_utcr";

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

	public function out_utcr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_utcr_req']	= $this->m_content_dashboard_requester->out_utcr_req($user_id);
				$data['view']			= "v_out_utcr_req";

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

	public function out_mpa_utcr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Outstanding MPA";
				$user_id					= $this->session->userdata('user_id');
				$data['out_mpa_utcr_req']	= $this->m_content_dashboard_requester->out_mpa_utcr_req($user_id);
				$data['view']				= "v_out_mpa_utcr_req";

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

	public function detail_out_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa($session);
				$data['view']		= "v_detail_out_mpa";

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

	public function detail_testing_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Testing MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_out_mpa($session);
				$data['view']		= "v_detail_testing_mpa";

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

	public function approve_utcr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_utcr_req']	= $this->m_content_dashboard_requester->approve_utcr_req($user_id);
				$data['view']				= "v_approve_utcr_req";

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

	public function detail_approve($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Detail Approve";
				$data['detail']				= $this->m_content_dashboard_requester->detail_approve($session);
				$data['regional']			= $this->m_content_dashboard_requester->notice_regional_detail_approve($session);
				$data['mpa']				= $this->m_content_dashboard_requester->notice_mpa_detail_approve($session);	
				$data['view']				= "v_detail_approve";

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

	public function unapprove_utcr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Not Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_utcr_req']	= $this->m_content_dashboard_requester->unapprove_utcr_req($user_id);
				$data['view']				= "v_unapprove_utcr_req";

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

	public function detail_unapprove($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Detail Not Approve";
				$data['detail']				= $this->m_content_dashboard_requester->detail_unapprove($session);
				$data['regional']			= $this->m_content_dashboard_requester->notice_regional_detail_unapprove($session);
				$data['mpa']				= $this->m_content_dashboard_requester->notice_mpa_detail_unapprove($session);
				$data['status']				= $this->m_content_dashboard_requester->status_detail_unapprove($session);	
				$data['view']				= "v_detail_unapprove";

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

	//UCR

	public function total_ucr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request";
				$user_id				= $this->session->userdata('user_id');
				$data['total_ucr_req']	= $this->m_content_dashboard_requester->total_ucr_req($user_id);
				$data['view']			= "v_total_ucr";

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

	public function out_ucr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_ucr_req']	= $this->m_content_dashboard_requester->out_ucr_req($user_id);
				$data['view']			= "v_out_ucr_req";

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

	public function out_mpa_ucr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Outstanding MPA";
				$user_id					= $this->session->userdata('user_id');
				$data['out_mpa_ucr_req']	= $this->m_content_dashboard_requester->out_mpa_ucr_req($user_id);
				$data['view']				= "v_out_mpa_ucr_req";

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

	public function detail_out_mpa_ucr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Detail Outstanding MPA";
				$data['detail']			= $this->m_content_dashboard_requester->detail_out_mpa_ucr($session);
				$data['tdetail']		= $this->m_content_dashboard_requester->tdetail_ubah_coding_requester($session);
				$data['regional']		= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_ucr($session);
				$data['view']			= "v_detail_out_mpa_ucr";

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

	public function testing_detail_out_mpa_ucr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Detail Outstanding MPA";
				$data['detail']			= $this->m_content_dashboard_requester->detail_out_mpa_ucr($session);
				$data['tdetail']		= $this->m_content_dashboard_requester->tdetail_ubah_coding_requester($session);
				$data['regional']		= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_ucr($session);
				$data['mpa']			= $this->m_content_dashboard_requester->testing_detail_out_mpa_ucr($session);
				$data['view']			= "v_testing_detail_out_mpa_ucr";

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

	public function approve_ucr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_ucr_req']	= $this->m_content_dashboard_requester->approve_ucr_req($user_id);
				$data['view']				= "v_approve_ucr_req";

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

	public function detail_approve_ucr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Approve";
				$data['detail']		= $this->m_content_dashboard_requester->detail_approve_ucr_req($session);
				$data['tdetail']	= $this->m_content_dashboard_requester->tdetail_ubah_coding_requester($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_approve_ucr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_ucr_req($session);
				$data['view']		= "v_detail_approve_ucr_req";

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

	public function unapprove_ucr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Not Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_ucr_req']	= $this->m_content_dashboard_requester->unapprove_ucr_req($user_id);
				$data['view']				= "v_unapprove_ucr_req";

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

	public function detail_unapprove_ucr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Not Approve";
				$data['detail']		= $this->m_content_dashboard_requester->detail_unapprove_ucr_req($session);
				$data['tdetail']	= $this->m_content_dashboard_requester->tdetail_ubah_coding_requester($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_unapprove_ucr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_unapprove_ucr_req($session);
				$data['status']		= $this->m_content_dashboard_requester->status_detail_unapprove_ucr_req($session);	
				$data['view']		= "v_detail_unapprove_ucr_req";

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

	public function export_detail_ucr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$no_request 		= $this->input->post('no_request');
				$data['exports']	= $this->m_content_dashboard_requester->export_detail_ucr($no_request);
				$data['view']		= "v_export_detail_ucr_req";

				$this->load->view('v_export_detail_ucr_req',$data);
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

	public function total_uzr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request";
				$user_id				= $this->session->userdata('user_id');
				$data['total_uzr_req']	= $this->m_content_dashboard_requester->total_uzr_req($user_id);
				$data['view']			= "v_total_uzr_req";

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

	public function out_uzr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_uzr_req']	= $this->m_content_dashboard_requester->out_uzr_req($user_id);
				$data['view']			= "v_out_uzr_req";

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

	public function out_mpa_uzr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Outstanding MPA";
				$user_id					= $this->session->userdata('user_id');
				$data['out_mpa_uzr_req']	= $this->m_content_dashboard_requester->out_mpa_uzr_req($user_id);
				$data['view']				= "v_out_mpa_uzr_req";

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

	public function detail_out_mpa_uzr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_uzr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_uzr_req($session);
				$data['view']		= "v_detail_out_mpa_uzr_req";

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

	public function testing_detail_out_mpa_uzr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_uzr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_uzr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_uzr_req($session);
				$data['view']		= "v_testing_detail_out_mpa_uzr_req";

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

	public function approve_uzr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_uzr_req']	= $this->m_content_dashboard_requester->approve_uzr_req($user_id);
				$data['view']				= "v_approve_uzr_req";

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

	public function detail_approve_uzr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Approve";
				$data['detail']		= $this->m_content_dashboard_requester->detail_approve_uzr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_approve_uzr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_uzr_req($session);
				$data['view']		= "v_detail_approve_uzr_req";

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

	public function unapprove_uzr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Not Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_uzr_req']	= $this->m_content_dashboard_requester->unapprove_uzr_req($user_id);
				$data['view']				= "v_unapprove_uzr_req";

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

	public function detail_unapprove_uzr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Detail Not Approve";
				$data['detail']				= $this->m_content_dashboard_requester->detail_unapprove_uzr_req($session);
				$data['regional']			= $this->m_content_dashboard_requester->notice_regional_detail_unapprove_uzr_req($session);
				$data['mpa']				= $this->m_content_dashboard_requester->notice_mpa_detail_unapprove_uzr_req($session);
				$data['status']				= $this->m_content_dashboard_requester->status_detail_unapprove_uzr_req($session);
				$data['view']				= "v_detail_unapprove_uzr_req";

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

	public function total_narr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request";
				$user_id				= $this->session->userdata('user_id');
				$data['total_narr_req']	= $this->m_content_dashboard_requester->total_narr_req($user_id);
				$data['view']			= "v_total_narr_req";

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

	public function out_narr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_narr_req']	= $this->m_content_dashboard_requester->out_narr_req($user_id);
				$data['view']			= "v_out_narr_req";

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

	public function out_mpa_narr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Outstanding MPA";
				$user_id					= $this->session->userdata('user_id');
				$data['out_mpa_narr_req']	= $this->m_content_dashboard_requester->out_mpa_narr_req($user_id);
				$data['view']				= "v_out_mpa_narr_req";

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

	public function detail_out_mpa_narr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Detail Outstanding MPA";
				$data['detail']			= $this->m_content_dashboard_requester->detail_out_mpa_narr_req($session);
				$data['regional']		= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_narr_req($session);
				$data['view']			= "v_detail_out_mpa_narr_req";

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

	public function testing_detail_out_mpa_narr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Detail Outstanding MPA";
				$data['detail']			= $this->m_content_dashboard_requester->detail_out_mpa_narr_req($session);
				$data['regional']		= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_narr_req($session);
				$data['mpa']			= $this->m_content_dashboard_requester->notice_mpa_detail_approve_narr_req($session);
				$data['view']			= "v_testing_detail_out_mpa_narr_req";

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

	public function approve_narr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_narr_req']	= $this->m_content_dashboard_requester->approve_narr_req($user_id);
				$data['view']				= "v_approve_narr_req";

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

	public function detail_approve_narr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Approve";
				$data['detail']		= $this->m_content_dashboard_requester->detail_approve_narr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_approve_narr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_narr_req($session);
				$data['view']		= "v_detail_approve_narr_req";

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

	public function unapprove_narr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Not Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_narr_req']	= $this->m_content_dashboard_requester->unapprove_narr_req($user_id);
				$data['view']				= "v_unapprove_narr_req";

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

	public function detail_unapprove_narr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Detail Not Approve";
				$data['detail']			= $this->m_content_dashboard_requester->detail_unapprove_narr_req($session);
				$data['status']			= $this->m_content_dashboard_requester->status_detail_unapprove_narr_req($session);
				$data['regional']		= $this->m_content_dashboard_requester->notice_regional_detail_unapprove_narr_req($session);
				$data['mpa']			= $this->m_content_dashboard_requester->notice_mpa_detail_unapprove_narr_req($session);
				$data['view']			= "v_detail_unapprove_narr_req";

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

	public function total_nasr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request";
				$user_id				= $this->session->userdata('user_id');
				$data['total_nasr_req']	= $this->m_content_dashboard_requester->total_nasr_req($user_id);
				$data['view']			= "v_total_nasr_req";

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

	public function out_nasr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_nasr_req']	= $this->m_content_dashboard_requester->out_nasr_req($user_id);
				$data['view']			= "v_out_nasr_req";

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

	public function out_mpa_nasr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Outstanding MPA";
				$user_id					= $this->session->userdata('user_id');
				$data['out_mpa_nasr_req']	= $this->m_content_dashboard_requester->out_mpa_nasr_req($user_id);
				$data['view']				= "v_out_mpa_nasr_req";

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

	public function detail_out_mpa_nasr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_nasr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_nasr_req($session);
				$data['view']		= "v_detail_out_mpa_nasr_req";

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

	//Testing

	public function testing_detail_out_mpa_nasr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_nasr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_nasr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_nasr_req($session);
				$data['view']		= "v_testing_detail_out_mpa_nasr_req";

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

	public function approve_nasr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Aprove";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_nasr_req']	= $this->m_content_dashboard_requester->approve_nasr_req($user_id);
				$data['view']				= "v_approve_nasr_req";

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

	public function detail_approve_nasr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Aprove";
				$data['detail']		= $this->m_content_dashboard_requester->detail_approve_nasr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_approve_nasr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_nasr_req($session);
				$data['view']		= "v_detail_approve_nasr_req";

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

	public function unapprove_nasr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "UnAprove";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_nasr_req']	= $this->m_content_dashboard_requester->unapprove_nasr_req($user_id);
				$data['view']				= "v_unapprove_nasr_req";

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

	public function detail_unapprove_nasr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Detail UnAprove";
				$data['detail']			= $this->m_content_dashboard_requester->detail_unapprove_nasr_req($session);
				$data['status']			= $this->m_content_dashboard_requester->status_detail_unapprove_nasr_req($session);
				$data['regional']		= $this->m_content_dashboard_requester->notice_regional_detail_unapprove_nasr_req($session);
				$data['mpa']			= $this->m_content_dashboard_requester->notice_mpa_detail_unapprove_nasr_req($session);
				$data['view']			= "v_detail_unapprove_nasr_req";

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

	public function total_psr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request";
				$user_id				= $this->session->userdata('user_id');
				$data['total_psr_req']	= $this->m_content_dashboard_requester->total_psr_req($user_id);
				$data['view']			= "v_total_psr_req";

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

	public function out_psr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_psr_req']	= $this->m_content_dashboard_requester->out_psr_req($user_id);
				$data['view']			= "v_out_psr_req";

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

	public function out_mpa_psr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']					= "Outstanding MPA";
				$user_id						= $this->session->userdata('user_id');
				$data['out_mpa_psr_req']		= $this->m_content_dashboard_requester->out_mpa_psr_req($user_id);
				$data['view']					= "v_out_mpa_psr_req";

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

	public function detail_out_mpa_psr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_psr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_psr_req($session);
				$data['view']		= "v_detail_out_mpa_psr_req";

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

	public function approve_psr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Aprove";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_psr_req']	= $this->m_content_dashboard_requester->approve_psr_req($user_id);
				$data['view']				= "v_approve_psr_req";

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

	public function detail_approve_psr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Aprove";
				$data['detail']		= $this->m_content_dashboard_requester->detail_approve_psr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_approve_psr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_psr_req($session);
				$data['view']		= "v_detail_approve_psr_req";

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

	public function unapprove_psr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "UnApprove";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_psr_req'] 	= $this->m_content_dashboard_requester->unapprove_psr_req($user_id);
				$data['view']				= "v_unapprove_psr_req";

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

	public function detail_unapprove_psr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail UnApprove";
				$data['detail']		= $this->m_content_dashboard_requester->detail_unapprove_psr_req($session);
				$data['status']		= $this->m_content_dashboard_requester->status_detail_unapprove_psr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_unapprove_psr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_unapprove_psr_req($session);
				$data['view']		= "v_detail_unapprove_psr_req";

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

	public function total_asr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request";
				$user_id				= $this->session->userdata('user_id');
				$data['total_asr_req']	= $this->m_content_dashboard_requester->total_asr_req($user_id);
				$data['view']			= "v_total_asr_req";

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

	public function out_asr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_asr_req']	= $this->m_content_dashboard_requester->out_asr_req($user_id);
				$data['view']			= "v_out_asr_req";

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

	public function out_mpa_asr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Outstanding MPA";
				$user_id					= $this->session->userdata('user_id');
				$data['out_mpa_asr_req']	= $this->m_content_dashboard_requester->out_mpa_asr_req($user_id);
				$data['view']				= "v_out_mpa_asr_req";

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

	public function detail_out_mpa_asr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_asr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_asr_req($session);
				$data['view']		= "v_detail_out_mpa_asr_req";

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

	public function testing_detail_out_mpa_asr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_asr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_asr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_asr_req($session);
				$data['view']		= "v_testing_detail_out_mpa_asr_req";

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

	public function approve_asr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_asr_req']	= $this->m_content_dashboard_requester->approve_asr_req($user_id);
				$data['view']				= "v_approve_asr_req";

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

	public function detail_approve_asr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Approve";
				$data['detail']		= $this->m_content_dashboard_requester->detail_approve_asr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_approve_asr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_asr_req($session);
				$data['view']		= "v_detail_approve_asr_req";

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

	public function unapprove_asr_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Not Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_asr_req']	= $this->m_content_dashboard_requester->unapprove_asr_req($user_id);
				$data['view']				= "v_unapprove_asr_req";

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

	public function detail_unapprove_asr_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Not Approve";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_requester->detail_unapprove_asr_req($session);
				$data['status']		= $this->m_content_dashboard_requester->status_detail_unapprove_asr_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_unapprove_asr_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_unapprove_asr_req($session);
				$data['view']		= "v_detail_unapprove_asr_req";

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

	public function total_utir_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Total Request";
				$user_id				= $this->session->userdata('user_id');
				$data['total_utir_req']	= $this->m_content_dashboard_requester->total_utir_req($user_id);
				$data['view']			= "v_total_utir_req";

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

	public function out_utir_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']			= "Outstanding Regional";
				$user_id				= $this->session->userdata('user_id');
				$data['out_utir_req']	= $this->m_content_dashboard_requester->out_utir_req($user_id);
				$data['view']			= "v_out_utir_req";

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

	public function out_mpa_utir_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Outstanding MPA";
				$user_id					= $this->session->userdata('user_id');
				$data['out_mpa_utir_req']	= $this->m_content_dashboard_requester->out_mpa_utir_req($user_id);
				$data['view']				= "v_out_mpa_utir_req";

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

	public function approve_utir_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['approve_utir_req']	= $this->m_content_dashboard_requester->approve_utir_req($user_id);
				$data['view']				= "v_approve_utir_req";

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

	public function unapprove_utir_req()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Not Approve";
				$user_id					= $this->session->userdata('user_id');
				$data['unapprove_utir_req']	= $this->m_content_dashboard_requester->unapprove_utir_req($user_id);
				$data['view']				= "v_unapprove_utir_req";

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

	public function detail_out_mpa_utir_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_utir_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_utir_req($session);
				$get_no_request 	= $this->m_content_dashboard_requester->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_requester->bdetail($no_request);
				$data['view']		= "v_detail_out_mpa_utir_req";

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

	public function testing_detail_out_mpa_utir_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Outstanding MPA";
				$data['detail']		= $this->m_content_dashboard_requester->detail_out_mpa_utir_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_out_mpa_utir_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_utir_req($session);
				$get_no_request 	= $this->m_content_dashboard_requester->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_requester->bdetail($no_request);
				$data['view']		= "v_testing_detail_out_mpa_utir_req";

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

	public function detail_approve_utir_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Detail Approve";
				$data['detail']		= $this->m_content_dashboard_requester->detail_approve_utir_req($session);
				$data['regional']	= $this->m_content_dashboard_requester->notice_regional_detail_approve_utir_req($session);
				$data['mpa']		= $this->m_content_dashboard_requester->notice_mpa_detail_approve_utir_req_2($session);
				$get_no_request 	= $this->m_content_dashboard_requester->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_requester->bdetail($no_request);
				$data['view']		= "v_detail_approve_utir_req";

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

	public function detail_unapprove_utir_req($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']				= "Detail Not Approve";
				$data['detail']				= $this->m_content_dashboard_requester->detail_unapprove_utir_req($session);
				$data['regional']			= $this->m_content_dashboard_requester->notice_regional_detail_unapprove_utir_req($session);
				$data['mpa']				= $this->m_content_dashboard_requester->notice_mpa_detail_unapprove_utir_req($session);
				$data['status']				= $this->m_content_dashboard_requester->status_detail_unapprove_utir_req($session);
				$get_no_request 			= $this->m_content_dashboard_requester->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']			= $this->m_content_dashboard_requester->bdetail($no_request);
				$data['view']				= "v_detail_unapprove_utir_req";

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

	public function export_detail()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$no_request 		= $this->input->post('no_request');
				$data['tdetail']	= $this->m_content_dashboard_requester->tdetail_out_mpa_utcu($no_request);
				$data['view']		= "v_export_detail_utcu_req";

				$this->load->view('v_export_detail_utcu_req',$data);

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

	public function export_detail_utir()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$no_request 	= $this->input->post('no_request');
				$data['detail']	= $this->m_content_dashboard_requester->bdetail($no_request);
				$data['view']	= "v_export_update_intracity";

				$this->load->view('v_export_update_intracity',$data);
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

/* End of file c_content_dashboard_requester.php */
/* Location: ./application/modules/content_dashboard_requester/controllers/c_content_dashboard_requester.php */