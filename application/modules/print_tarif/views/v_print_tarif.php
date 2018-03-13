<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() { 
        var data_branch = "<?php echo site_url().'print_tarif/c_print_tarif/get_origin';?>";
    $( "#auto_ori" ).autocomplete({
      source: data_branch,
      minLength: 4,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#origin").val("");
        }else{
            $("#origin").val(ui.item.code);
            $("#gambar2").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function get_service1(){
        var origin = $("#origin").val();
        var dorigin = "origin" + origin;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('print_tarif/c_print_tarif/get_service1')?>?ori="+origin,
            dataType: "json",
            data: dorigin,
            success: function(data){
              $('#service').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getService(){
        var ori = $("#origin").val();
        var dest = $("#destination").val();
        var gab = ori + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('print_tarif/c_print_tarif/get_service')?>?dest="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>


<script>
    function loading() {
        var oke = $("#auto_ori").val();
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
    function getDestination(){
        var origin = $("#origin").val();   
        var data_des = "<?php echo site_url().'print_tarif/c_print_tarif/get_destination';?>?cu=" + origin;
        $( "#auto_des" ).autocomplete({
          source: data_des,
          minLength: 4,
          select: function(event, ui) {
            if(ui.item.label == "Data Not found"){
              $("#destination").val("");
            }else{
                $("#destination").val(ui.item.code);
                $("#gambar").hide('slow');
            }
          }
        });
    };
</script>

<script>
    function loadings() {
        var oke = $("#auto_des").val();
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

<div class="col-lg-6">
  	<div class="card-box"> 
  		<form action="<?php echo site_url('generate_print_tarif')?>" method="post">
  			<div class="form-group">
  				<label for="emailAddress">Origin</label>
  				<input type="text" class="form-control" required id="auto_ori" onkeyup="loading()" onchange="getDestination();get_service1();" maxlength="8">
          		<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
          		<input type="hidden" class="form-control" required id="origin" name="origin">
  			</div>
  			<div class="form-group">
  				<label for="emailAddress">Destination</label>
  				<input type="text" class="form-control"  id="auto_des" onkeyup="loadings()" onchange="getService()" maxlength="8">
  				<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
  				<input type="hidden" class="form-control" name="destination" id="destination">
  			</div>
  			<div class="form-group">
  				<label for="pass1">Service</label>
  				<select class="form-control" name="service" id="service">
  					<option value="" disabled selected>Choose</option>
  					<option></option>
  				</select>
  			</div>
  			<div class="form-group text-right m-b-0">
  				<button type="submit" class="btn btn-primary waves-effect waves-light m-l-5" title="Generate Report">
  					Generate
  				</button>
          <button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Generate Report">
            Cancel
          </button>
  			</div>
  		</form>
  	</div>
</div>