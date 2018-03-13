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

<div class="col-lg-5">
  <div class="card-box"> 
    <form action="<?php echo site_url('generate_update_generate_all');?>" method="post">
      <div class="form-group">
        <label for="emailAddress">Origin *</label>
        <input type="text" name="origin" class="form-control" value="<?php echo $origin ?>" onchange="getService()" title="Origin" readonly>
      </div>
      <div class="form-group">
        <label for="pass1">Service *</label>
        <select class="form-control" title="Pilih Service" name="service" id="service" required>
          <option value="" disabled selected>Choose</option>
            <?php foreach($service as $s) { ?>
            <option value="<?php echo $s['DROURATE_SERVICE'] ?>"> <?php echo $s['DROURATE_SERVICE'] ?>
          </option>
          <?php } ?>
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