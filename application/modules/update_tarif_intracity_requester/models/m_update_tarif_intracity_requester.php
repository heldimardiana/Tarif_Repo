<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_tarif_intracity_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_origin($origin)
	{
		$sql = "SELECT SUBSTR(DROURATE_CODE,1,8) AS CITY_CODE, CITY_NAME
				FROM CMS_DROURATE, CMS_CITY
				WHERE
				    DROURATE_SERVICE LIKE 'CTC%' AND DROURATE_SERVICE NOT LIKE 'CTCSPS%' AND DROURATE_ACTIVE='Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND EXISTS (SELECT CITY_ZONE_KECAMATAN FROM TARIF_CMS_CITY_ZONE WHERE CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8))
				AND (SUBSTR(DROURATE_CODE,1,8) LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
				GROUP BY SUBSTR(DROURATE_CODE,1,8), CITY_NAME
				ORDER BY SUBSTR(DROURATE_CODE,1,8)";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin($origin)
	{
		$sql = "SELECT SUBSTR(DROURATE_CODE,1,8) AS CITY_CODE, CITY_NAME
				FROM CMS_DROURATE, CMS_CITY
				WHERE
				    DROURATE_SERVICE LIKE 'CTC%' AND DROURATE_SERVICE NOT LIKE 'CTCSPS%' AND DROURATE_ACTIVE='Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND EXISTS (SELECT CITY_ZONE_KECAMATAN FROM TARIF_CMS_CITY_ZONE WHERE CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8))
				AND (SUBSTR(DROURATE_CODE,1,8) LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
				GROUP BY SUBSTR(DROURATE_CODE,1,8), CITY_NAME
				ORDER BY SUBSTR(DROURATE_CODE,1,8)";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin_one($branch,$origin)
	{
		$branch_s = SUBSTR($branch,0,3);

		$sql = "SELECT SUBSTR(DROURATE_CODE,1,8) AS CITY_CODE, CITY_NAME
				FROM CMS_DROURATE, CMS_CITY
				WHERE
				    DROURATE_CODE LIKE '$branch_s%' AND
				    DROURATE_SERVICE LIKE 'CTC%' AND DROURATE_SERVICE NOT LIKE 'CTCSPS%' AND DROURATE_ACTIVE='Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND EXISTS (SELECT CITY_ZONE_KECAMATAN FROM TARIF_CMS_CITY_ZONE WHERE CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8))
				AND (SUBSTR(DROURATE_CODE,1,8) LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
				GROUP BY SUBSTR(DROURATE_CODE,1,8), CITY_NAME
				ORDER BY SUBSTR(DROURATE_CODE,1,8)";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin_one($branch,$origin)
	{
		$branch_s = SUBSTR($branch,0,3);

		$sql = "SELECT SUBSTR(DROURATE_CODE,1,8) AS CITY_CODE, CITY_NAME
				FROM CMS_DROURATE, CMS_CITY
				WHERE
				    DROURATE_CODE LIKE '$branch_s%' AND
				    DROURATE_SERVICE LIKE 'CTC%' AND DROURATE_SERVICE NOT LIKE 'CTCSPS%' AND DROURATE_ACTIVE='Y'
				AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
				AND EXISTS (SELECT CITY_ZONE_KECAMATAN FROM TARIF_CMS_CITY_ZONE WHERE CITY_ZONE_CODE=SUBSTR(DROURATE_CODE,9,8))
				AND (SUBSTR(DROURATE_CODE,1,8) LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
				GROUP BY SUBSTR(DROURATE_CODE,1,8), CITY_NAME
				ORDER BY SUBSTR(DROURATE_CODE,1,8)";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function save_master($seq, $origin, $user_id, $user_name,
							    $user_branch, $user_origin, $user_zone_code, $user_level, $files1, $session_request, $user_regional)
	{
		$get_seq = "SELECT SEQ_TARIF_UTIR.NEXTVAL AS COUNTS FROM DUAL";
        $query_seq = $this->db->GetArray($get_seq);
        foreach($query_seq as $qs){
                $utir = $qs['COUNTS'];
        }

        $sequence = $seq.$utir;

		$sql = "INSERT INTO TARIF_MASTER_UTIR
				(NO_REQUEST, ORIGIN, USER_ID, USER_NAME, USER_BRANCH, USER_ORIGIN, USER_ZONE_CODE,
				USER_LEVEL, ATTACHMENT, SESSION_REQUEST, REGIONAL)
				VALUES
				('$sequence','$origin','$user_id','$user_name','$user_branch','$user_origin','$user_zone_code','$user_level',
				'$files1','$session_request','$user_regional')"; 
		$query = $this->db->Execute($sql);
		return $sequence;
	}

	public function save_detail($query, $yes_a, $yes_a1, $yes_b, $yes_b1, $yes_c,
							  $yes_d, $etd_yes_fa, $etd_yes_ta, $etd_yes_fa1, $etd_yes_ta1, $etd_yes_fb, $etd_yes_tb, $etd_yes_fb1,
							  $etd_yes_tb1, $etd_yes_fc, $etd_yes_tc, $etd_yes_fd, $etd_yes_td, $reg_a, $reg_a1, $reg_b, $reg_b1,
							  $reg_c, $reg_d, $etd_reg_fa, $etd_reg_ta, $etd_reg_fa1, $etd_reg_ta1, $etd_reg_fb, $etd_reg_tb,
							  $etd_reg_fb1, $etd_reg_tb1, $etd_reg_fc, $etd_reg_tc, $etd_reg_fd, $etd_reg_td, $oke_a, $oke_a1,
							  $oke_b, $oke_b1, $oke_c, $oke_d, $etd_oke_fa, $etd_oke_ta, $etd_oke_fa1, $etd_oke_ta1, $etd_oke_fb,
							  $etd_oke_tb, $etd_oke_fb1, $etd_oke_tb1, $etd_oke_fc, $etd_oke_tc, $etd_oke_fd, $etd_oke_td)
	{
		$sql = "INSERT INTO TARIF_DETAIL_UTIR_1
				(NO_REQUEST, TARIF_YES_A, TARIF_YES_A1, TARIF_YES_B, TARIF_YES_B1, TARIF_YES_C, TARIF_YES_D,
				ETD_FROM_YES_A, ETD_THRU_YES_A, ETD_FROM_YES_A1, ETD_THRU_YES_A1, ETD_FROM_YES_B, ETD_THRU_YES_B,
				ETD_FROM_YES_B1, ETD_THRU_YES_B1, ETD_FROM_YES_C, ETD_THRU_YES_C, ETD_FROM_YES_D, ETD_THRU_YES_D,
				TARIF_REG_A, TARIF_REG_A1, TARIF_REG_B, TARIF_REG_B1, TARIF_REG_C, TARIF_REG_D,
				ETD_FROM_REG_A, ETD_THRU_REG_A, ETD_FROM_REG_A1, ETD_THRU_REG_A1, ETD_FROM_REG_B, ETD_THRU_REG_B,
				ETD_FROM_REG_B1, ETD_THRU_REG_B1, ETD_FROM_REG_C, ETD_THRU_REG_C, ETD_FROM_REG_D, ETD_THRU_REG_D,
				TARIF_OKE_A, TARIF_OKE_A1, TARIF_OKE_B, TARIF_OKE_B1, TARIF_OKE_C, TARIF_OKE_D,
				ETD_FROM_OKE_A, ETD_THRU_OKE_A, ETD_FROM_OKE_A1, ETD_THRU_OKE_A1, ETD_FROM_OKE_B, ETD_THRU_OKE_B,
				ETD_FROM_OKE_B1, ETD_THRU_OKE_B1, ETD_FROM_OKE_C, ETD_THRU_OKE_C, ETD_FROM_OKE_D, ETD_THRU_OKE_D)
				VALUES
				('$query', '$yes_a', '$yes_a1', '$yes_b', '$yes_b1', '$yes_c',
				  '$yes_d', '$etd_yes_fa', '$etd_yes_ta', '$etd_yes_fa1', '$etd_yes_ta1', '$etd_yes_fb', '$etd_yes_tb', '$etd_yes_fb1',
				  '$etd_yes_tb1', '$etd_yes_fc', '$etd_yes_tc', '$etd_yes_fd', '$etd_yes_td', '$reg_a', '$reg_a1', '$reg_b', '$reg_b1',
				  '$reg_c', '$reg_d', '$etd_reg_fa', '$etd_reg_ta', '$etd_reg_fa1', '$etd_reg_ta1', '$etd_reg_fb', '$etd_reg_tb',
				  '$etd_reg_fb1', '$etd_reg_tb1', '$etd_reg_fc', '$etd_reg_tc', '$etd_reg_fd', '$etd_reg_td', '$oke_a', '$oke_a1',
				  '$oke_b', '$oke_b1', '$oke_c', '$oke_d', '$etd_oke_fa', '$etd_oke_ta', '$etd_oke_fa1', '$etd_oke_ta1', '$etd_oke_fb',
				  '$etd_oke_tb', '$etd_oke_fb1', '$etd_oke_tb1', '$etd_oke_fc', '$etd_oke_tc', '$etd_oke_fd', '$etd_oke_td')";
		$query = $this->db->Execute($sql);
		return $query;
	}

	public function get_nama_requester($user_id)
    {
        $sql = "SELECT USER_NAME FROM TARIF_USER WHERE USER_ID = '".$this->db->escape($user_id)."'";
        $query = $this->db->GetArray($sql);
        return $query;
    }

    public function get_email_regional($regional)
    {
        $sql = "SELECT USER_EMAIL FROM TARIF_USER WHERE USER_REGIONAL = '".$this->db->escape($regional)."' AND USER_ROLE = '2'
                AND ROWNUM = 1";
        $query = $this->db->GetArray($sql);
        return $query;
    }

    public function get_regional($origin)
    {
    	$sql = "SELECT BRANCH_OPS_REGION FROM ORA_BRANCH WHERE SUBSTR(BRANCH_CODE,1,3) = SUBSTR('$origin',1,3)";
    	$query = $this->db->GetArray($sql);
    	return $query;
    }

	

}

/* End of file m_update_tarif_intracity_requester.php */
/* Location: ./application/modules/update_tarif_intracity_requester/models/m_update_tarif_intracity_requester.php */