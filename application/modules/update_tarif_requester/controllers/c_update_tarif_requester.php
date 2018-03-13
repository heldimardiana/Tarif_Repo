<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_tarif_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update Tarif";
				$data['view']	= "v_update_tarif_requester";

				$this->load->view('template', $data);
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

	public function get_cabang_utama()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang_utama = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_cu = $this->m_update_tarif_requester->get_data_cabang_utama($cabang_utama);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_update_tarif_requester->data_cabang_utama($cabang_utama);
					foreach($data_cabang_utama as $gl)
					{
						$json[$i]['code'] 	= $gl['BRANCH_CODE'];
						$json[$i]['label'] 	= $gl['BRANCH_CITY']."-".$gl['BRANCH_DESC'];
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
		else
		{
			redirect('login/c_login');
		}
	}

	public function get_cabang()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang_utama = ($_GET['cu']);
				$cabang = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_update_tarif_requester->get_cabang($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_update_tarif_requester->data_cabang($cabang_utama,$cabang);
					foreach($data_cabang as $gl)
					{
						$json[$i]['code'] 	= $gl['CITY_CODE'];
						$json[$i]['label'] 	= $gl['CITY_CODE']."-".$gl['CITY_NAME'];
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
		else
		{
			redirect('login/c_login');
		}
	}

	public function data_service()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$service 		= ($_GET['serv']);
				$get_service 	= $this->m_update_tarif_requester->get_service($service);

				if(!empty($get_service))
				{
					$dat = "<select name='service' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_service as $gs)
		            {
		            	$dat .= "<option value=".$gs['DROURATE_SERVICE'].">".$gs['DROURATE_SERVICE']."</option>";
		            }
		            	$dat .= "</select>"; 
			            $dat .= "<br/>"; 
				}
				else
				{
					$dat = "<select name='service' class='form-control' required >";
		         	$dat .= "<option value='' disabled selected>Choose</option>";
		         	$dat .= "</select>"; 
		         	$dat .= "<br/>"; 
				}
				$json['dat'] = $dat;
				echo json_encode($json);
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

/* End of file c_update_tarif.php */
/* Location: ./application/modules/update_tarif/controllers/c_update_tarif.php */