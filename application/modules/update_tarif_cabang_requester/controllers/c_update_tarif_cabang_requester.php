<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_cabang_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_tarif_cabang_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$branch_code			= $this->session->userdata('user_branch');
				$data['title']			= "Update Tarif Cabang";
				$data['cabang_utama']	= $this->m_update_tarif_cabang_requester->get_cabang_utama($branch_code);
				if($branch_code == "CGK000")
				{
					$data['view']		= "v_update_tarif_cabang_requester_all";
					$this->load->view('template', $data);
				}
				else
				{
					$data['view']		= "v_update_tarif_cabang_requester";
					$this->load->view('template', $data);
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

	public function get_cabang_utama()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$cabang_utama = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_cu = $this->m_update_tarif_cabang_requester->get_data_cabang_utama($cabang_utama);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_update_tarif_cabang_requester->data_cabang_utama($cabang_utama);
					foreach($data_cabang_utama as $gl)
					{
						$json[$i]['code'] 	= $gl['BRANCH_CODE'];
						$json[$i]['label'] 	= $gl['BRANCH_CITY']."-".$gl['BRANCH_DESC'];
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

	public function get_cabang_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$cabang_utama = ($_GET['cu']);
				$cabang = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_update_tarif_cabang_requester->get_cabang_all($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_update_tarif_cabang_requester->data_cabang_all($cabang_utama,$cabang);
					foreach($data_cabang as $gl)
					{
						$json[$i]['code'] 	= $gl['CITY_CODE'];
						$json[$i]['label'] 	= $gl['CITY_CODE']."-".$gl['CITY_NAME'];
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

	public function get_cabang()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$branch_code	= $this->session->userdata('user_branch');
				$cabang 		= strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_c		= $this->m_update_tarif_cabang_requester->get_cabang($branch_code,$cabang);
				if($get_data_c == TRUE)
				{
					$data_cabang = $this->m_update_tarif_cabang_requester->data_cabang($branch_code,$cabang);
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

	public function data_service()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$params 	= ($_GET['params']);
				$get_service = $this->m_update_tarif_cabang_requester->get_service($params);

				if(!empty($get_service))
				{
					$dat = "<select name='service' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_service as $gs)
		            {
		            	$dat .= "<option value=".$gs['DROURATE_SERVICE'].">".$gs['DROURATE_SERVICE']."</option>";
		            }
		            	$dat .= "</select>"; 
			            $dat .= "<br/>"; 
				}
				else
				{
					$dat = "<select name='service' class='form-control' required >";
		         	$dat .= "<option value='' disabled selected>Choose</option>";
		         	$dat .= "</select>"; 
		         	$dat .= "<br/>"; 
				}
				$json['dat'] = $dat;
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

	public function save_update_tarif_cabang_requester()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 				= date('Y/m/d H:i:s');
				$br 				= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 				= $br."/UTCR/";
				$user_id			= $this->session->userdata('user_id');
				$username			= $this->session->userdata('user_name');
				$user_branch		= $this->session->userdata('user_branch');
				$user_origin		= $this->session->userdata('user_origin');
				$user_zone_code		= $this->session->userdata('user_zone_code');
				$user_level			= $this->session->userdata('user_level');
				$cabang_utama 		= $this->input->post('cabang_utama');
				$cabang 			= $this->input->post('cabang');
				$perubahan			= $this->input->post('perubahan');
				$nilai_perubahan	= $this->input->post('nilai_perubahan');

				if($perubahan=='1')
				{
					$nilai_perubahan_persen = "0";
					$nilai_perubahan_rupiah	= str_replace('.', '',$nilai_perubahan);
				}
				else
				{
					$nilai_perubahan_persen = $nilai_perubahan;
					$nilai_perubahan_rupiah	= "0";
				}

				$service 			= $this->input->post('service');
				$file_component		= $this->input->post('file_component');
				$param_attachment   = $this->input->post('param_attachment');
				$key_group			= md5($date.$user_id.$username.$perubahan.$nilai_perubahan.$file_component);
				$session_request    = md5($date.$user_id.$perubahan.$cabang_utama.$cabang);
				$regional 			= $this->session->userdata('user_regional');
				$branch_request 	= $cabang_utama;
				$origin_request		= $cabang;
				$destination 		= $this->input->post('destination');
				//$tgl_update_t		= $this->input->post('tgl_update_tarif');
				//$tgl_update_tarif	= date('Y/m/d', strtotime($tgl_update_t));

				if(!empty($param_attachment))
				{
					//File Uploading
					$dir 						= './UPLOADS/';
					$config['upload_path']		= './UPLOADS/';
					$config['allowed_types']	= 'xls|xlsx|doc|docx|pdf';
					$config['max_size']			= '4090';
					$config['overwrite']		= FALSE;
					$config['remove_spaces']  	= TRUE;

					$field_name 				= "file_component";

					$this->load->library('upload', $config);
					if(! $this->upload->do_upload($field_name))
					{
						echo $this->upload->display_errors();		
					}
					else
					{
						$data1 	= $this->upload->data();
						$file1 	= $data1['file_name'];
						rename ($dir.$file1, $dir.$key_group.$file1);
						$files1 = $key_group.$file1;	
					}
				}
				else
				{
					$files1 = "";
				}

				$childs 	= $this->input->post('childs');

				if($childs > 0)
				{
					$child 	= $this->input->post('child');
				}
				else
				{
					$child 	= "";
				}
				

				$query		= $this->m_update_tarif_cabang_requester->save_update_tarif_cabang_requester($seq, $user_id, $username,
							  $user_branch, $user_origin, $user_zone_code, $user_level, $perubahan, $nilai_perubahan_persen,
							  $nilai_perubahan_rupiah, $service, $files1, $session_request, $regional, $branch_request, $origin_request,
							  $destination,$child);
				if($query)
				{
					$nama_requester = $this->m_update_tarif_cabang_requester->get_nama_requester($user_id);
					foreach($nama_requester as $nr){
						$nama_r = $nr['USER_NAME'];
					}

					$email_reg = $this->m_update_tarif_cabang_requester->get_email_regional($regional);
					foreach($email_reg as $er){
						$email_regional = $er['USER_EMAIL'];
					}

					$no_req = $this->m_update_tarif_cabang_requester->get_no_request($user_id);
					foreach($no_req as $nq){
						$no_request = $nq['NO_REQUEST'];
					}

					if(!empty($email_regional))
					{
						$set_from = 'no-reply@jne.co.id';
						include('phpmailer/PHPMailerAutoload.php');
						$mail = new PHPMailer();
			            $mail->SMTPDebug = 0;
			            $mail->Debugoutput = 'html';
			            $mail->isSMTP();
			            $mail->Host = 'e-relay.jne.co.id';
			            $mail->Port = '587';
			            $mail->SMTPAuth = true;
			            $mail->Username = 'notification@jne.co.id';
			            $mail->Password = '123456';
			            $mail->WordWrap = 50;  
			            // set email content
			            $mail->setFrom($set_from,'Tarif Application');
			            $mail->addAddress($email_regional);
			            
			            $mail->Subject = 'Request Update Tarif Cabang';
			            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
			            Mohon untuk follow up <b>Request Update Cabang</b> dengan no request <b>".$no_request."</b><br/><br/>
			            <p>Thanks</p>
			            <p>Regards</p><br/>
			            ".$nama_r."
			            ";

			            //$mail->send();

			            $mail->AltBody = "This is the body when user views in plain text format";
						if(!$mail->Send())
						{
							echo "Mailer Error: " . $mail->ErrorInfo;
						}
						else
						{
							$this->session->set_flashdata('request_success','Request Update Tarif Cabang Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('update_tarif_cabang_requester/c_update_tarif_cabang_requester');
						}
					}
					else
					{
						$this->session->set_flashdata('request_success','Request Update Tarif Cabang Berhasil, Silahkan tunggu Proses dari Regional');
						redirect('update_tarif_cabang_requester/c_update_tarif_cabang_requester');
					}

					
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Request Update Cabang Gagal..');
					redirect('update_tarif_cabang_requester/c_update_tarif_cabang_requester');
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

	public function save_update_tarif_cabang_requester_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 				= date('Y/m/d H:i:s');
				$br 				= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 				= $br."/UTCR/";
				$user_id			= $this->session->userdata('user_id');
				$username			= $this->session->userdata('user_name');
				$user_branch		= $this->session->userdata('user_branch');
				$user_origin		= $this->session->userdata('user_origin');
				$user_zone_code		= $this->session->userdata('user_zone_code');
				$user_level			= $this->session->userdata('user_level');
				$cabang_utama 		= $this->input->post('cabang_utama');
				$cabang 			= $this->input->post('cabang');
				$perubahan			= $this->input->post('perubahan');
				$nilai_perubahan	= $this->input->post('nilai_perubahan');

				if($perubahan=='1')
				{
					$nilai_perubahan_persen = "0";
					$nilai_perubahan_rupiah	= str_replace('.', '',$nilai_perubahan);
				}
				else
				{
					$nilai_perubahan_persen = $nilai_perubahan;
					$nilai_perubahan_rupiah	= "0";
				}

				$service 			= $this->input->post('service');
				$file_component		= $this->input->post('file_component');
				$param_attachment   = $this->input->post('param_attachment');
				$key_group			= md5($date.$user_id.$username.$perubahan.$nilai_perubahan.$file_component);
				$session_request    = md5($date.$user_id.$perubahan.$cabang_utama.$cabang);

				$reg 				= $this->m_update_tarif_cabang_requester->get_regional($cabang_utama);
				foreach($reg as $rg)
				{
					$regional 		= $rg['BRANCH_OPS_REGION'];
				}

				$branch_request 	= $cabang_utama;
				$origin_request		= $cabang;
				$destination 		= $this->input->post('destination');
				//$tgl_update_t		= $this->input->post('tgl_update_tarif');
				//$tgl_update_tarif	= date('Y/m/d', strtotime($tgl_update_t));

				if(!empty($param_attachment))
				{
					//File Uploading
					$dir 						= './UPLOADS/';
					$config['upload_path']		= './UPLOADS/';
					$config['allowed_types']	= 'xls|xlsx|doc|docx|pdf';
					$config['max_size']			= '4090';
					$config['overwrite']		= FALSE;
					$config['remove_spaces']  	= TRUE;

					$field_name 				= "file_component";

					$this->load->library('upload', $config);
					if(! $this->upload->do_upload("file_component"))
					{
						echo $this->upload->display_errors();		
					}
					else
					{
						$data1 	= $this->upload->data();
						$file1 	= $data1['file_name'];
						rename ($dir.$file1, $dir.$key_group.$file1);
						$files1 = $key_group.$file1;	
					}
				}
				else
				{
					$files1 = "";
				}

				$childs 	= $this->input->post('childs');

				if($childs > 0)
				{
					$child 	= $this->input->post('child');
				}
				else
				{
					$child 	= "";
				}
				

				$query		= $this->m_update_tarif_cabang_requester->save_update_tarif_cabang_requester_all($seq, $user_id, $username,
							  $user_branch, $user_origin, $user_zone_code, $user_level, $perubahan, $nilai_perubahan_persen,
							  $nilai_perubahan_rupiah, $service, $files1, $session_request, $regional, $branch_request, $origin_request,
							  $destination,$child);
				if($query)
				{
					$nama_requester = $this->m_update_tarif_cabang_requester->get_nama_requester($user_id);
					foreach($nama_requester as $nr){
						$nama_r = $nr['USER_NAME'];
					}

					$email_reg = $this->m_update_tarif_cabang_requester->get_email_regional($regional);
					foreach($email_reg as $er){
						$email_regional = $er['USER_EMAIL'];
					}

					$no_req = $this->m_update_tarif_cabang_requester->get_no_request($user_id);
					foreach($no_req as $nq){
						$no_request = $nq['NO_REQUEST'];
					}

					if(!empty($email_regional))
					{
						$set_from = 'no-reply@jne.co.id';
						include('phpmailer/PHPMailerAutoload.php');
						$mail = new PHPMailer();
			            $mail->SMTPDebug = 0;
			            $mail->Debugoutput = 'html';
			            $mail->isSMTP();
			            $mail->Host = 'e-relay.jne.co.id';
			            $mail->Port = '587';
			            $mail->SMTPAuth = true;
			            $mail->Username = 'notification@jne.co.id';
			            $mail->Password = '123456';
			            $mail->WordWrap = 50;  
			            // set email content
			            $mail->setFrom($set_from,'Tarif Application');
			            $mail->addAddress($email_regional);
			            
			            $mail->Subject = 'Request Update Tarif Cabang';
			            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
			            Mohon untuk follow up <b>Request Update Cabang</b> dengan no request <b>".$no_request."</b><br/><br/>
			            <p>Thanks</p>
			            <p>Regards</p><br/>
			            ".$nama_r."
			            ";

			            //$mail->send();

			            $mail->AltBody = "This is the body when user views in plain text format";
						if(!$mail->Send())
						{
							echo "Mailer Error: " . $mail->ErrorInfo;
						}
						else
						{
							$this->session->set_flashdata('request_success','Request Update Tarif Cabang Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('update_tarif_cabang_requester/c_update_tarif_cabang_requester');
						}
					}
					else
					{
						$this->session->set_flashdata('request_success','Request Update Tarif Cabang Berhasil, Silahkan tunggu Proses dari Regional');
						redirect('update_tarif_cabang_requester/c_update_tarif_cabang_requester');
					}

					
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Request Update Cabang Gagal..');
					redirect('update_tarif_cabang_requester/c_update_tarif_cabang_requester');
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

	public function get_destination()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_destination = $this->m_update_tarif_cabang_requester->get_destination($origin,$destination);
				if($get_destination == TRUE)
				{
					$data_destination = $this->m_update_tarif_cabang_requester->data_destination($origin,$destination);
					foreach($data_destination as $gl)
					{
						$json[$i]['code'] 	= $gl['CITY_CODE'];
						$json[$i]['label'] 	= $gl['CITY_CODE']."-".$gl['CITY_NAME'];
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

	public function getChild()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$param 			= ($_GET['param']);
				$getchild		= $this->m_update_tarif_cabang_requester->getChild($param);
				$data 			= 0;

				foreach($getchild as $gc)
				{
					$data = $gc['CNT'];
				}


				$json['dat']	= $data;
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

}

/* End of file c_update_tarif_cabang_requester.php */
/* Location: ./application/modules/update_tarif_cabang_requester/controllers/c_update_tarif_cabang_requester.php */