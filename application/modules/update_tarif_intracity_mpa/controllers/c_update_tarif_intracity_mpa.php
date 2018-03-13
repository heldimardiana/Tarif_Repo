<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_intracity_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_tarif_intracity_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Update Tarif";
				$data['uti']	= $this->m_update_tarif_intracity_mpa->data_utir();
				$data['view']	= "v_update_tarif_intracity_mpa";

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

	public function detail_update_tarif_intracity_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Update Tarif Intracity";
				$data['detail']		= $this->m_update_tarif_intracity_mpa->detail_update_tarif_intracity_mpa($session);
				$data['stat']		= $this->m_update_tarif_intracity_mpa->status_request();
				$data['notice']		= $this->m_update_tarif_intracity_mpa->notice_regional($session);
				$get_no_request 	= $this->m_update_tarif_intracity_mpa->get_no_request($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_update_tarif_intracity_mpa->bdetail($no_request);
				$data['view']		= "v_detail_update_tarif_intracity_mpa";

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

	public function detail_testing_update_tarif_intracity_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Update Tarif Intracity";
				$data['detail']		= $this->m_update_tarif_intracity_mpa->detail_update_tarif_intracity_mpa($session);
				$data['stat']		= $this->m_update_tarif_intracity_mpa->status_request();
				$data['notice']		= $this->m_update_tarif_intracity_mpa->notice_regional($session);
				$data['testing']	= $this->m_update_tarif_intracity_mpa->notice_mpa($session);
				$get_no_request 	= $this->m_update_tarif_intracity_mpa->get_no_request($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_update_tarif_intracity_mpa->bdetail($no_request);
				$data['view']		= "v_testing_detail_update_tarif_intracity_mpa";

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

	public function save_detail_update_tarif_intracity_mpa()
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

				$tgl_update_i 	= $this->input->post('tgl_update_intracity');
				$tgl_update_int	= date('Y/m/d',strtotime($tgl_update_i));

				if($tgl_update_int == "" || $tgl_update_int == "1970/01/01" || $tgl_update_int == "1970-01-01")
				{
					$tgl_update_in = "";
				}
				else
				{
					$tgl_update_in = $tgl_update_int;
				}

				if($status == "1")
				{
					$tgl_update_tarif_intracity = $tgl_update_in;
				}
				else
				{
					$tgl_update_tarif_intracity = "";
				}

				$query 			= $this->m_update_tarif_intracity_mpa->save_detail_update_tarif_intracity_mpa($no_request,
								  $status, $user_id, $notice, $tgl_update_tarif_intracity,$attachment);
				if($query)
				{
					$query 		= $this->m_update_tarif_intracity_mpa->cek_status_approve($no_request);
					foreach($query as $q)
					{
						$status_approve = $q['STATUS_MPA'];
						if($status_approve == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UTIR('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_intracity_mpa/c_update_tarif_intracity_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_intracity_mpa/c_update_tarif_intracity_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_tarif_intracity_mpa/c_update_tarif_intracity_mpa');
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

	public function save_testing_detail_update_tarif_intracity_mpa()
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

				$tgl_live_u 	= $this->input->post('tgl_live_utir');
				$tgl_live_uti	= date('Y/m/d',strtotime($tgl_live_u));

				if($tgl_live_uti == "" || $tgl_live_uti == "1970/01/01")
				{
					$tgl_live_ut = "";
				}
				else
				{
					$tgl_live_ut = $tgl_live_uti;
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
					$tgl_live_utir = $tgl_live_ut;
					$tgl_close 	   = $tgl_clo;
				}
				else
				{
					$tgl_live_utir = "";
					$tgl_close 	   = "";
				}

				$query 			   = $this->m_update_tarif_intracity_mpa->save_testing_detail_update_tarif_intracity_mpa($no_request,$status,
									$notice, $tgl_live_utir,$tgl_close,$user_id,$attachment);
				if($query)
				{
					$query = $this->m_update_tarif_intracity_mpa->cek_status_testing($no_request);

					foreach($query as $q)
					{
						$status_testing = $q['STATUS_TESTING'];
						if($status_testing == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UTIR_LIVE('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_intracity_mpa/c_update_tarif_intracity_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('update_tarif_intracity_mpa/c_update_tarif_intracity_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_tarif_intracity_mpa/c_update_tarif_intracity_mpa');
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
				$no_request 	= $this->input->post('no_request');
				$data['detail']	= $this->m_update_tarif_intracity_mpa->bdetail($no_request);
				$data['view']	= "v_export_update_intracity_mpa";

				$this->load->view('v_export_update_intracity_mpa',$data);
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

/* End of file c_update_tarif_intracity_mpa.php */
/* Location: ./application/modules/update_tarif_intracity_mpa/controllers/c_update_tarif_intracity_mpa.php */