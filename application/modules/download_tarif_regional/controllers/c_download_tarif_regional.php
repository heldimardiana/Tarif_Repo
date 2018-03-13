<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_download_tarif_regional extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_download_tarif_regional');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']	= "Download Tarif";
				$data['view']	= "v_download_tarif_regional";

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

	public function get_branch()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$regional 	= $this->session->userdata('user_regional');
				$branch 	= strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_branch = $this->m_download_tarif_regional->get_branch($regional,$branch);
				if($get_branch == TRUE)
				{
					$data_branch = $this->m_download_tarif_regional->data_branch($regional,$branch);
					foreach($data_branch as $gl)
					{
						$json[$i]['code'] 	= $gl['BRANCH_CODE'];
						$json[$i]['label'] 	= $gl['BRANCH_CODE']."-".$gl['BRANCH_DESC'];
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

	public function get_origin()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$branch = ($_GET['cu']);
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_origin = $this->m_download_tarif_regional->get_origin($branch,$origin);
				if($get_origin == TRUE)
				{
					$data_origin = $this->m_download_tarif_regional->data_origin($branch,$origin);
					foreach($data_origin as $gl)
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

	public function get_origin_after()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$cabang_utama = ($_GET['cu']);
				
				$cabang = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_download_tarif_regional->get_origin_after($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_download_tarif_regional->data_origin_after($cabang_utama,$cabang);
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

	public function get_destination()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_destination = $this->m_download_tarif_regional->get_destination($origin,$destination);
				if($get_destination == TRUE)
				{
					$data_destination = $this->m_download_tarif_regional->data_destination($origin,$destination);
					foreach($data_destination as $gl)
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

	public function get_destination_after()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_destination = $this->m_download_tarif_regional->get_destination_after($origin,$destination);
				if($get_destination == TRUE)
				{
					$data_destination = $this->m_download_tarif_regional->data_destination_after($origin,$destination);
					foreach($data_destination as $gl)
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

	public function get_service_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$param 	= ($_GET['dest']);
				$get_services	= $this->m_download_tarif_regional->data_service_all($param);

				if(!empty($get_services))
				{
					$dat = "<select name='service' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_services as $gs)
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

	public function get_service_after()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$param 	= ($_GET['dest']);
				$get_services	= $this->m_download_tarif_regional->get_service_after($param);

				if(!empty($get_services))
				{
					$dat = "<select name='service' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_services as $gs)
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

	public function generate_tarif_regional()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Generate Report";
				$branch      		= $this->input->post('branch');
				$origin 	 		= $this->input->post('origin');
				$destination 		= $this->input->post('destination');
				$routing 	 		= $origin.$destination;
				$service 	 		= $this->input->post('service');
				$data['routing']	= $routing;
				$data['service']	= $service;

				$data['report']	= $this->m_download_tarif_regional->generate_tarif($routing,$service);
				$data['view']	= "v_generate_report";

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

	public function generate_tarif_regional_after()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$no_request 	 = $this->input->post('no_request');
				$origin 		 = $this->input->post('origin_after');
				$destination 	 = $this->input->post('destination_after');
				$routing 		 = $origin.$destination;
				$service 	 	 = $this->input->post('service_after');
				$data['service'] = $service;

				$trim_noreq = SUBSTR($no_request,4,4);
				if($trim_noreq == 'UTCR' OR $trim_noreq == 'UTCU' OR $trim_noreq == 'UTIR')
				{
					$data['report']	 = $this->m_download_tarif_regional->generate_tarif_regional_afters($routing,$service,$no_request);
					$this->load->view('v_generate_tarif_regional_afters',$data);
				}
				else
				{
					$data['report']	 = $this->m_download_tarif_regional->generate_tarif_regional_after($routing,$service,$no_request);
					$this->load->view('v_generate_tarif_regional_after',$data);
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

	public function export_to_excel()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$routing 			= $this->input->post('routing');
				$service 			= $this->input->post('service');
				$data['service']	= $service;
				$data['report']		= $this->m_download_tarif_regional->generate_tarif($routing,$service);
				
				$this->load->view('v_export_to_excel',$data);
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

/* End of file c_download_tarif_regional.php */
/* Location: ./application/modules/download_tarif_regional/controllers/c_download_tarif_regional.php */