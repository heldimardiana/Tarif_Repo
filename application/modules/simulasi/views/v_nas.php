<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_branch_nas';?>";
    $( "#auto_br" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#branch_before").val("");
        }else{
            $("#branch_before").val(ui.item.code);
            $("#gambars").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_branch_nas_after';?>";
    $( "#auto_br_a" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#branch_after").val("");
        }else{
            $("#branch_after").val(ui.item.code);
            $("#gambarss").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function getOrigin(){
        var branch = $("#branch_before").val();
        var data_ori = "<?php echo site_url().'simulasi/c_simulasi/get_origin_nas';?>?branch=" + branch;
        $( function() {

            $( "#auto_or" ).autocomplete({
              source: data_ori,
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
    };
</script>

<script type="text/javascript">
    function getOrigin_after(){
        var br = $("#branch_after").val();
        var no_request = $("#no_request").val();
        var branch = br + no_request;
        var data_ori = "<?php echo site_url().'simulasi/c_simulasi/get_origin_nas_after';?>?branch=" + branch;
        $( function() {

            $( "#auto_or_a" ).autocomplete({
              source: data_ori,
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
          } );
    };
</script>

<script type="text/javascript">
    function getDestination(){
        var origin = $("#origin_before").val();   
        var data_des = "<?php echo site_url().'simulasi/c_simulasi/get_destination_nas';?>?cu=" + origin;
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
    function getDestination_after(){
        var org = $("#origin_after").val();
        var no_request = $("#no_request").val();
        var origin = org + no_request;   
        var data_des = "<?php echo site_url().'simulasi/c_simulasi/get_destination_nas_after';?>?cu=" + origin;
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
            url: "<?php echo site_url('simulasi/c_simulasi/get_service_nas')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service_before').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getService_after(){
        var org = $("#origin_after").val();
        var dest = $("#destination_after").val();
        var no_request = $("#no_request").val();
        var gab = org + dest + no_request;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('simulasi/c_simulasi/get_service_nas_after')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service_after').html(data.dat);
            }
        });
    }
</script>

<script>
    function loadings() {
        var oke = $("#auto_or").val();
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
        var oke = $("#auto_or_a").val();
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
        var oke = $("#auto_br").val();
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
        var oke = $("#auto_br_a").val();
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
					<label for="userName">Branch</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_br" onchange="getOrigin()" maxlength="6" onkeyup="heldi();">
					<input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="branch_before">
				</div>
        <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
				<div class="form-group">
					<label for="userName">Origin</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_or" onkeypress="loadings()" onchange="getDestination()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
					<input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="origin_before">
				</div>
				<div class="form-group">
					<label for="userName">Destination</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_des" onkeypress="loading()" onchange="getService()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
					<input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="destination_before">
				</div>
				<div class="form-group">
					<label for="userName">Service</label>
					<select class="form-control" required="" name="service" id="service_before">
						<option value="" disabled selected>Choose</option>
						<option></option>
					</select>
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
            <label for="userName">Branch</label>
            <input type="text" parsley-trigger="change" required  class="form-control" id="auto_br_a" onchange="getOrigin_after()" maxlength="6" onkeyup="heldi2();">
            <input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="branch_after">
            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambarss"></img>
          </div>
        </div>
        <!--
        <div class="form-group">
					<label for="userName">Branch</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_br_a" onchange="getOrigin_after()">
					<input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="branch_after">
				</div>
        -->
				<div class="form-group">
					<label for="userName">Origin</label>
					<input type="text" name="nick" required onkeyup="load()"  class="form-control" id="auto_or_a" onchange="getDestination_after()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar3"></img>
					<input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="origin_after">
				</div>
				<div class="form-group">
					<label for="userName">Destination</label>
					<input type="text" name="nick" onkeyup="loads()" required  class="form-control" id="auto_des_a" onchange="getService_after()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar4"></img>
					<input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="destination_after">
				</div>
				<div class="form-group">
					<label for="userName">Service Non Active</label>
          <!--<input type="text" class="form-control" required="" name="service" id="service_after">
					-->
          <select class="form-control" required="" name="service" id="service_after">
						<option value="" disabled selected>Choose</option>
						<option></option>
					</select>
				</div>
			</form>
		</div>
	</div>

</div>