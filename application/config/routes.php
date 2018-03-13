<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] 		 			= "login/c_login";
$route['login'] 		 						= "login/c_login";
$route['verify_login'] 		 					= "login/c_login/verify_login";
$route['logout'] 		 						= "login/c_login/logout";

$route['dashboard_viewer'] 		 				= "dashboard_viewer/c_dashboard_viewer";
$route['dashboard_requester'] 		 			= "dashboard_requester/c_dashboard_requester";
$route['update_tarif_requester']	 			= "update_tarif_requester/c_update_tarif_requester";
$route['update_tarif_cabang_requester']	 		= "update_tarif_cabang_requester/c_update_tarif_cabang_requester";
$route['save_update_tarif_cabang_requester']	= "update_tarif_cabang_requester/c_update_tarif_cabang_requester/save_update_tarif_cabang_requester";
$route['save_update_tarif_cabang_requester_all']	= "update_tarif_cabang_requester/c_update_tarif_cabang_requester/save_update_tarif_cabang_requester_all";
$route['update_tarif_cabang_utama_requester']	= "update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester";
$route['ubah_coding_requester']	 				= "ubah_coding_requester/c_ubah_coding_requester";
$route['save_ubah_coding_requester']	 		= "ubah_coding_requester/c_ubah_coding_requester/save_ubah_coding_requester";
$route['ubah_zona_requester']	 				= "ubah_zona_requester/c_ubah_zona_requester";
$route['save_ubah_zona_requester']	 			= "ubah_zona_requester/c_ubah_zona_requester/save_ubah_zona_requester";
$route['non_aktif_routing_requester']			= "non_aktif_routing_requester/c_non_aktif_routing_requester";
$route['save_non_aktif_routing_requester']		= "non_aktif_routing_requester/c_non_aktif_routing_requester/save_non_aktif_routing_requester";
$route['non_aktif_service_requester']			= "non_aktif_service_requester/c_non_aktif_service_requester";
$route['save_non_aktif_service_requester']		= "non_aktif_service_requester/c_non_aktif_service_requester/save_non_aktif_service_requester";
$route['save_non_aktif_service_requester_all']	= "non_aktif_service_requester/c_non_aktif_service_requester/save_non_aktif_service_requester_all";
$route['penambahan_service_requester']			= "penambahan_service_requester/c_penambahan_service_requester";
$route['save_penambahan_service_requester']		= "penambahan_service_requester/c_penambahan_service_requester/save_penambahan_service_requester";
$route['save_penambahan_service_requester_all']		= "penambahan_service_requester/c_penambahan_service_requester/save_penambahan_service_requester_all";
$route['aktivasi_service_requester']			= "aktivasi_service_requester/c_aktivasi_service_requester";
$route['save_aktivasi_service_requester']		= "aktivasi_service_requester/c_aktivasi_service_requester/save_aktivasi_service_requester";
$route['save_aktivasi_service_requester_all']	= "aktivasi_service_requester/c_aktivasi_service_requester/save_aktivasi_service_requester_all";
$route['update_tarif_intracity_requester'] 		= "update_tarif_intracity_requester/c_update_tarif_intracity_requester";
$route['report_requester']						= "report_requester/c_report_requester";
$route['generate_report_requester']				= "report_requester/c_report_requester/generate_report_requester";
$route['download_tarif_requester']				= "download_tarif_requester/c_download_tarif_requester";
$route['generate_tarif']						= "download_tarif_requester/c_download_tarif_requester/generate_tarif";
$route['generate_tarif_all']					= "download_tarif_requester/c_download_tarif_requester/generate_tarif_all";
$route['generate_tarif_all_after']				= "download_tarif_requester/c_download_tarif_requester/generate_tarif_all_after";
$route['generate_tarif_intracity']				= "update_tarif_intracity_requester/c_update_tarif_intracity_requester/generate_tarif_intracity";
$route['generate_update_generate_all']			= "update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester/generate_update_generate_all";
$route['save_update_tarif_cabang_utama_requester']	= "update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester/save_update_tarif_cabang_utama_requester";




