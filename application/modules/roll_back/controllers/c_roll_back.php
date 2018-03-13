<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_roll_back extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_roll_back');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Roll Back";
				$data['view']	= "v_roll_back";

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

	public function roll_back_data()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request		= $this->input->post('no_request');
				$run_procedure  = $this->db->PrepareSP("BEGIN P_ROLLBACK_TARIF('".$no_request."');END;");
				$this->db->Execute($run_procedure);

				$this->session->set_flashdata('request_success','Roll Back Berhasil...');
				redirect('roll_back');
				
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

/* End of file c_roll_back.php */
/* Location: ./application/modules/roll_back/controllers/c_roll_back.php */