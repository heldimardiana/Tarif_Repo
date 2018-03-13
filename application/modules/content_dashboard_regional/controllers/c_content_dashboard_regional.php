<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_content_dashboard_regional extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_content_dashboard_regional');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{

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

	//UTCU
	public function utcu_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Approve Tarif Cabang Utama";
				$user_id			= $this->session->userdata('user_id');
				$data['utcu_reg']	= $this->m_content_dashboard_regional->utcu_reg($user_id);
				$data['view']		= "v_utcu_reg";

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

	//Outstanding MPA
	public function detail_utcu_reg_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approval Tarif Cabang Utama";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcu_reg($session);
				$no_req 			= $this->m_content_dashboard_regional->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_utcu_reg($no_request);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcu($session);
				$data['view']		= "v_detail_utcu_reg_out";

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

	//Testing MPA
	public function detail_testing_utcu($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Testing Tarif Cabang Utama";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcu_reg($session);
				$no_req 			= $this->m_content_dashboard_regional->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_utcu_reg($no_request);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcu($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcu($session);
				$data['view']		= "v_detail_testing_utcu";

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

	//Approve MPA
	public function detail_utcu_reg($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approval Tarif Cabang Utama";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcu_reg($session);
				$no_req 			= $this->m_content_dashboard_regional->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_utcu_reg($no_request);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcu($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcu($session);
				$data['view']		= "v_detail_utcu_reg";

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

	//Not Approve 1
	public function detail_utcu_reg_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approval Tarif Cabang Utama";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcu_reg($session);
				$no_req 			= $this->m_content_dashboard_regional->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_utcu_reg($no_request);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcu($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcu($session);
				$data['view']		= "v_detail_utcu_reg_un";

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

	//Not Approve 2
	public function detail_utcu_reg_un2($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approval Tarif Cabang Utama";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcu_reg($session);
				$no_req 			= $this->m_content_dashboard_regional->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_utcu_reg($no_request);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcu($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcu($session);
				$data['view']		= "v_detail_utcu_reg_un2";

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
	public function utcr_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Approve Tarif Cabang";
				$user_id			= $this->session->userdata('user_id');
				$data['utcr_reg']	= $this->m_content_dashboard_regional->utcr_reg($user_id);
				$data['view']		= "v_utcr_reg";

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

	

	//Approve MPA
	public function detail_utcr_reg($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approval Tarif Cabang";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcr_reg($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcr($session);
				$data['view']		= "v_detail_utcr_reg";

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

	//Outstanding MPA
	public function detail_utcr_reg_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approval Tarif Cabang";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcr_reg($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcr($session);
				$data['view']		= "v_detail_utcr_reg_out";

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

	//Testing MPA
	public function detail_testing_utcr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Testing Tarif Cabang";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcr_reg($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcr($session);
				$data['view']		= "v_detail_testing_utcr";

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

	//UnApprove MPA
	public function detail_utcr_reg_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approval Tarif Cabang";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcr_reg($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcr($session);
				$data['view']		= "v_detail_utcr_reg_un";

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

	public function detail_utcr_reg_un2($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approval Tarif Cabang";
				$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_regional->detail_utcr_reg($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utcr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utcr($session);
				$data['view']		= "v_detail_utcr_reg_un2";

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

	public function ucr_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title'] 		= "Approve Ubah Coding";
				$user_id	 		= $this->session->userdata('user_id');
				$data['ucr_reg']	= $this->m_content_dashboard_regional->ucr_reg($user_id);
				$data['view']		= "v_ucr_reg";

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

	//Testing MPA

	public function detail_ucr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Coding";
				$data['detail']		= $this->m_content_dashboard_regional->detail_ucr($session);
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_ubah_coding_regional($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_ucr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_ucr($session);
				$data['view']		= "v_detail_ucr";

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

	//Approve MPA
	public function detail_ucr_approve($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Coding";
				$data['detail']		= $this->m_content_dashboard_regional->detail_ucr($session);
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_ubah_coding_regional($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_ucr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_ucr_approve($session);
				$data['view']		= "v_detail_ucr_approve";

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

	//UnApprove MPA

	public function detail_ucr_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Coding";
				$data['detail']		= $this->m_content_dashboard_regional->detail_ucr($session);
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_ubah_coding_regional($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_ucr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_ucr($session);
				$data['view']		= "v_detail_ucr_un";

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

	//UnApprove Testing MPA

	public function detail_ucr_un2($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Coding";
				$data['detail']		= $this->m_content_dashboard_regional->detail_ucr($session);
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_ubah_coding_regional($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_ucr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_ucr_approve($session);
				$data['view']		= "v_detail_ucr_un2";

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

	//Outstanding MPA
	public function detail_ucr_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Coding";
				$data['detail']		= $this->m_content_dashboard_regional->detail_ucr($session);
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_ubah_coding_regional($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_ucr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_ucr($session);
				$data['view']		= "v_detail_ucr_out";

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
			if($this->session->userdata('user_role')==2)
			{
				$no_request 		= $this->input->post('no_request');
				$data['exports']	= $this->m_content_dashboard_regional->export_detail_ucr($no_request);
				$data['view']		= "v_export_detail_ucr_regional";

				$this->load->view('v_export_detail_ucr_regional',$data);
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

	//UZR

	public function uzr_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Approve Ubah Zona";
				$user_id			= $this->session->userdata('user_id');
				$data['uzr_reg']	= $this->m_content_dashboard_regional->uzr_reg($user_id);
				$data['view']		= "v_uzr_reg";

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

	//Approve MPA

	public function detail_uzr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_uzr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_uzr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_uzr($session);
				$data['view']		= "v_detail_uzr";

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

	//Outstanding MPA

	public function detail_uzr_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_uzr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_uzr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_uzr($session);
				$data['view']		= "v_detail_uzr_out";

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
	public function testing_detail_uzr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_uzr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_uzr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_uzr($session);
				$data['view']		= "v_testing_detail_uzr";

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

	//UnApprove MPA

	public function detail_uzr_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_uzr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_uzr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_uzr($session);
				$data['view']		= "v_detail_uzr_un";

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

	public function detail_uzr_un2($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_uzr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_uzr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_uzr($session);
				$data['view']		= "v_detail_uzr_un2";

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

	//NARR

	public function narr_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Approve Non Aktif Routing";
				$user_id		 	= $this->session->userdata('user_id');
				$data['narr_reg']	= $this->m_content_dashboard_regional->narr_reg($user_id);
				$data['view']		= "v_narr_reg";

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

	//Approve MPA

	public function detail_narr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Routing";
				$data['detail']		= $this->m_content_dashboard_regional->detail_narr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_narr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_narr($session);
				$data['view']		= "v_detail_narr";

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

	//Outstanding MPA

	public function detail_narr_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Routing";
				$data['detail']		= $this->m_content_dashboard_regional->detail_narr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_narr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_narr($session);
				$data['view']		= "v_detail_narr_out";

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

	//Testing MPA

	public function testing_detail_narr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Routing";
				$data['detail']		= $this->m_content_dashboard_regional->detail_narr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_narr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_narr($session);
				$data['view']		= "v_testing_detail_narr";

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

	//UnApprove MPA

	public function detail_narr_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Routing";
				$data['detail']		= $this->m_content_dashboard_regional->detail_narr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_narr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_narr($session);
				$data['view']		= "v_detail_narr_un";

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

	public function detail_narr_un2($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Routing";
				$data['detail']		= $this->m_content_dashboard_regional->detail_narr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_narr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_narr($session);
				$data['view']		= "v_detail_narr_un2";

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

	//NASR

	public function nasr_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Approve Non Aktif Service";
				$user_id			= $this->session->userdata('user_id');
				$data['nasr_reg']	= $this->m_content_dashboard_regional->nasr_reg($user_id);
				$data['view']		= "v_nasr_reg";

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

	//Approve MPA

	public function detail_nasr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_nasr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_nasr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_nasr($session);
				$data['view']		= "v_detail_nasr";

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

	//Outstanding MPA

	public function detail_nasr_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_nasr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_nasr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_nasr($session);
				$data['view']		= "v_detail_nasr_out";

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

	//Testing MPA

	public function testing_detail_nasr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_nasr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_nasr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_nasr($session);
				$data['view']		= "v_testing_detail_nasr";

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

	//Approve MPA

	public function detail_nasr_app($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_nasr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_nasr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_nasr($session);
				$data['view']		= "v_detail_nasr_app";

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

	//UnApprove MPA

	public function detail_nasr_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_nasr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_nasr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_nasr($session);
				$data['view']		= "v_detail_nasr_un";

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

	//Not Approve MPA 2

	public function detail_nasr_un2($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Non Aktif Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_nasr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_nasr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_nasr($session);
				$data['view']		= "v_detail_nasr_un2";

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

	//PSR

	public function psr_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Approve Penambahan Service";
				$user_id			= $this->session->userdata('user_id');
				$data['psr_reg']	= $this->m_content_dashboard_regional->psr_reg($user_id);
				$data['view']		= "v_psr_reg";

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

	//Approve MPA

	public function detail_psr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Penambahan Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_psr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_psr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_psr($session);
				$data['view']		= "v_detail_psr";

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

	//Outstanding MPA
	public function detail_psr_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Penambahan Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_psr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_psr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_psr($session);
				$data['view']		= "v_detail_psr_out";

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

	//UnApprove MPA

	public function detail_psr_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Penambahan Service";
				$data['detail']		= $this->m_content_dashboard_regional->detail_psr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_psr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_psr($session);
				$data['view']		= "v_detail_psr_un";

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

	//ASR 

	public function asr_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Approve Aktif Service Non Aktif";
				$user_id			= $this->session->userdata('user_id');
				$data['asr_reg']	= $this->m_content_dashboard_regional->asr_reg($user_id);
				$data['view']		= "v_asr_reg";

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

	//Approve MPA

	public function detail_asr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Aktif Service Non Aktif";
				$data['detail']		= $this->m_content_dashboard_regional->detail_asr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_asr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_asr($session);
				$data['view']		= "v_detail_asr";

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

	public function detail_asr_app($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Aktif Service Non Aktif";
				$data['detail']		= $this->m_content_dashboard_regional->detail_asr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_asr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_asr($session);
				$data['view']		= "v_detail_asr_app";

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

	//Outstanding MPA

	public function detail_asr_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Aktif Service Non Aktif";
				$data['detail']		= $this->m_content_dashboard_regional->detail_asr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_asr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_asr($session);
				$data['view']		= "v_detail_asr_out";

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

	//UnApprove MPA

	public function detail_asr_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Aktif Service Non Aktif";
				$data['detail']		= $this->m_content_dashboard_regional->detail_asr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_asr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_asr($session);
				$data['view']		= "v_detail_asr_un";

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

	public function detail_asr_un2($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Aktif Service Non Aktif";
				$data['detail']		= $this->m_content_dashboard_regional->detail_asr($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_asr($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_asr($session);
				$data['view']		= "v_detail_asr_un2";

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

	//UTIR
	public function utir_reg()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Approve Update Intracity";
				$user_id			= $this->session->userdata('user_id');
				$data['utir_reg']	= $this->m_content_dashboard_regional->utir_reg($user_id);
				$data['view']		= "v_utir_reg";

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

	//Outstanding MPA
	public function detail_utir_out($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Update Intracity";
				$data['detail']		= $this->m_content_dashboard_regional->detail_utir($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utir($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utir($session);
				$get_no_request 	= $this->m_content_dashboard_regional->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_regional->bdetail($no_request);
				$data['view']		= "v_detail_utir_out";

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

	public function testing_detail_utir($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_utir($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utir($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utir($session);
				$get_no_request 	= $this->m_content_dashboard_regional->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_regional->bdetail($no_request);
				$data['view']		= "v_testing_detail_utir";

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

	public function detail_utir($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_utir($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utir($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utir($session);
				$get_no_request 	= $this->m_content_dashboard_regional->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_regional->bdetail($no_request);
				$data['view']		= "v_detail_utir";

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

	public function detail_utir_un($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_utir($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utir($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utir($session);
				$get_no_request 	= $this->m_content_dashboard_regional->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_regional->bdetail($no_request);
				$data['view']		= "v_detail_utir_un";

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

	public function detail_utir_un2($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Approve Ubah Zone";
				$data['detail']		= $this->m_content_dashboard_regional->detail_utir($session);
				$data['regional']	= $this->m_content_dashboard_regional->notice_regional_utir($session);
				$data['mpa']		= $this->m_content_dashboard_regional->notice_mpa_utir($session);
				$get_no_request 	= $this->m_content_dashboard_regional->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_regional->bdetail($no_request);
				$data['view']		= "v_detail_utir_un2";

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
			if($this->session->userdata('user_role')==2)
			{
				$no_request 		= $this->input->post('no_request');
				$data['tdetail']	= $this->m_content_dashboard_regional->tdetail_utcu_reg($no_request);
				$data['view']		= "v_export_detail_utcu";

				$this->load->view('v_export_detail_utcu',$data);
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
			if($this->session->userdata('user_role')==2)
			{
				$no_request 	= $this->input->post('no_request');
				$data['detail']	= $this->m_content_dashboard_regional->bdetail($no_request);
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

/* End of file c_content_dashboard_regional.php */
/* Location: ./application/modules/content_dashboard_regional/controllers/c_content_dashboard_regional.php */