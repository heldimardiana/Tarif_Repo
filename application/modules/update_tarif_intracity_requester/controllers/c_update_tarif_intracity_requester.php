<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_intracity_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_tarif_intracity_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$branch_code	= $this->session->userdata('user_branch');
				$data['title']	= "Update Tarif Intracity";

				if($branch_code == "CGK000")
				{
					$data['view']	= "v_update_tarif_intracity_requester_all";
					$this->load->view('template',$data);
				}
				else
				{
					$data['branch'] = $this->session->userdata('user_branch');
					$data['view']	= "v_update_tarif_intracity_requester";
					$this->load->view('template',$data);
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

	public function get_origin()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_origin = $this->m_update_tarif_intracity_requester->get_origin($origin);
				if($get_origin == TRUE)
				{
					$data_origin = $this->m_update_tarif_intracity_requester->data_origin($origin);
					foreach($data_origin as $gl)
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

	public function get_origin_one()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$branch = ($_GET['cu']);
				$origin = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_update_tarif_intracity_requester->get_origin_one($branch,$origin);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_update_tarif_intracity_requester->data_origin_one($branch,$origin);
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

	
	public function generate_tarif_intracity()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 				= date('Y/m/d H:i:s');
				$br 				= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 				= $br."/UTIR/";
				$user_id			= $this->session->userdata('user_id');
				$user_name			= $this->session->userdata('user_name');
				$user_branch		= $this->session->userdata('user_branch');
				$user_origin		= $this->session->userdata('user_origin');
				$user_zone_code		= $this->session->userdata('user_zone_code');
				$user_level			= $this->session->userdata('user_level');
				$user_regional 		= $this->session->userdata('user_regional');
				$origin 			= $this->input->post('origin');

				$attachment 		= $this->input->post('file_name');
				$param_attachment   = $this->input->post('param_attachment');
				$session_request	= md5($date.$user_id.$user_branch.$origin);

				$reg 				= $this->m_update_tarif_intracity_requester->get_regional($origin);
				foreach($reg as $rg)
				{
					$regional 		= $rg['BRANCH_OPS_REGION'];
				}
				

				$key_group			= md5($date.$br.$origin.$attachment);

				if(!empty($param_attachment))
				{
					//File Uploading
					$dir 						= './UPLOADS/';
					$config['upload_path']		= './UPLOADS/';
					$config['allowed_types']	= 'xls|xlsx|doc|docx|pdf';
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
						rename ($dir.$file1, $dir.$key_group.$file1);
						$files1 = $key_group.$file1;	
					}
				}
				else
				{
					$files1 = "";
				}

				

				//Yes
				$yes_a 				= $this->input->post('yes_a');
				$yes_a1 			= $this->input->post('yes_a1');
				$yes_b 				= $this->input->post('yes_b');
				$yes_b1 			= $this->input->post('yes_b1');
				$yes_c 				= $this->input->post('yes_c');
				$yes_d 				= $this->input->post('yes_d');
				$etd_yes_fa 		= $this->input->post('etd_yes_fa');
				$etd_yes_ta 		= $this->input->post('etd_yes_ta');
				$etd_yes_fa1 		= $this->input->post('etd_yes_fa1');
				$etd_yes_ta1 		= $this->input->post('etd_yes_ta1');
				$etd_yes_fb 		= $this->input->post('etd_yes_fb');
				$etd_yes_tb 		= $this->input->post('etd_yes_tb');
				$etd_yes_fb1 		= $this->input->post('etd_yes_fb1');
				$etd_yes_tb1 		= $this->input->post('etd_yes_tb1');
				$etd_yes_fc 		= $this->input->post('etd_yes_fc');
				$etd_yes_tc 		= $this->input->post('etd_yes_tc');
				$etd_yes_fd 		= $this->input->post('etd_yes_fd');
				$etd_yes_td 		= $this->input->post('etd_yes_td');

				//Reg
				$reg_a 				= $this->input->post('reg_a');
				$reg_a1 			= $this->input->post('reg_a1');
				$reg_b 				= $this->input->post('reg_b');
				$reg_b1 			= $this->input->post('reg_b1');
				$reg_c 				= $this->input->post('reg_c');
				$reg_d 				= $this->input->post('reg_d');
				$etd_reg_fa 		= $this->input->post('etd_reg_fa');
				$etd_reg_ta 		= $this->input->post('etd_reg_ta');
				$etd_reg_fa1 		= $this->input->post('etd_reg_fa1');
				$etd_reg_ta1 		= $this->input->post('etd_reg_ta1');
				$etd_reg_fb 		= $this->input->post('etd_reg_fb');
				$etd_reg_tb 		= $this->input->post('etd_reg_tb');
				$etd_reg_fb1 		= $this->input->post('etd_reg_fb1');
				$etd_reg_tb1 		= $this->input->post('etd_reg_tb1');
				$etd_reg_fc 		= $this->input->post('etd_reg_fc');
				$etd_reg_tc 		= $this->input->post('etd_reg_tc');
				$etd_reg_fd 		= $this->input->post('etd_reg_fd');
				$etd_reg_td 		= $this->input->post('etd_reg_td');

				//Oke
				$oke_a 				= $this->input->post('oke_a');
				$oke_a1 			= $this->input->post('oke_a1');
				$oke_b 				= $this->input->post('oke_b');
				$oke_b1 			= $this->input->post('oke_b1');
				$oke_c 				= $this->input->post('oke_c');
				$oke_d 				= $this->input->post('oke_d');
				$etd_oke_fa 		= $this->input->post('etd_oke_fa');
				$etd_oke_ta 		= $this->input->post('etd_oke_ta');
				$etd_oke_fa1 		= $this->input->post('etd_oke_fa1');
				$etd_oke_ta1 		= $this->input->post('etd_oke_ta1');
				$etd_oke_fb 		= $this->input->post('etd_oke_fb');
				$etd_oke_tb 		= $this->input->post('etd_oke_tb');
				$etd_oke_fb1 		= $this->input->post('etd_oke_fb1');
				$etd_oke_tb1 		= $this->input->post('etd_oke_tb1');
				$etd_oke_fc 		= $this->input->post('etd_oke_fc');
				$etd_oke_tc 		= $this->input->post('etd_oke_tc');
				$etd_oke_fd 		= $this->input->post('etd_oke_fd');
				$etd_oke_td 		= $this->input->post('etd_oke_td');

				$query 				= $this->m_update_tarif_intracity_requester->save_master($seq, $origin, $user_id, $user_name,
									  $user_branch, $user_origin, $user_zone_code, $user_level, $files1, $session_request, $regional);
				$no_request = $query;
				if($query != "")
				{
					$query_detail 	= $this->m_update_tarif_intracity_requester->save_detail($query, $yes_a, $yes_a1, $yes_b, $yes_b1, $yes_c,
									  $yes_d, $etd_yes_fa, $etd_yes_ta, $etd_yes_fa1, $etd_yes_ta1, $etd_yes_fb, $etd_yes_tb, $etd_yes_fb1,
									  $etd_yes_tb1, $etd_yes_fc, $etd_yes_tc, $etd_yes_fd, $etd_yes_td, $reg_a, $reg_a1, $reg_b, $reg_b1,
									  $reg_c, $reg_d, $etd_reg_fa, $etd_reg_ta, $etd_reg_fa1, $etd_reg_ta1, $etd_reg_fb, $etd_reg_tb,
									  $etd_reg_fb1, $etd_reg_tb1, $etd_reg_fc, $etd_reg_tc, $etd_reg_fd, $etd_reg_td, $oke_a, $oke_a1,
									  $oke_b, $oke_b1, $oke_c, $oke_d, $etd_oke_fa, $etd_oke_ta, $etd_oke_fa1, $etd_oke_ta1, $etd_oke_fb,
									  $etd_oke_tb, $etd_oke_fb1, $etd_oke_tb1, $etd_oke_fc, $etd_oke_tc, $etd_oke_fd, $etd_oke_td);
					if($query_detail)
					{
						$run_procedure = $this->db->PrepareSP("BEGIN P_JOB_TARIF_UTIR_EXECUTE('".$no_request."','');END;");
						$this->db->Execute($run_procedure);

						$nama_requester = $this->m_update_tarif_intracity_requester->get_nama_requester($user_id);
						foreach($nama_requester as $nr){
							$nama_r = $nr['USER_NAME'];
						}

						$email_reg = $this->m_update_tarif_intracity_requester->get_email_regional($regional);
						foreach($email_reg as $er){
							$email_regional = $er['USER_EMAIL'];
						}

						if($email_regional !="")
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
				            
				            $mail->Subject = 'Request Update Tarif Intracity';
				            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
				            Mohon untuk follow up <b>Request Update Tarif Intracity</b> dengan no request <b>".$query."</b><br/><br/>
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
								$this->session->set_flashdata('request_success','Request Update Tarif Intracity Berhasil, Silahkan tunggu Proses dari Regional');
								redirect('update_tarif_intracity_requester/c_update_tarif_intracity_requester');
							}
						}
						else
						{
							$this->session->set_flashdata('request_success','Request Update Tarif Intracity Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('update_tarif_intracity_requester/c_update_tarif_intracity_requester');
						}
					}
					else
					{
						$this->session->set_flashdata('request_erorr','Request Update Tarif Intracity Gagal..');
						redirect('update_tarif_intracity_requester/c_update_tarif_intracity_requester');
					}
				}
				else
				{
					echo "Gagal Save Master !";
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

/* End of file c_update_tarif_intracity_requester.php */
/* Location: ./application/modules/update_tarif_intracity_requester/controllers/c_update_tarif_intracity_requester.php */