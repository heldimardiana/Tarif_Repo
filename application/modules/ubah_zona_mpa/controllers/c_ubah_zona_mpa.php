<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ubah_zona_mpa extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_ubah_zona_mpa');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']	= "Ubah Zona";
				$data['uzm']	= $this->m_ubah_zona_mpa->uzm();
				$data['view']	= "v_ubah_zona_mpa";

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

	public function detail_ubah_zona_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Ubah Zona";
				$data['detail']		= $this->m_ubah_zona_mpa->detail_ubah_zona_mpa($session);
				$data['statuss']	= $this->m_ubah_zona_mpa->tarif_status_request();
				$data['notice']		= $this->m_ubah_zona_mpa->notice($session);
				$data['view']		= "v_detail_ubah_zona_mpa";

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

	//Testing
	public function testing_detail_ubah_zona_mpa($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$data['title']		= "Detail Ubah Zona";
				$data['detail']		= $this->m_ubah_zona_mpa->detail_ubah_zona_mpa($session);
				$data['statuss']	= $this->m_ubah_zona_mpa->tarif_status_request();
				$data['notice']		= $this->m_ubah_zona_mpa->notice($session);
				$data['mpa']		= $this->m_ubah_zona_mpa->notice_mpa($session);
				$data['view']		= "v_testing_detail_ubah_zona_mpa";

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

	public function save_detail_ubah_zona_mpa()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==3)
			{
				$no_request		= $this->input->post('no_request');
				$status 		= $this->input->post('status');
				$user_id 		= $this->session->userdata('user_id');
				$tgl_ubah_z 	= $this->input->post('tgl_ubah_zona');
				$tgl_ubah_zal 	= date('Y/m/d',strtotime($tgl_ubah_z));
				$notice			= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '',$this->input->post('notice'));

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

				if($tgl_ubah_zal == "" || $tgl_ubah_zal == "1970/01/01")
				{
					$tgl_ubah_za = "";
				}
				else
				{
					$tgl_ubah_za = $tgl_ubah_zal;
				}

				if($status == "1")
				{
					$tgl_ubah_zona = $tgl_ubah_za;
				}
				else
				{
					$tgl_ubah_zona = "";
				}

				$query 			= $this->m_ubah_zona_mpa->save_detail_ubah_zona_mpa($no_request,$status,$user_id,$tgl_ubah_zona,$notice,$attachment);

				if($query)
				{
					
					$query 		= $this->m_ubah_zona_mpa->cek_status_approve($no_request);
					foreach($query as $q)
					{
						$status_approve = $q['STATUS_MPA'];
						if($status_approve == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UZR('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('ubah_zona_mpa/c_ubah_zona_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('ubah_zona_mpa/c_ubah_zona_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('ubah_zona_mpa/c_ubah_zona_mpa');
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

	public function save_testing_detail_ubah_zona_mpa()
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

				$tgl_l 			= $this->input->post('tgl_live');
				$tgl_li 		= date('Y/m/d',strtotime($tgl_l));

				if($tgl_li == "" || $tgl_li == "1970/01/01")
				{
					$tgl_lil = "";
				}
				else
				{
					$tgl_lil = $tgl_li;
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
					$tgl_live 	= $tgl_lil;
					$tgl_close 	= $tgl_clo;
				}
				else
				{
					$tgl_live 	= "";
					$tgl_close 	= "";
				}

				$user_id 		= $this->session->userdata('user_id');

				$query 			= $this->m_ubah_zona_mpa->save_testing_detail_ubah_zona_mpa($no_request,$status,$notice,$tgl_live,$tgl_close,$user_id,$attachment);

				if($query)
				{
					$query = $this->m_ubah_zona_mpa->cek_status_testing($no_request);

					foreach($query as $q)
					{
						$status_testing = $q['STATUS_TESTING'];
						if($status_testing == "1")
						{
							$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UZR_LIVE('".$no_request."');END;");
							$this->db->Execute($run_procedure);
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('ubah_zona_mpa/c_ubah_zona_mpa');
						}
						else
						{
							$this->session->set_flashdata('request_success','Set Status Berhasil...');
							redirect('ubah_zona_mpa/c_ubah_zona_mpa');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('ubah_zona_mpa/c_ubah_zona_mpa');
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

/* End of file c_ubah_zona_mpa.php */
/* Location: ./application/modules/ubah_zona_mpa/controllers/c_ubah_zona_mpa.php */