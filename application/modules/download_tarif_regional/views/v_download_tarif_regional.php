<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'download_tarif_regional/c_download_tarif_regional/get_branch';?>";
    $( "#auto_cu" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#branch").val("");
        }else{
            $("#branch").val(ui.item.code);
            $("#gambars").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'download_tarif_regional/c_download_tarif_regional/get_branch';?>";
    $( "#auto_cu_a" ).autocomplete({
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
        var branch = $("#branch").val();
        var data_cab = "<?php echo site_url().'download_tarif_regional/c_download_tarif_regional/get_origin';?>?cu=" + branch;
        $( function() {

            $( "#auto_ori" ).autocomplete({
              source: data_cab,
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
    };
</script>

<script type="text/javascript">
    function getOrigin_after(){
        var branch = $("#branch_after").val();
        var no_request = $("#no_request").val();
        var cabang_u = branch + no_request;
        var data_cab = "<?php echo site_url().'download_tarif_regional/c_download_tarif_regional/get_origin_after';?>?cu=" + cabang_u;
        $( function() {

            $( "#auto_ori_a" ).autocomplete({
              source: data_cab,
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
        var origin = $("#origin").val();   
        var data_des = "<?php echo site_url().'download_tarif_regional/c_download_tarif_regional/get_destination';?>?cu=" + origin;
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

<script type="text/javascript">
    function getDestination_after(){
        var org = $("#origin_after").val();
        var no_request = $("#no_request").val();
        var origin = org + no_request;     
        var data_des = "<?php echo site_url().'download_tarif_regional/c_download_tarif_regional/get_destination_after';?>?cu=" + origin;
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
        var ori = $("#origin").val();
        var dest = $("#destination").val();
        var gab = ori + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('download_tarif_regional/c_download_tarif_regional/get_service_all')?>?dest="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getService_after(){
        var ori = $("#origin_after").val();
        var dest = $("#destination_after").val();
        var no_request = $("#no_request").val();
        var gab = ori + dest + no_request;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('download_tarif_regional/c_download_tarif_regional/get_service_after')?>?dest="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service_after').html(data.dat);
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
      <button type="button" class="btn btn-info waves-effect waves-light">Live</button>
  </div><br/>
  	<div class="card-box"> 
  		<form action="<?php echo site_url('generate_tarif_regional')?>" data-parsley-validate novalidate method="post">
  			<div class="form-group">
            <label for="emailAddress">Branch</label>
            <input type="text" class="form-control" required id="auto_cu" onchange="getOrigin()" maxlength="6" onkeyup="heldi();">
            <input type="hidden" class="form-control" name="branch" required id="branch">
        </div>
        <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
        <div class="form-group">
  				<label for="emailAddress">Origin</label>
            <input type="text" class="form-control" required id="auto_ori" onkeyup="loading()" onchange="getDestination()" maxlength="8">
            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
  				<input type="hidden" class="form-control" name="origin" required id="origin">
  			</div>
  			<div class="form-group">
  				<label for="emailAddress">Destination</label>
  				<input type="text" class="form-control" required  id="auto_des" onkeyup="loadings()" onchange="getService()" maxlength="8">
  				<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
  				<input type="hidden" class="form-control" required name="destination" id="destination">
  			</div>
  			<div class="form-group">
  				<label for="pass1">Service</label>
  				<select class="form-control" required="" name="service" id="service">
  					<option value="" disabled selected>Choose</option>
  					<option></option>
  				</select>
  			</div>
  			<div class="form-group text-right m-b-0">
  				<button type="submit" class="btn btn-primary waves-effect waves-light m-l-5" title="Generate Report">
  					Generate
  				</button>
  			</div>
  			
  		</form>
  	</div>
  </div>

  <div class="col-lg-6">
    <div align="center">
      <button type="button" class="btn btn-success waves-effect waves-light">Testing</button>
    </div>
    <br/>
    <div class="card-box"> 
      <form action="<?php echo site_url('generate_tarif_regional_after')?>" data-parsley-validate novalidate method="post">
        <div class="col-lg-12" style="padding: 0;margin-bottom: 13px">
          <div class="col-lg-4" style="padding: 0;">
            <label for="userName">No Request</label>
            <input type="text" name="no_request" parsley-trigger="change" required  class="form-control" id="no_request" onchange="getOrigin_after()">
          </div>
          <div class="col-lg-8">
            <label for="userName">Branch</label>
            <input type="text" class="form-control" required id="auto_cu_a" onchange="getOrigin_after()" maxlength="6" onkeyup="heldi2();">
            <input type="hidden" class="form-control" name="branch_after" required id="branch_after">
            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambarss"></img>
          </div>
        </div>
        <!--
        <div class="form-group">
            <label for="emailAddress">Branch</label>
            <input type="text" class="form-control" required id="auto_cu" onchange="getOrigin()" maxlength="6">
            <input type="hidden" class="form-control" name="branch" required id="branch">
        </div>-->
        <div class="form-group">
          <label for="emailAddress">Origin</label>
            <input type="text" class="form-control" required id="auto_ori_a" onkeyup="load()" onchange="getDestination_after()" maxlength="8">
            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar3"></img>
          <input type="hidden" class="form-control" name="origin_after" required id="origin_after">
        </div>
        <div class="form-group">
          <label for="emailAddress">Destination</label>
          <input type="text" class="form-control" required  id="auto_des_a" onkeyup="loads()" onchange="getService_after()" maxlength="8">
          <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar4"></img>
          <input type="hidden" class="form-control" required name="destination_after" id="destination_after">
        </div>
        <div class="form-group">
          <label for="pass1">Service</label>
          <select class="form-control" required="" name="service_after" id="service_after">
            <option value="" disabled selected>Choose</option>
            <option></option>
          </select>
        </div>
        <div class="form-group text-right m-b-0">
          <button type="submit" class="btn btn-primary waves-effect waves-light m-l-5" title="Generate Report">
            Generate
          </button>
        </div>
        
      </form>
    </div>
  </div>


</div>