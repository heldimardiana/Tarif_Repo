<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_pegi = "<?php echo site_url().'simulasi/c_simulasi/get_origin_btbp';?>";
    $( "#auto_ori" ).autocomplete({
      source: data_pegi,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#origin").val("");
        }else{
            $("#origin").val(ui.item.code);
            $("#gambar").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
	function org_after(){
		var no_request = $("#no_request").val();
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_origin_btbp_a';?>?no_request=" + no_request;
        $( function() {

            $( "#origin_fter" ).autocomplete({
              source: data_cab,
              minLength: 3,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#origin_after").val("");
                }else{
                    $("#origin_after").val(ui.item.code);
                    $("#gambarss").hide('slow');
                }
              }
            });
          } );
	};
</script>

<script>
    function loadings() {
        var oke = $("#origin_fter").val();
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
    function loading() {
        var oke = $("#auto_des").val();
        var tes = oke.length;
        if(tes >= 4)
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
			<button type="button" class="btn btn-info waves-effect waves-light">Before</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="<?php echo site_url('generate_simulai_btbp_before')?>" method="post">
				<div class="form-group">
			        <label for="emailAddress">Origin</label>
			        <input type="text" class="form-control" id="auto_ori" onkeyup="loadings()" title="Origin" required="" maxlength="8">
			        <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img> 
			        <input type="hidden" class="form-control" required name="origin" id="origin">
			    </div>
			    <div class="form-group">
			        <button class="btn btn-primary waves-effect waves-light" type="submit" title="Generate">
			          Generate
			        </button>
			        <button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel Proses">
			          Cancel
			        </button>
			     </div>
			</form>
		</div>
	</div>

	<div class="col-lg-6">
		<div align="center">
			<button type="button" class="btn btn-success waves-effect waves-light">After ( Testing )</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="<?php echo site_url('generate_simulai_btbp_after')?>" method="post">
				<div class="col-lg-12" style="padding: 0;margin-bottom: 13px">
		          <div class="col-lg-4" style="padding: 0;">
		            <label for="userName">No Request</label>
		            <input type="text" name="no_request" parsley-trigger="change" required  class="form-control" id="no_request" onchange="org_after()">
		          </div>
		          <div class="col-lg-8">
		            <label for="userName">Origin</label>
		            <input type="text" parsley-trigger="change" required  class="form-control" id="origin_fter" maxlength="3" onkeyup="loading();">
		          <input type="hidden" name="origin_after" required  class="form-control" id="origin_after">
		          <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambarss"></img>
		          </div>
		        </div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary waves-effect waves-light" title="Generate">Generate</button>
					<button type="reset" class="btn btn-danger waves-effect waves-light" title="Cancel">Cancel</button>
				</div>
			</form>
		</div>
	</div>

</div>