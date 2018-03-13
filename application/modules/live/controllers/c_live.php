<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_live extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_live_utcu');
		$this->load->model('m_live_utc');
		$this->load->model('m_live_uc');
		$this->load->model('m_live_uz');
		$this->load->model('m_live_narr');
		$this->load->model('m_live_nasr');
		$this->load->model('m_live_as');
		$this->load->model('m_live_btbp');
		$this->load->model('m_live_uti');
	}

	public function index()
	{
		
	}


	//Update Tarif Cabang Utama
	public function live_utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update Tarif Cabang Utama";
				$data['view']	= "v_live_utcu";

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

	// Get origin UTCU
	public function get_origin_utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_cu = $this->m_live_utcu->get_origin_utcu($origin);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_live_utcu->data_origin_utcu($origin);
					foreach($data_cabang_utama as $gl)
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

	// Get Destination UTCU
	public function get_destination_utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_dest = $this->m_live_utcu->get_destination_utcu($origin,$destination);
				if($get_data_dest == TRUE)
				{
					$data_destination = $this->m_live_utcu->data_destination_utcu($origin,$destination);
					foreach($data_destination as $gl)
					{
						$json[$i]['code'] 	= $gl['CITY_ZONE_CODE'];
						$json[$i]['label'] 	= $gl['CITY_ZONE_CODE']."-".$gl['CITY_ZONE_KECAMATAN'];
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

	// Get Sub Destination UTCU
	public function get_subdestination_utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$param 	= ($_GET['param']);
				$get_subdest = $this->m_live_utcu->get_subdestination_utcu($param);

				if(!empty($get_subdest))
				{
					$dat = "<select name='sub_destination' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_subdest as $gs)
		            {
		            	$dat .= "<option value=".$gs['CITY_ZONE_CODE'].">".$gs['CITY_ZONE_CODE']."-".$gs['CITY_ZONE_KECAMATAN']."</option>";
		            }
		            	$dat .= "</select>"; 
			            $dat .= "<br/>"; 
				}
				else
				{
					$dat = "<select name='sub_destination' class='form-control' required >";
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

	//Get Service UTCU
	public function data_service_utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$params 	= ($_GET['params']);
				$get_service = $this->m_live_utcu->data_service_utcu($params);

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

	//Get Tarif UTCU
	public function gettarif_utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$param 	= ($_GET['param']);
				$gettarif	= $this->m_live_utcu->gettarif($param);
				foreach($gettarif as $gz)
				{
					$tarif = $gz['TARIF_NEW'];

					$json['dat'] = $tarif;

					echo json_encode($json);

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

	public function get_service_utcu()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin 	= ($_GET['params']);
				$get_service = $this->m_live_utcu->get_service($origin);

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

	public function generate_utcu_live()
	{
		if($this->session->userdata('user_role')==3)
		{
			$origin 				= $this->input->post('origin');
			$service 				= $this->input->post('service');
			$data['utcu_before'] 	= $this->m_live_utcu->generate_utcu_live($origin,$service);
			$data['view']			= "v_generate_utcu_live";

			$this->load->view('v_generate_utcu_live',$data);
		}
		else
		{
			redirect('login/c_login');
		}
	}

	//Update Tarif Cabang
	public function live_utc()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update Tarif Cabang";
				$data['view']	= "v_live_utc";

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

	public function get_cabang_utama_utc()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang_utama = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_cu = $this->m_live_utc->get_cabang_utama_utc($cabang_utama);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_live_utc->data_cabang_utama_utc($cabang_utama);
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

	public function get_cabang_utc()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang_utama = ($_GET['cu']);
				$cabang = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_live_utc->get_cabang_utc($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_live_utc->data_cabang_utc($cabang_utama,$cabang);
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

	public function get_destination_utc()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_destination = $this->m_live_utc->get_destination_utc($origin,$destination);
				if($get_destination == TRUE)
				{
					$data_destination = $this->m_live_utc->data_destination_utc($origin,$destination);
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

	public function data_service_utc()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$params 	= ($_GET['params']);
				$get_service = $this->m_live_utc->data_service_utc($params);

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

	public function gettarif()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$param 	= ($_GET['param']);
				$gettarif	= $this->m_live_utc->gettarif($param);
				foreach($gettarif as $gz)
				{
					$tarif = $gz['TARIF_NEW'];

					$json['dat'] = $tarif;

					echo json_encode($json);

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

	//Ubah Coding
	public function live_uc()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Ubah Coding";
				$data['view']	= "v_live_uc";

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

	public function get_branch_uc()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$branch = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_cu = $this->m_live_uc->get_branch_before($branch);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_live_uc->data_branch_before($branch);
					foreach($data_cabang_utama as $gl)
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

	public function get_origin_uc()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$branch = ($_GET['cu']);
				$origin = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_live_uc->get_origin_before($branch,$origin);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_live_uc->data_origin_before($branch,$origin);
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

	//Ubah Zona
	public function live_uz()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Ubah Zona";
				$data['view']	= "v_live_uz";

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

	public function get_cabang_utama_before_uz()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang_utama = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_cu = $this->m_live_uz->get_cabang_utama_before_uz($cabang_utama);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_live_uz->data_cabang_utama_before_uz($cabang_utama);
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

	public function get_cabang_before_uz()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang_utama = ($_GET['cu']);
				$cabang = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_live_uz->get_cabang_before($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_live_uz->data_cabang_before($cabang_utama,$cabang);
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

	public function get_zona_before_uz()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang 	= ($_GET['cu']);
				$get_zone	= $this->m_live_uz->get_zona($cabang);
				foreach($get_zone as $gz)
				{
					$zona = $gz['CITY_ZONE_ID'];

					$json['dat'] = $zona;

					echo json_encode($json);

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

	//Non Aktif Routing
	public function live_narr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Non Aktif Routing";
				$data['view']	= "v_live_narr";

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

	public function get_cabang_utama_before_nar()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang_utama = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_cu = $this->m_live_narr->get_cabang_utama_before_nar($cabang_utama);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_live_narr->data_cabang_utama_before_nar($cabang_utama);
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

	public function get_cabang_before_nar()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang_utama = ($_GET['cu']);
				$cabang = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_live_narr->get_cabang_before_nar($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_live_narr->data_cabang_before_nar($cabang_utama,$cabang);
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

	public function get_destination_before_nar()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang = ($_GET['cul']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_dest = $this->m_live_narr->get_destination_before_nar($cabang,$destination);
				if($get_data_dest == TRUE)
				{
					$data_destination = $this->m_live_narr->data_destination_before_nar($cabang,$destination);
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

	//Non Aktif Service
	public function live_nasr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Non Aktif Service";
				$data['view']	= "v_live_nasr";

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

	public function get_branch_nas()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$branch = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_branch = $this->m_live_nasr->get_branch_nas($branch);
				if($get_branch == TRUE)
				{
					$data_branch = $this->m_live_nasr->data_branch_nas($branch);
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

	public function get_origin_nas()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$branch 	= ($_GET['branch']);
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_origin = $this->m_live_nasr->get_origin_nas($branch,$origin);
				if($get_origin == TRUE)
				{
					$data_origin = $this->m_live_nasr->data_origin_nas($branch,$origin);
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

	public function get_destination_nas()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_destination = $this->m_live_nasr->get_destination_nas($origin,$destination);
				if($get_destination == TRUE)
				{
					$data_destination = $this->m_live_nasr->data_destination_nas($origin,$destination);
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

	public function get_service_nas()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$params 	= ($_GET['params']);
				$get_service_all = $this->m_live_nasr->get_service_nas($params);

				if(!empty($get_service_all))
				{
					$dat = "<select name='service' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_service_all as $gs)
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

	//Aktivasi Service
	public function live_as()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Aktivasi Service";
				$data['view']	= "v_live_as";

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

	public function get_branch_ass()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$branch = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_branch = $this->m_live_as->get_branch_ass($branch);
				if($get_branch == TRUE)
				{
					$data_branch = $this->m_live_as->data_branch_ass($branch);
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

	public function get_origin_ass()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$branch 	= ($_GET['branch']);
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_origin = $this->m_live_as->get_origin_ass($branch,$origin);
				if($get_origin == TRUE)
				{
					$data_origin = $this->m_live_as->data_origin_ass($branch,$origin);
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

	public function get_destination_ass()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_destination = $this->m_live_as->get_destination_ass($origin,$destination);
				if($get_destination == TRUE)
				{
					$data_destination = $this->m_live_as->data_destination_ass($origin,$destination);
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

	public function get_service_ass()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$params 	= ($_GET['params']);
				$get_service_all = $this->m_live_as->get_service_ass($params);

				if(!empty($get_service_all))
				{
					$dat = "<select name='service' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_service_all as $gs)
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

	//Update BTBP
	public function live_btbp()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update BTBP";
				$data['view']	= "v_live_btbp";

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

	//Update Tarif Intracity
	public function live_uti()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update Tarif Intracity";
				$data['view']	= "v_live_uti";

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

	public function get_origin_utir()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_origin = $this->m_live_uti->get_origin_utir($origin);
				if($get_origin == TRUE)
				{
					$data_origin = $this->m_live_uti->data_origin_utir($origin);
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

	public function get_destination_utir()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_dest = $this->m_live_uti->get_destination_utir($origin,$destination);
				if($get_data_dest == TRUE)
				{
					$data_destination = $this->m_live_uti->data_destination_utir($origin,$destination);
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

	public function data_service_utir()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$params 	= ($_GET['params']);
				$get_service = $this->m_live_uti->data_service_utir($params);

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

	public function gettarif_utir()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$param 	= ($_GET['param']);
				$gettarif	= $this->m_live_uti->gettarif_utir($param);
				foreach($gettarif as $gz)
				{
					$tarif = $gz['TARIF_NEW'];

					$json['dat'] = $tarif;

					echo json_encode($json);

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

	//BTBP
	public function get_origin_btbp()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_origin = $this->m_live_btbp->get_origin($origin);
				if($get_origin == TRUE)
				{
					$data_origin = $this->m_live_btbp->data_origin($origin);
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

	public function generate_live_btbp_after()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin 		= $this->input->post('origin');
				$data['btbp'] 	= $this->m_live_btbp->generate_simulai_btbp_after($origin);
				$data['view']	= "v_btbp_after_excel";

				$this->load->view('v_btbp_after_excel',$data);
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

/* End of file c_live.php */
/* Location: ./application/modules/live/controllers/c_live.php */