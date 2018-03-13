	
	//Regional
	var utcu = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_update_tarif_cabang_utama_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_update_tarif_cabang_utama_regional").html(result);
				}
				else
				{
					$("#notif_update_tarif_cabang_utama_regional").html(result);
					$("#notif_update_tarif_cabang_utama_regional").hide('slow');
					$("#notif_update_tarif_cabang_utama_regional").hide('slow');
				}
			}
		});
	};

	var notif_update_tarif_cabang_regional = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_update_tarif_cabang_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_update_tarif_cabang_regional").html(result);
				}
				else
				{
					$("#notif_update_tarif_cabang_regional").html(result);
					$("#notif_update_tarif_cabang_regional").hide('slow');
					$("#notif_update_tarif_cabang_regional").hide('slow');
				}
			}
		});
	};

	var notif_ubah_coding_regional = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_ubah_coding_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_ubah_coding_regional").html(result);
				}
				else
				{
					$("#notif_ubah_coding_regional").html(result);
					$("#notif_ubah_coding_regional").hide('slow');
					$("#notif_ubah_coding_regional").hide('slow');
				}
			}
		});
	};

	var notif_ubah_zona_regional = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_ubah_zona_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_ubah_zona_regional").html(result);
				}
				else
				{
					$("#notif_ubah_zona_regional").html(result);
					$("#notif_ubah_zona_regional").hide('slow');
					$("#notif_ubah_zona_regional").hide('slow');
				}
			}
		});
	};

	var notif_non_aktif_routing_regional = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_non_aktif_routing_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_non_aktif_routing_regional").html(result);
				}
				else
				{
					$("#notif_non_aktif_routing_regional").html(result);
					$("#notif_non_aktif_routing_regional").hide('slow');
					$("#notif_non_aktif_routing_regional").hide('slow');
				}
			}
		});
	};

	var notif_non_aktif_service_regional = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_non_aktif_service_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_non_aktif_service_regional").html(result);
				}
				else
				{
					$("#notif_non_aktif_service_regional").html(result);
					$("#notif_non_aktif_service_regional").hide('slow');
					$("#notif_non_aktif_service_regional").hide('slow');
				}
			}
		});
	};

	var notif_penambahan_service_regional = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_penambahan_service_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_penambahan_service_regional").html(result);
				}
				else
				{
					$("#notif_penambahan_service_regional").html(result);
					$("#notif_penambahan_service_regional").hide('slow');
					$("#notif_penambahan_service_regional").hide('slow');
				}
			}
		});
	};

	var notif_aktivasi_service_regional = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_aktivasi_service_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_aktivasi_service_regional").html(result);
				}
				else
				{
					$("#notif_aktivasi_service_regional").html(result);
					$("#notif_aktivasi_service_regional").hide('slow');
					$("#notif_aktivasi_service_regional").hide('slow');
				}
			}
		});
	};

	var intra = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_update_intracity_regional,
			success: function(result){
				if (result>0)
				{
					$("#notif_update_intracity_regional").html(result);
				}
				else
				{
					$("#notif_update_intracity_regional").html(result);
					$("#notif_update_intracity_regional").hide('slow');
					$("#notif_update_intracity_regional").hide('slow');
				}
			}
		});
	};

	var bete_dah = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_btbp_approve_1,
			success: function(result){
				if (result>0)
				{
					$("#notif_btbp_approve_1").html(result);
				}
				else
				{
					$("#notif_btbp_approve_1").html(result);
					$("#notif_btbp_approve_1").hide('slow');
					$("#notif_btbp_approve_1").hide('slow');
				}
			}
		});
	};



	//MPA
	var utcu_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_update_tarif_cabang_utama_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_update_tarif_cabang_utama_mpa").html(result);
				}
				else
				{
					$("#notif_update_tarif_cabang_utama_mpa").html(result);
					$("#notif_update_tarif_cabang_utama_mpa").hide('slow');
					$("#notif_update_tarif_cabang_utama_mpa").hide('slow');
				}
			}
		});
	};

	var notif_update_tarif_cabang_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_update_tarif_cabang_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_update_tarif_cabang_mpa").html(result);
				}
				else
				{
					$("#notif_update_tarif_cabang_mpa").html(result);
					$("#notif_update_tarif_cabang_mpa").hide('slow');
					$("#notif_update_tarif_cabang_mpa").hide('slow');
				}
			}
		});
	};

	var notif_ubah_coding_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_ubah_coding_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_ubah_coding_mpa").html(result);
				}
				else
				{
					$("#notif_ubah_coding_mpa").html(result);
					$("#notif_ubah_coding_mpa").hide('slow');
					$("#notif_ubah_coding_mpa").hide('slow');
				}
			}
		});
	};

	var notif_ubah_zona_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_ubah_zona_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_ubah_zona_mpa").html(result);
				}
				else
				{
					$("#notif_ubah_zona_mpa").html(result);
					$("#notif_ubah_zona_mpa").hide('slow');
					$("#notif_ubah_zona_mpa").hide('slow');
				}
			}
		});
	};

	var notif_non_aktif_routing_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_non_aktif_routing_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_non_aktif_routing_mpa").html(result);
				}
				else
				{
					$("#notif_non_aktif_routing_mpa").html(result);
					$("#notif_non_aktif_routing_mpa").hide('slow');
					$("#notif_non_aktif_routing_mpa").hide('slow');
				}
			}
		});
	};

	var notif_non_aktif_service_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_non_aktif_service_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_non_aktif_service_mpa").html(result);
				}
				else
				{
					$("#notif_non_aktif_service_mpa").html(result);
					$("#notif_non_aktif_service_mpa").hide('slow');
					$("#notif_non_aktif_service_mpa").hide('slow');
				}
			}
		});
	};

	var notif_penambahan_service_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_penambahan_service_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_penambahan_service_mpa").html(result);
				}
				else
				{
					$("#notif_penambahan_service_mpa").html(result);
					$("#notif_penambahan_service_mpa").hide('slow');
					$("#notif_penambahan_service_mpa").hide('slow');
				}
			}
		});
	};

	var notif_aktivasi_service_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_aktivasi_service_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_aktivasi_service_mpa").html(result);
				}
				else
				{
					$("#notif_aktivasi_service_mpa").html(result);
					$("#notif_aktivasi_service_mpa").hide('slow');
					$("#notif_aktivasi_service_mpa").hide('slow');
				}
			}
		});
	};

	var intra_mpa = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_update_intracity_mpa,
			success: function(result){
				if (result>0)
				{
					$("#notif_update_intracity_mpa").html(result);
				}
				else
				{
					$("#notif_update_intracity_mpa").html(result);
					$("#notif_update_intracity_mpa").hide('slow');
					$("#notif_update_intracity_mpa").hide('slow');
				}
			}
		});
	};

	var bete_juga = function(){
		$.ajax({
			type: "POST",
			data: "cek=cek",
			url: url_btbp_approve_2,
			success: function(result){
				if (result>0)
				{
					$("#notif_btbp_approve_2").html(result);
				}
				else
				{
					$("#notif_btbp_approve_2").html(result);
					$("#notif_btbp_approve_2").hide('slow');
					$("#notif_btbp_approve_2").hide('slow');
				}
			}
		});
	};

	




	