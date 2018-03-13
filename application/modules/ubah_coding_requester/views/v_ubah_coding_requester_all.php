<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>
<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'ubah_coding_requester/c_ubah_coding_requester/get_cabang_utama';?>";
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
        var data_cab = "<?php echo site_url().'ubah_coding_requester/c_ubah_coding_requester/get_cabang_all';?>?cu=" + cabang_u;
        $( function() {

            $( "#auto_c" ).autocomplete({
              source: data_cab,
              minLength: 4,
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
    };
</script>

<script type="text/javascript">
    function getmodifcode(){
        var data_peg = "<?php echo site_url().'ubah_coding_requester/c_ubah_coding_requester/getmodifcode';?>";
        $( function() {
            $( "#auto_modif_code" ).autocomplete({
              source: data_peg,
              minLength: 4,
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
    function tutup() {
        var oke = $("#auto_modif_code").val();
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
    function heldi() {
        var oke = $("#auto_cu").val();
        var tes = oke.length;
        if(tes >= 4)
        {
            $("#gambars").show('slow');
        }
        else
        {
            $("#gambars").hide('slow');
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

<!--
<div class="col-lg-5">
	<div class="card-box"> 
		<form action="<?php echo site_url('save_ubah_coding_requester');?>" method="post">
			<div class="form-group">
				<label for="userName">No. Request</label>
				<input type="text" readonly name="" parsley-trigger="change" required  class="form-control" title="No Request akan Terisi Setelah dilakukan Save">
			</div>
      -->
      <!--
			<div class="form-group">
				<label for="emailAddress">Cabang Utama</label>
				
				<input type="text" class="form-control" id="auto_cu" onchange="myFunction()" title="Input Cabang Utama" required="" maxlength="3"> 
				<input type="hidden" class="form-control" name="cabang_utama" id="cabang_utama">
				
			</div>

			<div class="form-group">
				<label for="pass1">Current Code</label>
				<input type="text" class="form-control" required id="auto_c" onkeyup="loadings()" title="Input Current Code" maxlength="8" onchange="getmodifcode()">
				<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
				<input type="hidden" class="form-control" required id="current_code" name="current_code">
			</div>

			<label for="emailAddress">Modif Code</label>
      <div class="input-group m-t-10 form-group">
        <input type="text" class="form-control" required title="Input Modif Code Tanpa Nama Alamat" maxlength="8" id="auto_modif_code" onkeyup="tutup()">
        <input type="hidden" class="form-control" name="modif_code" required id="modif_code" maxlength="8">
        <span class="input-group-btn">
        <button type="button" class="btn waves-effect waves-light btn-success" title="Cek Aktiv" onclick="cekAktiv();BtnEn()"><i class="fa fa-search"></i></button>
        </span>
      </div>
      <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
      -->
      <!--
      <div class="form-group">
          <label for="passWord2">Tanggal Ubah Coding</label>
          <input type="text" class="form-control" id="date_from" name="tgl_ubah_coding" required title="Input Tanggal Ubah Coding">
      </div>
      -->
      <!--
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
-->
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_ubah_coding_requester');?>" enctype="multipart/form-data">
  <div class="row">
    <div class="col-lg-12">
      <div class="card-box">
        <div class="row">
          <div class="col-md-6">                                    
            <div class="form-group">
                <label class="col-md-4 control-label">No. Request</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" readonly="" title="No Request Automatis Setelah dilakukan Save">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Cabang Utama *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="auto_cu" onchange="myFunction()" title="Input Cabang Utama" maxlength="3" onkeyup="heldi();"> 
                    <input type="hidden" class="form-control" name="cabang_utama" id="cabang_utama">
                    <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group" style="text-align: center;">
              <label class="col-md-4 control-label"></label>
              <p style="color:red;"><i>Current Code *</i></p>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="auto_c" onkeyup="loadings()" title="Input Current Code" maxlength="8" onchange="getmodifcode()">
                    <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
                    <input type="hidden" class="form-control" id="current_code">
                </div>
            </div>
            <div class="form-group" style="text-align: center;">
              <label class="col-md-4 control-label"></label>
              <p style="color:red;"><i>Modif Code *</i></p>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control" title="Input Modif Code Tanpa Nama Alamat" maxlength="8" id="auto_modif_code" onkeyup="tutup()">
                      <input type="hidden" class="form-control" id="modif_code" maxlength="8">
                      <span class="input-group-btn">
                      <button type="button" class="btn waves-effect waves-light btn-success" title="Cek Aktiv" onclick="cekAktiv();BtnEn()"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                    <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8">
                  <button class="btn btn-success waves-effect waves-light" type="button" title="Add" onclick="Save_TmpUcr();reload_page();">
                   + Add
                  </button>
                  <!--
                  <button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel Proses">
                    Cancel
                  </button>
                  -->
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card-box">
        <div class="row">
          <table id="tbl_id" class="table table-bordered table-hover table-responsive">
            <thead style="background-color:#1ABC9C;white-space: nowrap">
              <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
              <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CURRENT CODE</th>
              <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">MODIF CODE</th>
              <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">USE TARIF</th>
              <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ACTION</th>
            <tbody>
                  <?php 
                    $n=1;
                    foreach($temp as $tm){ 
                    ?>
                <tr id="data_row_<?php echo$n; ?>">

                  <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>

                  <td class="text-center" style="vertical-align: center;">
                    <input type="text" name="current_code[]" readonly class="form-control" id="insert_current_code" style="text-align: center;" value="<?php echo $tm['CURRENT_CODE']?>">
                  </td>
                  <td class="text-center" style="vertical-align: center;">
                    <input type="text" name="modif_code[]" readonly class="form-control" id="insert_modif_code" style="text-align: center;" value="<?php echo $tm['MODIF_CODE']?>">
                  </td>
                  <td class="text-center" style="vertical-align: center;">
                    <select class="form-control" name="use_tarif[]" required>
                      <option value="" disabled="" selected="">Choose</option>
                      <option value="1">Current Code</option>
                      <option value="2">Modif Code</option>
                    </select>
                  </td>
                  <td class="text-center" style="vertical-align: center;">
                    <input type="hidden" id="tsave_session_<?php echo $n ?>" value="<?php echo $tm['SAVE_SESSION']?>">
                    <a href="#" onclick="deleteTemp(<?php echo $n ?>);reload_page();">
                      <img src="<?php echo base_url()?>assets/images/remove.png" style="width:20px;">
                    </a>
                  </td>

                </tr>
                <?php $n++; } ?>
            </tbody>
            </thead>
          </table>
          <div style="float:right;">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?php echo site_url('ubah_coding_requester/c_ubah_coding_requester/deleteall_Temp')?>">
              <button type="button" class="btn btn-danger">Cancel</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function Save_TmpUcr(){
      var current = $("#current_code").val();
      var modif = $("#modif_code").val();
      var caut = $("#cabang_utama").val();

      $.ajax({
          type: "POST",
          url: "<?php echo site_url('ubah_coding_requester/c_ubah_coding_requester/save_temporary')?>",
          dataType: "json",
          data: {c_code: current, m_code: modif, c_utama: caut},
          succes : function(data){

          }
      });
    
  }
</script>

<script>
  function deleteTemp(id){
    var save_sess = $("#tsave_session_"+id).val();

    $.ajax({
        type: "POST",
        url: "<?php echo site_url('ubah_coding_requester/c_ubah_coding_requester/delete_temp_ucr')?>",
        dataType: "json",
        data: {sess: save_sess},
        succes: function(data){

        }
    });
  }
</script>

<script>
  function reload_page(){
    window.location.reload();
  }
</script>