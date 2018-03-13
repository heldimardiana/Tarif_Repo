<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penambahan_service_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_penambahan_service_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Penambahan Service";
				$data['psm']	= $this->m_penambahan_service_mpa->psm();
				$data['view']	= "v_penambahan_service_mpa";

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

	public function detail_penambahan_service_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Penambahan Service";
				$data['detail']		= $this->m_penambahan_service_mpa->detail_penambahan_service_mpa($session);
				$data['statuss']	= $this->m_penambahan_service_mpa->tarif_status_request();
				$data['notice']		= $this->m_penambahan_service_mpa->notice($session);
				$data['view']		= "v_detail_penambahan_service_mpa";

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

	public function save_detail_penambahan_service_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 	= $this->input->post('no_request');
				$status 		= $this->input->post('status');
				$user_id 		= $this->session->userdata('user_id');
				$tgl_pen_s 		= $this->input->post('tgl_penambahan_service');
				$tgl_pen_sa 	= date('Y/m/d',strtotime($tgl_pen_s));

				if($status == "1")
				{
					$tgl_penambahan_service = $tgl_pen_sa;
				}
				else
				{
					$tgl_penambahan_service = "";
				}

				$notice 		= $this->input->post('notice');

				$query 			= $this->m_penambahan_service_mpa->save_detail_penambahan_service_mpa($no_request,$status,$user_id,
								  $tgl_penambahan_service,$notice);

				if($query)
				{
					$this->session->set_flashdata('request_success','Set Status Berhasil...');
					redirect('penambahan_service_mpa/c_penambahan_service_mpa');
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Berhasil...');
					redirect('penambahan_service_mpa/c_penambahan_service_mpa');
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

/* End of file c_penambahan_service_mpa.php */
/* Location: ./application/modules/penambahan_service_mpa/controllers/c_penambahan_service_mpa.php */