$route['dashboard_regional'] 		 			= "dashboard_regional/c_dashboard_regional";
$route['update_tarif_regional'] 		 		= "update_tarif_regional/c_update_tarif_regional";
$route['update_tarif_cabang_utama_regional'] 	= "update_tarif_cabang_utama_regional/c_update_tarif_cabang_utama_regional";
$route['update_tarif_cabang_regional'] 			= "update_tarif_cabang_regional/c_update_tarif_cabang_regional";
$route['save_detail_update_tarif_cabang_regional'] = "update_tarif_cabang_regional/c_update_tarif_cabang_regional/save_detail_update_tarif_cabang_regional";
$route['ubah_coding_regional'] 					= "ubah_coding_regional/c_ubah_coding_regional";
$route['save_detail_ubah_coding_regional'] 		= "ubah_coding_regional/c_ubah_coding_regional/save_detail_ubah_coding_regional";
$route['ubah_zona_regional'] 					= "ubah_zona_regional/c_ubah_zona_regional";
$route['save_detail_ubah_zona_regional'] 		= "ubah_zona_regional/c_ubah_zona_regional/save_detail_ubah_zona_regional";
$route['non_aktif_routing_regional'] 			= "non_aktif_routing_regional/c_non_aktif_routing_regional";
$route['save_detail_non_aktif_routing_regional'] 	= "non_aktif_routing_regional/c_non_aktif_routing_regional/save_detail_non_aktif_routing_regional";
$route['non_aktif_service_regional'] 			= "non_aktif_service_regional/c_non_aktif_service_regional";
$route['save_detail_non_aktif_service_regional'] 	= "non_aktif_service_regional/c_non_aktif_service_regional/save_detail_non_aktif_service_regional";
$route['penambahan_service_regional'] 			= "penambahan_service_regional/c_penambahan_service_regional";
$route['save_detail_penambahan_service_regional'] 	= "penambahan_service_regional/c_penambahan_service_regional/save_detail_penambahan_service_regional";
$route['aktivasi_service_regional'] 			= "aktivasi_service_regional/c_aktivasi_service_regional";
$route['save_detail_aktivasi_service_regional']	= "aktivasi_service_regional/c_aktivasi_service_regional/save_detail_aktivasi_service_regional";
$route['update_tarif_intracity_regional'] 		= "update_tarif_intracity_regional/c_update_tarif_intracity_regional";
$route['report_regional'] 						= "report_regional/c_report_regional";
$route['generate_report_regional'] 				= "report_regional/c_report_regional/generate_report_regional";
$route['download_tarif_regional'] 				= "download_tarif_regional/c_download_tarif_regional";
$route['generate_tarif_regional']				= "download_tarif_regional/c_download_tarif_regional/generate_tarif_regional";
$route['generate_tarif_regional_after']			= "download_tarif_regional/c_download_tarif_regional/generate_tarif_regional_after";
$route['save_detail_update_tarif_cabang_utama_regional']	= "update_tarif_cabang_utama_regional/c_update_tarif_cabang_utama_regional/save_detail_update_tarif_cabang_utama_regional";
$route['save_detail_update_tarif_intracity_regional']	= "update_tarif_intracity_regional/c_update_tarif_intracity_regional/save_detail_update_tarif_intracity_regional";


