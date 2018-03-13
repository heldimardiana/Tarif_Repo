<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard_viewer extends MX_Controller {

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==4)
			{
				$data['title']	= "Dashboard";
				$data['view']	= "v_dashboard_viewer";

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

}

/* End of file c_dashboard_viewer.php */
/* Location: ./application/modules/dashboard_viewer/controllers/c_dashboard_viewer.php */