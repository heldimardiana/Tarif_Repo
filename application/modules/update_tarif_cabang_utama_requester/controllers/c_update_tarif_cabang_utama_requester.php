<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_update_tarif_cabang_utama_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_update_tarif_cabang_utama_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$branch_code			= $this->session->userdata('user_branch');
				$data['title']	= "Update Tarif Cabang Utama";
				if($branch_code == "CGK000")
				{
					//$data['view']		= "v_update_tarif_cabang_utama_requester_all";
					$data['view']		= "v_update_generate_all";
					$this->load->view('template', $data);
				}
				else
				{
					$origin 			= $this->session->userdata('user_origin');
					$data['origin']		= $this->session->userdata('user_origin');
					$data['service']	= $this->m_update_tarif_cabang_utama_requester->get_service($origin);
					//$data['view']		= "v_update_tarif_cabang_utama_requester";
					$data['view']		= "v_update_generate";
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

	public function get_origin()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$cabang 		= strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_c		= $this->m_update_tarif_cabang_utama_requester->get_cabang($cabang);
				if($get_data_c == TRUE)
				{
					$data_cabang = $this->m_update_tarif_cabang_utama_requester->data_cabang($cabang);
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

	public function get_service()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$origin 	= ($_GET['params']);
				$get_service = $this->m_update_tarif_cabang_utama_requester->get_service($origin);

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

	public function generate_update_generate_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$origin 			= $this->input->post('origin');
				$service 			= $this->input->post('service');
				$data['title']		= "Update Tarif Cabang Utama";
				$data['origin']		= $origin;
				$data['service']	= $service;
				$data['gtable']		= $this->m_update_tarif_cabang_utama_requester->g_table($origin,$service);
				$data['view']		= "v_update_tarif_cabang_utama_requester_all";

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

	public function save_update_tarif_cabang_utama_requester()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 				= date('Y/m/d H:i:s');
				$br 				= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 				= $br."/UTCU/";
				$origin 			= $this->input->post('origin');
				$service 			= $this->input->post('service');
				$attachment 		= $this->input->post('attachment');
				$param_attachment   = $this->input->post('param_attachment');
				$key_group			= md5($date.$br.$origin.$service.$attachment);

				if(!empty($param_attachment))
				{
					//File Uploading
					$dir 						= './UPLOADS/';
					$config['upload_path']		= './UPLOADS/';
					$config['allowed_types']	= 'xls|xlsx|pdf|doc|docx';
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

				$kab_kotamadya			= $this->input->post('kab_kotamadya');
				$ref_code 				= $this->input->post('ref_code');
				$code 					= $this->input->post('code');
				$city_code 				= $this->input->post('city_code');
				$tarif_before_zona_a	= $this->input->post('tarif_before_zona_a');
				$tarif_after_zona_a		= str_replace('.','',$this->input->post('tarif_after_zona_a'));
				$etd_from_before_zona_a	= $this->input->post('etd_from_before_zona_a');
				$etd_thru_before_zona_a	= $this->input->post('etd_thru_before_zona_a');
				$etd_from_after_zona_a	= $this->input->post('etd_from_after_zona_a');
				$etd_thru_after_zona_a	= $this->input->post('etd_thru_after_zona_a');
				$bd_nama_service_zona_a	= $this->input->post('bd_nama_service_zona_a');
				$tarif_before_zona_b	= $this->input->post('tarif_before_zona_b');
				$tarif_after_zona_b		= str_replace('.','',$this->input->post('tarif_after_zona_b'));
				$etd_from_before_zona_b	= $this->input->post('etd_from_before_zona_b');
				$etd_thru_before_zona_b	= $this->input->post('etd_thru_before_zona_b');
				$etd_from_after_zona_b	= $this->input->post('etd_from_after_zona_b');
				$etd_thru_after_zona_b 	= $this->input->post('etd_thru_after_zona_b');
				$bd_nama_service_zona_b	= $this->input->post('bd_nama_service_zona_b');
				$bt_zona_b 				= $this->input->post('bt_zona_b');
				$tarif_before_zona_c 	= $this->input->post('tarif_before_zona_c');
				$tarif_after_zona_c 	= $this->input->post('tarif_after_zona_c');
				$etd_from_before_zona_c	= $this->input->post('etd_from_before_zona_c');
				$etd_thru_before_zona_c	= $this->input->post('etd_thru_before_zona_c');
				$etd_from_after_zona_c 	= $this->input->post('etd_from_after_zona_c');
				$etd_thru_after_zona_c 	= $this->input->post('etd_thru_after_zona_c');
				$bd_nama_service_zona_c = $this->input->post('bd_nama_service_zona_c');
				$bt_zona_c 				= $this->input->post('bt_zona_c');
				$bp_1_kilo_zona_c 		= $this->input->post('bp_1_kilo_zona_c');
				$bp_next_kilo_zona_c 	= $this->input->post('bp_next_kilo_zona_c');
				$tarif_before_zona_d	= $this->input->post('tarif_before_zona_d');
				$tarif_after_zona_d 	= $this->input->post('tarif_after_zona_d');
				$etd_from_before_zona_d	= $this->input->post('etd_from_before_zona_d');
				$etd_thru_before_zona_d = $this->input->post('etd_thru_before_zona_d');
				$etd_from_after_zona_d	= $this->input->post('etd_from_after_zona_d');
				$etd_thru_after_zona_d 	= $this->input->post('etd_thru_after_zona_d');
				$bd_nama_service_zona_d = $this->input->post('bd_nama_service_zona_d');
				$bt_zona_d 				= $this->input->post('bt_zona_d');
				$bp_1_kilo_zona_d 		= $this->input->post('bp_1_kilo_zona_d');
				$bp_next_kilo_zona_d 	= $this->input->post('bp_next_kilo_zona_d');

				$session_request 		= md5($date.$origin.$service.$attachment);

				$reg					= $this->m_update_tarif_cabang_utama_requester->get_regional($origin);
				foreach($reg as $rg)
				{
					$regional 			= $rg['BRANCH_OPS_REGION'];
				}
				$user_id 				= $this->session->userdata('user_id');
				$user_name 				= $this->session->userdata('user_name');
				$user_branch 			= $this->session->userdata('user_branch');
				$user_origin 			= $this->session->userdata('user_origin');
				$user_zone_code 		= $this->session->userdata('user_zone_code');
				$user_level 			= $this->session->userdata('user_level');
				
				
				$query 					= $this->m_update_tarif_cabang_utama_requester->save_master(
										  $seq, $origin, $service, $files1, $user_id, $user_name, 
										  $user_branch, $user_origin, $user_zone_code, $user_level,
										  $session_request, $regional);
				
				if($query !="")
				{
					for($i=0; $i<count($ref_code); $i++)
					{
						$detail_query = $this->m_update_tarif_cabang_utama_requester->save_detail(
										$query, $kab_kotamadya[$i], $code[$i], $city_code[$i], $tarif_before_zona_a[$i],
										$tarif_after_zona_a[$i], $etd_from_before_zona_a[$i], $etd_thru_before_zona_a[$i], 
										$etd_from_after_zona_a[$i], $etd_thru_after_zona_a[$i], $bd_nama_service_zona_a[$i],
										$tarif_before_zona_b[$i], $tarif_after_zona_b[$i], $etd_from_before_zona_b[$i], 
										$etd_thru_before_zona_b[$i], $etd_from_after_zona_b[$i], $etd_thru_after_zona_b[$i],
										$bd_nama_service_zona_b[$i], $bt_zona_b[$i], $tarif_before_zona_c[$i], $tarif_after_zona_c[$i], 
										$etd_from_before_zona_c[$i], $etd_thru_before_zona_c[$i], $etd_from_after_zona_c[$i], 
										$etd_thru_after_zona_c[$i], $bd_nama_service_zona_c[$i], $bt_zona_c[$i], $bp_1_kilo_zona_c[$i],
										$bp_next_kilo_zona_c[$i], $tarif_before_zona_d[$i], $tarif_after_zona_d[$i],
										$etd_from_before_zona_d[$i], $etd_thru_before_zona_d[$i], $etd_from_after_zona_d[$i],
										$etd_thru_after_zona_d[$i], $bd_nama_service_zona_d[$i], $bt_zona_d[$i], 
										$bp_1_kilo_zona_d[$i], $bp_next_kilo_zona_d[$i]);
					}
				}
				else
				{
					echo "Gagal Looping Detail UTCU";
				}

				if($detail_query)
				{
					$nama_requester = $this->m_update_tarif_cabang_utama_requester->get_nama_requester($user_id);
					foreach($nama_requester as $nr){
						$nama_r = $nr['USER_NAME'];
					}

					$email_reg = $this->m_update_tarif_cabang_utama_requester->get_email_regional($regional);
					foreach($email_reg as $er){
						$email_regional = $er['USER_EMAIL'];
					}

					
					if($email_regional != "")
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
			            
			            $mail->Subject = 'Request Update Tarif Cabang Utama';
			            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
			            Mohon untuk follow up <b>Request Update Tarif Cabang Utama</b> dengan no request <b>".$query."</b><br/><br/>
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
							$this->session->set_flashdata('request_success','Request Update Cabang Utama Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester');
						}
					}
					else
					{
						$this->session->set_flashdata('request_success','Request Update Cabang Utama Berhasil, Silahkan tunggu Proses dari Regional');
						redirect('update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester');
					}

					
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Request Update Cabang Utama Gagal..');
					redirect('update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester');
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

	public function generate_table()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$param 			= ($_GET['param']);
				$generate_table = $this->m_update_tarif_cabang_utama_requester->generate_table($param);

				
				foreach($generate_table as $gt)
				{
					$generate 		= $gt['CITY_ZONE_3CODE'];
					echo json_encode($json);
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

/* End of file c_update_tarif_cabang_utama_requester.php */
/* Location: ./application/modules/update_tarif_cabang_utama_requester/controllers/c_update_tarif_cabang_utama_requester.php */