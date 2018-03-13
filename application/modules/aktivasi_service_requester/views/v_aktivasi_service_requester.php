<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {
        var branch = $("#branch").val();    
        var data_peg = "<?php echo site_url().'aktivasi_service_requester/c_aktivasi_service_requester/get_origin';?>?branch=" + branch;
    $( "#auto_ori" ).autocomplete({
      source: data_peg,
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
    function getDestination(){
        var origin = $("#origin").val();   
        var data_des = "<?php echo site_url().'aktivasi_service_requester/c_aktivasi_service_requester/get_destination';?>?cu=" + origin;
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
    function getService(){
        var org = $("#origin").val();
        var dest = $("#destination").val();
        var gab = org + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('aktivasi_service_requester/c_aktivasi_service_requester/get_service')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
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

<?php
    if ($this->session->flashdata('request_success')!="")
    {
    ?>
    <div class="alert alert-success">
        <h3><center><?php echo $this->session->flashdata('request_success');  ?></center></h3>
    </div>
    <?php
    }
?>

<?php
    if ($this->session->flashdata('request_erorr')!="")
    {
    ?>
    <div class="alert alert-danger">
        <h3><center><?php echo $this->session->flashdata('request_erorr');  ?></center></h3>
    </div>
    <?php
    }
?>

<div class="col-lg-5">
	<div class="card-box"> 
		<form action="<?php echo site_url('save_aktivasi_service_requester');?>" method="post">
			<div class="form-group">
				<label for="userName">No. Request</label>
				<input type="text" readonly name="" parsley-trigger="change" class="form-control" title="No Terisi Secara Automatis">
			</div>
            <input type="hidden" name="branch" id="branch" value="<?php echo $branch ?>">
			<div class="form-group">
				<label for="emailAddress">Origin *</label>
                <input type="text" class="form-control" required id="auto_ori" onkeyup="loading()" onchange="getDestination()" maxlength="8">
                <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
				<input type="hidden" class="form-control" required name="origin" id="origin">
			</div>
			<div class="form-group">
				<label for="emailAddress">Destination *</label>
				<input type="text" class="form-control" required id="auto_des" onkeyup="loadings()" onchange="getService()" maxlength="8">
				<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
				<input type="hidden" class="form-control" required name="destination" id="destination">
			</div>
			<div class="form-group">
				<label for="pass1">Service *</label>
				<select class="form-control" required="" name="service" id="service">
					<option value="" disabled selected>Choose</option>
					<option></option>
				</select>
			</div>
            <!--
			<div class="form-group">
				<label for="emailAddress">Tanggal Aktivasi Service</label>
				<input type="text" class="form-control" required name="tgl_aktivasi_service" id="date_from">
			</div>
            -->
			<div class="form-group text-right m-b-0">
				<button class="btn btn-primary waves-effect waves-light" type="submit">
					Save
				</button>
				<button type="reset" class="btn btn-danger waves-effect waves-light m-l-5">
					Cancel
				</button>
			</div>
			
		</form>
	</div>
</div>