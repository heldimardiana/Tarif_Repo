<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_origin_utir';?>";
    $( "#auto_ori" ).autocomplete({
      source: data_peg,
      minLength: 4,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#origin_before").val("");
        }else{
            $("#origin_before").val(ui.item.code);
            $("#gambar").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function get_origin_after(){
        var no_request = $("#no_request").val();
        var data_des = "<?php echo site_url().'simulasi/c_simulasi/get_origin_utir_a';?>?cu=" + no_request;
        $( "#auto_ori_a" ).autocomplete({
          source: data_des,
          minLength: 3,
          select: function(event, ui) {
            if(ui.item.label == "Data Not found"){
              $("#origin_after").val("");
            }else{
                $("#origin_after").val(ui.item.code);
                $("#gambar3").hide('slow');
            }
          }
        });
    };
</script>

<script type="text/javascript">
    function getDestination(){
        var origin = $("#origin_before").val();   
        var data_des = "<?php echo site_url().'simulasi/c_simulasi/get_destination_utir';?>?cu=" + origin;
        $( "#auto_des" ).autocomplete({
          source: data_des,
          minLength: 4,
          select: function(event, ui) {
            if(ui.item.label == "Data Not found"){
              $("#destination_before").val("");
            }else{
                $("#destination_before").val(ui.item.code);
                $("#gambar2").hide('slow');
            }
          }
        });
    };
</script>

<script type="text/javascript">
    function getDestination_a(){
        var origin = $("#origin_after").val();
        var no_request = $("#no_request").val();
        var gab = origin + no_request;   
        var data_des = "<?php echo site_url().'simulasi/c_simulasi/get_destination_utir_a';?>?cu=" + gab;
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
        var org = $("#origin_before").val();
        var dest = $("#destination_before").val();
        var gab = org + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/data_service_utir')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service_before').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getService_a(){
        var org = $("#origin_after").val();
        var dest = $("#destination_after").val();
        var no_request = $("#no_request").val();
        var gab = org + dest + no_request;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/data_service_utir_a')?>?params="+gab,
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
        var origin 		   = $("#origin_before").val();
        var a 			   = "','";
        var destination    = $("#destination_before").val();
        var b 			   = "','";
        var service 	   = $("#service_before").val();
        var c 			   = "','";
		var weight 		   = $("#weight_before").val();
		var d 			   = "','";
		var good_type 	   = $("#good_type_before").val();
		var param 		   = origin + a + destination + b + service + c + good_type + d + weight;
        var dparam 		   = "param=" + param;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/gettarif_utir')?>?param="+param,
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
        var origin 		    = $("#origin_after").val();
        var a 			    = "','";
        var destination     = $("#destination_after").val();
        var b 			    = "','";
        var service 	    = $("#service_after").val();
        var c 			    = "','";
		var weight 		    = $("#weight_after").val();
		var d 			    = "','";
		var good_type 	    = $("#good_type_after").val();
        var e               = "','";
        var no_request      = $("#no_request").val();
		    var param 		= origin + a + destination + b + service + c + good_type + d + weight + e + no_request;
        var dparam 		    = "param=" + param;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/get_tarif_utir_a')?>?param="+param,
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
        var oke = $("#auto_ori").val();
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
        var oke = $("#auto_ori_a").val();
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
        if(tes >= 4)
        {
            $("#gambar4").show('slow');
        }
        else
        {
            $("#gambar4").hide('slow');
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
					<label for="userName">Origin</label>
					<input type="text" name="nick" required  class="form-control" id="auto_ori" onkeypress="loadings()" onchange="getDestination()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
					<input type="hidden" name="origin_before" parsley-trigger="change" required  class="form-control" id="origin_before">
				</div>
				<div class="form-group">
					<label for="userName">Destination</label>
					<input type="text" name="nick" required  class="form-control" id="auto_des" onkeypress="loading()" onchange="getService()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
					<input type="hidden" name="destination_before" parsley-trigger="change" required  class="form-control" id="destination_before">
				</div>
				<div class="form-group">
					<label for="userName">Service</label>
					<select class="form-control" required="" name="service_before" id="service_before">
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
			<form action="#">
				<div class="col-lg-12" style="padding: 0;margin-bottom: 13px">
		          <div class="col-lg-4" style="padding: 0;">
		            <label for="userName">No Request</label>
		            <input type="text" name="no_request" parsley-trigger="change" required  class="form-control" id="no_request" onchange="get_origin_after()">
		          </div>
		          <div class="col-lg-8">
		            <label for="userName">Origin</label>
		            <input type="text" parsley-trigger="change" required  class="form-control" id="auto_ori_a" onchange="getDestination_a()" maxlength="3" onkeypress="load()">
		            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar3"></img>
		          	<input type="hidden" name="origin_after" required  class="form-control" id="origin_after">
		          </div>
		        </div>
				<div class="form-group">
					<label for="userName">Destination</label>
					<input type="text" required  class="form-control" id="auto_des_a" onkeypress="loads()" onchange="getService_a()" maxlength="8">
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