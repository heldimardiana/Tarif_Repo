<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>  

<script type="text/javascript">
    $( function() {    
        var data_pegi = "<?php echo site_url().'update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester/get_origin';?>";
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

<script>
    function loadings() {
        var oke = $("#auto_ori").val();
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


<script type="text/javascript">
    function getService(){
        var org = $("#origin").val();
        //var ddorg = "origin=" + origin
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester/get_service')?>?params="+org,
            dataType: "json",
            data: org,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script>
    function getab(){
      var origin = $("#origin").val();
      var service = $("#service").val();
      var param = origin + service;
      var dparam = "service=" + service
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester/generate_table')?>?param="+param,
        dataType: "json",
        data: dparam,
        success: function(data){
            $('#city_zone_3code').html(data.code);
        }
      });
    }
</script>

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
        
        <input type="text" class="form-control" id="auto_ori" onkeyup="loadings()" onchange="getService()" title="Origin" required="" maxlength="8">
        <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img> 
        <input type="hidden" class="form-control" required name="origin" id="origin">
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