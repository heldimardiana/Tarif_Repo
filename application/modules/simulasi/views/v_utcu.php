<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_origin_utcu';?>";
    $( "#origin_bfore" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#origin").val("");
        }else{
            $("#origin").val(ui.item.code);
            $("#gambars").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
	function org_after(){
		var no_request = $("#no_request").val();
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_origin_utcu_a';?>?no_request=" + no_request;
        $( function() {

            $( "#origin_fter" ).autocomplete({
              source: data_cab,
              minLength: 3,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#origin_after").val("");
                }else{
                    $("#origin_after").val(ui.item.code);
                    $("#gambarss").hide('slow');
                }
              }
            });
          } );
	};
</script>

<script type="text/javascript">
	function get_Destination(){
		var origin = $("#origin").val();
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_destination_utcu';?>?cu=" + origin;
        $( function() {

            $( "#destination_bfore" ).autocomplete({
              source: data_cab,
              minLength: 3,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#destination").val("");
                }else{
                    $("#destination").val(ui.item.code);
                    $("#gambar").hide('slow');
                }
              }
            });
          } );
	};
</script>

<script type="text/javascript">
	function get_Destination_after(){
		var origin = $("#origin_after").val();
		var no_request = $("#no_request").val();
		var param = origin + no_request;
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_destination_utcu_a';?>?cu=" + param;
        $( function() {

            $( "#destination_fter" ).autocomplete({
              source: data_cab,
              minLength: 3,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#destination_after").val("");
                }else{
                    $("#destination_after").val(ui.item.code);
                    $("#gambar2").hide('slow');
                }
              }
            });
          } );
	};
</script>

<script type="text/javascript">
	function get_subDestination(){
		var org 		= $("#origin").val();
		var des 		= $("#destination").val();
		var destination = des.substring(0,3);
		var zone_code 	= $("#zone_code").val();
		var param 		= org + destination + zone_code;
		var ddest 		= "destination=" + destination
		$.ajax({
            type: "POST",
            url: "<?php echo site_url().'simulasi/c_simulasi/get_subdestination_utcu'?>?param="+param,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#sub_destination').html(data.dat);
            }
        });
	}
</script>

<script type="text/javascript">
	function get_Service(){
		var org = $("#origin").val();
        var dest = $("#sub_destination").val();
        var gab = org + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/data_service_utcu')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
	}
</script>

