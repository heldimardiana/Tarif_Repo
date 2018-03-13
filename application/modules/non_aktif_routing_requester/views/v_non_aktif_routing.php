<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {
        var cabang_u = $("#cabang_utama").val();    
        var data_cab = "<?php echo site_url().'non_aktif_routing_requester/c_non_aktif_routing_requester/get_cabang';?>?cu="+ cabang_u;
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
</script>

<script type="text/javascript">
    function destina(){
        var cabang = $("#cabang").val();
        var data_dest = "<?php echo site_url().'non_aktif_routing_requester/c_non_aktif_routing_requester/get_destination';?>?cul=" + cabang;
        $( function() {

            $( "#auto_dest" ).autocomplete({
              source: data_dest,
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
          } );
    };
</script>

<!--
<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'non_aktif_routing_requester/c_non_aktif_routing_requester/get_destination';?>";
    $( "#auto_dest" ).autocomplete({
      source: data_peg,
      minLength: 1,
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
-->

<script type="text/javascript">
    function getchild(){
        var origin = $("#origin").val();
        var destination = $("#destination").val();
        var drcode = origin + destination;
        var ddestination = "destination=" + destination
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('non_aktif_routing_requester/c_non_aktif_routing_requester/getchild')?>?param="+drcode,
            dataType: "json",
            data: ddestination,
            success: function(data){
               $("#childs").val(data.dat);
               if(data.dat > 0)
               {
                    $('#child').show('fast');
               }
               else
               {
                    alert("Tidak Ada Sub");
                    $('#child').hide('fast');
               }
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
        var oke = $("#auto_dest").val();
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
    function tutup() {
        $("#gambar").hide('slow');

    }
</script>

<script>
    function BtnEn(){
        document.getElementById("btnSave").disabled = false;
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
    <body> 
  		<form action="<?php echo site_url('save_non_aktif_routing_requester');?>" method="post">
  			<div class="form-group">
  				<label for="userName">No. Request</label>
  				<input type="text" readonly name="" parsley-trigger="change" class="form-control" title="No Terisi Secara Automatis">
                  <input type="hidden" id="origin" value="<?php echo $origin ?>">
  			</div>
              <!--
  			<div class="form-group">
  				<label for="emailAddress">Destination</label>
  				<input type="text" class="form-control"  required id="auto_dest" onkeydown="loadings()" title="Input Destination">
  				<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
  				<input type="hidden" class="form-control" name="destination" id="destination" required>
  			</div>
              -->
              <input type="hidden" id="cabang_utama" name="cabang_utama" value="<?php echo $branch ?>">
              <div class="form-group">
                <label for="emailAddress">Cabang *</label>
                <input type="text" class="form-control" id="auto_c" required onkeyup="loadings()" onchange="destina();" maxlength="8">
                <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
                <input type="hidden" class="form-control" id="cabang" name="cabang" required>
              </div>
              <label for="emailAddress">Destination *</label>
              <div class="input-group m-t-10 form-group">
                <input type="text" class="form-control"  required id="auto_dest" onkeydown="loading()" title="Input Destination" maxlength="8">
                <span class="input-group-btn">
                <button type="button" class="btn waves-effect waves-light btn-success" title="Cek Sub" onclick="getchild();BtnEn()"><i class="fa fa-search"></i></button>
                </span>
              </div>
              <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
              <input type="hidden" class="form-control" name="destination" id="destination" required>

              <input type="hidden" id="childs" name="childs">
              <div class="form-group" style="display:none;" id="child">
                  <label for="emailAddress">Sub</label>
                  <input type="checkbox" name="child" value="Y" checked="">
              </div>
              <!--
              <div class="form-group">
                  <label for="userName">Tanggal Non Aktif Routing</label>
                  <input type="text" id="date_from" name="tgl_non_aktif_routing" parsley-trigger="change" class="form-control" title="Input Tanggal Non Aktif Routing">
              </div>
              -->
  			<div class="form-group text-right m-b-0">
  				<button class="btn btn-primary waves-effect waves-light" type="submit" title="Save" id="btnSave" disabled>
  					Save
  				</button>
  				<button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel">
  					Cancel
  				</button>
  			</div>
  			
  		</form>
    </body>
	</div>
</div>