<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() { 
        var branch = $("#branch").val();   
        var data_branch = "<?php echo site_url().'download_tarif_requester/c_download_tarif_requester/get_origin';?>?cu=" + branch;
    $( "#auto_ori" ).autocomplete({
      source: data_branch,
      minLength: 1,
      select: function(event, ui) {
        if(ui.item.label == "Data Not found"){
          $("#origin").val("");
        }else{
            $("#origin").val(ui.item.code);
            $("#gambar2").hide('slow');
        }
      }
    });
  } );  
</script>

<script type="text/javascript">
    function getOrigin_after(){
        var branch = $("#branch_after").val();
        var no_request = $("#no_request").val();
        var cabang_u = branch + no_request;
        var data_cab = "<?php echo site_url().'download_tarif_requester/c_download_tarif_requester/get_origin_after';?>?cu=" + cabang_u;
        $( function() {

            $( "#auto_ori_a" ).autocomplete({
              source: data_cab,
              minLength: 1,
              select: function(event, ui) {
                if(ui.item.label == "Data Not found"){
                  $("#origin_after").val("");
                }else{
                    $("#origin_after").val(ui.item.code);
                    $("#gambar3").hide('slow');
                }
              }
            });
          } );
    };
</script>


<script type="text/javascript">
    function getDestination(){
        var origin = $("#origin").val();   
        var data_des = "<?php echo site_url().'download_tarif_requester/c_download_tarif_requester/get_destination';?>?cu=" + origin;
        $( "#auto_des" ).autocomplete({
          source: data_des,
          minLength: 1,
          select: function(event, ui) {
            if(ui.item.label == "Data Not found"){
              $("#destination").val("");
            }else{
                $("#destination").val(ui.item.code);
                $("#gambar").hide('slow');
            }
          }
        });
    };
</script>

<script type="text/javascript">
    function getDestination_after(){
        var org = $("#origin_after").val();
        var no_request = $("#no_request").val();
        var origin = org + no_request;     
        var data_des = "<?php echo site_url().'download_tarif_requester/c_download_tarif_requester/get_destination_after';?>?cu=" + origin;
        $( "#auto_des_a" ).autocomplete({
          source: data_des,
          minLength: 1,
          select: function(event, ui) {
            if(ui.item.label == "Data Not found"){
              $("#destination_after").val("");
            }else{
                $("#destination_after").val(ui.item.code);
                $("#gambar4").hide('slow');
            }
          }
        });
    };
</script>

<script type="text/javascript">
    function getService(){
        var dest = $("#destination").val();
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('download_tarif_requester/c_download_tarif_requester/get_service')?>?dest="+dest,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
    function getService_after(){
        var ori = $("#origin_after").val();
        var dest = $("#destination_after").val();
        var no_request = $("#no_request").val();
        var gab = ori + dest + no_request;
        var ddest = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('download_tarif_requester/c_download_tarif_requester/get_service_after')?>?dest="+gab,
            dataType: "json",
            data: ddest,
            success: function(data){
                $('#service_after').html(data.dat);
            }
        });
    }
</script>

<script>
    function loadings() {
        $("#gambar").show('slow');

    }
</script>

<script>
    function loading() {
        $("#gambar2").show('slow');

    }
</script>

