<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_cabang_utama_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_tarif_cabang_utama_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update Tarif Cabang Utama";
				$data['utcu']	= $this->m_update_tarif_cabang_utama_mpa->data_utcu();
				$data['view']	= "v_update_tarif_cabang_utama_mpa";

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

	public function detail_update_tarif_cabang_utama_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Update Tarif Cabang Utama";
				$data['detail']		= $this->m_update_tarif_cabang_utama_mpa->detail_update_tarif_cabang_utama_mpa($session);
				$no_req 			= $this->m_update_tarif_cabang_utama_mpa->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_update_tarif_cabang_utama_mpa->tdetail_update_tarif_cabang_utama_mpa($no_request);
				$data['stat']		= $this->m_update_tarif_cabang_utama_mpa->status_proses();
				$data['notice']		= $this->m_update_tarif_cabang_utama_mpa->notice_regional($session);
				$data['view']		= "v_detail_update_tarif_cabang_utama_mpa";

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

	public function detail_testing_update_tarif_cabang_utama_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Update Tarif Cabang Utama";
				$data['detail']		= $this->m_update_tarif_cabang_utama_mpa->detail_update_tarif_cabang_utama_mpa($session);
				$no_req 			= $this->m_update_tarif_cabang_utama_mpa->get_no_request($session);
				foreach($no_req as $q)
				{
					$no_request = $q['NO_REQUEST'];
				}
				$data['tdetail']	= $this->m_update_tarif_cabang_utama_mpa->tdetail_update_tarif_cabang_utama_mpa($no_request);
				$data['stat']		= $this->m_update_tarif_cabang_utama_mpa->status_proses();
				$data['notice']		= $this->m_update_tarif_cabang_utama_mpa->notice_regional($session);
				$data['mpa']		= $this->m_update_tarif_cabang_utama_mpa->notice_mpa($session);
				$data['view']		= "v_testing_detail_update_tarif_cabang_utama_mpa";

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

	public function save_detail_update_tarif_cabang_utama_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 	= $this->input->post('no_request');
				$status 		= $this->input->post('status');
				$user_id 		= $this->session->userdata('user_id');
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

				$tgl_update_t 	= $this->input->post('tgl_update_tarif_cabang_utama');
				$tgl_update_tal	= date('Y/m/d',strtotime($tgl_update_t));

				if($tgl_update_tal == "" || $tgl_update_tal == "1970/01/01" || $tgl_update_tal == "1970-01-01")
				{
					$tgl_update_ta = "";
				}
				else
				{
					$tgl_update_ta = $tgl_update_tal;
				}

				if($status == "1")
				{
					$tgl_update_tarif_cabang_utama = $tgl_update_ta;
				}
				else
				{
					$tgl_update_tarif_cabang_utama = "";
				}

				$query 			= $this->m_update_tarif_cabang_utama_mpa->save_detail_update_tarif_cabang_utama_mpa($no_request,
								  $status, $user_id, $notice, $tgl_update_tarif_cabang_utama, $attachment);
				if($query)
				{
					$query 		= $this->m_update_tarif_cabang_utama_mpa->cek_status_approve($no_request);
					foreach($query as $q)
					{
						$status_approve = $q['STATUS_MPA'];
						if($status_approve == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UTCU('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa');
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

	public function save_testing_detail_update_tarif_cabang_utama_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 	= $this->input->post('no_request');
				$status 		= $this->input->post('status');
				$user_id 		= $this->session->userdata('user_id');
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

				$tgl_live_u 	= $this->input->post('tgl_live_utcu');
				$tgl_live_ut 	= date('Y/m/d',strtotime($tgl_live_u));

				if($tgl_live_ut == "" || $tgl_live_ut == "1970/01/01" || $tgl_live_ut == "1970-01-01")
				{
					$tgl_live_utc = "";
				}
				else
				{
					$tgl_live_utc = $tgl_live_ut;
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
					$tgl_live_utcu = $tgl_live_utc;
					$tgl_close 	   = $tgl_clo;
				}
				else
				{
					$tgl_live_utcu = "";
					$tgl_close 	   = "";
				}

				$query 			= $this->m_update_tarif_cabang_utama_mpa->save_testing_detail_update_tarif_cabang_utama_mpa(
									$no_request, $status, $user_id, $notice, $tgl_live_utcu, $tgl_close,$attachment 
								  );

				if($query)
				{
					$query = $this->m_update_tarif_cabang_utama_mpa->cek_status_testing($no_request);

					foreach($query as $q)
					{
						$status_testing = $q['STATUS_TESTING'];
						if($status_testing == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UTCU_LIVE('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa');
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

	public function export_detail()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request 		= $this->input->post('no_request');
				$data['tdetail']	= $this->m_update_tarif_cabang_utama_mpa->tdetail_update_tarif_cabang_utama_mpa($no_request);
				$data['view']		= "v_export_update_tarif_cabang_utama_mpa";

				$this->load->view('v_export_update_tarif_cabang_utama_mpa',$data);
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

/* End of file c_update_tarif_cabang_utama_mpa.php */
/* Location: ./application/modules/update_tarif_cabang_utama_mpa/controllers/c_update_tarif_cabang_utama_mpa.php */