$route['dashboard_mpa'] 		 				= "dashboard_mpa/c_dashboard_mpa";
$route['update_tarif_mpa'] 		 				= "update_tarif_mpa/c_update_tarif_mpa";
$route['update_tarif_cabang_utama_mpa'] 		= "update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa";
$route['update_tarif_cabang_mpa'] 				= "update_tarif_cabang_mpa/c_update_tarif_cabang_mpa";
$route['save_detail_update_tarif_cabang_mpa'] 	= "update_tarif_cabang_mpa/c_update_tarif_cabang_mpa/save_detail_update_tarif_cabang_mpa";
$route['save_testing_detail_update_tarif_cabang_mpa'] 	= "update_tarif_cabang_mpa/c_update_tarif_cabang_mpa/save_testing_detail_update_tarif_cabang_mpa";
$route['ubah_coding_mpa'] 						= "ubah_coding_mpa/c_ubah_coding_mpa";
$route['save_detail_ubah_coding_mpa']			= "ubah_coding_mpa/c_ubah_coding_mpa/save_detail_ubah_coding_mpa";
$route['save_testing_detail_ubah_coding_mpa']	= "ubah_coding_mpa/c_ubah_coding_mpa/save_testing_detail_ubah_coding_mpa";
$route['ubah_zona_mpa'] 						= "ubah_zona_mpa/c_ubah_zona_mpa";
$route['save_detail_ubah_zona_mpa']				= "ubah_zona_mpa/c_ubah_zona_mpa/save_detail_ubah_zona_mpa";
$route['save_testing_detail_ubah_zona_mpa']		= "ubah_zona_mpa/c_ubah_zona_mpa/save_testing_detail_ubah_zona_mpa";
$route['non_aktif_routing_mpa'] 				= "non_aktif_routing_mpa/c_non_aktif_routing_mpa";
$route['save_detail_non_aktif_routing_mpa']		= "non_aktif_routing_mpa/c_non_aktif_routing_mpa/save_detail_non_aktif_routing_mpa";
$route['save_testing_detail_non_aktif_routing_mpa']		= "non_aktif_routing_mpa/c_non_aktif_routing_mpa/save_testing_detail_non_aktif_routing_mpa";
$route['non_aktif_service_mpa'] 				= "non_aktif_service_mpa/c_non_aktif_service_mpa";
$route['save_detail_non_aktif_service_mpa'] 	= "non_aktif_service_mpa/c_non_aktif_service_mpa/save_detail_non_aktif_service_mpa";
$route['save_testing_detail_non_aktif_service_mpa'] 	= "non_aktif_service_mpa/c_non_aktif_service_mpa/save_testing_detail_non_aktif_service_mpa";
$route['penambahan_service_mpa'] 				= "penambahan_service_mpa/c_penambahan_service_mpa";
$route['save_detail_penambahan_service_mpa'] 	= "penambahan_service_mpa/c_penambahan_service_mpa/save_detail_penambahan_service_mpa";
$route['aktivasi_service_mpa'] 					= "aktivasi_service_mpa/c_aktivasi_service_mpa";
$route['save_detail_aktivasi_service_mpa'] 		= "aktivasi_service_mpa/c_aktivasi_service_mpa/save_detail_aktivasi_service_mpa";
$route['save_testing_detail_aktivasi_service_mpa'] 		= "aktivasi_service_mpa/c_aktivasi_service_mpa/save_testing_detail_aktivasi_service_mpa";
$route['update_btbp_mpa'] 						= "update_btbp_mpa/c_update_btbp_mpa";
$route['update_tarif_intracity_mpa'] 			= "update_tarif_intracity_mpa/c_update_tarif_intracity_mpa";
$route['aktivasi_tarif_mpa'] 					= "aktivasi_tarif_mpa/c_aktivasi_tarif_mpa";
$route['report_mpa'] 							= "report_mpa/c_report_mpa";
$route['generate_report_mpa'] 					= "report_mpa/c_report_mpa/generate_report_mpa";
$route['download_tarif_mpa'] 					= "download_tarif_mpa/c_download_tarif_mpa";
$route['manage_user'] 							= "manage_user/c_manage_user";
$route['create_user'] 							= "manage_user/c_manage_user/create_user";
$route['save_edit_user'] 						= "manage_user/c_manage_user/save_edit_user";
$route['generate_tarif_mpa']					= "download_tarif_mpa/c_download_tarif_mpa/generate_tarif_mpa";
$route['generate_tarif_mpa_after']				= "download_tarif_mpa/c_download_tarif_mpa/generate_tarif_mpa_after";
$route['save_detail_update_tarif_cabang_utama_mpa']		= "update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa/save_detail_update_tarif_cabang_utama_mpa";
$route['save_testing_detail_update_tarif_cabang_utama_mpa']		= "update_tarif_cabang_utama_mpa/c_update_tarif_cabang_utama_mpa/save_testing_detail_update_tarif_cabang_utama_mpa";
$route['generate_btbp'] 						= "update_btbp_mpa/c_update_btbp_mpa/generate_btbp";
$route['save_update_btbp_mpa'] 					= "update_btbp_mpa/c_update_btbp_mpa/save_update_btbp_mpa";
$route['save_btbp_level_2'] 					= "update_btbp_mpa/c_update_btbp_mpa/save_btbp_level_2";
$route['save_btbp_level_3'] 					= "update_btbp_mpa/c_update_btbp_mpa/save_btbp_level_3";
$route['save_testing_level_3'] 					= "update_btbp_mpa/c_update_btbp_mpa/save_testing_level_3";
$route['save_detail_update_tarif_intracity_mpa'] 	= "update_tarif_intracity_mpa/c_update_tarif_intracity_mpa/save_detail_update_tarif_intracity_mpa";
$route['save_testing_detail_update_tarif_intracity_mpa'] 	= "update_tarif_intracity_mpa/c_update_tarif_intracity_mpa/save_testing_detail_update_tarif_intracity_mpa";
$route['generate_simulai_btbp_before'] 			= "simulasi/c_simulasi/generate_simulai_btbp_before";
$route['generate_simulai_btbp_after'] 			= "simulasi/c_simulasi/generate_simulai_btbp_after";
$route['generate_live_btbp_after'] 				= "live/c_live/generate_live_btbp_after";

