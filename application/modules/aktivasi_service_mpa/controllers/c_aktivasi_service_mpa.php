<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_aktivasi_service_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_aktivasi_service_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Aktivasi Service";
				$data['asm']	= $this->m_aktivasi_service_mpa->asm();
				$data['view']	= "v_aktivasi_service_mpa";

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

	public function detail_aktivasi_service_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Aktivasi Service";
				$data['detail']		= $this->m_aktivasi_service_mpa->detail_aktivasi_service_mpa($session);
				$data['statuss']	= $this->m_aktivasi_service_mpa->tarif_status_request();
				$data['notice']		= $this->m_aktivasi_service_mpa->notice($session);
				$data['view']		= "v_detail_aktivasi_service_mpa";

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

	public function save_detail_aktivasi_service_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 	= $this->input->post('no_request');
				$status 		= $this->input->post('status');
				$user_id		= $this->session->userdata('user_id');
				$tgl_akt_s 		= $this->input->post('tgl_aktivasi_service');
				$tgl_akt_sal 	= date('Y/m/d',strtotime($tgl_akt_s));

				if($tgl_akt_sal == "" || $tgl_akt_sal == "1970/01/01")
				{
					$tgl_akt_sa = "";
				}
				else
				{
					$tgl_akt_sa = $tgl_akt_sal;
				}

				if($status == "1")
				{
					$tgl_aktivasi_service = $tgl_akt_sa;
				}
				else
				{
					$tgl_aktivasi_service = "";
				}

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

				$query			= $this->m_aktivasi_service_mpa->save_detail_aktivasi_service_mpa($no_request,$status,$user_id,$tgl_aktivasi_service,$notice,$attachment);

				if($query)
				{
					$query 		= $this->m_aktivasi_service_mpa->cek_status_approve($no_request);
					foreach($query as $q)
					{
						$status_approve = $q['STATUS_MPA'];
						if($status_approve == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_ASR('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('aktivasi_service_mpa/c_aktivasi_service_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('aktivasi_service_mpa/c_aktivasi_service_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('aktivasi_service_mpa/c_aktivasi_service_mpa');
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

	public function testing_detail_aktivasi_service_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Aktivasi Service";
				$data['detail']		= $this->m_aktivasi_service_mpa->detail_aktivasi_service_mpa($session);
				$data['statuss']	= $this->m_aktivasi_service_mpa->tarif_status_request();
				$data['notice']		= $this->m_aktivasi_service_mpa->notice($session);
				$data['mpa']		= $this->m_aktivasi_service_mpa->testing_detail_aktivasi_service_mpa($session);
				$data['view']		= "v_testing_detail_aktivasi_service_mpa";

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

	public function save_testing_detail_aktivasi_service_mpa()
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

				$tgl_live_a		= $this->input->post('tgl_live_asr');
				$tgl_live_asl 	= date('Y/m/d',strtotime($tgl_live_a));

				if($tgl_live_asl == "" || $tgl_live_asl == "1970/01/01")
				{
					$tgl_live_as = "";
				}
				else
				{
					$tgl_live_as = $tgl_live_asl;
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
					$tgl_live_asr = $tgl_live_as;
					$tgl_close 	  = $tgl_clo;
				}
				else
				{
					$tgl_live_asr = "";
					$tgl_close 	  = "";
				}

				$user_id 		= $this->session->userdata('user_id');

				$query 			= $this->m_aktivasi_service_mpa->save_testing_detail_aktivasi_service_mpa($no_request, $status, $notice, $tgl_live_asr,$tgl_close,$user_id,$attachment);

				if($query)
				{
					$query = $this->m_aktivasi_service_mpa->cek_status_testing($no_request);

					foreach($query as $q)
					{
						$status_testing = $q['STATUS_TESTING'];
						if($status_testing == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_ASR_LIVE('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('aktivasi_service_mpa/c_aktivasi_service_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('aktivasi_service_mpa/c_aktivasi_service_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('aktivasi_service_mpa/c_aktivasi_service_mpa');
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

/* End of file c_aktivasi_service_mpa.php */
/* Location: ./application/modules/aktivasi_service_mpa/controllers/c_aktivasi_service_mpa.php */