<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update_tarif_cabang_utama_requester extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_service($origin)
	{
		$sql = "SELECT DROURATE_SERVICE FROM CMS_DROURATE, CMS_SERVICE 
                        WHERE DROURATE_CODE LIKE '$origin%' AND DROURATE_ACTIVE='Y'
                        AND SERVICE_CODE=DROURATE_SERVICE 
                        AND SERVICE_CODE NOT LIKE '%INTL%'
                        AND SERVICE_CODE NOT LIKE '%CML%'
                        AND SERVICE_CODE NOT LIKE '%CTC%'
                        GROUP BY DROURATE_SERVICE, SERVICE_NAME";
                $query = $this->db->GetArray($sql);
                return $query;
	}

	public function get_cabang($cabang)
	{
		$sql = "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY, CMS_DROURATE 
                        WHERE (CITY_CODE LIKE '$cabang%' OR CITY_NAME LIKE '$cabang%')
                        AND CITY_CODE LIKE '%10000%'
                        AND DROURATE_ACTIVE = 'Y'
                        AND CITY_CODE = SUBSTR(DROURATE_CODE,1,8)
                        GROUP BY CITY_CODE,CITY_NAME"; 
                $query = $this->db->GetArray($sql);
                return $query;
	}

	public function data_cabang($cabang)
	{
		$sql = "SELECT CITY_CODE, CITY_NAME FROM CMS_CITY, CMS_DROURATE 
                        WHERE (CITY_CODE LIKE '$cabang%' OR CITY_NAME LIKE '$cabang%') 
                        AND CITY_CODE LIKE '%10000%'
                        AND DROURATE_ACTIVE = 'Y'
                        AND CITY_CODE = SUBSTR(DROURATE_CODE,1,8)
                        GROUP BY CITY_CODE,CITY_NAME";
                $query = $this->db->GetArray($sql);
                return $query;
	}

        public function g_table($origin,$service)
        {
                $sql = "SELECT CITY_ZONE_3CODE, CITY_ZONE_CODE, CITY_ZONE_KABKOTA,
                        CITY_ZONE_ID, TARIF_A, ETDF_A, ETDT_A, TARIF_B, ETDF_B,
                        ETDT_B, TRANSIT_B, TARIF_C, ETDF_C, ETDT_C, TRANSIT_C,
                        LINEHAUL_C, LINEHAUL_NEXT_C, TARIF_D, ETDF_D, ETDT_D,
                        TRANSIT_D, LINEHAUL_D, LINEHAUL_NEXT_D, DROURATE_SERVICE
                        FROM V_TARIF_UTCU WHERE SUBSTR(DROURATE_CODE,1,8) = '$origin'
                        AND DROURATE_SERVICE = '$service' AND SUBSTR(DROURATE_CODE,12,5)='10000'
                        GROUP BY CITY_ZONE_3CODE, CITY_ZONE_CODE, CITY_ZONE_KABKOTA,
                        CITY_ZONE_ID, TARIF_A, ETDF_A, ETDT_A, TARIF_B, ETDF_B,
                        ETDT_B, TRANSIT_B, TARIF_C, ETDF_C, ETDT_C, TRANSIT_C,
                        LINEHAUL_C, LINEHAUL_NEXT_C, TARIF_D, ETDF_D, ETDT_D,
                        TRANSIT_D, LINEHAUL_D, LINEHAUL_NEXT_D, DROURATE_SERVICE
                        ORDER BY CITY_ZONE_CODE";
                $query = $this->db->GetArray($sql);
                return $query;
        }

        public function save_master($seq, $origin, $service, $files1, $user_id, $user_name, 
                                    $user_branch, $user_origin, $user_zone_code, $user_level,
                                    $session_request, $regional)
        {
                $get_seq = "SELECT SEQ_TARIF_UTCU.NEXTVAL AS COUNTS FROM DUAL";
                $query_seq = $this->db->GetArray($get_seq);
                foreach($query_seq as $qs){
                        $uctu = $qs['COUNTS'];
                }

                $sequence = $seq.$uctu;

                $sql = "INSERT INTO TARIF_MASTER_UTCU 
                        (NO_REQUEST, ORIGIN, SERVICE, ATTACHMENT, USER_ID, USER_NAME,
                        USER_BRANCH, USER_ORIGIN, USER_ZONE_CODE, USER_LEVEL,
                        SESSION_REQUEST, REGIONAL) VALUES 
                        ('$sequence','$origin','$service','$files1','$user_id',
                        '$user_name','$user_branch','$user_origin','$user_zone_code',
                        '$user_level','$session_request','$regional')";
                $query = $this->db->Execute($sql);
                return $sequence;
        }

        public function save_detail(
                                        $query, $kab_kotamadya, $code, $city_code, $tarif_before_zona_a,
                                        $tarif_after_zona_a, $etd_from_before_zona_a, $etd_thru_before_zona_a, 
                                        $etd_from_after_zona_a, $etd_thru_after_zona_a, $bd_nama_service_zona_a,
                                        $tarif_before_zona_b, $tarif_after_zona_b, $etd_from_before_zona_b, 
                                        $etd_thru_before_zona_b, $etd_from_after_zona_b, $etd_thru_after_zona_b,
                                        $bd_nama_service_zona_b, $bt_zona_b, $tarif_before_zona_c, $tarif_after_zona_c, 
                                        $etd_from_before_zona_c, $etd_thru_before_zona_c, $etd_from_after_zona_c, 
                                        $etd_thru_after_zona_c, $bd_nama_service_zona_c, $bt_zona_c, $bp_1_kilo_zona_c,
                                        $bp_next_kilo_zona_c, $tarif_before_zona_d, $tarif_after_zona_d,
                                        $etd_from_before_zona_d, $etd_thru_before_zona_d, $etd_from_after_zona_d,
                                        $etd_thru_after_zona_d, $bd_nama_service_zona_d, $bt_zona_d, 
                                        $bp_1_kilo_zona_d, $bp_next_kilo_zona_d)
        {
                $sql = "INSERT INTO TARIF_DETAIL_UTCU
                        (NO_REQUEST, KAB_KOTA, CODE, DESTINATION, TARIF_BEFORE_ZONA_A,
                        TARIF_AFTER_ZONA_A, ETD_FROM_BEFORE_ZONA_A, ETD_THRU_BEFORE_ZONA_A,
                        ETD_FROM_AFTER_ZONA_A, ETD_THRU_AFTER_ZONA_A, BD_NAMA_SERVICE_ZONA_A,
                        TARIF_BEFORE_ZONA_B, TARIF_AFTER_ZONA_B, ETD_FROM_BEFORE_ZONA_B,
                        ETD_THRU_BEFORE_ZONA_B, ETD_FROM_AFTER_ZONA_B, ETD_THRU_AFTER_ZONA_B,
                        BD_NAMA_SERVICE_ZONA_B, BT_ZONA_B, TARIF_BEFORE_ZONA_C, TARIF_AFTER_ZONA_C,
                        ETD_FROM_BEFORE_ZONA_C, ETD_THRU_BEFORE_ZONA_C, ETD_FROM_AFTER_ZONA_C,
                        ETD_THRU_AFTER_ZONA_C, BD_NAMA_SERVICE_ZONA_C, BT_ZONA_C, BP_1_KILO_ZONA_C,
                        BP_NEXT_KILO_ZONA_C, TARIF_BEFORE_ZONA_D, TARIF_AFTER_ZONA_D,
                        ETD_FROM_BEFORE_ZONA_D, ETD_THRU_BEFORE_ZONA_D, ETD_FROM_AFTER_ZONA_D,
                        ETD_THRU_AFTER_ZONA_D, BD_NAMA_SERVICE_ZONA_D, BT_ZONA_D,
                        BP_1_KILO_ZONA_D, BP_NEXT_KILO_ZONA_D) VALUES
                        ('$query', '$kab_kotamadya', '$code', '$city_code', '$tarif_before_zona_a',
                        '$tarif_after_zona_a', '$etd_from_before_zona_a', '$etd_thru_before_zona_a', 
                        '$etd_from_after_zona_a', '$etd_thru_after_zona_a', '$bd_nama_service_zona_a',
                        '$tarif_before_zona_b', '$tarif_after_zona_b', '$etd_from_before_zona_b', 
                        '$etd_thru_before_zona_b', '$etd_from_after_zona_b', '$etd_thru_after_zona_b',
                        '$bd_nama_service_zona_b', '$bt_zona_b', '$tarif_before_zona_c', '$tarif_after_zona_c', 
                        '$etd_from_before_zona_c', '$etd_thru_before_zona_c', '$etd_from_after_zona_c', 
                        '$etd_thru_after_zona_c', '$bd_nama_service_zona_c', '$bt_zona_c', '$bp_1_kilo_zona_c',
                        '$bp_next_kilo_zona_c', '$tarif_before_zona_d', '$tarif_after_zona_d',
                        '$etd_from_before_zona_d', '$etd_thru_before_zona_d', '$etd_from_after_zona_d',
                        '$etd_thru_after_zona_d', '$bd_nama_service_zona_d', '$bt_zona_d', 
                        '$bp_1_kilo_zona_d', '$bp_next_kilo_zona_d')";
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

/* End of file m_update_tarif_cabang_utama_requester.php */
/* Location: ./application/modules/update_tarif_cabang_utama_requester/models/m_update_tarif_cabang_utama_requester.php */