<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_aktivasi_tarif_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Aktivasi Tarif";
				$data['view']	= "v_aktivasi_tarif_mpa";

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

/* End of file c_aktivasi_tarif_mpa.php */
/* Location: ./application/modules/aktivasi_tarif_mpa/controllers/c_aktivasi_tarif_mpa.php */