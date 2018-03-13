<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penambahan_service_regional extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_penambahan_service_regional');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']	= "Penambahan Service";
				$user_regional	= $this->session->userdata('user_regional');
				$data['psr']	= $this->m_penambahan_service_regional->psr($user_regional);
				$data['view']	= "v_penambahan_service_regional";

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

	public function detail_penambahan_service_regional($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Penambahan Service";
				$data['detail']		= $this->m_penambahan_service_regional->detail_penambahan_service_regional($session);
				$data['statuss']	= $this->m_penambahan_service_regional->tarif_status_request();
				$data['view']		= "v_detail_penambahan_service_regional";

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

	public function save_detail_penambahan_service_regional()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$no_request		= $this->input->post('no_request');
				$status			= $this->input->post('status');
				$user_id		= $this->session->userdata('user_id');
				$notice			= $this->input->post('notice');

				$query			= $this->m_penambahan_service_regional->save_detail_penambahan_service_regional($no_request,$status,$user_id,$notice);

				if($query)
				{
					$this->session->set_flashdata('request_success','Set Status Berhasil...');
					redirect('penambahan_service_regional/c_penambahan_service_regional');
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Berhasil...');
					redirect('penambahan_service_regional/c_penambahan_service_regional');
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

/* End of file c_penambahan_service_regional.php */
/* Location: ./application/modules/penambahan_service_regional/controllers/c_penambahan_service_regional.php */