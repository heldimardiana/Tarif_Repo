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
	<div class="col-lg-6">
		<div class="card-box">       
			<form action="<?php echo site_url('roll_back_data')?>" method="post">
				<div class="form-group">
			        <label for="emailAddress">No Request</label>
			        <input type="text" name="no_request" class="form-control" title="No Request" required="">
			    </div>
			    <div class="form-group">
			        <button class="btn btn-primary waves-effect waves-light" type="submit" title="Roll Back">
			          Roll Back
			        </button>
			        <button type="reset" class="btn btn-danger waves-effect waves-light m-l-5" title="Cancel Proses">
			          Cancel
			        </button>
			     </div>
			</form>
		</div>
	</div>
</div>