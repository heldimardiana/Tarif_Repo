<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_btbp_mpa extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_origin($origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin($origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function generate_btbp($cabang)
	{
        $sql = "SELECT
                ORIGIN, CITY_ZONE_CODE, CITY_ZONE_3CODE, CITY_ZONE_KABKOTA,CITY_ZONE_KECAMATAN, CITY_ZONE_ID,LINEHAUL, LINEHAUL_NEXT, TRANSIT, 
                DL_BEFORE_OKE,DL_BEFORE_REG, DL_BEFORE_YES, DL_BEFORE_SPS, NVL(DL_BEFORE_NEXT_SPS,0) DL_BEFORE_NEXT_SPS
                FROM
                (SELECT SUBSTR(DROURATE_CODE,1,8) ORIGIN, CITY_ZONE_CODE, CITY_ZONE_3CODE, CITY_ZONE_KABKOTA,
                CITY_ZONE_KECAMATAN, CITY_ZONE_ID,
                nvl(DROURATE_LINEHAUL,0) LINEHAUL, nvl(DROURATE_LINEHAUL_NEXT,0) LINEHAUL_NEXT,nvl(DROURATE_TRANSIT,0) TRANSIT,
                CASE 
                    WHEN DROURATE_SERVICE LIKE 'OKE%' THEN DROURATE_DELIVERY
                    ELSE 0
                END DL_BEFORE_OKE,
                CASE 
                    WHEN DROURATE_SERVICE LIKE 'REG%' THEN DROURATE_DELIVERY
                    ELSE 0
                END DL_BEFORE_REG,
                CASE 
                    WHEN DROURATE_SERVICE LIKE 'YES%' THEN DROURATE_DELIVERY
                    ELSE 0
                END DL_BEFORE_YES,
                CASE 
                    WHEN DROURATE_SERVICE LIKE 'SPS%' THEN DROURATE_DELIVERY
                    ELSE 0
                END DL_BEFORE_SPS,
                CASE 
                    WHEN DROURATE_SERVICE LIKE 'SPS%' THEN DROURATE_DELIVERY_NEXT
                    ELSE 0
                END DL_BEFORE_NEXT_SPS
                FROM V_TARIF_UTCU
                WHERE 
                SUBSTR(DROURATE_CODE,1,8)='".$this->db->escape($cabang)."'
                AND CITY_ZONE_CODE = SUBSTR(DROURATE_CODE,9,8)
                AND DZONE_LEVEL = '1' AND DZONE_TYPE='1'
                AND DROURATE_SERVICE IN (SELECT SERVICE_CODE FROM CMS_SERVICE WHERE SERVICE_CODE LIKE 'OKE%' OR SERVICE_CODE LIKE 'REG%' OR SERVICE_CODE LIKE 'YES%' OR SERVICE_CODE LIKE 'SPS%')
                AND DROURATE_ACTIVE='Y'
                AND DROURATE_DELIVERY>0
                ORDER BY CITY_ZONE_CODE, CITY_ZONE_3CODE, CITY_ZONE_KABKOTA,CITY_ZONE_KECAMATAN, SERVICE_DISPLAY
                )
                GROUP BY ORIGIN, CITY_ZONE_CODE, CITY_ZONE_3CODE, CITY_ZONE_KABKOTA,CITY_ZONE_KECAMATAN, LINEHAUL, LINEHAUL_NEXT, TRANSIT, 
                CITY_ZONE_ID, DL_BEFORE_OKE,DL_BEFORE_REG, DL_BEFORE_YES, DL_BEFORE_SPS, DL_BEFORE_NEXT_SPS
                ORDER BY CITY_ZONE_CODE";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_master($seq, $cabang, $user_id, $user_name, $user_branch,
									  $user_origin, $user_zone_code, $user_level, $session_request, $regional)
	{
		$get_seq = "SELECT SEQ_TARIF_BTBP.NEXTVAL AS COUNTS FROM DUAL";
        $query_seq = $this->db->GetArray($get_seq);
        foreach($query_seq as $qs){
                $btbp = $qs['COUNTS'];
        }

        $sequence = $seq.$btbp;

		$sql = "INSERT INTO TARIF_MASTER_BTBP
				(NO_REQUEST, ORIGIN, USER_ID, USER_NAME, USER_BRANCH, USER_ORIGIN, USER_ZONE_CODE, USER_LEVEL,
				SESSION_REQUEST, REGIONAL)
				VALUES
				('$sequence','$cabang','$user_id','$user_name','$user_branch','$user_origin',
				'$user_zone_code','$user_level','$session_request','$regional')";
		$query = $this->db->Execute($sql);
		return $sequence;
	}

	public function save_detail($query, $origin, $city_zone_code, $city_zone_3code,
								$city_zone_kabkota, $city_zone_kecamatan, $city_zone_id, $bp_before_1st_kilo,
								$bp_after_1st_kilo, $bp_before_next_kilo, $bp_after_next_kilo, $bt_before,
								$bt_after, $bd_oke_before, $bd_oke_after, $bd_reg_before, $bd_reg_after,
								$bd_yes_before, $bd_yes_after, $bd_sps_1st_kilo_before, $bd_sps_1st_kilo_after,
								$bd_sps_next_kilo_before, $bd_sps_next_kilo_after,$drourate_service)
	{
		$sql = "INSERT INTO TARIF_DETAIL_BTBP
				(NO_REQUEST, ORIGIN, DESTINATION, BTBP_3CODE, KOTA_KABUPATEN, KECAMATAN,
				ZONA, BP_1ST_KILO_BEFORE, BP_1ST_KILO_AFTER, BP_NEXT_KILO_BEFORE, BP_NEXT_KILO_AFTER,
				BT_BEFORE, BT_AFTER, OKE_BEFORE, OKE_AFTER, REG_BEFORE, REG_AFTER, YES_BEFORE, YES_AFTER,
				SPS_1ST_KILO_BEFORE, SPS_1ST_KILO_AFTER, SPS_NEXT_KILO_BEFORE, SPS_NEXT_KILO_AFTER, SERVICE)
				VALUES
				('$query', '$origin', '$city_zone_code', '$city_zone_3code',
				'$city_zone_kabkota', '$city_zone_kecamatan', '$city_zone_id', '$bp_before_1st_kilo',
				'$bp_after_1st_kilo', '$bp_before_next_kilo', '$bp_after_next_kilo', '$bt_before',
				'$bt_after', '$bd_oke_before', '$bd_oke_after', '$bd_reg_before', '$bd_reg_after',
				'$bd_yes_before', '$bd_yes_after', '$bd_sps_1st_kilo_before', '$bd_sps_1st_kilo_after',
				'$bd_sps_next_kilo_before', '$bd_sps_next_kilo_after','$drourate_service')";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function level_2()
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SESSION_REQUEST FROM TARIF_MASTER_BTBP
				WHERE (STATUS_REGIONAL IS NULL) ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_no($session)
	{
		$sql = "SELECT NO_REQUEST FROM TARIF_MASTER_BTBP WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_status()
	{
		$sql = "SELECT * FROM TARIF_STATUS_REQUEST";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_master($session)
	{
		$sql = "SELECT NO_REQUEST, ORIGIN, USER_ID FROM TARIF_MASTER_BTBP WHERE SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function detail_update_btbp($no_request)
	{
		$sql = "SELECT * FROM TARIF_DETAIL_BTBP WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_btbp_level_2($no_request, $status, $notice, $user_id, $attachment)
	{
		$sql = "UPDATE TARIF_MASTER_BTBP SET STATUS_REGIONAL = '$status', PIC_REGIONAL = '".$this->db->escape($user_id)."',
				UPDATE_STATUS_REGIONAL = SYSDATE, NOTICE_REGIONAL = '$notice',
				ATTACHMENT_REGIONAL = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function level_3()
	{
		$sql = "SELECT CREATED, NO_REQUEST, ORIGIN, SESSION_REQUEST, STATUS_MPA,
				STATUS_TESTING, TGL_UPDATE_BTBP, ATTACHMENT_REGIONAL FROM TARIF_MASTER_BTBP
				WHERE (STATUS_REGIONAL = '1') AND (STATUS_MPA IS NULL OR STATUS_MPA = '1')
				AND (STATUS_TESTING IS NULL) ORDER BY CREATED";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_approve_1($session)
	{
		$sql = "SELECT A.PIC_REGIONAL, A.UPDATE_STATUS_REGIONAL, B.STATUS_REQUEST, A.NOTICE_REGIONAL
				FROM TARIF_MASTER_BTBP A LEFT JOIN TARIF_STATUS_REQUEST B ON
				A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_btbp_level_3($no_request,
								  $status, $user_id, $notice, $tgl_update_btbp,$attachment)
	{
		$sql = "UPDATE TARIF_MASTER_BTBP SET STATUS_MPA = '$status', PIC_MPA = '".$this->db->escape($user_id)."',
				UPDATE_STATUS_MPA = SYSDATE, NOTICE_MPA = '$notice',  TGL_UPDATE_BTBP = '$tgl_update_btbp',
				ATTACHMENT_MPA = '$attachment'
				WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function cek_status_approve($no_request)
	{
		$sql = "SELECT STATUS_MPA FROM TARIF_MASTER_BTBP WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function cek_status_testing($no_request)
	{
		$sql = "SELECT STATUS_TESTING FROM TARIF_MASTER_BTBP WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function notice_approve_2($session)
	{
		$sql = "SELECT A.PIC_MPA, A.UPDATE_STATUS_MPA, B.STATUS_REQUEST, A.NOTICE_MPA,
				A.TGL_UPDATE_BTBP
				FROM TARIF_MASTER_BTBP A LEFT JOIN TARIF_STATUS_REQUEST B ON
				A.STATUS_REGIONAL = B.ID_STATUS_REQUEST
				WHERE A.SESSION_REQUEST = '".$this->db->escape($session)."'";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_testing_level_3($no_request, $status, $user_id, $notice, $tgl_live_btbp, $tgl_close, $attachment)
	{
		$sql = "UPDATE TARIF_MASTER_BTBP SET STATUS_TESTING = '$status', TGL_LIVE_BTBP = '$tgl_live_btbp',
				PIC_LIVE = '".$this->db->escape($user_id)."', NOTICE_LIVE = '$notice', TGL_APPROVE_TESTING = SYSDATE,
				TGL_CLOSING = '$tgl_close', ATTACHMENT_MPA = '$attachment' WHERE NO_REQUEST = '".$this->db->escape($no_request)."'";
		$query = $this->db->Execute($sql);
		return $query;
	}

}

/* End of file m_update_btbp_mpa.php */
/* Location: ./application/modules/update_btbp_mpa/models/m_update_btbp_mpa.php */