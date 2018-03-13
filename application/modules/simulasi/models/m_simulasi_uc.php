<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_simulasi_uc extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb_loader',array('name'=>'db','default'=>'group'));
	}

	public function get_branch_before($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				(BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_branch_before($branch)
	{
		$sql = "SELECT BRANCH_CODE, BRANCH_CITY, BRANCH_DESC FROM ORA_BRANCH WHERE BRANCH_REGION<>'I' AND 
				(BRANCH_CODE LIKE '$branch%' OR BRANCH_DESC LIKE '$branch%')";
		$query = $this->db->GetArray($sql);
		return $query;
	}


	public function get_origin_before($branch,$origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function data_origin_before($branch,$origin)
	{
		$sql	= "SELECT CITY_CODE,CITY_NAME FROM CMS_CITY, CMS_DROURATE WHERE CITY_MAIN_BRANCH = '$branch' AND CITY_ACTIVE = 'Y'
					AND CITY_CODE=SUBSTR(DROURATE_CODE,1,8)
					AND DROURATE_ACTIVE='Y'
					AND (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')                
					GROUP BY CITY_CODE,CITY_NAME";
		$query = $this->db->GetArray($sql);
		return $query;
	}

	public function get_origin_after($branch,$origin)
	{
		/*
		$sql = "SELECT
                CITY_CODE,CITY_NAME 
                FROM TARIF_CMS_CITY A,
                  (SELECT SUBSTR(DROURATE_CODE,1,8) KODE FROM TARIF_CMS_DROURATE 
                                                            WHERE  DROURATE_NO_REQUEST = SUBSTR('$branch',7)                      
                                                            AND DROURATE_ACTIVE='Y'                
                                                            AND DROURATE_CODE LIKE '$origin%'
                                                            GROUP BY SUBSTR(DROURATE_CODE,1,8)) B                
                WHERE  
                    (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
                AND CITY_ACTIVE = 'Y'     
                AND CITY_CODE =KODE
                GROUP BY CITY_CODE,CITY_NAME";	
        */
        $sql = "SELECT CITY_CODE,CITY_NAME FROM TARIF_CMS_CITY
                WHERE NO_REQUEST = SUBSTR('$branch',7)
                AND CITY_MAIN_BRANCH = SUBSTR('$branch',1,6)
                AND CITY_ACTIVE = 'Y'
                AND (CITY_CODE LIKE '$origin%' OR CITY_NAME LIKE '$origin%')
                GROUP BY CITY_CODE,CITY_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

	public function data_origin_after($branch,$origin)
	{
		/*
		$sql = "SELECT
                CITY_CODE,CITY_NAME 
                FROM TARIF_CMS_CITY A,
                  (SELECT SUBSTR(DROURATE_CODE,1,8) KODE FROM TARIF_CMS_DROURATE 
                                                            WHERE  DROURATE_NO_REQUEST = SUBSTR('$branch',7)                      
                                                            AND DROURATE_ACTIVE='Y'                
                                                            AND DROURATE_CODE LIKE '$origin%'
                                                            GROUP BY SUBSTR(DROURATE_CODE,1,8)) B                
                WHERE  
                    (CITY_CODE LIKE '$origin%' ||'%' OR CITY_NAME LIKE '%'||'$origin%'||'%')
                AND CITY_ACTIVE = 'Y'     
                AND CITY_CODE =KODE
                GROUP BY CITY_CODE,CITY_NAME";	
        */
        $sql = "SELECT CITY_CODE,CITY_NAME FROM TARIF_CMS_CITY
                WHERE NO_REQUEST = SUBSTR('$branch',7)
                AND CITY_MAIN_BRANCH = SUBSTR('$branch',1,6)
                AND CITY_ACTIVE = 'Y'
                AND (CITY_CODE LIKE '$origin%' OR CITY_NAME LIKE '$origin%')
                GROUP BY CITY_CODE,CITY_NAME";
        $query = $this->db->GetArray($sql);
        return $query;
	}

}

/* End of file m_simulasi.php */
/* Location: ./application/modules/simulasi/models/m_simulasi.php */