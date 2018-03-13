<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_content_dashboard_mpa extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_content_dashboard_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
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

	public function utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approve Tarif Cabang Utama";
				//$user_id		= $this->session->userdata('user_id');
				$data['utcu']	= $this->m_content_dashboard_mpa->utcu();
				$data['view']	= "v_utcu";

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

	public function detail_utcu($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Approve Tarif Cabang Utama";
				//$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_mpa->detail_utcu($session);
				$no_req 			= $this->m_content_dashboard_mpa->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_content_dashboard_mpa->tdetail_utcu($no_request);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_regional_utcu($session);
				$data['testing']	= $this->m_content_dashboard_mpa->notice_mpa_utcu($session);
				$data['utcu']		= $this->m_content_dashboard_mpa->utcu();
				$data['view']		= "v_detail_utcu";

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

	public function utcr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approve Tarif Cabang";
				//$user_id		= $this->session->userdata('user_id');
				$data['utcr']	= $this->m_content_dashboard_mpa->utcr();
				$data['view']	= "v_utcr";

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

	public function detail_utcr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Approve Tarif Cabang";
				//$user_id			= $this->session->userdata('user_id');
				$data['detail']		= $this->m_content_dashboard_mpa->detail_utcr($session);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_regional_utcr($session);
				$data['testing']	= $this->m_content_dashboard_mpa->notice_mpa_utcr($session);
				$data['utcr']		= $this->m_content_dashboard_mpa->utcr();
				$data['view']		= "v_detail_utcr";

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
	public function ucr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approve Ubah Coding";
				//$user_id		= $this->session->userdata('user_id');
				$data['ucr']	= $this->m_content_dashboard_mpa->ucr();
				$data['view']	= "v_ucr";

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

	public function detail_ucr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Ubah Coding";
				$data['detail']		= $this->m_content_dashboard_mpa->detail_ucr($session);
				$data['tdetail']	= $this->m_content_dashboard_mpa->tdetail_ubah_coding_mpa($session);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_regional_ucr($session);
				$data['mpa']		= $this->m_content_dashboard_mpa->notice_mpa_ucr($session);
				//$user_id			= $this->session->userdata('user_id');
				$data['ucr']		= $this->m_content_dashboard_mpa->ucr();
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

	public function uzr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approve Ubah Zona";
				//$user_id		= $this->session->userdata('user_id');
				$data['uzr']	= $this->m_content_dashboard_mpa->uzr();
				$data['view']	= "v_uzr";

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

	public function detail_uzr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Ubah Zona";
				$data['detail']		= $this->m_content_dashboard_mpa->detail_uzr($session);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_regional_uzr($session);
				$data['mpa']		= $this->m_content_dashboard_mpa->notice_mpa_uzr($session);
				//$user_id			= $this->session->userdata('user_id');
				$data['uzr']		= $this->m_content_dashboard_mpa->uzr();
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

	public function narr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approve Non Aktif Routing";
				//$user_id 		= $this->session->userdata('user_id');
				$data['narr']	= $this->m_content_dashboard_mpa->narr();
				$data['view']	= "v_narr";

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

	public function detail_narr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Approve Non Aktif Routing";
				$data['detail']		= $this->m_content_dashboard_mpa->detail_narr($session);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_regional_narr($session);
				$data['mpa']		= $this->m_content_dashboard_mpa->notice_mpa_narr($session);
				//$user_id 			= $this->session->userdata('user_id');
				$data['narr']		= $this->m_content_dashboard_mpa->narr();
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

	public function nasr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approval Non Aktif Service";
				//$user_id 		= $this->session->userdata('user_id');
				$data['nasr']	= $this->m_content_dashboard_mpa->nasr();
				$data['view']	= "v_nasr";

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

	public function detail_nasr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Approve Non Aktif Service";
				$data['detail']		= $this->m_content_dashboard_mpa->detail_nasr($session);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_rerional_nasr($session);
				$data['mpa']		= $this->m_content_dashboard_mpa->notice_mpa_nasr($session);
				//$user_id 			= $this->session->userdata('user_id');
				$data['nasr']		= $this->m_content_dashboard_mpa->nasr();
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

	public function psr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approve Penambahan Service";
				$user_id 		= $this->session->userdata('user_id');
				$data['psr']	= $this->m_content_dashboard_mpa->psr($user_id);
				$data['view']	= "v_psr";

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

	public function detail_psr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Approve Penambahan Service";
				$data['detail']		= $this->m_content_dashboard_mpa->detail_psr($session);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_regional_psr($session);
				$data['mpa']		= $this->m_content_dashboard_mpa->notice_mpa_psr($session);
				$user_id 			= $this->session->userdata('user_id');
				$data['psr']		= $this->m_content_dashboard_mpa->psr($user_id);
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

	public function asr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approval Aktif Service";
				//$user_id 		= $this->session->userdata('user_id');
				$data['asr']	= $this->m_content_dashboard_mpa->asr();
				$data['view']	= "v_asr";

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

	public function detail_asr($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Penambahan Service";
				$data['detail']		= $this->m_content_dashboard_mpa->detail_asr($session);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_regional_asr($session);
				$data['mpa']		= $this->m_content_dashboard_mpa->notice_mpa_asr($session);
				//$user_id 			= $this->session->userdata('user_id');
				$data['asr']		= $this->m_content_dashboard_mpa->asr();
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

	//UTIR
	public function utir()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Approval Aktif Service";
				//$user_id 		= $this->session->userdata('user_id');
				$data['utir']	= $this->m_content_dashboard_mpa->utir();
				$data['view']	= "v_utir";

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
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Penambahan Service";
				$data['detail']		= $this->m_content_dashboard_mpa->detail_utir($session);
				$data['regional']	= $this->m_content_dashboard_mpa->notice_regional_utir($session);
				$data['mpa']		= $this->m_content_dashboard_mpa->notice_mpa_utir($session);
				$get_no_request 	= $this->m_content_dashboard_mpa->get_no_request_utir($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_content_dashboard_mpa->bdetail($no_request);
				//$user_id 			= $this->session->userdata('user_id');
				$data['utir']		= $this->m_content_dashboard_mpa->utir();
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

	public function btbp()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update BTBP";
				//$user_id 		= $this->session->userdata('user_id');
				$data['btbp']	= $this->m_content_dashboard_mpa->btbp();
				$data['view']	= "v_btbp";

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

	public function detail_btbp($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']			= "Detail Update BTBP";
				$data['detail']			= $this->m_content_dashboard_mpa->detail_btbp($session);
				$get_no 				= $this->m_content_dashboard_mpa->get_no($session);

				foreach($get_no as $gt)
				{
					$no_request = $gt['NO_REQUEST'];
				}

				$data['detail_btbp']	= $this->m_content_dashboard_mpa->detail_btbp_s($no_request);
				$data['approve_1']		= $this->m_content_dashboard_mpa->notice_approve_1_btbp($session);
				$data['approve_2']		= $this->m_content_dashboard_mpa->notice_approve_2_btbp($session);
				//$user_id 				= $this->session->userdata('user_id');
				$data['btbp']			= $this->m_content_dashboard_mpa->btbp();
				$data['view']			= "v_detail_btbp";

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

	public function export_detail_utir()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 	= $this->input->post('no_request');
				$data['detail']	= $this->m_content_dashboard_mpa->bdetail($no_request);
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

	public function export_detail()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 		= $this->input->post('no_request');
				$data['tdetail']	= $this->m_content_dashboard_mpa->tdetail_utcu($no_request);
				$data['view']		= "v_detail_content_utcu";

				$this->load->view('v_detail_content_utcu',$data);

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
			if($this->session->userdata('user_role')==3)
			{
				$no_request 		= $this->input->post('no_request');
				$data['exports']	= $this->m_content_dashboard_mpa->export_detail_ucr($no_request);
				$data['view']		= "v_export_detail_ucr_mpa";

				$this->load->view('v_export_detail_ucr_mpa',$data);
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

	public function export_detail_btbp()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 		= $this->input->post('no_request');
				$data['exports']	= $this->m_content_dashboard_mpa->detail_btbp_s($no_request);
				$data['view']		= "v_export_detail_btbp_mpa";

				$this->load->view('v_export_detail_btbp_mpa',$data);
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

/* End of file c_content_dashboard_mpa.php */
/* Location: ./application/modules/content_dashboard_mpa/controllers/c_content_dashboard_mpa.php */