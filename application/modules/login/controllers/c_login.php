<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_login');
		require_once('BrowserDetection.php');
	}

	public function index()
	{
		// auto_init pada config database dibuat "FALSE"
		$db_obj = $this->load->database('default',TRUE);
		$connected = $db_obj->initialize();
		$converted_res = ($connected) ? 'TRUE' : 'FALSE'; // Convert boolean to string
		if($converted_res == "TRUE")
		{
			$browser 	= new BrowserDetection();
			$validasi 	= $browser->getName();
			if($validasi == "Chrome")
			{
				$this->load->view('v_login');
			}
			else
			{
				$this->load->view('v_warning_browser');
			}
		}
		else
		{
			$this->load->view('under_maintenance');
		}
		
		
	}

	public function verify_login()
	{
		$username 	= $this->input->post('username');
		$random1	= "202cb69kjsu84kd94mmd3";
		$random2	= "asffm834523i4c2934u23hwr";
		$pass 		= $this->input->post('password');
		$password 	= md5($random1.$random2.$pass);
		$query		= $this->m_login->verify_login($username,$password);
		
			
			$user_data	= $this->m_login->data_user($username,$password);
				foreach($user_data as $user)
				{
					$this->session->set_userdata('auth_admin',TRUE);
					$this->session->set_userdata('user_id',$user['USER_ID']);
					$this->session->set_userdata('user_name',$user['USER_NAME']);
					$this->session->set_userdata('user_branch',$user['USER_BRANCH']);
					$this->session->set_userdata('user_origin',$user['USER_ORIGIN']);
					$this->session->set_userdata('user_zone_code',$user['USER_ZONE_CODE']);
					$this->session->set_userdata('user_role',$user['USER_ROLE']);
					$this->session->set_userdata('user_level',$user['USER_LEVEL']);
					$this->session->set_userdata('user_regional',$user['USER_REGIONAL']);
					$this->session->set_userdata('user_session',$user['USER_SESSION']);
					
				}

		if($query == TRUE)
		{
			$sqls = $this->m_login->ngflag($username,$password);
			if($sqls == TRUE)
			{
				$sql = $this->m_login->get_user_role($username,$password);
				foreach($sql as $q)
				{
					$role = $q['USER_ROLE'];
					
					if($role == 1)
					{
						redirect('dashboard_requester');
					}
					else if($role == 2)
					{
						redirect('dashboard_regional');
					}
					else if($role == 3)
					{
						redirect('dashboard_mpa');
					}
					else if($role == 4)
					{
						redirect('dashboard_viewer');
					}
					else
					{
						echo "Zonk";
					}
				}
			}
			else
			{
				echo "Gagal NgFlag..";
			}
		}
		else
		{
			$this->session->set_flashdata('erorr_login','Username atau Password Salah..!');
			redirect('login/c_login');
		}
	}

	public function logout()
	{
		$user_id 		= $this->session->userdata('user_id');
		$run_procedure  = $this->db->PrepareSP("BEGIN P_JOB_TARIF_LOGIN_USER('".$user_id."');END;");
		$this->db->Execute($run_procedure);
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

/* End of file c_login.php */
/* Location: ./application/modules/login/controllers/c_login.php */