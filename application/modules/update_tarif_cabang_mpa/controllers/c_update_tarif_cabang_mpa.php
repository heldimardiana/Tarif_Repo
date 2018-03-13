<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_cabang_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_tarif_cabang_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update Tarif Cabang MPA";
				$data['utcm']	= $this->m_update_tarif_cabang_mpa->data_utcm();
				$data['view']	= "v_update_tarif_cabang_mpa";

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

	public function detail_update_tarif_cabang_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Update Tarif Cabang";
				$data['detail']		= $this->m_update_tarif_cabang_mpa->detail_update_tarif_cabang_mpa($session);
				$data['statuss']	= $this->m_update_tarif_cabang_mpa->tarif_status_request();
				$data['notice']		= $this->m_update_tarif_cabang_mpa->notice_regional($session);
				$data['view']		= "v_detail_update_tarif_cabang_mpa";

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

	public function testing_detail_update_tarif_cabang_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Testing Detail Update Tarif Cabang";
				$data['detail']		= $this->m_update_tarif_cabang_mpa->detail_update_tarif_cabang_mpa($session);
				$data['notice']		= $this->m_update_tarif_cabang_mpa->notice_regional($session);
				$data['statuss']	= $this->m_update_tarif_cabang_mpa->tarif_status_request();
				$data['testing']	= $this->m_update_tarif_cabang_mpa->testing_detail_update_tarif_cabang_mpa($session);
				$data['view']		= "v_testing_detail_update_tarif_cabang_mpa";

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

	public function save_detail_update_tarif_cabang_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request			= $this->input->post('no_request');
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

				$tgl_update_t 		= $this->input->post('tgl_update_tarif');
				$tgl_update_tal		= date('Y/m/d',strtotime($tgl_update_t));

				if($tgl_update_tal == "" || $tgl_update_tal == "1970/01/01")
				{
					$tgl_update_ta = "";
				}
				else
				{
					$tgl_update_ta = $tgl_update_tal;
				}

				if($status == "1")
				{
					$tgl_update_tarif = $tgl_update_ta;
				}
				else
				{
					$tgl_update_tarif = "";
				}

				
				$query				= $this->m_update_tarif_cabang_mpa->save_detail_update_tarif_cabang_mpa($no_request,$status,$user_id,
									  $tgl_update_tarif,$notice,$attachment);
				if($query)
				{
					$query 		= $this->m_update_tarif_cabang_mpa->cek_status_approve($no_request);
					foreach($query as $q)
					{
						$status_approve = $q['STATUS_MPA'];
						if($status_approve == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UTCR('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_cabang_mpa/c_update_tarif_cabang_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_cabang_mpa/c_update_tarif_cabang_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_tarif_cabang_mpa/c_update_tarif_cabang_mpa');
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

	public function save_testing_detail_update_tarif_cabang_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request			= $this->input->post('no_request');
				$status 			= $this->input->post('status');
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

				$tgl_live_u 		= $this->input->post('tgl_live_utcr');
				$tgl_live_utl		= date('Y/m/d',strtotime($tgl_live_u));

				if($tgl_live_utl == "" || $tgl_live_utl == "1970/01/01")
				{
					$tgl_live_ut = "";
				}
				else
				{
					$tgl_live_ut = $tgl_live_utl;
				}

				$tgl_c				= $this->input->post('tgl_close');
				$tgl_cl				= date('Y/m/d',strtotime($tgl_c));

				if($tgl_cl == "" || $tgl_cl == "1970/01/01")
				{
					$tgl_clo = "";
				}
				else
				{
					$tgl_clo = $tgl_cl;
				}

				if($status == "1")
				{
					$tgl_live_utcr = $tgl_live_ut;
					$tgl_close 	   = $tgl_clo;
				}
				else
				{
					$tgl_live_utcr = "";
					$tgl_close 	   = "";
				}
				$user_id 		   = $this->session->userdata('user_id');

				$query 			   = $this->m_update_tarif_cabang_mpa->save_testing_detail_update_tarif_cabang_mpa($no_request,$status,$notice,
									 $tgl_live_utcr,$tgl_close,$user_id,$attachment);
				if($query)
				{
					$query = $this->m_update_tarif_cabang_mpa->cek_status_testing($no_request);

					foreach($query as $q)
					{
						$status_testing = $q['STATUS_TESTING'];
						if($status_testing == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UTCR_LIVE('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_cabang_mpa/c_update_tarif_cabang_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_cabang_mpa/c_update_tarif_cabang_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_tarif_cabang_mpa/c_update_tarif_cabang_mpa');
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

/* End of file c_update_tarif_cabang_mpa.php */
/* Location: ./application/modules/update_tarif_cabang_mpa/controllers/c_update_tarif_cabang_mpa.php */