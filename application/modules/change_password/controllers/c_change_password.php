<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_change_password extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_change_password');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$user_id 		= $this->session->userdata('user_id');
			$data['change']	= $this->m_change_password->get_old_password($user_id);
			$data['title']	= "Change Password";
			$data['view']	= "v_change_password";

			$this->load->view('template',$data);
		}
		else
		{
			redirect('login/c_login');
		}
	}

	public function save_change_password()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$user_id 		= $this->session->userdata('user_id');
			$random1 		= "202cb69kjsu84kd94mmd3";
			$random2 		= "asffm834523i4c2934u23hwr";
			$new_pass 	 	= $this->input->post('new_password');
			$new_password 	= md5($random1.$random2.$new_pass);
			
			$query 			= $this->m_change_password->save_change_password($user_id,$new_password);
			if($query)
			{
				redirect('logout');
			}
			else
			{
				echo "Gagal Change Password..";
			}
		}
		else
		{
			redirect('login/c_login');
		}
	}

}

/* End of file c_change_password.php */
/* Location: ./application/modules/change_password/controllers/c_change_password.php */