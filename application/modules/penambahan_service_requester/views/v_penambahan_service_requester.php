<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script> 

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'penambahan_service_requester/c_penambahan_service_requester/get_destination';?>";
    $( "#auto_des" ).autocomplete({
      source: data_peg,
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
</script>

<script>
    function loadings() {
        $("#gambar").show('slow');

    }
</script>

<script type="text/javascript">
    function getService(){
        var dest = $("#destination").val();
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('penambahan_service_requester/c_penambahan_service_requester/get_service')?>?dest="+dest,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
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
		<form action="<?php echo site_url('save_penambahan_service_requester');?>" data-parsley-validate novalidate method="post">
			<div class="form-group">
				<label for="userName">No. Request</label>
				<input type="text" readonly name="" parsley-trigger="change" class="form-control" title="No Terisi Secara Automatis">
			</div>
			<div class="form-group">
				<label for="emailAddress">Origin</label>
				<input type="text" class="form-control" required name="origin" id="origin" readonly value="<?php echo $origin ?>">
			</div>
			<div class="form-group">
				<label for="emailAddress">Destination</label>
				<input type="text" class="form-control" required id="auto_des" onkeyup="loadings()" onchange="getService()">
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
			<div class="form-group">
				<label for="pass1">Tarif</label>
				<input type="number" min="0" name="tarif" class="form-control" required>
			</div>
            <!--
			<div class="form-group">
				<label for="pass1">Tanggl Penambahan Service</label>
				<input type="text" name="tgl_penambahan_service" id="date_thru" class="form-control" required>
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