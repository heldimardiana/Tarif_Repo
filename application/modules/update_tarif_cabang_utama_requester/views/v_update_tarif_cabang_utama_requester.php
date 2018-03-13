<script type="text/javascript">
    function getService(){
        var org = $("#origin").val();
        var ddorg = "dest=" + dest
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester/get_service')?>?params="+ddorg,
            dataType: "json",
            data: ddorg,
            success: function(data){
                $('#service').html(data.dat);
            }
        });
    }
</script>

<script type="text/javascript">
        function get_filename(){
            var filename_upload = $("#attachment").val();
            $("#param_attachment").val(filename_upload);
        }
</script>

<style type="text/css">
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>

<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <div class="row">
        <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="col-md-5">
              <div class="form-group">
                  <label class="col-md-4 control-label">No. Request</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" readonly="" title="No Request Automatis Setelah dilakukan Save">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 control-label">Origin</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" required name="origin" readonly="" value="<?php echo $origin ?>" id="origin">
                  </div>
              </div>
              <div class="col-md-12" style="padding: 0;margin-bottom: 5px">
                <label for="userName" class="col-md-4 control-label">Service</label>
                <div class="col-md-6" style="padding: 1;">
                  <select class="form-control" title="Pilih Service" name="service" id="service" required>
                    <option value="" disabled selected>Choose</option>
                    <?php foreach($service as $s) { ?>
                    <option value="<?php echo $s['DROURATE_SERVICE'] ?>"> <?php echo $s['DROURATE_SERVICE'] ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success waves-effect waves-light" title="Generate"><i class="fa  fa-refresh"></i></button>
                </div>
              </div>
              <!--
              <div class="form-group">
                  <label class="col-md-4 control-label">Service</label>
                  <div class="col-md-8">
                      <select class="form-control" title="Pilih Service" name="service" id="service" required>
                        <option value="" disabled selected>Choose</option>
                        <?php foreach($service as $s) { ?>
                        <option value="<?php echo $s['DROURATE_SERVICE'] ?>"> <?php echo $s['DROURATE_SERVICE'] ?>
                        </option>
                        <?php } ?>
                      </select>
                  </div>
              </div>
              -->
            </div>
            <div class="col-md-5">
              <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-8">
                      <a href="<?php echo base_url().'download/FORMAT COMPONENT COST.xlsx'?>" title="Klik Untuk Download File Cost Component">Download File Cost Component</a>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 control-label">Upload File</label>
                  <div class="col-md-8">
                      <input type="file" class="form-control" required title="Upload File Cost Component" name="attachment" onchange="get_filename();" id="attachment">
                      <input type="hidden" name="param_attachment" id="param_attachment">
                  </div>
              </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process" disabled>Save</button>
              <button type="reset" class="btn btn-danger waves-effect waves-light" title="Cancel Process">Cancel</button>
            </div>

          </div>
          
          <table id="mydata" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
            <div style="margin:0;">
            <thead>
              <tr>
                <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kabupaten / Kotamadya</th>
                <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Code</th>
                <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">City Code</th>
                <th colspan="35" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TARIF</th>
              </tr>
              <tr>
                <td colspan="6" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona A</td>
                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">BD</td>
                <td colspan="6" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona B</td>
                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">BD</td>
                <td rowspan="4" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BT</td>
                <td colspan="6" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona C</td>
                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">BD</td>
                <td rowspan="4" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BT</td>
                <td colspan="2" rowspan="3" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BP</td>
                <td colspan="6" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Zona D</td>
                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">BD</td>
                <td rowspan="4" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BT</td>
                <td colspan="2" rowspan="3" style="text-align:center;vertical-align:middle;background-color:#2ECC71;color:#F0F0F0;">BP</td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
                <td colspan="4" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
                <td rowspan="3" style="text-align:center;vertical-align:middle;background-color:#99ffff;color:black;">Nama Service</td>
                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
                <td colspan="4" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
                <td rowspan="3" style="text-align:center;vertical-align:middle;background-color:#99ffff;color:black;">Nama Service</td>
                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
                <td colspan="4" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
                <td rowspan="3" style="text-align:center;vertical-align:middle;background-color:#99ffff;color:black;">Nama Service</td>
                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Tarif</td>
                <td colspan="4" style="text-align:center;background-color:#99ffff;color:black;">ETD</td>
                <td rowspan="3" style="text-align:center;vertical-align:middle;background-color:#99ffff;color:black;">Nama Service</td>
              </tr>
              <tr>
                <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Afer</td>
                <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                <td rowspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
                <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">Before</td>
                <td colspan="2" style="text-align:center;vertical-align:middle;background-color:#b3ffff;color:black;">After</td>
              </tr>
              <tr>
                <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">1 kilo</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Next Kilo</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">From</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Thru</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">1 Kilo</td>
                <td style="text-align:center;background-color:#b3ffff;color:black;">Next Kilo</td>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td><input type="text" class="form-control" name="kab_kotamadya" value="" readonly=""></td>
                <td><input type="text" class="form-control" name="code" value="" readonly=""></td>
                <td><input type="text" class="form-control" name="city_code" value="" readonly=""></td>
                <td><input type="text" class="form-control" name="tarif_before_zona_a" value="" readonly=""></td>
                <td><input type="text" class="form-control" name="tarif_after_zona_a" value=""></td>
                <td><input type="text" class="form-control" name="etd_from_before_zona_a" value="" style="width:50px;" readonly=""></td>
                <td><input type="text" class="form-control" name="etd_thru_before_zona_a" value="" style="width:50px;" readonly=""></td>
                <td><input type="text" class="form-control" name="etd_from_after_zona_a" value="" style="width:50px;"></td>
                <td><input type="text" class="form-control" name="etd_thru_after_zona_a" value="" style="width:50px;"></td>
                <td><input type="text" class="form-control" name="bd_nama_service_zona_a" value=""></td>
                <td><input type="text" class="form-control" name="tarif_before_zona_b" value="" readonly=""></td>
                <td><input type="text" class="form-control" name="tarif_after_zona_b" value=""></td>
                <td><input type="text" class="form-control" name="etd_from_before_zona_b" value="" style="width:50px;" readonly=""></td>
                <td><input type="text" class="form-control" name="etd_thru_before_zona_b" value="" style="width:50px;" readonly=""></td>
                <td><input type="text" class="form-control" name="etd_from_after_zona_b" value="" style="width:50px;"></td>
                <td><input type="text" class="form-control" name="etd_thru_after_zona_b" value="" style="width:50px;"></td>
                <td><input type="text" class="form-control" name="bd_nama_service_zona_b" value=""></td>
                <td><input type="text" class="form-control" name="bt_zona_b" value=""></td>
                <td><input type="text" class="form-control" name="tarif_before_zona_c" value="" readonly=""></td>
                <td><input type="text" class="form-control" name="tarif_after_zona_c" value=""></td>
                <td><input type="text" class="form-control" name="etd_from_before_zona_c" value="" style="width:50px;" readonly=""></td>
                <td><input type="text" class="form-control" name="etd_thru_before_zona_c" value="" style="width:50px;" readonly=""></td>
                <td><input type="text" class="form-control" name="etd_from_after_zona_c" value="" style="width:50px;"></td>
                <td><input type="text" class="form-control" name="etd_thru_after_zona_c" value="" style="width:50px;"></td>
                <td><input type="text" class="form-control" name="bd_nama_service_zona_c" value=""></td>
                <td><input type="text" class="form-control" name="bt_zona_c" value=""></td>
                <td><input type="text" class="form-control" name="bp_1_kilo_zona_c" value=""></td>
                <td><input type="text" class="form-control" name="bp_next_kilo_zona_c" value=""></td>
                <td><input type="text" class="form-control" name="tarif_before_zona_d" value="" readonly=""></td>
                <td><input type="text" class="form-control" name="tarif_after_zona_d" value=""></td>
                <td><input type="text" class="form-control" name="etd_from_before_zona_d" value="" style="width:50px;" readonly=""></td>
                <td><input type="text" class="form-control" name="etd_thru_before_zona_d" value="" style="width:50px;" readonly=""></td>
                <td><input type="text" class="form-control" name="etd_from_after_zona_d" value="" style="width:50px;"></td>
                <td><input type="text" class="form-control" name="etd_thru_after_zona_d" value="" style="width:50px;"></td>
                <td><input type="text" class="form-control" name="bd_nama_service_zona_d" value=""></td>
                <td><input type="text" class="form-control" name="bt_zona_d" value=""></td>
                <td><input type="text" class="form-control" name="bp_1_kilo_zona_d" value=""></td>
                <td><input type="text" class="form-control" name="bp_next_kilo_zona_d" value=""></td>
              </tr>
            </tbody>
            </div>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>