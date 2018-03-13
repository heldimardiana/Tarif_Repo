<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>  

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'update_tarif_cabang_requester/c_update_tarif_cabang_requester/get_cabang_utama';?>";
    $( "#auto_cut" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#cabang_utama").val("");
        }else{
            $("#cabang_utama").val(ui.item.code);
            $("#gambar").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function myFunctions(){
        var cabang_u = $("#cabang_utama").val();
        var data_cab = "<?php echo site_url().'update_tarif_cabang_requester/c_update_tarif_cabang_requester/get_cabang_all';?>?cu=" + cabang_u;
        $( function() {

            $( "#auto_c" ).autocomplete({
              source: data_cab,
              minLength: 4,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#cabang").val("");
                }else{
                    $("#cabang").val(ui.item.code);
                    $("#gambar2").hide('slow');
                }
              }
            });
          } );
    };
</script>

<script type="text/javascript">
    function getDestination(){
        var origin = $("#cabang").val();   
        var data_des = "<?php echo site_url().'update_tarif_cabang_requester/c_update_tarif_cabang_requester/get_destination';?>?cu=" + origin;
        $( "#auto_des" ).autocomplete({
          source: data_des,
          minLength: 4,
          select: function(event, ui) {
            if(ui.item.label == "Data Not found"){
              $("#destination").val("");
            }else{
                $("#destination").val(ui.item.code);
                $("#gambar3").hide('slow');
            }
          }
        });
    };
</script>

<script type="text/javascript">
    function getService(){
        var org = $("#cabang").val();
        var dest = $("#destination").val();
        var gab = org + dest;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('update_tarif_cabang_requester/c_update_tarif_cabang_requester/data_service')?>?params="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script>
    function getChild(){
        var cabang = $("#cabang").val();
        var dcabang = "cabang" + cabang
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('update_tarif_cabang_requester/c_update_tarif_cabang_requester/getChild')?>?param="+cabang,
            dataType: "json",
            data: dcabang,
            success: function(data){
               $("#childs").val(data.dat);
               if(data.dat > 0)
               {
                    $('#child').show('fast');
                    $("#gambar2").hide('slow');
               }
               else
               {
                    $('#child').hide('fast');
                    alert("Tidak ada Sub");
                    $("#gambar2").hide('slow');
               }
            }
        });
    }
</script>

<script type="text/javascript">
        function get_filename(){
            var filename_upload = $("#upload_file").val();
            $("#param_attachment").val(filename_upload);
        }
</script>

<script>
    function loadings() {
        $("#gambar").show('slow');

    }
</script>

<script>
    function stop() {
        $("#gambar").hide('slow');

    }
</script>

<script>
    function loading() {
        var oke = $("#auto_c").val();
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
    function load() { 
        
        var oke = $("#auto_des").val();
        var tes = oke.length;
        if(tes >= 4)
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
    function stops() {
        $("#gambar2").hide('slow');

    }
</script>

<script>
    function heldi() {
        var oke = $("#auto_cut").val();
        var tes = oke.length;
        if(tes >= 3)
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
    function Aktiv_lagi(){
        document.getElementById("auto_des").disabled = false;
        document.getElementById("perubahan").disabled = false;
        document.getElementById("nilai_perubahan").disabled = false;
        document.getElementById("service").disabled = false;
        document.getElementById("upload_file").disabled = false;
        document.getElementById("save").disabled = false;
    }
</script>

<style type="text/css">
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>

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

<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_update_tarif_cabang_requester_all');?>" enctype="multipart/form-data">
					<div class="col-md-5">
						                                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">No. Request</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly="" title="No Request Automatis Setelah dilakukan Save">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cabang Utama *</label>
                            <div class="col-md-8">
                                <input type="text" id="auto_cut" required="" class="form-control" onchange="myFunctions()" title="Input Cabang Utama" maxlength="3" onkeyup="heldi();">
                                <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
                                <input type="hidden" name="cabang_utama" id="cabang_utama" class="form-control">
                            </div>
                            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cabang *</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                  <input type="text" class="form-control" required title="Input Cabang" id="auto_c" onkeyup="loading()" onchange="getDestination();" maxlength="8">
                                <input type="hidden" id="cabang" class="form-control" required name="cabang" title="Input Cabang">
                                  
                                  <span class="input-group-btn">
                                    <button class="btn btn-success" type="button" title="Cek Sub" onclick="getChild();loading();Aktiv_lagi()"><i class="fa fa-search"></i></button>
                                  </span>
                                </div><!-- /input-group -->
                                <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
                            </div>
                        </div>
                        
                        <input type="hidden" id="childs" name="childs">
                        <div class="form-group" style="display:none;" id="child">
                            <label class="col-md-4 control-label">Sub</label>
                            <div class="col-md-8">
                                <input type="checkbox" name="child" value="Y" checked="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Destination *</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required  id="auto_des" onkeyup="load()" maxlength="8" disabled>
                                <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar3"></img>
                                <input type="hidden" id="destination" class="form-control" required name="destination">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Perubahan *</label>
                            <div class="col-md-8">
                                <select class="form-control" name="perubahan" required title="Pilih Perubahan yang akan Dilakukan" onchange="getService()" required="" id="perubahan" disabled>
                                	<option value="" disabled selected>Choose</option>
                                	<option value="1">Rp</option>
                                	<option value="2">%</option>
                                </select>
                            </div>
                        </div>
					</div>
					
					<div class="col-md-5">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nilai Perubahan *</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="nilai_perubahan" title="Isi Nilai Perubahan" required="" step=".01" disabled id="nilai_perubahan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Service *</label>
                            <div class="col-md-8">
                                <select class="form-control" title="Pilih Service" required name="service" id="service" disabled>
                                	<option value="" disabled selected>Choose</option>
                                	<option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <a href="<?php echo base_url().'download/FORMAT COMPONENT COST.xlsx'?>" title="Klik Untuk Download File Cost Component">Download File Cost Component</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Upload File</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" title="Upload File Cost Component" name="file_component" disabled id="upload_file" onchange="get_filename();">
                                <input type="hidden" name="param_attachment" id="param_attachment">
                                <p style="color:red;">File xls/xlsx/doc/docx/pdf max:4mb</p>
                            </div>
                        </div>
                        <!--
	                    <div class="form-group">
                            <label class="col-md-4 control-label">Tanggal Update Tarif</label>
                            <div class="col-md-8">
                                <input type="text" id="date_thru" required class="form-control" name="tgl_update_tarif" title="Isi Tanggal Update Tarif">
                            </div>
                        </div>
                        -->
					</div>

					<div class="col-md-2">
						<button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process" disabled id="save">Save</button>
						<button type="reset" class="btn btn-danger waves-effect waves-light" title="Cancel Process">Cancel</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>