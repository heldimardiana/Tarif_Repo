<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ubah_coding_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_ubah_coding_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Ubah Coding";
				$data['ucm']	= $this->m_ubah_coding_mpa->ucm();
				$data['view']	= "v_ubah_coding_mpa";

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

	public function detail_ubah_coding_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Ubah Coding";
				$data['detail']		= $this->m_ubah_coding_mpa->detail_ubah_coding_mpa($session);
				$data['tdetail']	= $this->m_ubah_coding_mpa->tdetail_ubah_coding_mpa($session);
				$data['statuss']	= $this->m_ubah_coding_mpa->tarif_status_request();
				$data['notice']		= $this->m_ubah_coding_mpa->notice($session);
				$data['view']		= "v_detail_ubah_coding_mpa";

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

	public function detail_testing_ubah_coding_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Ubah Coding";
				$data['detail']		= $this->m_ubah_coding_mpa->detail_ubah_coding_mpa($session);
				$data['tdetail']	= $this->m_ubah_coding_mpa->tdetail_ubah_coding_mpa($session);
				$data['statuss']	= $this->m_ubah_coding_mpa->tarif_status_request();
				$data['notice']		= $this->m_ubah_coding_mpa->notice($session);
				$data['mpa']		= $this->m_ubah_coding_mpa->notice_mpa($session);
				$data['view']		= "v_detail_testing_ubah_coding_mpa";

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

	public function save_detail_ubah_coding_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request			= $this->input->post('no_request');
				$status 			= $this->input->post('status');
				$user_id			= $this->session->userdata('user_id');
				$tgl_ubah_c 		= $this->input->post('tgl_ubah_coding');
				$tgl_ubah_col 		= date('Y/m/d',strtotime($tgl_ubah_c));

				if($tgl_ubah_col == "" || $tgl_ubah_col == "1970/01/01")
				{
					$tgl_ubah_co = "";
				}
				else
				{
					$tgl_ubah_co = $tgl_ubah_col;
				}

				if($status == "1")
				{
					$tgl_ubah_coding = $tgl_ubah_co;
				}
				else
				{
					$tgl_ubah_coding = "";
				}
				$notice				= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '',$this->input->post('notice'));
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


				$query				= $this->m_ubah_coding_mpa->save_detail_ubah_coding_mpa($no_request,$status,$user_id,$tgl_ubah_coding,$notice,$attachment);

				if($query)
				{
					$query 		= $this->m_ubah_coding_mpa->cek_status_approve($no_request);
					foreach($query as $q)
					{
						$status_approve = $q['STATUS_MPA'];
						if($status_approve == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UCR('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('ubah_coding_mpa/c_ubah_coding_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('ubah_coding_mpa/c_ubah_coding_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('ubah_coding_mpa/c_ubah_coding_mpa');
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

	public function save_testing_detail_ubah_coding_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request			= $this->input->post('no_request');
				$status 			= $this->input->post('status');
				$user_id			= $this->session->userdata('user_id');
				$tgl_live_u 		= $this->input->post('tgl_live_ucr');
				$tgl_live_ucl 		= date('Y/m/d',strtotime($tgl_live_u));

				if($tgl_live_ucl == "" || $tgl_live_ucl == "1970/01/01")
				{
					$tgl_live_uc = "";
				}
				else
				{
					$tgl_live_uc = $tgl_live_ucl;
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
					$tgl_live_ucr = $tgl_live_uc;
					$tgl_close 	   = $tgl_clo;
				}
				else
				{
					$tgl_live_ucr = "";
					$tgl_close 	   = "";
				}

				$notice				= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '',$this->input->post('notice'));
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

				$query				= $this->m_ubah_coding_mpa->save_testing_detail_ubah_coding_mpa($no_request, $status, $user_id, $tgl_live_ucr,
									  $tgl_close,$notice,$attachment);
				if($query)
				{
					$query = $this->m_ubah_coding_mpa->cek_status_testing($no_request);

					foreach($query as $q)
					{
						$status_testing = $q['STATUS_TESTING'];
						if($status_testing == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UCR_LIVE('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('ubah_coding_mpa/c_ubah_coding_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('ubah_coding_mpa/c_ubah_coding_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('ubah_coding_mpa/c_ubah_coding_mpa');
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
				$data['exports']	= $this->m_ubah_coding_mpa->export_detail($no_request);
				$data['view']		= "v_export_detail_ucr_mpa";

				$this->load->view('v_export_detail_ucr_mpa',$data);
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

/* End of file c_ubah_coding_mpa.php */
/* Location: ./application/modules/ubah_coding_mpa/controllers/c_ubah_coding_mpa.php */