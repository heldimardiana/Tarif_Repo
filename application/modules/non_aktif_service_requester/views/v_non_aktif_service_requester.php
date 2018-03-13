<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {
        var branch = $("#branch").val();   
        var data_peg = "<?php echo site_url().'non_aktif_service_requester/c_non_aktif_service_requester/get_origin';?>?branch=" + branch;
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
        var data_des = "<?php echo site_url().'non_aktif_service_requester/c_non_aktif_service_requester/get_destination';?>?cu=" + origin;
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
        var ori = $("#origin").val();
        var dest = $("#destination").val();
        var gab = ori + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('non_aktif_service_requester/c_non_aktif_service_requester/get_service')?>?dest="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getchild(){
        var origin = $("#origin").val();
        var destination = $("#destination").val();
        var drcode = origin + destination;
        var ddestination = "destination=" + destination
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('non_aktif_service_requester/c_non_aktif_service_requester/getchild')?>?param="+drcode,
            dataType: "json",
            data: ddestination,
            success: function(data){
               $("#childs").val(data.dat);
               if(data.dat > 0)
               {
                    $('#child').show('fast');
                    $("#gambar").hide('slow');
               }
               else
               {
                    $('#child').hide('fast');
                    $("#gambar").hide('slow');
                    alert("Tidak ada sub");
               }
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

<script>
    function BtnEn(){
        document.getElementById("service").disabled = false;
        document.getElementById("save").disabled = false;
        document.getElementById("cancel").disabled = false;
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
		<form action="<?php echo site_url('save_non_aktif_service_requester');?>" method="post">
			<div class="form-group">
				<label for="userName">No. Request</label>
				<input type="text" readonly name="" parsley-trigger="change" class="form-control" title="No Terisi Secara Automatis">
			</div>
            <input type="hidden" name="branch" id="branch" value="<?php echo $branch ?>">
			<div class="form-group">
				<label for="emailAddress">Origin *</label>
                <input type="text" class="form-control"  id="auto_ori" onkeyup="loading()" onchange="getDestination()" required="" maxlength="8">
                <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
				<input type="hidden" class="form-control"  name="origin" id="origin">
			</div>
            <!--
            <label for="emailAddress">Destination</label>
            <div class="input-group m-t-10 form-group">
                <input type="text" id="auto_des" required class="form-control" onkeyup="loadings()" onchange="getService();getchild()">
                <span class="input-group-btn">
                <button type="button" class="btn waves-effect waves-light btn-success" title="Cek Sub"><i class="fa fa-search"></i></button>
                </span>
            </div>
            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
            <input type="hidden" class="form-control" required name="destination" id="destination">
			-->
            <div class="form-group">
            <label for="emailAddress">Destination *</label>
                <div class="input-group m-t-10 form-group">
                    <input type="text" class="form-control" required  id="auto_des" onkeyup="loadings()" onchange="getService()" maxlength="8">
                    <input type="hidden" class="form-control" required name="destination" id="destination">
                    <span class="input-group-btn">
                    <button type="button" class="btn waves-effect waves-light btn-success" title="Cek Sub" onclick="loadings();getchild();BtnEn()"><i class="fa fa-search"></i></button>
                    </span>
                </div>
                <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
            <input type="hidden" id="childs" name="childs">
            <div class="form-group" style="display:none;" id="child">
                <label for="emailAddress">Sub</label>
                <input type="checkbox" name="child" value="Y" checked="">
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
                <label for="userName">Tanggal Non Aktif Service</label>
                <input type="text" id="date_from" name="tgl_non_aktif_service" parsley-trigger="change" class="form-control" title="Input Tanggal Non Aktif Service">
            </div>
            -->
			<div class="form-group text-right m-b-0">
				<button class="btn btn-primary waves-effect waves-light" type="submit" disabled id="save">
					Save
				</button>
				<button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" disabled id="cancel">
					Cancel
				</button>
			</div>
			
		</form>
	</div>
</div>