//Roll Back
$route['roll_back'] 							= "roll_back/c_roll_back";
$route['roll_back_data'] 						= "roll_back/c_roll_back/roll_back_data";

//Change Password
$route['c_password'] 							= "change_password/c_change_password";
$route['save_change_password'] 					= "change_password/c_change_password/save_change_password";

//Content Dashboard MPA

$route['cnt_utcu'] 								= "content_dashboard_mpa/c_content_dashboard_mpa/utcu";
$route['utcr'] 									= "content_dashboard_mpa/c_content_dashboard_mpa/utcr";
$route['ucr'] 									= "content_dashboard_mpa/c_content_dashboard_mpa/ucr";
$route['uzr'] 									= "content_dashboard_mpa/c_content_dashboard_mpa/uzr";
$route['narr'] 									= "content_dashboard_mpa/c_content_dashboard_mpa/narr";
$route['nasr'] 									= "content_dashboard_mpa/c_content_dashboard_mpa/nasr";
$route['psr'] 									= "content_dashboard_mpa/c_content_dashboard_mpa/psr";
$route['asr'] 									= "content_dashboard_mpa/c_content_dashboard_mpa/asr";
$route['utir'] 									= "content_dashboard_mpa/c_content_dashboard_mpa/utir";
$route['btbp_dash'] 							= "content_dashboard_mpa/c_content_dashboard_mpa/btbp";


//Content Dashboard Regional

