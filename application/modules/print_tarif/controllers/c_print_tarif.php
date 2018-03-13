<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_print_tarif extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_print_tarif');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$data['title']	= "Download Tarif";
			$data['view']	= "v_print_tarif";

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
			$origin = strtoupper($_REQUEST['term']);
			$i 	= 0;
			$get_origin = $this->m_print_tarif->get_origin($origin);
			if($get_origin == TRUE)
			{
				$data_origin = $this->m_print_tarif->data_origin($origin);
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

	public function get_service1()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{	
			$origin 		= ($_GET['ori']);
			$get_services	= $this->m_print_tarif->get_service1($origin);

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

	public function get_destination()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$origin = ($_GET['cu']);
			$destination = strtoupper($_REQUEST['term']);
			$i 	= 0;
			$get_destination = $this->m_print_tarif->get_destination($origin,$destination);
			if($get_destination == TRUE)
			{
				$data_destination = $this->m_print_tarif->data_destination($origin,$destination);
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

	public function get_service()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$param 			= ($_GET['dest']);
			$get_services	= $this->m_print_tarif->get_service($param);

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

	public function generate_print_tarif()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			$origin 	 	= $this->input->post('origin');
			$destination 	= $this->input->post('destination');
			$service 		= $this->input->post('service'); 

			if(!empty($origin) AND !empty($destination) AND !empty($service))
			{
				$data['print'] = $this->m_print_tarif->print_1($origin,$destination,$service);

				$this->load->view('v_print_tarif_excel',$data);
			}
			else if(!empty($origin) AND !empty($destination) AND empty($service))
			{
				$data['print'] = $this->m_print_tarif->print_2($origin,$destination);

				$this->load->view('v_print_tarif_excel',$data);
			}
			else if(!empty($origin) AND empty($destination) AND !empty($service))
			{
				$data['print'] = $this->m_print_tarif->print_3($origin,$service);

				$this->load->view('v_print_tarif_excel',$data);
			}
			else if(!empty($origin) AND empty($destination) AND empty($service))
			{
				$data['print'] = $this->m_print_tarif->print_4($origin);

				$this->load->view('v_print_tarif_excel',$data);
			}
		}
		else
		{
			redirect('login/c_login');
		}
	}

}

/* End of file c_print_tarif.php */
/* Location: ./application/modules/print_tarif/controllers/c_print_tarif.php */