<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ubah_coding_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_ubah_coding_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				if($this->session->userdata('user_branch')=="CGK000")
				{
					$branch_code			= $this->session->userdata('user_branch');
					$data['cabang_utama']	= $this->m_ubah_coding_requester->cabang_utama($branch_code);
					$data['title']			= "Ubah Coding";
					if($branch_code == "CGK000")
					{
						$data['temp']		= $this->m_ubah_coding_requester->get_temporary();
						$data['view']		= "v_ubah_coding_requester_all";
						$this->load->view('template', $data);
					}
					else
					{
						$data['view']		= "v_ubah_coding_requester";
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
				$get_data_c		= $this->m_ubah_coding_requester->get_data_cabang($branch_code,$cabang);
				if($get_data_c == TRUE)
				{
					$data_cabang = $this->m_ubah_coding_requester->data_cabang($branch_code,$cabang);
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

	public function save_ubah_coding_requester()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$get_branch 		= $this->m_ubah_coding_requester->get_branch();
				foreach($get_branch as $br)
				{
					$branch 		= $br['BRANCH_CODE'];
					$get_regional 	= $this->m_ubah_coding_requester->get_regional($branch);
					foreach($get_regional as $reg)
					{
						$region 	= $reg['BRANCH_OPS_REGION'];
					}
				}

				// Save Tarif_tmp_ucr
				$ub 				= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 				= $ub."/UCR/";
				$user_id			= $this->session->userdata('user_id');
				//$date 				= date('Y-m-d H:i:s');
				$username			= $this->session->userdata('user_name');
				$user_branch		= $this->session->userdata('user_branch');
				$user_origin		= $this->session->userdata('user_origin');
				$user_zone_code		= $this->session->userdata('user_zone_code');
				$user_level			= $this->session->userdata('user_level');
				$current_code		= $this->input->post('current_code');
				$modif_code			= $this->input->post('modif_code');
				$insert_master 		= $this->m_ubah_coding_requester->insert_master($seq,$user_id);
				$session_request	= md5($insert_master);
				$regional 			= $region;
				$use_tarif 			= $this->input->post('use_tarif');

				if($insert_master !="")
				{
					for($i=0;$i<count($current_code);$i++)
					{
						$query			= $this->m_ubah_coding_requester->save_ubah_coding_requester($insert_master,$user_id,$username,
											$user_branch,$user_origin,$user_zone_code,$user_level,$current_code[$i],
											$modif_code[$i],$session_request,$regional,$use_tarif[$i]);
					}
				}
				else
				{
					echo "Gagal Save Master";
				}

				if($query)
				{
					$query_1 = $this->m_ubah_coding_requester->deleteall_Temp();
					if($query_1)
					{
						$nama_requester = $this->m_ubah_coding_requester->get_nama_requester($user_id);
						foreach($nama_requester as $nr){
							$nama_r = $nr['USER_NAME'];
						}

						$email_reg = $this->m_ubah_coding_requester->get_email_regional($regional);
						foreach($email_reg as $er){
							$email_regional = $er['USER_EMAIL'];
						}

						$no_req = $this->m_ubah_coding_requester->get_no_request($user_id);
						foreach($no_req as $nq){
							$no_request = $nq['NO_REQUEST'];
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
				            
				            $mail->Subject = 'Request Ubah Coding';
				            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
				            Mohon untuk follow up <b>Request Ubah Coding</b> dengan no request <b>".$no_request."</b><br/><br/>
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
								$this->session->set_flashdata('request_success','Request Ubah Coding Berhasil, Silahkan tunggu Proses dari Regional');
								redirect('ubah_coding_requester/c_ubah_coding_requester');
							}
						}
						else
						{
							$this->session->set_flashdata('request_success','Request Ubah Coding Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('ubah_coding_requester/c_ubah_coding_requester');
						}

						
					}
					else
					{
						$this->session->set_flashdata('request_erorr','Request Ubah Coding Gagal...');
						redirect('ubah_coding_requester/c_ubah_coding_requester');
					}
				}
				else
				{
					echo "Gagal Looping..";
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
				$get_data_cu = $this->m_ubah_coding_requester->get_data_cabang_utama($cabang_utama);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_ubah_coding_requester->data_cabang_utama($cabang_utama);
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
				$get_cabang = $this->m_ubah_coding_requester->get_cabang($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_ubah_coding_requester->data_cabang_all($cabang_utama,$cabang);
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

	public function getmodifcode()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$cabang 		= strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_c		= $this->m_ubah_coding_requester->get_modifcode($cabang);
				if($get_data_c == TRUE)
				{
					$data_cabang = $this->m_ubah_coding_requester->data_modifcode($cabang);
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

	public function cekAktiv()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$param 		= ($_GET['param']);
				$cekAktiv	= $this->m_ubah_coding_requester->cekAktiv($param);
				foreach($cekAktiv as $ck)
				{
					$hasil = $ck['CITY_ACTIVE'];
					$json['dat'] = $hasil;

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

	public function save_temporary()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$current_code 	= $this->input->post('c_code');
				$modif_code 	= $this->input->post('m_code');
				$save_session 	= md5(date('Y-m-d H:i:s'));
				$branch_code 	= $this->input->post('c_utama');

				$query 			= $this->m_ubah_coding_requester->save_temporary($current_code,$modif_code,$save_session,$branch_code);
				if($query)
				{
					echo "Success";
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

	public function delete_temp_ucr()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$save_session 	= $this->input->post('sess');
				$query 			= $this->m_ubah_coding_requester->delete_temp_ucr($save_session);
				if($query)
				{
					echo "Success";
				}
				else
				{
					echo "Faild";
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

	public function deleteall_Temp()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$query = $this->m_ubah_coding_requester->deleteall_Temp();
				if($query)
				{
					redirect('ubah_coding_requester/c_ubah_coding_requester');
				}
				else
				{
					echo "Delete Faild..";
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

/* End of file c_ubah_coding_requester.php */
/* Location: ./application/modules/ubah_coding_requester/controllers/c_ubah_coding_requester.php */