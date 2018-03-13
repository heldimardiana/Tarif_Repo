<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'ubah_coding_requester/c_ubah_coding_requester/get_cabang';?>";
    $( "#auto_c" ).autocomplete({
      source: data_peg,
      minLength: 1,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#current_code").val("");
        }else{
            $("#current_code").val(ui.item.code);
            $("#gambar").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function getmodifcode(){
        var data_peg = "<?php echo site_url().'ubah_coding_requester/c_ubah_coding_requester/getmodifcode';?>";
        $( function() {
            $( "#auto_modif_code" ).autocomplete({
              source: data_peg,
              minLength: 1,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#modif_code").val("");
                }else{
                    $("#modif_code").val(ui.item.code);
                    $("#gambar2").hide('slow');
                }
              }
            });
          } );
    };
</script>

<script>
    function cekAktiv(){
        var modif_code = $("#modif_code").val();
        var dmodif_code = "modif_code" + modif_code
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ubah_coding_requester/c_ubah_coding_requester/cekAktiv')?>?param="+modif_code,
            dataType: "json",
            data: dmodif_code,
            success: function(data){
               $("#c_active").val(data.dat);
               if(data.dat == "Y")
               {
                    alert("Active");
               }
               else
               {
                    alert("Tidak Active");
               }
            }
        });
    }
</script>

<script>
    function BtnEn(){
        document.getElementById("btnSave").disabled = false;
    }
</script>

<script>
    function loadings() {
        $("#gambar").show('slow');

    }
</script>

<script>
    function tutup() {
        $("#gambar2").show('slow');

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
		<form action="<?php echo site_url('save_ubah_coding_requester');?>" method="post">
			<div class="form-group">
				<label for="userName">No. Request</label>
				<input type="text" readonly name="" parsley-trigger="change" required  class="form-control" title="No Request akan Terisi Setelah dilakukan Save">
			</div>
			<div class="form-group">
				<label for="emailAddress">Cabang Utama</label>
				<?php foreach($cabang_utama as $cu) { ?>
				<input type="text" class="form-control" readonly value="<?php echo $cu['BRANCH_CITY']?> - <?php echo $cu['BRANCH_DESC']?>"> 
				<input type="hidden" class="form-control" name="cabang_utama" id="cabang_utama" value="<?php echo $cu['BRANCH_CODE']?>">
				<?php } ?>
			</div>
			<div class="form-group">
				<label for="pass1">Current Code *</label>
				<input type="text" class="form-control" required id="auto_c" onkeyup="loadings()" title="Input Current Code" maxlength="8" onchange="getmodifcode()">
				<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
				<input type="hidden" class="form-control" required id="current_code" name="current_code">
			</div>
      <label for="emailAddress">Modif Code *</label>
      <div class="input-group m-t-10 form-group">
        <input type="text" class="form-control" required title="Input Modif Code Tanpa Nama Alamat" maxlength="8" id="auto_modif_code" onkeyup="tutup()">
        <input type="hidden" class="form-control" name="modif_code" required id="modif_code" maxlength="8">
        <span class="input-group-btn">
        <button type="button" class="btn waves-effect waves-light btn-success" title="Cek Aktiv" onclick="cekAktiv();BtnEn()"><i class="fa fa-search"></i></button>
        </span>
      </div>
      <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
            <!--
            <div class="form-group">
                <label for="passWord2">Tanggal Ubah Coding</label>
                <input type="text" class="form-control" id="date_from" name="tgl_ubah_coding" required title="Input Tanggal Ubah Coding">
            </div>
            -->
			<div class="form-group text-right m-b-0">
				<button class="btn btn-primary waves-effect waves-light" type="submit" title="Save Proses" id="btnSave" disabled>
					Save
				</button>
				<button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel Proses">
					Cancel
				</button>
			</div>
			
		</form>
	</div>
</div>