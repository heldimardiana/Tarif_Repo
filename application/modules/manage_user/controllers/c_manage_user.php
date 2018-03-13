<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_manage_user extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_manage_user');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Manage User";
				$data['role']	= $this->m_manage_user->get_role();
				$data['level']	= $this->m_manage_user->get_level();
				$data['branch']	= $this->m_manage_user->get_branch();
				$data['user']	= $this->m_manage_user->get_datauser();
				$data['view']	= "v_manage_user";

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

	public function get_user_id()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$user_id = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$data_user	= $this->m_manage_user->data_user($user_id);
				if($data_user == TRUE)
				{
					$user_data = $this->m_manage_user->user_data($user_id);
					foreach($user_data as $gl)
					{
						$json[$i]['code'] 	= $gl['USER_ID'];
						$json[$i]['label'] 	= $gl['USER_ID'];
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
		}
		else
		{
			redirect('login/c_login');
		}

	}

	public function duplicate_user()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$this->load->view('v_user_duplicate');
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

	public function create_user()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$user_id	= $this->input->post('user_id');
				$random1	= "202cb69kjsu84kd94mmd3";
				$random2	= "asffm834523i4c2934u23hwr";
				$data_user	= $this->m_manage_user->detail_user($user_id);

				foreach($data_user as $ds)
				{
					
					$user_name 		= $ds['USER_NAME'];
					$password 		= md5($random1.$random2.$ds['USER_PSWD']);
					$user_branch 	= $ds['USER_BRANCH'];
					$user_zone_code	= $ds['USER_ZONE_CODE'];
					$user_origin	= $ds['USER_ORIGIN'];

				
				
				$role 			= $this->input->post('role');
				$level 			= $this->input->post('level');
				$user_region	= $ds['BRANCH_OPS_REGION'];
				$session 		= md5($user_id.$user_name);
				$user_email 	= strtolower($this->input->post('email'));

				}

				if($role == "2")
				{
					$user_regional = $this->input->post('regional');
				}
				else
				{
					$user_regional = $user_region;
				}

				$query		= $this->m_manage_user->create_user($user_id,$user_name,$password,$user_branch,$user_origin,
																$user_zone_code,$role,$level,$user_regional,$session,$user_email);

				if($query == TRUE)
				{
					$this->session->set_flashdata('success_message', 'Create User Berhasil..');
					redirect('manage_user/c_manage_user');
				}
				else
				{
					$this->session->set_flashdata('erorr_message', 'Create User Gagal..');
					redirect('manage_user/c_manage_user');
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

	public function edit_user($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['edit']	= $this->m_manage_user->edit_user($session);
				$data['role']	= $this->m_manage_user->get_role();
				$data['level']	= $this->m_manage_user->get_level();
				$data['branch']	= $this->m_manage_user->get_branch();

				$this->load->view('v_edit_user',$data);
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

	public function save_edit_user()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$user_id	= strtoupper($this->input->post('user_id'));
				$username	= strtoupper($this->input->post('username'));
				$regional 	= $this->session->userdata('user_regional');
				$role 		= $this->input->post('role');

				if($role == "2")
				{
					$user_regional = $this->input->post('regional');
				}
				else
				{
					$user_regional = $regional;
				}

				$level 		= $this->input->post('level');
				$session 	= md5($user_id.$username);
				$user_email = strtolower($this->input->post('email'));

				$query		= $this->m_manage_user->save_edit_user($user_id,$username,$role,$level,$session,$user_email,$user_regional);
				if($query == TRUE)
				{
					$this->session->set_flashdata('success_edit', 'Update User Berhasil..');
					redirect('manage_user/c_manage_user');
				}
				else
				{
					$this->session->set_flashdata('erorr_edit', 'Update User Gagal..');
					redirect('manage_user/c_manage_user');
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

	public function delete_user($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$query = $this->m_manage_user->delete_user($session);
				if($query == TRUE)
				{
					$this->session->set_flashdata('success_delete', 'Delete User Berhasil..');
					redirect('manage_user/c_manage_user');
				}
				else
				{
					$this->session->set_flashdata('erorr_delete', 'Delete User Gagal..');
					redirect('manage_user/c_manage_user');
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

	public function reset_password($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$query = $this->m_manage_user->reset_password($session);
				if($query == TRUE)
				{
					$this->session->set_flashdata('success_reset', 'Reset Password User Berhasil..');
					redirect('manage_user/c_manage_user');
				}
				else
				{
					$this->session->set_flashdata('erorr_reset', 'Reset Password User Gagal..');
					redirect('manage_user/c_manage_user');
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

	//Regional
	public function update_tarif_cabang_utama_regional()
	{
		$user_regional								= $this->session->userdata('user_regional');
		$notif_update_tarif_cabang_utama_regional	= $this->m_manage_user->update_tarif_cabang_utama_regional($user_regional);
		
		echo $notif_update_tarif_cabang_utama_regional;
	}

	public function update_tarif_cabang_regional()
	{
		
		$user_regional						= $this->session->userdata('user_regional');
		$notif_update_tarif_cabang_regional	= $this->m_manage_user->update_tarif_cabang_regional($user_regional);

		echo $notif_update_tarif_cabang_regional;
			
	}

	public function ubah_coding_regional()
	{
		
		$user_regional				= $this->session->userdata('user_regional');
		$notif_ubah_coding_regional	= $this->m_manage_user->ubah_coding_regional($user_regional);

		echo $notif_ubah_coding_regional;
			
	}

	public function ubah_zona_regional()
	{
		$user_regional				= $this->session->userdata('user_regional');
		$notif_ubah_zona_regional	= $this->m_manage_user->ubah_zona_regional($user_regional);

		echo $notif_ubah_zona_regional;
	}

	public function non_aktif_routing_regional()
	{
		$user_regional						= $this->session->userdata('user_regional');
		$notif_non_aktif_routing_regional	= $this->m_manage_user->non_aktif_routing_regional($user_regional);

		echo $notif_non_aktif_routing_regional;
	}

	public function non_aktif_service_regional()
	{
		$user_regional						= $this->session->userdata('user_regional');
		$notif_non_aktif_service_regional	= $this->m_manage_user->non_aktif_service_regional($user_regional);

		echo $notif_non_aktif_service_regional;
	}

	public function penambahan_service_regional()
	{
		$user_regional						= $this->session->userdata('user_regional');
		$notif_penambahan_service_regional	= $this->m_manage_user->penambahan_service_regional($user_regional);

		echo $notif_penambahan_service_regional;
	}

	public function aktivasi_service_regional()
	{
		$user_regional						= $this->session->userdata('user_regional');
		$notif_aktivasi_service_regional	= $this->m_manage_user->aktivasi_service_regional($user_regional);

		echo $notif_aktivasi_service_regional;
	}

	public function update_intracity_regional()
	{
		$user_regional						= $this->session->userdata('user_regional');
		$intra								= $this->m_manage_user->update_intracity_regional($user_regional);

		echo $intra;
	}

	public function btbp_approve_1()
	{
		$btbp_approve_1						= $this->m_manage_user->btbp_approve_1();

		echo $btbp_approve_1;
	}

	//MPA
	public function update_tarif_cabang_utama_mpa()
	{
		$notif_update_tarif_cabang_utama_mpa	= $this->m_manage_user->update_tarif_cabang_utama_mpa();

		echo $notif_update_tarif_cabang_utama_mpa;
	}

	public function update_tarif_cabang_mpa()
	{
		$notif_update_tarif_cabang_mpa	= $this->m_manage_user->update_tarif_cabang_mpa();

		echo $notif_update_tarif_cabang_mpa;
	}

	public function ubah_coding_mpa()
	{
		$notif_ubah_coding_mpa	= $this->m_manage_user->ubah_coding_mpa();

		echo $notif_ubah_coding_mpa;
	}

	public function ubah_zona_mpa()
	{
		$notif_ubah_zona_mpa	= $this->m_manage_user->ubah_zona_mpa();

		echo $notif_ubah_zona_mpa;
	}

	public function non_aktif_routing_mpal()
	{
		$notif_non_aktif_routing_mpa	= $this->m_manage_user->non_aktif_routing_mpal();

		echo $notif_non_aktif_routing_mpa;
	}

	public function non_aktif_service_mpa()
	{
		$notif_non_aktif_service_mpa	= $this->m_manage_user->non_aktif_service_mpa();

		echo $notif_non_aktif_service_mpa;
	}

	public function penambahan_service_mpa()
	{
		$notif_penambahan_service_mpa	= $this->m_manage_user->penambahan_service_mpa();

		echo $notif_penambahan_service_mpa;
	}

	public function aktivasi_service_mpa()
	{
		$notif_aktivasi_service_mpa	= $this->m_manage_user->aktivasi_service_mpa();

		echo $notif_aktivasi_service_mpa;
	}

	public function update_intracity_mpa()
	{
		$intra_mpa					= $this->m_manage_user->update_intracity_mpa();

		echo $intra_mpa;
	}

	public function btbp_approve_2()
	{
		$btbp_approve_2						= $this->m_manage_user->btbp_approve_2();

		echo $btbp_approve_2;
	}

}

/* End of file c_manage_user.php */
/* Location: ./application/modules/manage_user/controllers/c_manage_user.php */