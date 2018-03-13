<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_cabang_utama_utc';?>";
    $( "#auto_cut" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#cabang_utama").val("");
        }else{
            $("#cabang_utama").val(ui.item.code);
            $("#gambars").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_cabang_utama_utc_a';?>";
    $( "#auto_cut_a" ).autocomplete({
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
    function myFunctions(){
        var cabang_u = $("#cabang_utama").val();
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_cabang_utc';?>?cu=" + cabang_u;
        $( function() {

            $( "#auto_c" ).autocomplete({
              source: data_cab,
              minLength: 4,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#cabang").val("");
                }else{
                    $("#cabang").val(ui.item.code);
                    $("#gambar").hide('slow');
                }
              }
            });
          } );
    };
</script>

<script type="text/javascript">
    function myFunction(){
        var cu = $("#cabang_utama_after").val();
        var no_request = $("#no_request").val();
        var cabang_u = cu + no_request;
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_cabang_utc_a';?>?cu=" + cabang_u ;
        $( function() {

            $( "#auto_c_a" ).autocomplete({
              source: data_cab,
              minLength: 3,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#cabang_after").val("");
                }else{
                    $("#cabang_after").val(ui.item.code);
                    $("#gambar3").hide('slow');
                }
              }
            });
          } );
    };
</script>

<script type="text/javascript">
    function getDestination(){
        var origin = $("#cabang").val();   
        var data_des = "<?php echo site_url().'simulasi/c_simulasi/get_destination_utc';?>?cu=" + origin;
        $( "#auto_des" ).autocomplete({
          source: data_des,
          minLength: 4,
          select: function(event, ui) {
            if(ui.item.label == "Data Not found"){
              $("#destination").val("");
            }else{
                $("#destination").val(ui.item.code);
                $("#gambar2").hide('slow');
            }
          }
        });
    };
</script>

<script type="text/javascript">
    function getDestinations(){
        var org = $("#cabang_after").val();
        var no_request = $("#no_request").val();
        var origin = org + no_request;   
        var data_des = "<?php echo site_url().'simulasi/c_simulasi/get_destination_utc_a';?>?cu=" + origin;
        $( "#auto_des_a" ).autocomplete({
          source: data_des,
          minLength: 3,
          select: function(event, ui) {
            if(ui.item.label == "Data Not found"){
              $("#destination_after").val("");
            }else{
                $("#destination_after").val(ui.item.code);
                $("#gambar4").hide('slow');
            }
          }
        });
    };
</script>

