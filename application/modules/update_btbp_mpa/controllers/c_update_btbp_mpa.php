<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_btbp_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_btbp_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$user_level 	= $this->session->userdata('user_level');
				//Level Staf untuk Requester
				if($user_level == "1")
				{
					$data['title']	= "Update BTBP";
					$data['view']	= "v_form_btbp";
					//$data['view']	= "v_update_btbp_mpa";

					$this->load->view('template',$data);
				}
				//Level Koordinator Untuk Approve Regional
				else if($user_level == "2")
				{
					$data['title']	= "Update BTBP";
					$data['utcu']	= $this->m_update_btbp_mpa->level_2();
					$data['view']	= "v_level_2";

					$this->load->view('template',$data);
				}
				//Level Jr, SPV, Mgr Untuk Approve MPA
				else
				{
					$data['title']	= "Update BTBP";
					$data['utcu']	= $this->m_update_btbp_mpa->level_3();
					$data['view']	= "v_level_3";

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

	public function detail_update_btbp($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']			= "Detail Update BTBP";
				$get_no 				= $this->m_update_btbp_mpa->get_no($session);

				foreach($get_no as $gt)
				{
					$no_request = $gt['NO_REQUEST'];
				}

				$data['statuss']		= $this->m_update_btbp_mpa->get_status();
				$data['detail']			= $this->m_update_btbp_mpa->detail_master($session);
				$data['detail_btbp']	= $this->m_update_btbp_mpa->detail_update_btbp($no_request);
				$data['view']			= "v_detail_level_2";

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

	//Save Level 2
	public function save_btbp_level_2()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 	= $this->input->post('no_request');
				$status 		= $this->input->post('status');
				$notice 		= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '',$this->input->post('notice'));
				$attach 		= $this->input->post('attachment');

				
				//File Uploading
				$dir 						= './UPLOADS/';
				$config['upload_path']		= './UPLOADS/';
				$config['allowed_types']	= 'xls|xlsx|jpg|png|jpeg';
				$config['max_size']			= '4090';
				$config['overwrite']		= FALSE;
				$config['remove_spaces']  	= TRUE;

				$field_name 				= "attachment";

				$this->load->library('upload', $config);
				if(! $this->upload->do_upload($field_name))
				{
					echo $this->upload->display_errors();		
				}
				else
				{
					$data1 	= $this->upload->data();
					$file1 	= $data1['file_name'];
					$param 	= md5($no_request.$file1);
					rename ($dir.$file1, $dir.$param.$file1);
					$attachment = md5($no_request.$file1).$file1;	
				}

				$user_id		= $this->session->userdata('user_id');
				$query 			= $this->m_update_btbp_mpa->save_btbp_level_2($no_request, $status, $notice, $user_id,$attachment);

				if($query)
				{
					$this->session->set_flashdata('request_success','Set Status Berhasil..');
					redirect('update_btbp_mpa/c_update_btbp_mpa');
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal..');
					redirect('update_btbp_mpa/c_update_btbp_mpa');
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

	public function detail_level_3($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']			= "Detail Update BTBP";
				$get_no 				= $this->m_update_btbp_mpa->get_no($session);

				foreach($get_no as $gt)
				{
					$no_request = $gt['NO_REQUEST'];
				}

				$data['statuss']		= $this->m_update_btbp_mpa->get_status();
				$data['detail']			= $this->m_update_btbp_mpa->detail_master($session);
				$data['detail_btbp']	= $this->m_update_btbp_mpa->detail_update_btbp($no_request);
				$data['notice']			= $this->m_update_btbp_mpa->notice_approve_1($session);
				$data['view']			= "v_detail_level_3";

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

	public function detail_testing_level_3($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']			= "Detail Update BTBP";
				$get_no 				= $this->m_update_btbp_mpa->get_no($session);

				foreach($get_no as $gt)
				{
					$no_request = $gt['NO_REQUEST'];
				}

				$data['statuss']		= $this->m_update_btbp_mpa->get_status();
				$data['detail']			= $this->m_update_btbp_mpa->detail_master($session);
				$data['detail_btbp']	= $this->m_update_btbp_mpa->detail_update_btbp($no_request);
				$data['notice']			= $this->m_update_btbp_mpa->notice_approve_1($session);
				$data['mpa']			= $this->m_update_btbp_mpa->notice_approve_2($session);
				$data['view']			= "v_detail_testing_level_3";

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

	public function save_btbp_level_3()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 		= $this->input->post('no_request');
				$status 			= $this->input->post('status');
				$user_id 			= $this->session->userdata('user_id');
				$notice 			= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '',$this->input->post('notice'));
				$attach 			= $this->input->post('attachment');

				
				//File Uploading
				$dir 						= './UPLOADS/';
				$config['upload_path']		= './UPLOADS/';
				$config['allowed_types']	= 'xls|xlsx|jpg|png|jpeg';
				$config['max_size']			= '4090';
				$config['overwrite']		= FALSE;
				$config['remove_spaces']  	= TRUE;

				$field_name 				= "attachment";

				$this->load->library('upload', $config);
				if(! $this->upload->do_upload($field_name))
				{
					echo $this->upload->display_errors();		
				}
				else
				{
					$data1 	= $this->upload->data();
					$file1 	= $data1['file_name'];
					$param 	= md5($no_request.$file1);
					rename ($dir.$file1, $dir.$param.$file1);
					$attachment = md5($no_request.$file1).$file1;	
				}

				$tgl_update_b		= $this->input->post('tgl_update_btbp');
				$tgl_update_bt		= date('Y/m/d',strtotime($tgl_update_b));

				if($tgl_update_bt == "" || $tgl_update_bt == "1970/01/01" || $tgl_update_bt == "1970-01-01")
				{
					$tgl_update_btp = "";
				}
				else
				{
					$tgl_update_btp = $tgl_update_bt;
				}

				if($status == "1")
				{
					$tgl_update_btbp = $tgl_update_btp;
				}
				else
				{
					$tgl_update_btbp = "";
				}

				$query 			= $this->m_update_btbp_mpa->save_btbp_level_3($no_request,
								  $status, $user_id, $notice, $tgl_update_btbp, $attachment);
				if($query)
				{
					$query 		= $this->m_update_btbp_mpa->cek_status_approve($no_request);
					foreach($query as $q)
					{
						$status_approve = $q['STATUS_MPA'];
						if($status_approve == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_BTBP('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_btbp_mpa/c_update_btbp_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_btbp_mpa/c_update_btbp_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_btbp_mpa/c_update_btbp_mpa');
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

	public function save_testing_level_3()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 		= $this->input->post('no_request');
				$status 			= $this->input->post('status');
				$user_id 			= $this->session->userdata('user_id');
				$notice 			= $this->input->post('notice');
				$notice 			= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '',$this->input->post('notice'));
				$attach 			= $this->input->post('attachment');

				
				//File Uploading
				$dir 						= './UPLOADS/';
				$config['upload_path']		= './UPLOADS/';
				$config['allowed_types']	= 'xls|xlsx|jpg|png|jpeg';
				$config['max_size']			= '4090';
				$config['overwrite']		= FALSE;
				$config['remove_spaces']  	= TRUE;

				$field_name 				= "attachment";

				$this->load->library('upload', $config);
				if(! $this->upload->do_upload($field_name))
				{
					echo $this->upload->display_errors();		
				}
				else
				{
					$data1 	= $this->upload->data();
					$file1 	= $data1['file_name'];
					$param 	= md5($no_request.$file1);
					rename ($dir.$file1, $dir.$param.$file1);
					$attachment = md5($no_request.$file1).$file1;	
				}

				$tgl_live_b			= $this->input->post('tgl_live_btbp');
				$tgl_live_bt 		= date('Y/m/d',strtotime($tgl_live_b));

				if($tgl_live_bt == "" || $tgl_live_bt == "1970/01/01" || $tgl_live_bt == "1970-01-01")
				{
					$tgl_live_btb = "";
				}
				else
				{
					$tgl_live_btb = $tgl_live_bt;
				}

				$tgl_c			= $this->input->post('tgl_close');
				$tgl_cl			= date('Y/m/d',strtotime($tgl_c));

				if($tgl_cl == "" || $tgl_cl == "1970/01/01" || $tgl_cl == "1970-01-01")
				{
					$tgl_clo = "";
				}
				else
				{
					$tgl_clo = $tgl_cl;
				}

				if($status == "1")
				{
					$tgl_live_btbp = $tgl_live_btb;
					$tgl_close 	   = $tgl_clo;
				}
				else
				{
					$tgl_live_btbp = "";
					$tgl_close 	   = "";
				}

				$query 			= $this->m_update_btbp_mpa->save_testing_level_3(
									$no_request, $status, $user_id, $notice, $tgl_live_btbp, $tgl_close , $attachment
								  );

				if($query)
				{
					$query = $this->m_update_btbp_mpa->cek_status_testing($no_request);

					foreach($query as $q)
					{
						$status_testing = $q['STATUS_TESTING'];
						if($status_testing == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_BTBP_LIVE('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_btbp_mpa/c_update_btbp_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_btbp_mpa/c_update_btbp_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_btbp_mpa/c_update_btbp_mpa');
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

	public function get_origin()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$origin 		= strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_c		= $this->m_update_btbp_mpa->get_origin($origin);
				if($get_data_c == TRUE)
				{
					$data_cabang = $this->m_update_btbp_mpa->data_origin($origin);
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
		else
		{
			redirect('login/c_login');
		}
	}

	public function generate_btbp()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$cabang 				= $this->input->post('cabang');
				$data['cabang'] 		= $cabang;
				$data['title']			= "Update BTBP";
				$data['generate']		= $this->m_update_btbp_mpa->generate_btbp($cabang);
				$data['view']			= "v_update_btbp_mpa";

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

	public function save_update_btbp_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$date 				= date('Y/m/d H:i:s');
				$br 				= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 				= $br."/BTBP/";
				$cabang 			= $this->input->post('cabang');
				$no_urut_btbp		= $this->input->post('no_urut_btbp');
				$user_id 			= $this->session->userdata('user_id');
				$user_name 			= $this->session->userdata('user_name');
				$user_branch 		= $this->session->userdata('user_branch');
				$user_origin 		= $this->session->userdata('user_origin');
				$user_zone_code 	= $this->session->userdata('user_zone_code');
				$user_level 		= $this->session->userdata('user_level'); 
				$session_request 	= md5($date.$cabang.$no_urut_btbp);
				$regional 			= $this->session->userdata('user_regional');

				$origin 				= $this->input->post('origin');
				$city_zone_code			= $this->input->post('city_zone_code');
				$city_zone_3code 		= $this->input->post('city_zone_3code');
				$city_zone_kabkota 		= $this->input->post('city_zone_kabkota');
				$city_zone_kecamatan 	= $this->input->post('city_zone_kecamatan');
				$city_zone_id 			= $this->input->post('city_zone_id');
				$bp_before_1st_kilo 	= $this->input->post('bp_before_1st_kilo');
				$bp_after_1st_kilo 		= $this->input->post('bp_after_1st_kilo');
				$bp_before_next_kilo 	= $this->input->post('bp_before_next_kilo');
				$bp_after_next_kilo 	= $this->input->post('bp_after_next_kilo');
				$bt_before 				= $this->input->post('bt_before');
				$bt_after 				= $this->input->post('bt_after');
				$bd_oke_before 			= $this->input->post('bd_oke_before');
				$bd_oke_after 			= $this->input->post('bd_oke_after');
				$bd_reg_before 			= $this->input->post('bd_reg_before');
				$bd_reg_after 			= $this->input->post('bd_reg_after');
				$bd_yes_before 			= $this->input->post('bd_yes_before');
				$bd_yes_after 			= $this->input->post('bd_yes_after');
				$bd_sps_1st_kilo_before	= $this->input->post('bd_sps_1st_kilo_before');
				$bd_sps_1st_kilo_after 	= $this->input->post('bd_sps_1st_kilo_after');
				$bd_sps_next_kilo_before = $this->input->post('bd_sps_next_kilo_before');
				$bd_sps_next_kilo_after	= $this->input->post('bd_sps_next_kilo_after');
				$drourate_service 		= $this->input->post('drourate_service');
				$j 						= (int)$no_urut_btbp;
				
				$query 				= $this->m_update_btbp_mpa->save_master($seq, $cabang, $user_id, $user_name, $user_branch,
									  $user_origin, $user_zone_code, $user_level, $session_request, $regional);

				if($query !="")
				{

					for($i=0; $i < $j; $i++)
					{
						$detail_query = $this->m_update_btbp_mpa->save_detail($query, $origin[$i], $city_zone_code[$i], $city_zone_3code[$i],
										$city_zone_kabkota[$i], $city_zone_kecamatan[$i], $city_zone_id[$i], $bp_before_1st_kilo[$i],
										$bp_after_1st_kilo[$i], $bp_before_next_kilo[$i], $bp_after_next_kilo[$i], $bt_before[$i],
										$bt_after[$i], $bd_oke_before[$i], $bd_oke_after[$i], $bd_reg_before[$i], $bd_reg_after[$i],
										$bd_yes_before[$i], $bd_yes_after[$i], $bd_sps_1st_kilo_before[$i], $bd_sps_1st_kilo_after[$i],
										$bd_sps_next_kilo_before[$i], $bd_sps_next_kilo_after[$i],$drourate_service[$i]);
					}
				}
				else
				{
					echo "Gagal Save Master";
				}
				if($detail_query)
				{
					$this->session->set_flashdata('request_success','Request Update BTBP Berhasil, Silahkan tunggu Proses Approval');
					redirect('update_btbp_mpa/c_update_btbp_mpa');
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Request Update BTBP Gagal..');
					redirect('update_btbp_mpa/c_update_btbp_mpa');
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

	public function export_detail_btbp()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 			= $this->input->post('no_request');
				$data['detail_btbp']	= $this->m_update_btbp_mpa->detail_update_btbp($no_request);
				$data['view']			= "v_export_detail_btbp";

				$this->load->view('v_export_detail_btbp',$data);
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

/* End of file c_update_btbp_mpa.php */
/* Location: ./application/modules/update_btbp_mpa/controllers/c_update_btbp_mpa.php */