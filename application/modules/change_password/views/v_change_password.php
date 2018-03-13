<script src="<?php echo base_url();?>plugin/jquery/md5.min.js"></script>
<script>
	function CheckPass(){
		var old_password_1 = $("#old_password_1").val();
		var old_password_2 = $("#old_password_2").val();
		var old_pass 	   = md5("202cb69kjsu84kd94mmd3" + "asffm834523i4c2934u23hwr" + old_password_2);
		if(old_password_1 != old_pass){
			alert("Old Password tidak sama..");
			document.getElementById("old_password_2").value = "";
		}
		else{

		}

	}
</script>

<script>
	function CheckVerify(){
		var new_password = $("#new_password").val();
		var verify_password = $("#verify_password").val();
		if(new_password != verify_password){
			alert("New Password dan Verify Password tidak sama..");
			document.getElementById("verify_password").value = "";
		}
	}
</script>

<div class="col-lg-5">
	<div class="card-box"> 
		<form action="<?php echo site_url('save_change_password');?>" method="post">
			<div class="form-group">
				<label for="userName">Old Password</label>
				<?php foreach($change as $chg) { ?>
				<input type="hidden" name="old_password_1" id="old_password_1" value="<?php echo $chg['USER_PASS']?>" class="form-control">
				<?php } ?>
				<input type="text" name="old_password_2" id="old_password_2" class="form-control" title="Old Password" onchange="CheckPass();" required>
			</div>
			<div class="form-group">
				<label for="emailAddress">New Password</label>
				<input type="text" class="form-control" required name="new_password" title="New Password" id="new_password">
			</div>
			<div class="form-group">
				<label for="emailAddress">Verify Password</label>
				<input type="text" class="form-control" id="verify_password" required name="verify_password" title="Verify Password" 
				onchange="CheckVerify();">
			</div>
			<div class="form-group text-right m-b-0">
				<button class="btn btn-primary waves-effect waves-light" type="submit" title="Save">
					Change
				</button>
				<button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel">
					Cancel
				</button>
			</div>
		</form>
	</div>
</div>