<div class="row">

  <div class="col-lg-6">
    <div align="center">
      <button type="button" class="btn btn-info waves-effect waves-light">Live</button>
    </div><br/>
    <div class="card-box"> 
        <form action="<?php echo site_url('generate_tarif')?>" method="post">
        <input type="hidden" id="branch" name="branch" value="<?php echo $branch ?>">
            <div class="form-group">
                <label for="emailAddress">Origin</label>
                <input type="text" class="form-control" required id="auto_ori" onkeyup="loading()" onchange="getDestination()" maxlength="8">
          <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
          <input type="hidden" class="form-control" required id="origin" name="origin">
            </div>
            <div class="form-group">
                <label for="emailAddress">Destination</label>
                <input type="text" class="form-control" required  id="auto_des" onkeyup="loadings()" onchange="getService()" maxlength="8">
                <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
                <input type="hidden" class="form-control" required name="destination" id="destination">
            </div>
            <div class="form-group">
                <label for="pass1">Service</label>
                <select class="form-control" required="" name="service" id="service">
                    <option value="" disabled selected>Choose</option>
                    <option></option>
                </select>
            </div>
            <div class="form-group text-right m-b-0">
                <button type="submit" class="btn btn-primary waves-effect waves-light m-l-5" title="Generate Report">
                    Generate
                </button>
            </div>
            
        </form>
    </div>
  </div>

  <div class="col-lg-6">
    <div align="center">
      <button type="button" class="btn btn-success waves-effect waves-light">Testing</button>
    </div>
    <br/>
    <div class="card-box"> 
      <form action="<?php echo site_url('generate_tarif_all_after')?>" method="post">
        <input type="hidden" id="branch_after" name="branch_after" value="<?php echo $branch ?>">
        <div class="col-lg-12" style="padding: 0;margin-bottom: 13px">
          <div class="col-lg-4" style="padding: 0;">
            <label for="userName">No Request</label>
            <input type="text" name="no_request" parsley-trigger="change" required  class="form-control" id="no_request" onchange="getOrigin_after()">
          </div>
          <div class="col-lg-8">
            <label for="userName">Origin</label>
            <input type="text" class="form-control" required id="auto_ori_a" onkeyup="load()" onchange="getDestination_after()" maxlength="8">
            <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar3"></img>
            <input type="hidden" class="form-control" required id="origin_after" name="origin_after">
          </div>
        </div>
        <!--
        <div class="form-group">
          <label for="emailAddress">Origin</label>
          <input type="text" class="form-control" required id="auto_ori" onkeyup="loading()" onchange="getDestination()" maxlength="8">
          <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar2"></img>
          <input type="hidden" class="form-control" required id="origin" name="origin">
        </div>
        -->
        <div class="form-group">
          <label for="emailAddress">Destination</label>
          <input type="text" class="form-control" required  id="auto_des_a" onkeyup="loads()" onchange="getService_after()" maxlength="8">
          <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar4"></img>
          <input type="hidden" class="form-control" required name="destination_after" id="destination_after">
        </div>
        <div class="form-group">
          <label for="pass1">Service</label>
          <select class="form-control" required="" name="service_after" id="service_after">
            <option value="" disabled selected>Choose</option>
            <option></option>
          </select>
        </div>
        <div class="form-group text-right m-b-0">
          <button type="submit" class="btn btn-primary waves-effect waves-light m-l-5" title="Generate Report">
            Generate
          </button>
        </div>
        
      </form>
    </div>
  </div>

</div>

<div>
    <form action="<?php echo site_url().'download_tarif_requester/c_download_tarif_requester/export_to_excel'?>" method="post">
        <input type="hidden" name="routing" value="<?php echo $routing ?>">
        <input type="hidden" name="service" value="<?php echo $service ?>">
        <button type="submit" class="btn btn-success waves-effect waves-light m-l-5" title="Export to Excel">
            Export to Excel
        </button>
    </form>
</div>
<br/>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <table id="mydatas" style="max-width:100% !important; padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
            <div style="margin:0;">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">NO</th>
                        <th colspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">CODING</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">SYSCODE</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">3 CODE</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">PROVINSI</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">KABUPATEN / KOTA</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">NAMA KAB/KOTA</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">KECAMATAN</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">KELURAHAN</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">KODE POS</th>
                        <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">ZONA</th>
                        <th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">SERVICE</th>
                        <th style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TARIF</th>
                        <th colspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">ETD</th>
                    </tr>
                
                    <tr>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">ORIGIN</td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">DEST</td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><?php echo $service ?></td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><?php echo $service ?></td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">FROM</td>
                        <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">THRU</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $n=1;
                    foreach($report as $r) { ?>
                    <tr id="data_row_<?php echo$n; ?>">
                        <td><?php echo $n ?></td>
                        <td><?php echo $r['ORIGIN'] ?></td>
                        <td><?php echo $r['DESTINATION'] ?></td>
                        <td><?php echo $r['ROUTING'] ?></td>
                        <td><?php echo $r['CODE'] ?></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $r['KOTA'] ?></td>
                        <td><?php echo $r['KECAMATAN'] ?></td>
                        <td><?php echo $r['KELURAHAN'] ?></td>
                        <td><?php echo $r['KODEPOS'] ?></td>
                        <td></td>
                        <td>
                            <?php echo $r['SERVICE_CTC'] ?> <?php echo $r['SERVICE_OKE'] ?> <?php echo $r['SERVICE_REG'] ?>
                            <?php echo $r['SERVICE_YES'] ?> <?php echo $r['SERVICE_SPS'] ?> <?php echo $r['SERVICE_JTR'] ?>
                        </td>
                        <td>
                            <?php echo $r['PRICE_CTC'] ?> <?php echo $r['PRICE_OKE'] ?> <?php echo $r['PRICE_REG'] ?>
                            <?php echo $r['PRICE_YES'] ?> <?php echo $r['PRICE_SPS'] ?> <?php echo $r['PRICE_JTR'] ?>
                        </td>
                        <td><?php echo $r['ETD_FROM'] ?></td>
                        <td><?php echo $r['ETD_THRU'] ?></td>
                    </tr>
                    <?php $n++; } ?>
                </tbody>
                </div>
            </table>
        </div>
    </div>
</div>