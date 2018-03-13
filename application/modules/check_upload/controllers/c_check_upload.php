<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_check_upload extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_check_upload');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title'] 	= "Check Upload";
				$data['view']	= "v_check_upload";

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

	public function generate_check_upload()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request = $this->input->post('no_reqest');
				$request    = $this->input->post('request');

				if($request == "1")
				{
					$data['title']	= "Check Upload";
					$data['utcu']	= $this->m_check_upload->utcu($no_request);
					$data['view']	= "v_generate_utcu";

					$this->load->view('template',$data);
				}
				else if($request == "2")
				{
					$data['title']	= "Check Upload";
					$data['utc']	= $this->m_check_upload->utc($no_request);
					$data['view']	= "v_generate_utc";

					$this->load->view('template',$data);
				}
				else if($request == "3")
				{
					$data['title']	= "Check Upload";
					$data['uc']		= $this->m_check_upload->uc($no_request);
					$data['view']	= "v_generate_uc";

					$this->load->view('template',$data);
				}
				else if($request == "4")
				{
					$data['title']	= "Check Upload";
					$data['uz']		= $this->m_check_upload->uz($no_request);
					$data['view']	= "v_generate_uz";

					$this->load->view('template',$data);
				}
				else if($request == "5")
				{
					$data['title']	= "Check Upload";
					$data['narr']	= $this->m_check_upload->narr($no_request);
					$data['view']	= "v_generate_narr";

					$this->load->view('template',$data);
				}
				else if($request == "6")
				{
					$data['title']	= "Check Upload";
					$data['nasr']	= $this->m_check_upload->nasr($no_request);
					$data['view']	= "v_generate_nasr";

					$this->load->view('template',$data);
				}
				else if($request == "7")
				{
					$data['title']	= "Check Upload";
					$data['asr']	= $this->m_check_upload->asr($no_request);
					$data['view']	= "v_generate_asr";

					$this->load->view('template',$data);
				}
				else if($request == "8")
				{
					$data['title']	= "Check Upload";
					$data['uti']	= $this->m_check_upload->uti($no_request);
					$data['view']	= "v_generate_uti";

					$this->load->view('template',$data);
				}
				else if($request == "9")
				{
					$data['title']	= "Check Upload";
					$data['btbp']	= $this->m_check_upload->btbp($no_request);
					$data['view']	= "v_generate_btbp";

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

}

/* End of file c_check_upload.php */
/* Location: ./application/modules/check_upload/controllers/c_check_upload.php */