<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_regional extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']	= "Update Tarif";
				$data['view']	= "v_update_tarif_regional";

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

/* End of file c_update_tarif_regional.php */
/* Location: ./application/modules/update_tarif_regional/controllers/c_update_tarif_regional.php */