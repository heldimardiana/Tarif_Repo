<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_intracity_regional extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_tarif_intracity_regional');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']	= "Update Tarif";
				$regional 		= $this->session->userdata('user_regional');
				$data['uti']	= $this->m_update_tarif_intracity_regional->data_utir($regional);
				$data['view']	= "v_update_tarif_intracity_regional";

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

	public function detail_update_tarif_intracity_regional($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Update Tarif Intracity";
				$data['detail']		= $this->m_update_tarif_intracity_regional->detail_update_tarif_intracity_regional($session);
				$data['stat']		= $this->m_update_tarif_intracity_regional->status_request();
				$get_no_request 	= $this->m_update_tarif_intracity_regional->get_no_request($session);
				foreach($get_no_request as $q)
				{
					$no_request 	= $q['NO_REQUEST'];
				}

				$data['bdetail']	= $this->m_update_tarif_intracity_regional->bdetail($no_request);
				$data['view']		= "v_detail_update_tarif_intracity_regional";

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

	public function save_detail_update_tarif_intracity_regional()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
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

				$query 			= $this->m_update_tarif_intracity_regional->save_detail_update_tarif_intracity_regional($no_request,
								  $status, $user_id, $notice,$attachment);
				if($query)
				{
					$this->session->set_flashdata('request_success','Set Status Berhasil...');
					redirect('update_tarif_intracity_regional/c_update_tarif_intracity_regional');
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('update_tarif_intracity_regional/c_update_tarif_intracity_regional');
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
			if($this->session->userdata('user_role')==2)
			{
				$no_request 	= $this->input->post('no_request');
				$data['detail']	= $this->m_update_tarif_intracity_regional->bdetail($no_request);
				$data['view']	= "v_export_update_intracity_regional";

				$this->load->view('v_export_update_intracity_regional',$data);

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

/* End of file c_update_tarif_intracity_regional.php */
/* Location: ./application/modules/update_tarif_intracity_regional/controllers/c_update_tarif_intracity_regional.php */