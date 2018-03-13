<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penambahan_service_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_penambahan_service_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']		= "Penambahan Service";
				$user_branch		= $this->session->userdata('user_branch');
				$user_origin		= $this->session->userdata('user_origin');
				$data['origin']		= $user_origin;

				if($user_branch != "CGK000")
				{
					$data['view']	= "v_penambahan_service_requester";
					$this->load->view('template',$data);
				}
				else
				{
					$data['view']	= "v_penambahan_service_requester_all";
					$this->load->view('template',$data);
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

	public function get_destination()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$user_origin = $this->session->userdata('user_origin');
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_dest = $this->m_penambahan_service_requester->get_destination($user_origin,$destination);
				if($get_data_dest == TRUE)
				{
					$data_destination = $this->m_penambahan_service_requester->get_data_destination($user_origin,$destination);
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

	public function get_service()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$origin			= $this->session->userdata('user_origin');
				$destination 	= ($_GET['dest']);
				$get_services	= $this->m_penambahan_service_requester->data_service($origin,$destination);

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

	public function save_penambahan_service_requester()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 					= date('Y/m/d H:i:s');
				$ub 					= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 					= $ub."/PSR/";
				$user_id				= $this->session->userdata('user_id');
				$username				= $this->session->userdata('user_name');
				$user_branch			= $this->session->userdata('user_branch');
				$user_origin			= $this->session->userdata('user_origin');
				$user_zone_code			= $this->session->userdata('user_zone_code');
				$user_level				= $this->session->userdata('user_level');
				$branch_code			= $user_branch;
				$origin 				= $user_origin;
				$destination 			= $this->input->post('destination');
				$service 				= $this->input->post('service');
				$tarif					= $this->input->post('tarif');
				$session_request		= md5($date.$usr_id.$username.$user_branch);
				$regional				= $this->session->userdata('user_regional');
				//$tgl_p_c				= $this->input->post('tgl_penambahan_service');
				//$tgl_penambahan_service	= date('Y/m/d', strtotime($tgl_p_c));

				$query					= $this->m_penambahan_service_requester->save_penambahan_service_requester($seq,$user_id,$username,
										  $user_branch,$user_origin,$user_zone_code,$user_level,$branch_code,$origin,$destination,$service,
										  $tarif,$session_request,$regional);
				if($query)
				{
					$this->session->set_flashdata('request_success','Request Penambahan Service Berhasil, Silahkan tunggu Proses dari Regional');
					redirect('penambahan_service_requester/c_penambahan_service_requester');
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Request Penambahan Service Gagal...');
					redirect('penambahan_service_requester/c_penambahan_service_requester');
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

	public function get_branch()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$branch = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_branch = $this->m_penambahan_service_requester->get_branch($branch);
				if($get_branch == TRUE)
				{
					$data_branch = $this->m_penambahan_service_requester->data_branch($branch);
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
			if($this->session->userdata('user_role')==1)
			{
				$branch 	= ($_GET['branch']);
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_origin = $this->m_penambahan_service_requester->get_origin($branch,$origin);
				if($get_origin == TRUE)
				{
					$data_origin = $this->m_penambahan_service_requester->data_origin($branch,$origin);
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

	public function get_destination_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_dest_all = $this->m_penambahan_service_requester->get_destination_all($origin,$destination);
				if($get_data_dest_all == TRUE)
				{
					$data_destination_all = $this->m_penambahan_service_requester->get_data_destination_all($origin,$destination);
					foreach($data_destination_all as $gl)
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
			if($this->session->userdata('user_role')==1)
			{
				$params 	= ($_GET['params']);
				$get_services	= $this->m_penambahan_service_requester->data_service_all($params);

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

	public function save_penambahan_service_requester_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 					= date('Y/m/d H:i:s');
				$ub 					= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 					= $ub."/PSR/";
				$user_id				= $this->session->userdata('user_id');
				$username				= $this->session->userdata('user_name');
				$user_branch			= $this->session->userdata('user_branch');
				$user_origin			= $this->session->userdata('user_origin');
				$user_zone_code			= $this->session->userdata('user_zone_code');
				$user_level				= $this->session->userdata('user_level');
				$branch_code			= $this->input->post('branch');
				$origin 				= $this->input->post('origin');
				$destination 			= $this->input->post('destination');
				$service 				= $this->input->post('service');
				$tarif					= $this->input->post('tarif');
				$session_request		= md5($date.$user_id.$username.$user_branch);
				$regional				= $this->session->userdata('user_regional');
				//$tgl_p_c				= $this->input->post('tgl_penambahan_service');
				//$tgl_penambahan_service	= date('Y/m/d', strtotime($tgl_p_c));

				$query					= $this->m_penambahan_service_requester->save_penambahan_service_requester($seq,$user_id,$username,
										  $user_branch,$user_origin,$user_zone_code,$user_level,$branch_code,$origin,$destination,$service,
										  $tarif,$session_request,$regional);
				if($query)
				{
					$this->session->set_flashdata('request_success','Request Penambahan Service Berhasil, Silahkan tunggu Proses dari Regional');
					redirect('penambahan_service_requester/c_penambahan_service_requester');
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Request Penambahan Service Gagal...');
					redirect('penambahan_service_requester/c_penambahan_service_requester');
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

/* End of file c_penambahan_service_requester.php */
/* Location: ./application/modules/penambahan_service_requester/controllers/c_penambahan_service_requester.php */