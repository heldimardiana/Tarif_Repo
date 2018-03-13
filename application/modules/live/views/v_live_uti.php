<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'live/c_live/get_origin_utir';?>";
    $( "#auto_ori" ).autocomplete({
      source: data_peg,
      minLength: 4,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#origin").val("");
        }else{
            $("#origin").val(ui.item.code);
            $("#gambar").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function getDestination(){
        var origin = $("#origin").val();   
        var data_des = "<?php echo site_url().'live/c_live/get_destination_utir';?>?cu=" + origin;
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
    function getService(){
        var org = $("#origin").val();
        var dest = $("#destination").val();
        var gab = org + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('live/c_live/data_service_utir')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
  function Tarif(){
    var origin      = $("#origin").val();
    var a           = "','";
    var destination = $("#destination").val();
    var b           = "','";
    var service     = $("#service").val();
    var c           = "','";
    var weight      = $("#weight").val();
    var d           = "','";
    var good_type   = $("#good_type").val();
    var param       = origin + a + destination + b + service + c + good_type + d + weight;
    var dparam      = "param=" + param;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('live/c_live/gettarif_utir')?>?param="+param,
            dataType: "json",
            data: dparam,
            success: function(data){
               $('#tarif').val(data.dat);
            }
        });
    }
</script>

<script>
    function load() {
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

<div class="row">

	<div class="col-lg-6">
		<div align="center">
			<button type="button" class="btn btn-info waves-effect waves-light">Live</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="#">
				<div class="form-group">
					<label for="userName">Origin</label>
					<input type="text" name="nick" required  class="form-control" id="auto_ori" onkeypress="load()" onchange="getDestination()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
					<input type="hidden" name="origin" parsley-trigger="change" required  class="form-control" id="origin">
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
						<input type="number" min="1" name="weight" required  class="form-control" id="weight">
					</div>
					<div class="col-md-3">
						<label for="userName">Good Type</label>
						<select class="form-control" name="good_type" id="good_type">
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
					<input type="text" name="tarif" readonly=""  class="form-control" id="tarif" style="width:140px;">
				</div>
			</form>
		</div>
	</div>
</div>