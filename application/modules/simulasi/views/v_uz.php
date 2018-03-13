<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_cabang_utama_before_uz';?>";
    $( "#auto_cu" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#cabang_utama_before").val("");
        }else{
            $("#cabang_utama_before").val(ui.item.code);
            $("#gambars").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_cabang_utama_after_uz';?>";
    $( "#auto_cu_a" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#cabang_utama_after").val("");
        }else{
            $("#cabang_utama_after").val(ui.item.code);
            $("#gambarss").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function myFunction(){
        var cabang_u = $("#cabang_utama_before").val();
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_cabang_before_uz';?>?cu=" + cabang_u;
        $( function() {

            $( "#auto_c" ).autocomplete({
              source: data_cab,
              minLength: 4,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#cabang_before").val("");
                }else{
                    $("#cabang_before").val(ui.item.code);
                    $("#gambar").hide('slow');
                }
              }
            });
          } );
    };
</script>

<script type="text/javascript">
    function myFunctions(){
        var cu = $("#cabang_utama_after").val();
        var no_request = $("#no_request").val();
        var cabang_u = cu + no_request;
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_cabang_after_uz';?>?cu=" + cabang_u;
        $( function() {

            $( "#auto_c_a" ).autocomplete({
              source: data_cab,
              minLength: 4,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#cabang_after").val("");
                }else{
                    $("#cabang_after").val(ui.item.code);
                    $("#gambar2").hide('slow');
                }
              }
            });
          } );
    };
</script>

<script>
    function loadings() {
        var oke = $("#auto_c").val();
        var tes = oke.length;
        if(tes >= 4)
        {
            $("#gambar").show('slow');
        }
        else
        {
            $("#gambar").hide('slow');
        }

    }
</script>

<script>
    function loading() {
        var oke = $("#auto_c_a").val();
        var tes = oke.length;
        if(tes >= 4)
        {
            $("#gambar2").show('slow');
        }
        else
        {
            $("#gambar2").hide('slow');
        }

    }
</script>

<script type="text/javascript">
    function zone_code() {
        var cabang = $("#cabang_before").val();
        var dcabang = "cabang_before=" + cabang
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/get_zona_before_uz')?>?cu="+cabang,
            dataType: "json",
            data: dcabang,
            success: function(data){
               $("#current_zone_before").val(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function zone_codes() {
        var cabang = $("#cabang_after").val();
        var no_req = $("#no_request").val();
        var gab = cabang + no_req;
        var dcabang = "cabang_after=" + gab
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/get_zona_after_uz')?>?cu="+gab,
            dataType: "json",
            data: dcabang,
            success: function(data){
               $("#current_zone_after").val(data.dat);
            }
        });
    }
</script>

<script>
    function heldi() {
        var oke = $("#auto_cu").val();
        var tes = oke.length;
        if(tes >= 3)
        {
            $("#gambars").show('slow');
        }
        else
        {
            $("#gambars").hide('slow');
        }

    }
</script>

<script>
    function heldi2() {
        var oke = $("#auto_cu_a").val();
        var tes = oke.length;
        if(tes >= 3)
        {
            $("#gambarss").show('slow');
        }
        else
        {
            $("#gambarss").hide('slow');
        }

    }
</script>

<div class="row">

	<div class="col-lg-6">
		<div align="center">
			<button type="button" class="btn btn-info waves-effect waves-light">Before</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="#">
				<div class="form-group">
					<label for="userName">Cabang Utama</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_cu" onchange="myFunction()" maxlength="3" onkeyup="heldi();">
					<input type="hidden" name="cabang_utama_before" parsley-trigger="change" required  class="form-control" id="cabang_utama_before">
				</div>
        <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
				<div class="form-group">
					<label for="userName">Cabang</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_c" onkeypress="loadings()" onchange="zone_code()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
					<input type="hidden" name="cabang_before" parsley-trigger="change" required  class="form-control" id="cabang_before">
				</div>
				<div class="form-group">
					<label for="userName">Zona</label>
					<input type="text" name="nick" parsley-trigger="change" readonly=""  class="form-control" id="current_zone_before" style="width:80px;">
				</div>
			</form>
		</div>
	</div>

	<div class="col-lg-6">
		<div align="center">
			<button type="button" class="btn btn-success waves-effect waves-light">After ( Testing )</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="#">
				<div class="col-lg-12" style="padding: 0;margin-bottom: 13px">
          <div class="col-lg-4" style="padding: 0;">
            <label for="userName">No Request</label>
            <input type="text" name="no_request" parsley-trigger="change" required  class="form-control" id="no_request">
          </div>
          <div class="col-lg-8">
            <label for="userName">Cabang Utama</label>
            <input type="text" parsley-trigger="change" required  class="form-control" id="auto_cu_a" onchange="myFunctions()" maxlength="3" onkeyup="heldi2();">
            <input type="hidden" name="cabang_utama_after" parsley-trigger="change" required  class="form-control" id="cabang_utama_after">
            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambarss"></img>
          </div>
        </div>
        <!--
        <div class="form-group">
					<label for="userName">Cabang Utama</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_cu_a" onchange="myFunctions()">
          <input type="hidden" name="cabang_utama_after" parsley-trigger="change" required  class="form-control" id="cabang_utama_after">
				</div>
        -->
				<div class="form-group">
					<label for="userName">Cabang</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_c_a" onkeyup="loading()" onchange="zone_codes()" maxlength="8">
          <input type="hidden" name="cabang_after" parsley-trigger="change" required  class="form-control" id="cabang_after">
          <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
				</div>
				<div class="form-group">
					<label for="userName">Zona</label>
					<input type="text" name="current_zone_after" parsley-trigger="change" readonly=""  class="form-control" id="current_zone_after" style="width:80px;">
				</div>
			</form>
		</div>
	</div>

</div>