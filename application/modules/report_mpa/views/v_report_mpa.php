<div class="col-lg-5">
	<div class="card-box">
		<form action="<?php echo site_url('generate_report_mpa')?>" method="post">
		                                    
            <div class="form-group">
				<label for="emailAddress">Date From</label>
				<input type="text" id="date_from" class="form-control" title="Date From" name="date_from" required="">
			</div>

			<div class="form-group">
				<label for="emailAddress">Date Thru</label>
				<input type="text" id="date_thru" class="form-control" title="Date From" name="date_thru" required="">
			</div>

			<div class="form-group">
				<label for="emailAddress">Request</label>
				<select class="form-control" name="request" required="">
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

			<div class="form-group text-right m-b-0">
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
