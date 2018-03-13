<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_non_aktif_service_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_non_aktif_service_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Non Aktif Service";
				$data['nasm']	= $this->m_non_aktif_service_mpa->nasm();
				$data['view']	= "v_non_aktif_service_mpa";

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

	public function detail_non_aktif_service_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Non Aktif Service";
				$data['detail']		= $this->m_non_aktif_service_mpa->detail_non_aktif_service_mpa($session);
				$data['statuss']	= $this->m_non_aktif_service_mpa->tarif_status_request();
				$data['notice']		= $this->m_non_aktif_service_mpa->notice($session);
				$data['view']		= "v_detail_non_aktif_service_mpa";

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

	public function testing_detail_non_aktif_service_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Non Aktif Service";
				$data['detail']		= $this->m_non_aktif_service_mpa->detail_non_aktif_service_mpa($session);
				$data['statuss']	= $this->m_non_aktif_service_mpa->tarif_status_request();
				$data['notice']		= $this->m_non_aktif_service_mpa->notice($session);
				$data['testing']	= $this->m_non_aktif_service_mpa->testing_detail_non_aktif_service_mpa($session);
				$data['view']		= "v_testing_detail_non_aktif_service_mpa";

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

	public function save_detail_non_aktif_service_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 	= $this->input->post('no_request');
				$status 		= $this->input->post('status');
				$user_id		= $this->session->userdata('user_id');
				$tgl_non_s 	= $this->input->post('tgl_non_aktif_service');
				$tgl_non_sal 	= date('Y/m/d',strtotime($tgl_non_s));

				if($tgl_non_sal == "" || $tgl_non_sal == "1970/01/01")
				{
					$tgl_non_sa = "";
				}
				else
				{
					$tgl_non_sa = $tgl_non_sal;
				}

				if($status == "1")
				{
					$tgl_non_aktif_service = $tgl_non_sa;
				}
				else
				{
					$tgl_non_aktif_service = "";
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

				$query			= $this->m_non_aktif_service_mpa->save_detail_non_aktif_service_mpa($no_request,$status,$user_id,
								  $tgl_non_aktif_service,$notice,$attachment);
				if($query)
				{
					$query 		= $this->m_non_aktif_service_mpa->cek_status_approve($no_request);
					foreach($query as $q)
					{
						$status_approve = $q['STATUS_MPA'];
						if($status_approve == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_NASR('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('non_aktif_service_mpa/c_non_aktif_service_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('non_aktif_service_mpa/c_non_aktif_service_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('non_aktif_service_mpa/c_non_aktif_service_mpa');
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

	public function save_testing_detail_non_aktif_service_mpa()
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

				$tgl_live_n 	= $this->input->post('tgl_live_nasr');
				$tgl_live_nal 	= date('Y/m/d',strtotime($tgl_live_n));

				if($tgl_live_nal == "" || $tgl_live_nal == "1970/01/01")
				{
					$tgl_live_na = "";
				}
				else
				{
					$tgl_live_na = $tgl_live_nal;
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
					$tgl_live_nasr = $tgl_live_na;
					$tgl_close 	   = $tgl_clo;
				}
				else
				{
					$tgl_live_nasr = "";
					$tgl_close 	   = "";
				}

				$user_id		= $this->session->userdata('user_id');

				$query 			= $this->m_non_aktif_service_mpa->save_testing_detail_non_aktif_service_mpa($no_request,$status,$notice,$tgl_live_nasr,$tgl_close,$user_id,$attachment);

				if($query)
				{
					$query = $this->m_non_aktif_service_mpa->cek_status_testing($no_request);

					foreach($query as $q)
					{
						$status_testing = $q['STATUS_TESTING'];
						if($status_testing == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_NASR_LIVE('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('non_aktif_service_mpa/c_non_aktif_service_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('non_aktif_service_mpa/c_non_aktif_service_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('non_aktif_service_mpa/c_non_aktif_service_mpa');
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

/* End of file c_non_aktif_service_mpa.php */
/* Location: ./application/modules/non_aktif_service_mpa/controllers/c_non_aktif_service_mpa.php */