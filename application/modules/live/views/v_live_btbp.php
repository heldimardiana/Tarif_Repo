<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_pegi = "<?php echo site_url().'live/c_live/get_origin_btbp';?>";
    $( "#auto_ori" ).autocomplete({
      source: data_pegi,
      minLength: 4,
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

<script>
    function loadings() {
        var oke = $("#auto_ori").val();
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

<div class="row">
	<div class="col-lg-6">
		<div align="center">
			<button type="button" class="btn btn-info waves-effect waves-light">Live</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="<?php echo site_url('generate_live_btbp_after')?>" method="post">
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
</div>