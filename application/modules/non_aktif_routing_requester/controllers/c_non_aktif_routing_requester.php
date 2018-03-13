<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_non_aktif_routing_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_non_aktif_routing_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$user_branch		= $this->session->userdata('user_branch');
				$data['title']		= "Non Aktif Routing";

				if($user_branch == "CGK000")
				{
					$data['view']		= "v_non_aktif_routing_all";
					$this->load->view('template', $data);
				}
				else
				{
					$data['branch']			= $this->session->userdata('user_branch');
					$data['origin']	 	= $this->session->userdata('user_origin');
					$data['view']		= "v_non_aktif_routing";
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

	public function get_destination()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$user_origin = ($_GET['cul']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_dest = $this->m_non_aktif_routing_requester->get_destination($user_origin,$destination);
				if($get_data_dest == TRUE)
				{
					$data_destination = $this->m_non_aktif_routing_requester->get_data_destination($user_origin,$destination);
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

	public function getchild()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$param 		= ($_GET['param']);
				$getchild	= $this->m_non_aktif_routing_requester->getchild($param);
				
				$json['dat'] = $getchild['CNT'];

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

	public function save_non_aktif_routing_requester()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				
				$date 			= date('Y-m-d H:i:s');
				$nr 			= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 			= $nr."/NARR/";
				$user_id		= $this->session->userdata('user_id');
				$username		= $this->session->userdata('user_name');
				$user_branch	= $this->session->userdata('user_branch');
				$user_origin	= $this->session->userdata('user_origin');
				$user_zone_code	= $this->session->userdata('user_zone_code');
				$user_level		= $this->session->userdata('user_level');

				if($user_branch != "CGK000")
				{
					$branch_code = $this->input->post('cabang_utama');
					$origin_code = $this->input->post('cabang');
				}
				else
				{
					$branch_code = $this->input->post('cabang_utama');
					$origin_code = $this->input->post('cabang');
				}

				$destination 	    	= $this->input->post('destination');
				$session_request		= md5($date.$user_id.$username);

				$reg 					= $this->m_non_aktif_routing_requester->get_regional($branch_code);
				foreach($reg as $rg)
				{
					$regional 			= $rg['BRANCH_OPS_REGION'];
				}

				$childs					= $this->input->post('childs');
				if($childs > 0)
				{
					$child 				= $this->input->post('child');
				}
				else
				{
					$child 				= "";
				}


				$query				= $this->m_non_aktif_routing_requester->save_non_aktif_routing_requester($seq,$user_id,$username,$user_branch,
									  $user_origin,$user_zone_code,$user_level,$branch_code,$origin_code,$destination,$session_request,$regional,$child);
				if($query)
				{
					$nama_requester = $this->m_non_aktif_routing_requester->get_nama_requester($user_id);
					foreach($nama_requester as $nr){
						$nama_r = $nr['USER_NAME'];
					}

					$email_reg = $this->m_non_aktif_routing_requester->get_email_regional($regional);
					foreach($email_reg as $er){
						$email_regional = $er['USER_EMAIL'];
					}

					$no_req = $this->m_non_aktif_routing_requester->get_no_request($user_id);
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
			            
			            $mail->Subject = 'Request Non Aktif Routing';
			            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
			            Mohon untuk follow up <b>Request Non Aktif Routing</b> dengan no request <b>".$no_request."</b><br/><br/>
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
							$this->session->set_flashdata('request_success','Request Non Aktif Routing Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('non_aktif_routing_requester/c_non_aktif_routing_requester');
						}
					}
					else
					{
						$this->session->set_flashdata('request_success','Request Non Aktif Routing Berhasil, Silahkan tunggu Proses dari Regional');
						redirect('non_aktif_routing_requester/c_non_aktif_routing_requester');
					}
					
				}
				else
				{
					$this->session->set_flashdata('request_erorr','Request Non Aktif Routing Gagal....');
					redirect('non_aktif_routing_requester/c_non_aktif_routing_requester');
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
				$get_data_cu = $this->m_non_aktif_routing_requester->get_data_cabang_utama($cabang_utama);
				if($get_data_cu == TRUE)
				{
					$data_cabang_utama = $this->m_non_aktif_routing_requester->data_cabang_utama($cabang_utama);
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

	public function get_cabang()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$cabang_utama = ($_GET['cu']);
				$cabang = strtoupper($_REQUEST['term']);
				$i = 0;
				$get_cabang = $this->m_non_aktif_routing_requester->get_cabang($cabang_utama,$cabang);
				if($get_cabang == TRUE)
				{
					$data_cabang = $this->m_non_aktif_routing_requester->data_cabang($cabang_utama,$cabang);
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

	public function get_destination_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$cabang = ($_GET['cul']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_dest = $this->m_non_aktif_routing_requester->get_destination_all($cabang,$destination);
				if($get_data_dest == TRUE)
				{
					$data_destination = $this->m_non_aktif_routing_requester->get_data_destination_all($cabang,$destination);
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

}

/* End of file c_non_aktif_routing_requester.php */
/* Location: ./application/modules/non_aktif_routing_requester/controllers/c_non_aktif_routing_requester.php */