<div class="row">
	<div class="col-lg-6">
		<div class="card-box">       
			<form action="<?php echo site_url('generate_check_upload')?>" method="post">
				<div class="form-group">
					<label for="userName">No Request</label>
					<input type="text" name="no_reqest" parsley-trigger="change" required="true"  class="form-control">
				</div>
				<div class="form-group">
					<label for="userName">Request</label>
					<select class="form-control" name="request" required="true">
						<option value="" disabled="" selected="">Choose</option>
						<option value="1">Update Tarif Cabang Utama</option>
						<option value="2">Update Tarif Cabang</option>
						<option value="3">Ubah Coding</option>
						<option value="4">Ubah Zona</option>
						<option value="5">Non Aktif Routing</option>
						<option value="6">Non Aktif Service</option>
						<option value="7">Aktivasi Service</option>
						<option value="8">Update Tarif Intracity</option>
						<option value="9">Update BTBP</option>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-primary waves-effect waves-light" type="submit" title="Generate">
					Generate
					</button>
					<button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel">
						Cancel
					</button>
				</div>
			</form>
		</div>
	</div>

</div>