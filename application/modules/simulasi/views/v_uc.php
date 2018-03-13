<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_branch_before';?>";
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
    $( function() {    
        var data_peg = "<?php echo site_url().'simulasi/c_simulasi/get_branch_after';?>";
    $( "#auto_branch_a" ).autocomplete({
      source: data_peg,
      minLength: 3,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#branch_after").val("");
        }else{
            $("#branch_after").val(ui.item.code);
            $("#gambarss").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function getOrigin(){
        var branch = $("#branch_before").val();
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_origin_before';?>?cu=" + branch;
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

<script type="text/javascript">
    function getOrigin_after(){
        var br = $("#branch_after").val();
        var no_request = $("#no_request").val();
        var branch = br + no_request;
        var data_cab = "<?php echo site_url().'simulasi/c_simulasi/get_origin_after';?>?cu=" + branch;
        $( function() {

            $( "#auto_ori_a" ).autocomplete({
              source: data_cab,
              minLength: 3,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#origin_after").val("");
                }else{
                    $("#origin_after").val(ui.item.code);
                    $("#gambar2").hide('slow');
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
        var oke = $("#auto_ori_a").val();
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

<script>
    function heldi2() {
        var oke = $("#auto_branch_a").val();
        var tes = oke.length;
        if(tes >= 3)
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

	<div class="col-lg-6">
		<div align="center">
			<button type="button" class="btn btn-success waves-effect waves-light">After ( Testing )</button>
		</div>
		<br/>
		<div class="card-box">       
			<form action="#">
				<div class="col-lg-12" style="padding: 0;margin-bottom: 13px">
          <div class="col-lg-4" style="padding: 0;">
            <label for="userName">No Request</label>
            <input type="text" name="no_request" parsley-trigger="change" required  class="form-control" id="no_request">
          </div>
          <div class="col-lg-8">
            <label for="userName">Branch</label>
            <input type="text" parsley-trigger="change" required  class="form-control" id="auto_branch_a" onchange="getOrigin_after()" maxlength="6" onkeyup="heldi2();">
            <input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="branch_after">
            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambarss"></img>
          </div>
        </div>
        <!--
        <div class="form-group">
					<label for="userName">Branch</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_branch_a" onchange="getOrigin_after()">
					<input type="hidden" name="nick" parsley-trigger="change" required  class="form-control" id="branch_after">
				</div>
        -->
				<div class="form-group">
					<label for="userName">Origin</label>
					<input type="text" parsley-trigger="change" required  class="form-control" id="auto_ori_a" onkeyup="loading()" maxlength="8">
					<img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
					<input type="hidden" parsley-trigger="change" required  class="form-control" id="origin_after">
				</div>
			</form>
		</div>
	</div>

</div>