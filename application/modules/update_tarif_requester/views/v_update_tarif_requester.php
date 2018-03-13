<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>    

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'update_tarif_requester/c_update_tarif_requester/get_cabang_utama';?>";
    $( "#auto_cu" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#cabang_utama").val("");
        }else{
            $("#cabang_utama").val(ui.item.code);
        }
      }
    });
  } );  
</script>


<script type="text/javascript">
    function myFunction(){
        var cabang_u = $("#cabang_utama").val();
        var data_cab = "<?php echo site_url().'update_tarif_requester/c_update_tarif_requester/get_cabang';?>?cu=" + cabang_u;
        $( function() {

            $( "#auto_c" ).autocomplete({
              source: data_cab,
              minLength: 3,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#cabang").val("");
                }else{
                    $("#cabang").val(ui.item.code);
                }
              }
            });
          } );
    };
</script>

<script type="text/javascript">
    function getService(){
        var serv = $("#cabang").val();
        var dserv = "serv=" + serv
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('update_tarif_requester/c_update_tarif_requester/data_service')?>?serv="+serv,
            dataType: "json",
            data: dserv,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                    <div class="col-md-12">
    					<div class="col-md-4">
    						                                    
                            <div class="form-group">
                                <label class="col-md-4 control-label">No. Request</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" readonly="" title="No Request Automatis Setelah dilakukan Save">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cabang Utama</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" required title="Input Cabang Utama" id="auto_cu" onchange="myFunction()">
                                    <input type="hidden" required name="cabang_utama" title="Input Cabang Utama" id="cabang_utama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cabang</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" required title="Input Cabang" id="auto_c" onchange="getService()">
                                    <input type="hidden" class="form-control" required name="cabang" title="Input Cabang" id="cabang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Perubahan</label>
                                <div class="col-md-8">
                                    <select class="form-control" required name="perubahan" title="Pilih Perubahan yang akan Dilakukan">
                                    	<option value="" disabled selected>Choose</option>
                                    	<option value="1">Rp</option>
                                    	<option value="2">%</option>
                                    </select>
                                </div>
                            </div>
    	       
    	                    
    					</div>
    					
    					<div class="col-md-4">
    						                                    
    	                    <div class="form-group">
                                <label class="col-md-4 control-label">Nilai Perubahan</label>
                                <div class="col-md-8">
                                    <input type="number" min="0" class="form-control" name="nilai_perubahan" title="Input Nilai Perubahan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Service</label>
                                <div class="col-md-8">
                                    <select class="form-control" title="Pilih Service" required name="service" id="service">
                                    	<option value="" disabled selected>Choose</option>
                                        <option>
                                            
                                        </option>
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
                                    <input type="file" class="form-control" required title="Upload File Cost Component" name="file_component">
                                </div>
                            </div>
    	                    
    					</div>

    					<div class="col-md-2">
    						<button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process">Save</button>
    						<button type="reset" class="btn btn-danger waves-effect waves-light" title="Cancel Process">Cancel</button>
    					</div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