<script type="text/javascript">
	function get_Service_after(){
		var org = $("#origin_after").val();
        var dest = $("#destination_after").val();
        var no_request = $("#no_request").val();
        var gab = org + dest + no_request;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/data_service_utcu_a')?>?params="+gab,
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
        var origin 		   	= $("#origin").val();
        var a 			   	= "','";
        var destination  	= $("#sub_destination").val();
        var b 			    = "','";
        var service 	   	= $("#service").val();
        var c 			    = "','";
		var weight 		   	= $("#weight_before").val();
		var d 			    = "','";
		var good_type 	 	= $("#good_type_before").val();
		var param 		   	= origin + a + destination + b + service + c + good_type + d + weight;
        var dparam 		   	= "param=" + param;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/gettarif_utcu')?>?param="+param,
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
        var destination   	= $("#destination_after").val();
        var b 			    = "','";
        var service 	    = $("#service_after").val();
        var c 			    = "','";
		var weight 		    = $("#weight_after").val();
		var d 			    = "','";
		var good_type 	  	= $("#good_type_after").val();
        var e             	= "','";
        var no_request    	= $("#no_request").val();
		var param 		    = origin + a + destination + b + service + c + good_type + d + weight + e + no_request;
        var dparam 		    = "param=" + param;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/gettarif_utcu_a')?>?param="+param,
            dataType: "json",
            data: dparam,
            success: function(data){
               $('#tarif_after').val(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getService(){
        var org = $("#origin").val();
        //var ddorg = "origin=" + origin
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/get_service_utcu')?>?params="+org,
            dataType: "json",
            data: org,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getService_after(){
        var org = $("#no_request").val();
        //var ddorg = "origin=" + origin
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/get_service_utcu_after')?>?params="+org,
            dataType: "json",
            data: org,
            success: function(data){
                $('#service_after').html(data.dat);
            }
        });
    }
</script>

<script>
    function load() {
        $("#gambar").show('slow');

    }
</script>

<script>
    function loads() {
        $("#gambar2").show('slow');

    }
</script>

<script>
    function heldi() {
        var oke = $("#origin_bfore").val();
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
        var oke = $("#origin_fter").val();
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
			<form action="<?php echo site_url('generate_utcu_before')?>" method="post">
				<div class="form-group">
					<label for="userName">Origin</label>
					<input type="text" name="nick" parsley-trigger="change" required  class="form-control" id="origin_bfore" onchange="get_Destination();getService();" maxlength="3" onkeyup="heldi();">
					<input type="hidden" name="origin" id="origin" parsley-trigger="change" required  class="form-control">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
				</div>
				<div class="form-group">
					<label for="userName">Service</label>
					<select class="form-control" name="service" id="service">
						<option value="" disabled selected>Choose</option>
				            <?php foreach($service as $s) { ?>
				        <option value="<?php echo $s['DROURATE_SERVICE'] ?>"> <?php echo $s['DROURATE_SERVICE'] ?>
				        </option>
				        <?php } ?>
					</select>
				</div>
				<!--
				<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
				<div class="form-group">
					<label for="userName">Destination</label>
					<input type="text" name="nick" parsley-trigger="change" required  class="form-control" id="destination_bfore" maxlength="3" onkeyup="load()" placeholder="Input Minimal & Maximal 3 Character">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
					<input type="hidden" name="destination" id="destination" parsley-trigger="change" required  class="form-control">
				</div>
				<div class="form-group">
					<label for="userName">Zone Code</label>
					<select class="form-control" name="zone_code" id="zone_code" style="width:100px;" required onchange="get_subDestination()">
						<option value="" disabled="" selected="">Choose</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
					</select>
				</div>
				<div class="form-group">
					<label for="userName">Sub Destination</label>
					<select class="form-control" name="sub_destination" id="sub_destination" onchange="get_Service()">
						<option value="">Choose</option>
						<option></option>
					</select>
				</div>
				<div class="form-group">
					<label for="userName">Service</label>
					<select class="form-control" name="service" id="service">
						<option value="">Choose</option>
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
				-->
				<div class="form-group">
					<button type="submit" class="btn btn-primary waves-effect waves-light" title="Generate">Generate</button>
					<button type="reset" class="btn btn-danger waves-effect waves-light" title="Cancel">Cancel</button>
				</div>
				<!--
				<div class="form-group">
					<button type="button" class="btn btn-primary waves-effect waves-light" title="Calculate Tarif" onclick="Tarif()">Calculate</button>
					<button type="reset" class="btn btn-danger waves-effect waves-light" title="Reset">Reset</button>
				</div>
				<div class="form-group">
					<label for="userName">Tarif</label>
					<input type="text" name="tarif_before" readonly=""  class="form-control" id="tarif_before" style="width:140px;">
				</div>
				-->
			</form>
		</div>
	</div>

	<div class="col-lg-6">
		<div align="center">
			<button type="button" class="btn btn-success waves-effect waves-light">After ( Testing )</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="<?php echo site_url('generate_utcu')?>" method="post">
				
				<div class="col-lg-12" style="padding: 0;margin-bottom: 13px">
		          <div class="col-lg-4" style="padding: 0;">
		            <label for="userName">No Request</label>
		            <input type="text" name="no_request" parsley-trigger="change" required  class="form-control" id="no_request" onchange="org_after()">
		          </div>
		          <div class="col-lg-8">
		            <label for="userName">Origin</label>
		            <input type="text" parsley-trigger="change" required  class="form-control" id="origin_fter" maxlength="3" onchange="get_Destination_after();getService_after();" onkeyup="heldi2();">
		          <input type="hidden" name="origin_after" required  class="form-control" id="origin_after">
		          <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambarss"></img>
		          </div>
		        </div>
		        <div class="form-group">
					<label for="userName">Service</label>
					<select class="form-control" name="service_after" id="service_after">
						<option value="" disabled selected>Choose</option>
				            <?php foreach($service as $s) { ?>
				        <option value="<?php echo $s['DROURATE_SERVICE'] ?>"> <?php echo $s['DROURATE_SERVICE'] ?>
				        </option>
				        <?php } ?>
					</select>
				</div>
		        <div class="form-group">
					<button type="submit" class="btn btn-primary waves-effect waves-light" title="Generate">Generate</button>
					<button type="reset" class="btn btn-danger waves-effect waves-light" title="Cancel">Cancel</button>
				</div>
		        <!--
				<div class="form-group">
					<label for="userName">Destination</label>
					<input type="text" name="nick" parsley-trigger="change" required  class="form-control" id="destination_fter" onchange="get_Service_after()" maxlength="8" onkeyup="loads()">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
					<input type="hidden" name="destination_after" parsley-trigger="change" required  class="form-control" id="destination_after">
				</div>
				<div class="form-group">
					<label for="userName">Service</label>
					<select class="form-control" name="service" id="service_after">
						<option value="">Choose</option>
					</select>
				</div>
				<div class="col-md-12" style="padding: 0;margin-bottom: 5px">
					<div class="col-md-3" style="padding: 0;">
						<label for="userName">Weight</label>
						<input type="number" min="1" name="weight_after" required  class="form-control" id="weight_after">
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
					<input type="text" name="tarif_after" readonly=""  class="form-control" id="tarif_after" style="width:140px;">
				</div>
				-->
			</form>
		</div>
	</div>

</div>