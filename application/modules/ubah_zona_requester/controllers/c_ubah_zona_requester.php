<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ubah_zona_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_ubah_zona_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']	= "Ubah Zona";
				$branch_code	= $this->session->userdata('user_branch');
				$data['branch']	= $this->m_ubah_zona_requester->get_branch($branch_code);

				if($branch_code == "CGK000")
				{
					$data['view']	= "v_ubah_zona_requester_all";
					$this->load->view('template', $data);
				}
				else
				{
					$data['view']	= "v_ubah_zona_requester";
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

	public function get_cabang()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$cabang_utama = ($_GET['cu']);
				$cabang = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_ubah_zona_requester->get_cabang($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_ubah_zona_requester->data_cabang($cabang_utama,$cabang);
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

	public function get_zona()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$cabang 	= ($_GET['cu']);
				$get_zone	= $this->m_ubah_zona_requester->get_zona($cabang);
				foreach($get_zone as $gz)
				{
					$zona = $gz['CITY_ZONA'];

					$json['dat'] = $zona;

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

	public function getchild()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$param 		= ($_GET['param']);
				$getchild	= $this->m_ubah_zona_requester->getchild($param);
				
				$data 		= 0;

				foreach($getchild as $gc)
				{
					$data 	= $gc['CNT'];
				}

				$json['dat'] = $data;
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

	public function save_ubah_zona_requester()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 				= date('Y/m/d H:i:s');
				$ub 				= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 				= $ub."/UZR/";
				$user_id			= $this->session->userdata('user_id');
				$username			= $this->session->userdata('user_name');
				$user_branch		= $this->session->userdata('user_branch');
				$user_origin		= $this->session->userdata('user_origin');
				$user_zone_code		= $this->session->userdata('user_zone_code');
				$user_level			= $this->session->userdata('user_level');
				$branch_code 		= $this->input->post('cabang_utama');
				$origin 			= $this->input->post('cabang');
				$current_zone		= $this->input->post('current_zone');
				$modif_zone			= strtoupper($this->input->post('modif_zone'));
				$session_request	= md5($date.$user_id.$username);

				$reg 				= $this->m_ubah_zona_requester->get_regional($branch_code);
				foreach($reg as $rg)
				{
					$regional 		= $rg['BRANCH_OPS_REGION'];
				}

				$childs				= $this->input->post('childs');
				if($childs > 0)
				{
					$child 			= $this->input->post('child');
				}
				else
				{
					$child 			= "";
				}
				

				$query				= $this->m_ubah_zona_requester->save_ubah_zona_requester($seq,$user_id,$username,$user_branch,
									  $user_origin,$user_zone_code,$user_level,$branch_code,$origin,$current_zone,$modif_zone,$session_request,$regional,$child);
				if($query)
				{
					
					$nama_requester = $this->m_ubah_zona_requester->get_nama_requester($user_id);
					foreach($nama_requester as $nr){
						$nama_r = $nr['USER_NAME'];
					}

					$email_reg = $this->m_ubah_zona_requester->get_email_regional($regional);
					foreach($email_reg as $er){
						$email_regional = $er['USER_EMAIL'];
					}

					$no_req = $this->m_ubah_zona_requester->get_no_request($user_id);
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
			            
			            $mail->Subject = 'Request Ubah Zona';
			            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
			            Mohon untuk follow up <b>Request Ubah Zona</b> dengan no request <b>".$no_request."</b><br/><br/>
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
							$this->session->set_flashdata('request_success','Request Ubah Zona Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('ubah_zona_requester/c_ubah_zona_requester');
						}
					}
					else
					{
						$this->session->set_flashdata('request_success','Request Ubah Zona Berhasil, Silahkan tunggu Proses dari Regional');
						redirect('ubah_zona_requester/c_ubah_zona_requester');
					}
					
				}
				else
				{
					
					$this->session->set_flashdata('request_erorr','Request Ubah Zona Gagal...');
					redirect('ubah_zona_requester/c_ubah_zona_requester');
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
				$get_data_cu = $this->m_ubah_zona_requester->get_data_cabang_utama($cabang_utama);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_ubah_zona_requester->data_cabang_utama($cabang_utama);
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

}

/* End of file c_ubah_zona_requester.php */
/* Location: ./application/modules/ubah_zona_requester/controllers/c_ubah_zona_requester.php */