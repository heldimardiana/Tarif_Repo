<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_aktivasi_service_requester extends MX_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('m_aktivasi_service_requester');
	}

	public function index()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$data['title']	= "Aktivasi Service";
				$user_branch	= $this->session->userdata('user_branch');
				$user_origin	= $this->session->userdata('user_origin');
				$data['origin']	= $user_origin;
				$data['branch']	= $user_branch;
				if($user_branch != "CGK000")
				{
					$data['view']	= "v_aktivasi_service_requester";
					$this->load->view('template', $data);
				}
				else
				{
					$data['view']	= "v_aktivasi_service_requester_all";
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
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_destination = $this->m_aktivasi_service_requester->get_destination($origin,$destination);
				if($get_destination == TRUE)
				{
					$data_destination = $this->m_aktivasi_service_requester->data_destination($origin,$destination);
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

	public function get_service()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$params = ($_GET['params']);
				$get_service_all = $this->m_aktivasi_service_requester->data_service_all($params);

				if(!empty($get_service_all))
				{
					$dat = "<select name='service' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_service_all as $gs)
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

	public function save_aktivasi_service_requester()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 					= date('Y/m/d H:i:s');
				$ub 					= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 					= $ub.("/ASR/");
				$user_id				= $this->session->userdata('user_id');
				$username				= $this->session->userdata('user_name');
				$user_branch			= $this->session->userdata('user_branch');
				$user_origin			= $this->session->userdata('user_origin');
				$user_zone_code			= $this->session->userdata('user_zone_code');
				$user_level				= $this->session->userdata('user_level');
				$branch_code			= $user_branch;
				$origin 				= $this->input->post('origin');
				$destination 			= $this->input->post('destination');
				$service 				= $this->input->post('service');
				$session_request		= md5($date.$user_id.$username.$user_branch);
				$regional				= $this->session->userdata('user_regional');
				

				$query					= $this->m_aktivasi_service_requester->save_aktivasi_service_requester($seq,$user_id,$username,$user_branch,
										  $user_origin,$user_zone_code,$user_level,$branch_code,$origin,$destination,$service,$session_request,
										  $regional);
				if($query)
				{
					$nama_requester = $this->m_aktivasi_service_requester->get_nama_requester($user_id);
					foreach($nama_requester as $nr){
						$nama_r = $nr['USER_NAME'];
					}

					$email_reg = $this->m_aktivasi_service_requester->get_email_regional($regional);
					foreach($email_reg as $er){
						$email_regional = $er['USER_EMAIL'];
					}

					$no_req = $this->m_aktivasi_service_requester->get_no_request($user_id);
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
			            
			            $mail->Subject = 'Request Aktivasi Service';
			            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
			            Mohon untuk follow up <b>Request Aktivasi Service</b> dengan no request <b>".$no_request."</b><br/><br/>
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
							$this->session->set_flashdata('request_success','Request Aktivasi Service Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('aktivasi_service_requester/c_aktivasi_service_requester');
						}
					}
					else
					{
						$this->session->set_flashdata('request_success','Request Aktivasi Service Berhasil, Silahkan tunggu Proses dari Regional');
						redirect('aktivasi_service_requester/c_aktivasi_service_requester');
					}
				}	
				else
				{
					$this->session->set_flashdata('request_erorr','Request Aktivasi Service Gagal...');
					redirect('aktivasi_service_requester/c_aktivasi_service_requester');
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

	public function get_branch()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$branch = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_branch = $this->m_aktivasi_service_requester->get_branch($branch);
				if($get_branch == TRUE)
				{
					$data_branch = $this->m_aktivasi_service_requester->data_branch($branch);
					foreach($data_branch as $gl)
					{
						$json[$i]['code'] 	= $gl['BRANCH_CODE'];
						$json[$i]['label'] 	= $gl['BRANCH_CODE']."-".$gl['BRANCH_DESC'];
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

	public function get_origin()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$branch 	= ($_GET['branch']);
				$origin = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_origin = $this->m_aktivasi_service_requester->get_origin($branch,$origin);
				if($get_origin == TRUE)
				{
					$data_origin = $this->m_aktivasi_service_requester->data_origin($branch,$origin);
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

	public function get_destination_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$origin = ($_GET['cu']);
				$destination = strtoupper($_REQUEST['term']);
				$i 	= 0;
				$get_data_dest_all = $this->m_aktivasi_service_requester->get_destination_all($origin,$destination);
				if($get_data_dest_all == TRUE)
				{
					$data_destination_all = $this->m_aktivasi_service_requester->get_data_destination_all($origin,$destination);
					foreach($data_destination_all as $gl)
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

	public function get_service_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$params = ($_GET['params']);
				$get_service_all = $this->m_aktivasi_service_requester->data_service_all($params);

				if(!empty($get_service_all))
				{
					$dat = "<select name='service' class='form-control' required>";
		            $dat .= "<option value='' disabled selected>Choose</option>";

		            foreach($get_service_all as $gs)
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

	public function save_aktivasi_service_requester_all()
	{
		if($this->session->userdata('auth_admin')==TRUE)
		{
			if($this->session->userdata('user_role')==1)
			{
				$date 					= date('Y/m/d H:i:s');
				$ub 					= str_replace("0", "", $this->session->userdata('user_branch'));
				$seq 					= $ub.("/ASR/");
				$user_id				= $this->session->userdata('user_id');
				$username				= $this->session->userdata('user_name');
				$user_branch			= $this->session->userdata('user_branch');
				$user_origin			= $this->session->userdata('user_origin');
				$user_zone_code			= $this->session->userdata('user_zone_code');
				$user_level				= $this->session->userdata('user_level');
				$branch_code			= $this->input->post('branch');
				$origin 				= $this->input->post('origin');
				$destination 			= $this->input->post('destination');
				$service 				= $this->input->post('service');
				$session_request		= md5($date.$user_id.$username.$user_branch);

				$reg 					= $this->m_aktivasi_service_requester->get_regional($branch_code);
				foreach($reg as $rg)
				{
					$regional 			= $rg['BRANCH_OPS_REGION'];
				}
				

				$query					= $this->m_aktivasi_service_requester->save_aktivasi_service_requester($seq,$user_id,$username,$user_branch,
										  $user_origin,$user_zone_code,$user_level,$branch_code,$origin,$destination,$service,$session_request,
										  $regional);
				if($query)
				{
					$nama_requester = $this->m_aktivasi_service_requester->get_nama_requester($user_id);
					foreach($nama_requester as $nr){
						$nama_r = $nr['USER_NAME'];
					}

					$email_reg = $this->m_aktivasi_service_requester->get_email_regional($regional);
					foreach($email_reg as $er){
						$email_regional = $er['USER_EMAIL'];
					}

					$no_req = $this->m_aktivasi_service_requester->get_no_request($user_id);
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
			            
			            $mail->Subject = 'Request Aktivasi Service';
			            $mail->Body = "<p>Dear Bapak / Ibu Regional</p><br/><br/>
			            Mohon untuk follow up <b>Request Aktivasi Service</b> dengan no request <b>".$no_request."</b><br/><br/>
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
							$this->session->set_flashdata('request_success','Request Aktivasi Service Berhasil, Silahkan tunggu Proses dari Regional');
							redirect('aktivasi_service_requester/c_aktivasi_service_requester');
						}
					}
					else
					{
						$this->session->set_flashdata('request_success','Request Aktivasi Service Berhasil, Silahkan tunggu Proses dari Regional');
						redirect('aktivasi_service_requester/c_aktivasi_service_requester');
					}
				}	
				else
				{
					$this->session->set_flashdata('request_erorr','Request Aktivasi Service Gagal...');
					redirect('aktivasi_service_requester/c_aktivasi_service_requester');
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

/* End of file c_aktivasi_service_requester.php */
/* Location: ./application/modules/aktivasi_service_requester/controllers/c_aktivasi_service_requester.php */