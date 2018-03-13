<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'ubah_zona_requester/c_ubah_zona_requester/get_cabang_utama';?>";
    $( "#auto_cu" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#cabang_utama").val("");
        }else{
            $("#cabang_utama").val(ui.item.code);
            $("#gambars").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function myFunction(){
        var cabang_u = $("#cabang_utama").val();
        var data_cab = "<?php echo site_url().'ubah_zona_requester/c_ubah_zona_requester/get_cabang';?>?cu=" + cabang_u;
        $( function() {

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
    };
</script>

<script type="text/javascript">
    function getchild(){
        var origin = $("#cabang").val();
        var dorigin = "cabang=" + origin
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ubah_zona_requester/c_ubah_zona_requester/getchild')?>?param="+origin,
            dataType: "json",
            data: dorigin,
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
    function stop() {
        $("#gambar").hide('slow');

    }
</script>

<script type="text/javascript">
    function zone_code() {
        var cabang = $("#cabang").val();
        var dcabang = "cabang=" + cabang
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ubah_zona_requester/c_ubah_zona_requester/get_zona')?>?cu="+cabang,
            dataType: "json",
            data: dcabang,
            success: function(data){
               $("#current_zone").val(data.dat);
            }
        });
    }
</script>

<script>
    function loadingr() {
        $("#gambar3").show('slow');

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
    function BtnEn(){
        document.getElementById("modif_zona").disabled = false;
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
		<form action="<?php echo site_url('save_ubah_zona_requester');?>" method="post">
			<div class="form-group">
				<label for="userName">No. Request</label>
				<input type="text" readonly name="" parsley-trigger="change" class="form-control" title="No Terisi Secara Automatis Setelah dilakukan Save">
			</div>
			<div class="form-group">
				<label for="emailAddress">Cabang Utama *</label>
				
				<input type="text" class="form-control" id="auto_cu" onchange="myFunction()" title="Input Cabang Utama" required="" maxlength="3" onkeyup="heldi();">
				<input type="hidden" class="form-control" required name="cabang_utama" id="cabang_utama">
				
			</div>
      <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
      <div class="form-group">
      <label for="emailAddress">Cabang *</label>
      <div class="input-group m-t-10 form-group">
        <input type="text" class="form-control" required id="auto_c" onkeyup="loadings()" onchange="zone_code();" title="Input Cabang" maxlength="8">
        <input type="hidden" class="form-control" required id="cabang" name="cabang">
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
				<label for="pass1">Current Zona</label>
				<input type="text" class="form-control" id="current_zone" name="current_zone" readonly="" style="width:20%;">
        
			</div>
			<div class="form-group">
				<label for="passWord2">Modif Zona *</label>
				<input type="text" class="form-control" required name="modif_zone" title="Input Modif Zona" style="width:20%;" maxlength="2" disabled id="modif_zona">
			</div>
      <!--
      <div class="form-group">
        <label for="passWord2">Tanggal Ubah Zona</label>
        <input type="text" class="form-control" id="date_from" required name="tgl_ubah_zona" title="Input Tanggal Ubah Zona">
      </div>
      -->
			<div class="form-group text-right m-b-0">
				<button class="btn btn-primary waves-effect waves-light" type="submit" title="Save" disabled id="save">
					Save
				</button>
				<button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel" disabled id="cancel">
					Cancel
				</button>
			</div>
			
		</form>
	</div>
</div>