$route['utcu_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/utcu_reg";
$route['utcr_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/utcr_reg";
$route['ucr_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/ucr_reg";
$route['uzr_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/uzr_reg";
$route['narr_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/narr_reg";
$route['nasr_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/nasr_reg";
$route['psr_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/psr_reg";
$route['asr_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/asr_reg";
$route['utir_reg'] 								= "content_dashboard_regional/c_content_dashboard_regional/utir_reg";


//Content Dashboard Requester (UTCU)
$route['total_utcu_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_utcu_req";
$route['out_utcu_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_utcu_req";
$route['out_mpa_utcu_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_utcu_req";
$route['approve_utcu_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_utcu_req";
$route['unapprove_utcu_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_utcu_req";

//Content Dashboard Requester (UTCR)
$route['total_utcr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_utcr_req";
$route['out_utcr_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_utcr_req";
$route['out_mpa_utcr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_utcr_req";
$route['approve_utcr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_utcr_req";
$route['unapprove_utcr_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_utcr_req";

//Content Dashboard Requester (UCR)
$route['total_ucr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_ucr_req";
$route['out_ucr_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_ucr_req";
$route['out_mpa_ucr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_ucr_req";
$route['approve_ucr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_ucr_req";
$route['unapprove_ucr_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_ucr_req";

//Content Dashboard Requester (UZR)
$route['total_uzr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_uzr_req";
$route['out_uzr_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_uzr_req";
$route['out_mpa_uzr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_uzr_req";
$route['approve_uzr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_uzr_req";
$route['unapprove_uzr_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_uzr_req";

//Content Dashboard Requester (NARR)
$route['total_narr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_narr_req";
$route['out_narr_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_narr_req";
$route['out_mpa_narr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_narr_req";
$route['approve_narr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_narr_req";
$route['unapprove_narr_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_narr_req";

//Content Dashboard Requester (NASR)
$route['total_nasr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_nasr_req";
$route['out_nasr_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_nasr_req";
$route['out_mpa_nasr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_nasr_req";
$route['approve_nasr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_nasr_req";
$route['unapprove_nasr_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_nasr_req";

//Content Dashboard Requester (PSR)
$route['total_psr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_psr_req";
$route['out_psr_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_psr_req";
$route['out_mpa_psr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_psr_req";
$route['approve_psr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_psr_req";
$route['unapprove_psr_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_psr_req";

//Content Dashboard Requester (ASR)
$route['total_asr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_asr_req";
$route['out_asr_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_asr_req";
$route['out_mpa_asr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_asr_req";
$route['approve_asr_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_asr_req";
$route['unapprove_asr_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_asr_req";

//Content Dashboard Requester (UTIR)
$route['total_utir_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/total_utir_req";
$route['out_utir_req'] 							= "content_dashboard_requester/c_content_dashboard_requester/out_utir_req";
$route['out_mpa_utir_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/out_mpa_utir_req";
$route['approve_utir_req'] 						= "content_dashboard_requester/c_content_dashboard_requester/approve_utir_req";
$route['unapprove_utir_req'] 					= "content_dashboard_requester/c_content_dashboard_requester/unapprove_utir_req";


//Simulasi Testing
$route['utcu'] 									= "simulasi/c_simulasi/utcu";
$route['utc'] 									= "simulasi/c_simulasi/utc";
$route['uc'] 									= "simulasi/c_simulasi/uc";
$route['uz'] 									= "simulasi/c_simulasi/uz";
$route['nar'] 									= "simulasi/c_simulasi/nar";
$route['nas'] 									= "simulasi/c_simulasi/nas";
$route['ass'] 									= "simulasi/c_simulasi/ass";
$route['btbp'] 									= "simulasi/c_simulasi/btbp";
$route['uti'] 									= "simulasi/c_simulasi/uti";
$route['simulasi_btbp'] 						= "simulasi/c_simulasi/form_btbp";
$route['generate_utcu'] 						= "simulasi/c_simulasi/generate_utcu";
$route['generate_utcu_before'] 					= "simulasi/c_simulasi/generate_utcu_before";


//Simulasi Live
$route['live_utcu'] 							= "live/c_live/live_utcu";
$route['live_utc'] 								= "live/c_live/live_utc";
$route['live_uc'] 								= "live/c_live/live_uc";
$route['live_uz'] 								= "live/c_live/live_uz";
$route['live_narr'] 							= "live/c_live/live_narr";
$route['live_nasr'] 							= "live/c_live/live_nasr";
$route['live_as'] 								= "live/c_live/live_as";
$route['live_btbp'] 							= "live/c_live/live_btbp";
$route['live_uti'] 								= "live/c_live/live_uti";
$route['generate_utcu_live'] 					= "live/c_live/generate_utcu_live";


//Check Upload
$route['check_upload'] 							= "check_upload/c_check_upload";
$route['generate_check_upload'] 				= "check_upload/c_check_upload/generate_check_upload";

//Print Tarif
$route['print_tarif'] 							= "print_tarif/c_print_tarif";
$route['generate_print_tarif'] 					= "print_tarif/c_print_tarif/generate_print_tarif";

$route['view_btbp'] 							= "view_btbp/c_view_btbp";
$route['generate_view_btbp'] 					= "view_btbp/c_view_btbp/generate_view_btbp";

/*	
$route['arsip_tiket'] = "dashboard/c_dashboard/arsip";
$route['dashboard'] = "dashboard/c_dashboard";
$route['change_pass'] = "dashboard/c_dashboard/change_pass";
$route['change_pass_master'] = "dashboard/c_dashboard_master/change_pass_master";
$route['change_pass_proses'] = "dashboard/c_dashboard/change_pass_proses";
$route['change_pass_proses_master'] = "dashboard/c_dashboard_master/change_pass_proses_master";
$route['tambah_tiket'] = "dashboard/c_dashboard/tambah_tiket";
$route['outstanding_tiket'] = "dashboard/c_dashboard/outstanding_tiket";
$route['cancel_tiket'] = "dashboard/c_dashboard/cancel_tiket";
$route['view_tiket/(:any)'] = "dashboard/c_dashboard/view_tiket/$1";
$route['chat/(:any)'] = "dashboard/c_dashboard/chat/$1";
$route['send_email/(:any)'] = "dashboard/c_dashboard/send_email/$1";
$route['logout_master'] = "dashboard/c_dashboard_master/logout";
$route['view_chat/(:any)'] = "dashboard/c_dashboard/view_chat/$1";
$route['followup_tiket'] = "dashboard/c_dashboard/followup_tiket";
$route['export_excel_arsip'] = "dashboard/c_dashboard/export_excel_arsip";
$route['export_excel_followup'] = "dashboard/c_dashboard/export_excel_followup";
$route['export_excel_outstanding'] = "dashboard/c_dashboard/export_excel_outstanding";
$route['export_excel_cancel'] = "dashboard/c_dashboard/export_excel_cancel";
$route['see_history/(:any)'] = "dashboard/c_dashboard/see_history/$1";
$route['action/(:any)'] = "dashboard/c_dashboard_master/action/$1";
$route['logout'] = "dashboard/c_dashboard/logout";
$route['JNEAdminapp'] = "login_page/c_login_admin";
$route['dashboard_admin'] = "dashboard_admin/c_dashboard";
$route['add_user'] = "dashboard_admin/c_dashboard/add_user";
$route['master_data'] = "dashboard_admin/c_dashboard/master_data";
$route['delete_ind/(:any)'] = "dashboard_admin/c_dashboard/delete_ind/$1";
$route['delete_tcase/(:any)'] = "dashboard_admin/c_dashboard/delete_tcase/$1";
$route['edit_user/(:any)'] = "dashboard_admin/c_dashboard/edit_user/$1";
$route['change_pass/(:any)'] = "dashboard_admin/c_dashboard/change_pass/$1";
$route['delete_usr/(:any)'] = "dashboard_admin/c_dashboard/delete_usr/$1";
$route['change_pass_admin'] = "dashboard_admin/c_dashboard/change_pass_admin";
$route['see_all/(:any)'] = "dashboard/c_dashboard/see_all/$1";
$route['404_override'] = '';
*/


/* End of file routes.php */
/* Location: ./application/config/routes.php */
