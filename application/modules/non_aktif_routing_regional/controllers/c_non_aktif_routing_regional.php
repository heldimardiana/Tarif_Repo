<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_non_aktif_routing_regional extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_non_aktif_routing_regional');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']	= "Non Aktif Routing";
				$user_regional	= $this->session->userdata('user_regional');
				$data['narr']	= $this->m_non_aktif_routing_regional->narr($user_regional);
				$data['view']	= "v_non_aktif_routing_regional";

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

	public function detail_non_aktif_routing_regional($session)
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$data['title']		= "Detail Non Aktif Routing";
				$data['detail']		= $this->m_non_aktif_routing_regional->detail_non_aktif_routing_regional($session);
				$data['statuss']	= $this->m_non_aktif_routing_regional->tarif_status_request();
				$data['view']		= "v_detail_non_aktif_routing_regional";

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

	public function save_detail_non_aktif_routing_regional()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==2)
			{
				$no_request = $this->input->post('no_request');
				$status 	= $this->input->post('status');
				$user_id	= $this->session->userdata('user_id');
				$notice		= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '',$this->input->post('notice'));
				$attach 	= $this->input->post('attachment');

				
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

				$query		= $this->m_non_aktif_routing_regional->save_detail_non_aktif_routing_regional($no_request,$status,$user_id,$notice,$attachment);

				if($query)
				{
					$this->session->set_flashdata('request_success','Set Status Berhasil...');
					redirect('non_aktif_routing_regional/c_non_aktif_routing_regional');
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Set Status Gagal...');
					redirect('non_aktif_routing_regional/c_non_aktif_routing_regional');
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

/* End of file c_non_aktif_routing_regional.php */
/* Location: ./application/modules/non_aktif_routing_regional/controllers/c_non_aktif_routing_regional.php */