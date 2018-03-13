<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>  

<script type="text/javascript">
    $( function() {    
        var data_pegi = "<?php echo site_url().'update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester/get_origin';?>";
    $( "#auto_ori" ).autocomplete({
      source: data_pegi,
      minLength: 1,
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
        $("#gambar").show('slow');

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

<script>
    function verify_zona_a(id)
    {
      var tarif_after_zona_a = $("#tarif_after_zona_a_"+id).val();
      var hasil              = tarif_after_zona_a.replace(".","");

      $("#tarif_after_zona_a_"+id).val(hasil);
    }
</script>

<script>
    function verify_zona_b(id)
    {
      var tarif_after_zona_b = $("#tarif_after_zona_b_"+id).val();
      var hasil              = tarif_after_zona_b.replace(".","");
      
      $("#tarif_after_zona_b_"+id).val(hasil);
    }
</script>

<script>
    function get_c(id){
      
      var tarif_after_b1  = $("#tarif_after_zona_b_"+id).val();
      var tarif_after_b   = tarif_after_b1.replace(".","");
      var nol_25          = 0.25 * tarif_after_b;
      var tarif_af_c      = parseInt(nol_25) + parseInt(tarif_after_b);
      var ac              = tarif_af_c.toString();
      var ac1             = ac.slice(0,-3);
      var ac2             = ac.substr(-3);
      var ac3             = ac1 + '.' + ac2;
      var ac4             = parseFloat(ac3);
      var tarif_after_c   = Math.round(ac4)+'000';
      var nol_50          = 0.50 * tarif_after_c;
      var tarif_af_d      = parseInt(nol_50) + parseInt(tarif_after_c);
      var ad              = tarif_af_d.toString();
      var ad1             = ad.slice(0,-3);
      var ad2             = ad.substr(-3);
      var ad3             = ad1 + '.' + ad2;
      var ad4             = parseFloat(ad3);
      var tarif_after_d   = Math.round(ad4)+'000';
      
      $("#tarif_after_zona_c_"+id).val(tarif_after_c);
      $("#tarif_after_zona_d_"+id).val(tarif_after_d); 
    }
</script>

<script type="text/javascript">
        function get_filename(){
            var filename_upload = $("#attachment").val();
            $("#param_attachment").val(filename_upload);
        }
</script>

<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <div class="row">
        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_update_tarif_cabang_utama_requester')?>" enctype="multipart/form-data">
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
                      <input type="text" class="form-control" required name="origin" id="origin" value="<?php echo $origin ?>" readonly>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-4 control-label">Service</label>
                  <div class="col-md-8">
                      <input type="text" class="form-control" required name="service" id="service" value="<?php echo $service ?>" readonly>
                  </div>
              </div>
              <div class="col-md-12">  
              </div>
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
                      <input type="file" class="form-control" title="Upload File Cost Component" name="attachment" onchange="get_filename();" id="attachment">
                      <input type="hidden" name="param_attachment" id="param_attachment">
                      <p style="color:red;">File xls/xlsx/doc/docx/pdf max:4mb</p>
                  </div>
              </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process" id="button_save">Save</button>
              <a href="<?php echo site_url('update_tarif_cabang_utama_requester')?>">
              <button type="button" class="btn btn-danger waves-effect waves-light" title="Cancel Process">Cancel</button>
              </a>
            </div>
          </div>
          <div>
            <table id="isoplus" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
              <div style="margin:0;">
              <thead>
                
                  <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kabupaten / Kotamadya</th>
                  <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Code</th>
                  <th rowspan="5" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">City Code</th>
                  <th colspan="35" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TARIF</th>
               

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
                
                <tbody>
                <?php 
                $n=1;
                foreach($gtable as $gt) {
                ?>
                <tr>
                  <td>
                    <input type="text" class="form-control" name="kab_kotamadya[]" value="<?php echo $gt['CITY_ZONE_KABKOTA'] ?>" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="code[]" value="<?php echo $gt['CITY_ZONE_3CODE'] ?>" readonly="" style="width:70px;">
                    <input type="hidden" name="ref_code[]" value="<?php echo $n ?>" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="city_code[]"  value="<?php echo $gt['CITY_ZONE_CODE'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_before_zona_a[]" value="<?php echo $gt['TARIF_A'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="tarif_after_zona_a[]" id="tarif_after_zona_a_<?php echo $n ?>" min="0"  style="width:100px;" onchange="verify_zona_a(<?php echo $n ?>)" value="<?php echo $gt['TARIF_A'] ?>">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_from_before_zona_a[]" value="<?php echo $gt['ETDF_A'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_thru_before_zona_a[]" value="<?php echo $gt['ETDT_A'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_from_after_zona_a[]" style="width:50px;" maxlength="2"  min="1" value="<?php echo $gt['ETDF_A'] ?>">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_thru_after_zona_a[]" style="width:50px;" maxlength="2"  min="1" value="<?php echo $gt['ETDT_A'] ?>">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bd_nama_service_zona_a[]" value="<?php echo $gt['DROURATE_SERVICE'] ?>" readonly style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_before_zona_b[]" value="<?php echo $gt['TARIF_B'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="tarif_after_zona_b[]" id="tarif_after_zona_b_<?php echo $n ?>"  style="width:100px;" onchange="verify_zona_b(<?php echo $n ?>);get_c(<?php echo $n ?>)" min="0" value="<?php echo $gt['TARIF_B'] ?>">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_from_before_zona_b[]" value="<?php echo $gt['ETDF_B'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_thru_before_zona_b[]" value="<?php echo $gt['ETDT_B'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_from_after_zona_b[]" style="width:50px;"  min="1" value="<?php echo $gt['ETDF_B'] ?>">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_thru_after_zona_b[]" style="width:50px;"  min="1" value="<?php echo $gt['ETDT_B'] ?>">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bd_nama_service_zona_b[]" value="<?php echo $gt['DROURATE_SERVICE'] ?>" readonly style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bt_zona_b[]" value="<?php echo $gt['TRANSIT_B'] ?>" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_before_zona_c[]" value="<?php echo $gt['TARIF_C'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_after_zona_c[]" id="tarif_after_zona_c_<?php echo $n ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_from_before_zona_c[]" value="<?php echo $gt['ETDF_C'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_thru_before_zona_c[]" value="<?php echo $gt['ETDT_C'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_from_after_zona_c[]" style="width:50px;"  min="1">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_thru_after_zona_c[]" style="width:50px;"  min="1">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bd_nama_service_zona_c[]" value="<?php echo $gt['DROURATE_SERVICE'] ?>" readonly style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bt_zona_c[]" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bp_1_kilo_zona_c[]" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bp_next_kilo_zona_c[]" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_before_zona_d[]" value="<?php echo $gt['TARIF_D'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_after_zona_d[]" id="tarif_after_zona_d_<?php echo $n ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_from_before_zona_d[]" value="<?php echo $gt['ETDF_D'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_thru_before_zona_d[]" value="<?php echo $gt['ETDT_D'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_from_after_zona_d[]" style="width:50px;"  min="1">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_thru_after_zona_d[]" style="width:50px;"  min="1"> 
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bd_nama_service_zona_d[]" value="<?php echo $gt['DROURATE_SERVICE'] ?>" readonly style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bt_zona_d[]" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bp_1_kilo_zona_d[]" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bp_next_kilo_zona_d[]" readonly="">
                  </td>
                </tr>
                <?php $n++; } ?>
              </tbody>
              </thead>
              </div>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>