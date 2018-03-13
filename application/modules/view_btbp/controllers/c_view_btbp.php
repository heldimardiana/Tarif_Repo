<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_view_btbp extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_view_btbp');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$data['title']	= "View BTBP";
			$data['view']	= "v_view_btbp";

			$this->load->view('template',$data);
		}
		else
		{
			redirect('login/c_login');
		}
	}

	public function get_origin()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$origin 		= strtoupper($_REQUEST['term']);
			$i 	= 0;
			$get_data_c		= $this->m_view_btbp->get_origin($origin);
			if($get_data_c == TRUE)
			{
				$data_cabang = $this->m_view_btbp->data_origin($origin);
				foreach($data_cabang as $dc)
				{
					$json[$i]['code'] 	= $dc['CITY_CODE'];
					$json[$i]['label'] 	= $dc['CITY_CODE']."-".$dc['CITY_NAME'];
					$i++;
				}
			}
			else
			{
				$json[0]['code'] = "";
				$json[0]['label'] = "Data not Found";
			}
			echo json_encode($json);
		}
		else
		{
			redirect('login/c_login');
		}
	}

	public function generate_view_btbp()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$origin			= $this->input->post('origin');
			$data['btbp']	= $this->m_view_btbp->generate_btbp($origin);

			$this->load->view('v_generate_view_btbp',$data);
		}
		else
		{
			redirect('login/c_login');
		}
	}

}

/* End of file c_view_btbp.php */
/* Location: ./application/modules/view_btbp/controllers/c_view_btbp.php */