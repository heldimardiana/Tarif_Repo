<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_report_regional extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_report_regional');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']	= "Report";
				$data['view']	= "v_report_regional";

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

	public function generate_report_regional()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_f		= $this->input->post('date_from');
				$date_fr 	= date('Y/m/d',strtotime($date_f));

				if($date_fr == "" || $date_fr == "1970/01/01")
				{
					$date_from = date('Y/m/d');
				}
				else
				{
					$date_from = $date_fr;
				}

				$date_t 	= $this->input->post('date_thru');
				$date_th 	= date('Y/m/d',strtotime($date_t));

				if($date_th == "" || $date_th == "1970/01/01")
				{
					$date_thru = date('Y/m/d');
				}
				else
				{
					$date_thru = $date_th;
				}

				$request 		= $this->input->post('request');
				$user_regional	= $this->session->userdata('user_regional');

				if($request == "1")
				{
					$data['title']		= "Report Update Tarif Cabang Utama";
					$data['utcu']		= $this->m_report_regional->report_utcu($date_from,$date_thru,$user_regional);
					$data['date_from']	= $date_from;
					$data['date_thru']	= $date_thru;
					$data['view']		= "v_report_utcu";

					$this->load->view('template',$data);
				}
				else if($request == "2")
				{
					$data['title']		= "Report Update Tarif Cabang";
					$data['utcr']		= $this->m_report_regional->report_utcr($date_from,$date_thru,$user_regional);
					$data['date_from']	= $date_from;
					$data['date_thru']	= $date_thru;
					$data['view']		= "v_report_utcr";

					$this->load->view('template',$data);
				}
				else if($request == "3")
				{
					$data['title']		= "Report Ubah Coding";
					$data['ucr']		= $this->m_report_regional->report_ucr($date_from,$date_thru,$user_regional);
					$data['date_from']	= $date_from;
					$data['date_thru']	= $date_thru;
					$data['view']		= "v_report_ucr";

					$this->load->view('template',$data);
				}
				else if($request == "4")
				{
					$data['title']		= "Report Ubah Zona";
					$data['uzr']		= $this->m_report_regional->report_uzr($date_from,$date_thru,$user_regional);
					$data['date_from']	= $date_from;
					$data['date_thru']	= $date_thru;
					$data['view']		= "v_report_uzr";

					$this->load->view('template',$data);
				}
				else if($request == "5")
				{
					$data['title']		= "Report Non Aktif Routing";
					$data['narr']		= $this->m_report_regional->report_narr($date_from,$date_thru,$user_regional);
					$data['date_from']	= $date_from;
					$data['date_thru']	= $date_thru;
					$data['view']		= "v_report_narr";

					$this->load->view('template',$data);
				}
				else if($request == "6")
				{
					$data['title']		= "Report Non Aktif Service";
					$data['nasr']		= $this->m_report_regional->report_nasr($date_from,$date_thru,$user_regional);
					$data['date_from']	= $date_from;
					$data['date_thru']	= $date_thru;
					$data['view']		= "v_report_nasr";

					$this->load->view('template',$data);
				}
				else if($request == "7")
				{
					$data['title']		= "Report Aktivasi Service";
					$data['asr']		= $this->m_report_regional->report_asr($date_from,$date_thru,$user_regional);
					$data['date_from']	= $date_from;
					$data['date_thru']	= $date_thru;
					$data['view']		= "v_report_asr";

					$this->load->view('template',$data);
				}
				else if($request == "8")
				{
					$data['title']		= "Report Update Tarif Intracity";
					$data['uti']		= $this->m_report_regional->report_uti($date_from,$date_thru,$user_regional);
					$data['date_from']	= $date_from;
					$data['date_thru']	= $date_thru;
					$data['view']		= "v_report_uti";

					$this->load->view('template',$data);
				}
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

	public function print_report_utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_from			= $this->input->post('date_from');
				$date_thru			= $this->input->post('date_thru');
				$user_regional		= $this->session->userdata('user_regional');
				$data['date_from']	= $date_from;
				$data['date_thru']	= $date_thru;
				$data['utcu']		= $this->m_report_regional->print_report_utcu($date_from,$date_thru,$user_regional);

				$this->load->view('v_print_report_utcu',$data);
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

	public function print_report_utcr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_from			= $this->input->post('date_from');
				$date_thru			= $this->input->post('date_thru');
				$user_regional		= $this->session->userdata('user_regional');
				$data['date_from']	= $date_from;
				$data['date_thru']	= $date_thru;
				$data['utcr']		= $this->m_report_regional->print_report_utcr($date_from,$date_thru,$user_regional);

				$this->load->view('v_print_report_utcr',$data);
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

	public function print_report_ucr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_from			= $this->input->post('date_from');
				$date_thru			= $this->input->post('date_thru');
				$user_regional		= $this->session->userdata('user_regional');
				$data['date_from']	= $date_from;
				$data['date_thru']	= $date_thru;
				$data['ucr']		= $this->m_report_regional->print_report_ucr($date_from,$date_thru,$user_regional);

				$this->load->view('v_print_report_ucr',$data);
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

	public function print_report_narr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_from			= $this->input->post('date_from');
				$date_thru			= $this->input->post('date_thru');
				$user_regional		= $this->session->userdata('user_regional');
				$data['date_from']	= $date_from;
				$data['date_thru']	= $date_thru;
				$data['narr']		= $this->m_report_regional->print_report_narr($date_from,$date_thru,$user_regional);

				$this->load->view('v_print_report_narr',$data);
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

	public function print_report_nasr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_from			= $this->input->post('date_from');
				$date_thru			= $this->input->post('date_thru');
				$user_regional		= $this->session->userdata('user_regional');
				$data['date_from']	= $date_from;
				$data['date_thru']	= $date_thru;
				$data['nasr']		= $this->m_report_regional->print_report_nasr($date_from,$date_thru,$user_regional);

				$this->load->view('v_print_report_nasr',$data);
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

	public function print_report_asr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_from			= $this->input->post('date_from');
				$date_thru			= $this->input->post('date_thru');
				$user_regional		= $this->session->userdata('user_regional');
				$data['date_from']	= $date_from;
				$data['date_thru']	= $date_thru;
				$data['asr']		= $this->m_report_regional->print_report_asr($date_from,$date_thru,$user_regional);

				$this->load->view('v_print_report_asr',$data);
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

	public function print_report_uzr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_from			= $this->input->post('date_from');
				$date_thru			= $this->input->post('date_thru');
				$user_regional		= $this->session->userdata('user_regional');
				$data['date_from']	= $date_from;
				$data['date_thru']	= $date_thru;
				$data['uzr']		= $this->m_report_regional->print_report_uzr($date_from,$date_thru,$user_regional);

				$this->load->view('v_print_report_uzr',$data);
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

	public function print_report_uti()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$date_from			= $this->input->post('date_from');
				$date_thru			= $this->input->post('date_thru');
				$user_regional		= $this->session->userdata('user_regional');
				$data['date_from']	= $date_from;
				$data['date_thru']	= $date_thru;
				$data['uti']		= $this->m_report_regional->print_report_uti($date_from,$date_thru,$user_regional);

				$this->load->view('v_print_report_uti',$data);
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

/* End of file c_report_regional.php */
/* Location: ./application/modules/report_regional/controllers/c_report_regional.php */