<script type="text/javascript">
    function getService(){
        var org = $("#cabang").val();
        var dest = $("#destination").val();
        var gab = org + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/data_service_utc')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getServices(){
        var org = $("#cabang_after").val();
        var dest = $("#destination_after").val();
        var no_request = $("#no_request").val();
        var gab = org + dest + no_request;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/data_service_utc_a')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service_after').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
	function Tarif(){
        var origin 		   = $("#cabang").val();
        var a 			     = "','";
        var destination  = $("#destination").val();
        var b 			     = "','";
        var service 	   = $("#service").val();
        var c 			     = "','";
		    var weight 		   = $("#weight_before").val();
		    var d 			     = "','";
		    var good_type 	 = $("#good_type_before").val();
		    var param 		   = origin + a + destination + b + service + c + good_type + d + weight;
        var dparam 		   = "param=" + param;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/gettarif')?>?param="+param,
            dataType: "json",
            data: dparam,
            success: function(data){
               $('#tarif_before').val(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
	function get_tarif(){
        var origin 		    = $("#cabang_after").val();
        var a 			      = "','";
        var destination   = $("#destination_after").val();
        var b 			      = "','";
        var service 	    = $("#service_after").val();
        var c 			      = "','";
		    var weight 		    = $("#weight_after").val();
		    var d 			      = "','";
		    var good_type 	  = $("#good_type_after").val();
        var e             = "','";
        var no_request    = $("#no_request").val();
		    var param 		    = origin + a + destination + b + service + c + good_type + d + weight + e + no_request;
        var dparam 		    = "param=" + param;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/get_tarif_after')?>?param="+param,
            dataType: "json",
            data: dparam,
            success: function(data){
               $('#tarif_after').val(data.dat);
            }
        });
    }
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
        var oke = $("#auto_des").val();
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

<script>
    function load() {
        var oke = $("#auto_c_a").val();
        var tes = oke.length;
        if(tes >= 3)
        {
            $("#gambar3").show('slow');
        }
        else
        {
            $("#gambar3").hide('slow');
        }

    }
</script>

<script>
    function loads() {
        var oke = $("#auto_des_a").val();
        var tes = oke.length;
        if(tes >= 3)
        {
            $("#gambar4").show('slow');
        }
        else
        {
            $("#gambar4").hide('slow');
        }

    }
</script>

<script>
    function heldi() {
        var oke = $("#auto_cut").val();
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
        var oke = $("#auto_cut_a").val();
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
			<form action="#" method="post">
				<div class="form-group">
					<label for="userName">Cabang Utama</label>
					<input type="text" name="nick" parsley-trigger="change" required  class="form-control" id="auto_cut" onchange="myFunctions()" maxlength="3" onkeyup="heldi();">
					<input type="hidden" name="cabang_utama" parsley-trigger="change" required  class="form-control" id="cabang_utama">
				</div>
        <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
				<div class="form-group">
					<label for="userName">Cabang</label>
					<input type="text" name="nick" required  class="form-control" id="auto_c" onkeypress="loadings()" onchange="getDestination()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
					<input type="hidden" name="cabang" parsley-trigger="change" required  class="form-control" id="cabang">
				</div>
				<div class="form-group">
					<label for="userName">Destination</label>
					<input type="text" name="nick" required  class="form-control" id="auto_des" onkeypress="loading()" onchange="getService()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
					<input type="hidden" name="destination" parsley-trigger="change" required  class="form-control" id="destination">
				</div>
				<div class="form-group">
					<label for="userName">Service</label>
					<select class="form-control" required="" name="service" id="service">
						<option value="" disabled selected>Choose</option>
						<option></option>
					</select>
				</div>
				<div class="col-md-12" style="padding: 0;margin-bottom: 5px">
					<div class="col-md-3" style="padding: 0;">
						<label for="userName">Weight</label>
						<input type="number" min="1" name="weight_before" required  class="form-control" id="weight_before">
					</div>
					<div class="col-md-3">
						<label for="userName">Good Type</label>
						<select class="form-control" name="good_type_before" id="good_type_before">
							<option value="" disabled="" selected="">Choose</option>
							<option value="1">Document</option>
							<option value="2">Parcel</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary waves-effect waves-light" title="Calculate Tarif" onclick="Tarif()">Calculate</button>
					<button type="reset" class="btn btn-danger waves-effect waves-light" title="Calculate Tarif">Reset</button>
				</div>
				<div class="form-group">
					<label for="userName">Tarif</label>
					<input type="text" name="tarif_before" readonly=""  class="form-control" id="tarif_before" style="width:140px;">
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
			<form action="#" method="post">
				<div class="col-lg-12" style="padding: 0;margin-bottom: 13px">
          <div class="col-lg-4" style="padding: 0;">
            <label for="userName">No Request</label>
            <input type="text" name="no_request" parsley-trigger="change" required  class="form-control" id="no_request">
          </div>
          <div class="col-lg-8">
            <label for="userName">Cabang Utama</label>
            <input type="text" parsley-trigger="change" required  class="form-control" id="auto_cut_a" onchange="myFunction()" maxlength="3" onkeyup="heldi2();">
          <input type="hidden" name="cabang_utama_after" required  class="form-control" id="cabang_utama_after">
          <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambarss"></img>
          </div>
        </div>
        <!--
        <div class="form-group">
					<label for="userName">Cabang Utama</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_cut_a" onchange="myFunction()">
					<input type="hidden" name="cabang_utama_after" required  class="form-control" id="cabang_utama_after">
				</div>
        -->
				<div class="form-group">
					<label for="userName">Cabang</label>
					<input type="text" required  class="form-control" id="auto_c_a" onkeyup="load()" onchange="getDestinations()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar3"></img>
					<input type="hidden" name="cabang_after" required  class="form-control" id="cabang_after">
				</div>
				<div class="form-group">
					<label for="userName">Destination</label>
					<input type="text" required  class="form-control" id="auto_des_a" onkeypress="loads()" onchange="getServices()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar4"></img>
					<input type="hidden" name="destination_after" required  class="form-control" id="destination_after">
				</div>
				<div class="form-group">
					<label for="userName">Service</label>
					<select class="form-control" required="" name="service_after" id="service_after">
						<option value="" disabled selected>Choose</option>
						<option></option>
					</select>
				</div>
				<div class="col-md-12" style="padding: 0;margin-bottom: 5px">
					<div class="col-md-3" style="padding: 0;">
						<label for="userName">Weight</label>
						<input type="number" min="1" name="weight_after" parsley-trigger="change" required  class="form-control" id="weight_after">
					</div>
					<div class="col-md-3">
						<label for="userName">Good Type</label>
						<select class="form-control" name="good_type_after" id="good_type_after">
							<option value="" disabled="" selected="">Choose</option>
							<option value="1">Document</option>
							<option value="2">Parcel</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary waves-effect waves-light" title="Calculate Tarif" onclick="get_tarif()">Calculate</button>
					<button type="reset" class="btn btn-danger waves-effect waves-light" title="Calculate Tarif">Reset</button>
				</div>
				<div class="form-group">
					<label for="userName">Tarif</label>
					<input type="text" name="tarif_after" readonly="" class="form-control" id="tarif_after" style="width:140px;">
				</div>
			</form>
		</div>
	</div>

</div>