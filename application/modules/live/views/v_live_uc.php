<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'live/c_live/get_branch_uc';?>";
    $( "#auto_branch" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#branch_before").val("");
        }else{
            $("#branch_before").val(ui.item.code);
            $("#gambars").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function getOrigin(){
        var branch = $("#branch_before").val();
        var data_cab = "<?php echo site_url().'live/c_live/get_origin_uc';?>?cu=" + branch;
        $( function() {

            $( "#auto_ori" ).autocomplete({
              source: data_cab,
              minLength: 4,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#origin_before").val("");
                }else{
                    $("#origin_before").val(ui.item.code);
                    $("#gambar").hide('slow');
                }
              }
            });
          } );
    };
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

<script>
    function loading() {
        $("#gambar2").show('slow');

    }
</script>

<script>
    function heldi() {
        var oke = $("#auto_branch").val();
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

<div class="row">

	<div class="col-lg-6">
		<div align="center">
			<button type="button" class="btn btn-info waves-effect waves-light">Live</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="#">
				<div class="form-group">
					<label for="userName">Branch</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_branch" onchange="getOrigin()" maxlength="6" onkeyup="heldi();">
					<input type="hidden" name="branch_before" parsley-trigger="change" required  class="form-control" id="branch_before">
				</div>
        <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambars"></img>
				<div class="form-group">
					<label for="userName">Origin</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_ori" onkeyup="loadings()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
					<input type="hidden" name="origin_before" parsley-trigger="change" required  class="form-control" id="origin_before">
				</div>
			</form>
		</div>
	</div>

</div>