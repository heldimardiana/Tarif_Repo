<link rel="stylesheet" href="<?php echo base_url();?>assets/css/loader.css">
<link rel="stylesheet" href="<?php echo base_url();?>plugin/autocomplete/jquery-ui.css">
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-1.12.4.js"></script>
<script src="<?php echo base_url();?>plugin/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
    $( function() {    
        var data_peg = "<?php echo site_url().'update_tarif_intracity_requester/c_update_tarif_intracity_requester/get_origin';?>";
    $( "#auto_ori" ).autocomplete({
      source: data_peg,
      minLength: 4,
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
    function loading() {
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
    function load(){
        $("#loads").show('slow');
    }
</script>

<div class="loading">
    <img src="<?php echo base_url();?>assets/images/load.gif" width="400" style="display: none;" id="loads"></img>&#8230;
</div>

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

<script>
    function verify_yes_a(){
        var b_yes_a = $("#yes_a").val();
        var hasil   = b_yes_a.replace(".","");

        $("#yes_a").val(hasil);
    }
</script>

<script>
    function verify_yes_a1(){
        var b_yes_a1 = $("#yes_a1").val();
        var hasil    = b_yes_a1.replace(".","");
          
        $("#yes_a1").val(hasil);
        
    }
</script>

<script>
    function verify_yes_b(){
        var b_yes_b = $("#yes_b").val();
        var hasil   = b_yes_b.replace(".","");
        var yes_a   = $("#yes_a").val();
        var yes_a1  = $("#yes_a1").val();
        if(hasil < yes_a1 || hasil < yes_a)
        {
            alert("Zona B harus lebih besar dari Zona A or A1");
            var hasil = "";
        }

        $("#yes_b").val(hasil);
    }
</script>

<script>
    function verify_yes_b1(){
        var b_yes_b1 = $("#yes_b1").val();
        var hasil    = b_yes_b1.replace(".","");

        $("#yes_b1").val(hasil);
    }
</script>

<script>
    function get_yes_cd(){
        var yes_b           = $("#yes_b").val();
        var nol_25          = 0.25 * yes_b;
        var y_c             = parseInt(nol_25) + parseInt(yes_b);
        var ac              = y_c.toString();
        var ac1             = ac.slice(0,-3);
        var ac2             = ac.substr(-3);
        var ac3             = ac1 + '.' + ac2;
        var ac4             = parseFloat(ac3);
        var yes_c           = Math.round(ac4)+'000';
        var nol_50          = 0.50 * yes_c;
        var y_d             = parseInt(nol_50) + parseInt(yes_c);
        var ad              = y_d.toString();
        var ad1             = ad.slice(0,-3);
        var ad2             = ad.substr(-3);
        var ad3             = ad1 + '.' + ad2;
        var ad4             = parseFloat(ad3);
        var yes_d           = Math.round(ad4)+'000';

        $("#yes_c").val(yes_c);
        $("#yes_d").val(yes_d);
    }
</script>

<script>
    function verify_reg_a(){
        var b_reg_a = $("#reg_a").val();
        var hasil   = b_reg_a.replace(".","");

        $("#reg_a").val(hasil);
    }
</script>
<script type="text/javascript">
    function get_oke_a(){
        var reg_a       = $("#reg_a").val();
        var nol_15      = 0.15 * reg_a;
        var o_a         = parseInt(reg_a) - parseInt(nol_15);
        var ao          = o_a.toString();
        var ao1         = ao.slice(0,-3);
        var ao2         = ao.substr(-3);
        var ao3         = ao1 + '.' + ao2;
        var ao4         = parseFloat(ao3);
        var oke_a       = Math.round(ao4)+'000';

        $("#oke_a").val(oke_a);
        
    }
</script>

<script>
    function verify_reg_a1(){
        var b_reg_a1 = $("#reg_a1").val();
        var hasil    = b_reg_a1.replace(".","");
        

        $("#reg_a1").val(hasil);
    }
</script>
<script type="text/javascript">
    function get_oke_a1(){
        var reg_a1      = $("#reg_a1").val();
        var nol_15      = 0.15 * reg_a1;
        var o_a         = parseInt(reg_a1) - parseInt(nol_15);
        var ao          = o_a.toString();
        var ao1         = ao.slice(0,-3);
        var ao2         = ao.substr(-3);
        var ao3         = ao1 + '.' + ao2;
        var ao4         = parseFloat(ao3);
        var oke_a1      = Math.round(ao4)+'000';

        $("#oke_a1").val(oke_a1);
        
    }
</script>

<script>
    function verify_reg_b(){
        var b_reg_b  = $("#reg_b").val();
        var hasil    = b_reg_b.replace(".","");
        var reg_a    = $("#reg_a").val();
        var reg_a1   = $("#reg_a1").val();
        if(hasil < reg_a || hasil < reg_a1)
        {
            alert("Zona B harus lebih besar dari Zona A or A1");
            var hasil = "";
        }

        $("#reg_b").val(hasil);
    }
</script>
<script>
    function get_reg_cd(){
        var reg_b           = $("#reg_b").val();
        var nol_25          = 0.25 * reg_b;
        var r_c             = parseInt(nol_25) + parseInt(reg_b);
        var ac              = r_c.toString();
        var ac1             = ac.slice(0,-3);
        var ac2             = ac.substr(-3);
        var ac3             = ac1 + '.' + ac2;
        var ac4             = parseFloat(ac3);
        var reg_c           = Math.round(ac4)+'000';

        var nol_50          = 0.50 * reg_c;
        var r_d             = parseInt(nol_50) + parseInt(reg_c);
        var ad              = r_d.toString();
        var ad1             = ad.slice(0,-3);
        var ad2             = ad.substr(-3);
        var ad3             = ad1 + '.' + ad2;
        var ad4             = parseFloat(ad3);
        var reg_d           = Math.round(ad4)+'000';

        var nol_15          = 0.15 * reg_b;
        var o_a             = parseInt(reg_b) - parseInt(nol_15);
        var ao              = o_a.toString();
        var ao1             = ao.slice(0,-3);
        var ao2             = ao.substr(-3);
        var ao3             = ao1 + '.' + ao2;
        var ao4             = parseFloat(ao3);
        var oke_b           = Math.round(ao4)+'000';

        var nol_151         = 0.15 * reg_c;
        var o_a1            = parseInt(reg_c) - parseInt(nol_151);
        var ao1             = o_a1.toString();
        var ao11            = ao1.slice(0,-3);
        var ao21            = ao1.substr(-3);
        var ao31            = ao11 + '.' + ao21;
        var ao41            = parseFloat(ao31);
        var oke_c           = Math.round(ao41)+'000';

        var nol_1511        = 0.15 * reg_d;
        var o_a11           = parseInt(reg_d) - parseInt(nol_1511);
        var ao11            = o_a11.toString();
        var ao111           = ao11.slice(0,-3);
        var ao211           = ao11.substr(-3);
        var ao311           = ao111 + '.' + ao211;
        var ao411           = parseFloat(ao311);
        var oke_d           = Math.round(ao411)+'000';

        $("#reg_c").val(reg_c);
        $("#reg_d").val(reg_d);
        $("#oke_b").val(oke_b);
        $("#oke_c").val(oke_c);
        $("#oke_d").val(oke_d);
    }
</script>

<script>
    function verify_reg_b1(){
        var b_reg_b1  = $("#reg_b1").val();
        var hasil     = b_reg_b1.replace(".","");
        

        $("#reg_b1").val(hasil);
    }
</script>
<script type="text/javascript">
    function get_oke_b1(){
        var reg_b1      = $("#reg_b1").val();
        var nol_15      = 0.15 * reg_b1;
        var o_a         = parseInt(reg_b1) - parseInt(nol_15);
        var ao          = o_a.toString();
        var ao1         = ao.slice(0,-3);
        var ao2         = ao.substr(-3);
        var ao3         = ao1 + '.' + ao2;
        var ao4         = parseFloat(ao3);
        var oke_b1      = Math.round(ao4)+'000';

        $("#oke_b1").val(oke_b1);
        
    }
</script>

<script type="text/javascript">
        function get_filename(){
            var filename_upload = $("#attachment").val();
            $("#param_attachment").val(filename_upload);
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

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('generate_tarif_intracity')?>" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="col-md-4">                                      
                            <div class="form-group">
                                <label class="col-md-4 control-label">No. Request</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" readonly="" title="No Request Automatis Setelah dilakukan Save">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Origin *</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" required="" id="auto_ori" onkeyup="loading()">
                                    <img src="<?php echo base_url();?>assets/images/loading.gif" width="60" style="display:none;" id="gambar"></img>
                                    <input type="hidden" class="form-control" required="" name="origin" id="origin">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">                                      
                            <div class="form-group">
                                <label class="col-md-4 control-label">Attachment</label>
                                <div class="col-md-8">
                                    <input type="file" name="attachment" class="form-control" onchange="get_filename();" id="attachment">
                                    <input type="hidden" name="param_attachment" id="param_attachment">
                                    <p style="color:red;">File .xls/xlsx/doc/docx/pdf max:4mb</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table id="isoplus" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
                          <div style="margin:0;">
                            <thead>
                              <tr>
                                <th rowspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">TABEL ZONA</th>
                                <th colspan="12" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">ZONA</th>
                              </tr>
                              <tr>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>A</b></td>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>A1</b></td>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>B</b></td>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>B1</b></td>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>C</b></td>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>D</b></td>
                              </tr>
                              <tr>
                                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>Tarif YES</b></td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Tarif Zone A" style="text-align: center;" name="yes_a" id="yes_a" onchange="verify_yes_a()">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Tarif Zone A1" style="text-align: center;" name="yes_a1" id="yes_a1" onchange="verify_yes_a1()">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                <input type="number" min="1" class="form-control" placeholder="Tarif Zone B" style="text-align: center;" name="yes_b" id="yes_b" onchange="verify_yes_b();get_yes_cd();">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                <input type="number" min="1" class="form-control" placeholder="Tarif Zone B1" style="text-align: center;" name="yes_b1" id="yes_b1" onchange="verify_yes_b1()">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                <input type="number" min="1" class="form-control" style="text-align: center;" name="yes_c" readonly id="yes_c">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                <input type="number" min="1" class="form-control" style="text-align: center;" name="yes_d" readonly id="yes_d">
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>ETD YES</b></td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_yes_fa">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_yes_ta">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_yes_fa1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_yes_ta1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_yes_fb">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_yes_tb">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_yes_fb1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_yes_tb1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_yes_fc">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_yes_tc">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_yes_fd">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_yes_td">
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>Tarif REG</b></td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Tarif Zone A" style="text-align: center;" name="reg_a" id="reg_a" onchange="verify_reg_a();get_oke_a();">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Tarif Zone A1" style="text-align: center;" name="reg_a1" id="reg_a1" onchange="verify_reg_a1();get_oke_a1();">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Tarif Zone B" style="text-align: center;" name="reg_b" id="reg_b" onchange="verify_reg_b();get_reg_cd();">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Tarif Zone B1" style="text-align: center;" name="reg_b1" id="reg_b1" onchange="verify_reg_b1();get_oke_b1();">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" style="text-align: center;" name="reg_c" id="reg_c" readonly>
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" style="text-align: center;" name="reg_d" id="reg_d" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>ETD REG</b></td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_reg_fa">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_reg_ta">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_reg_fa1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_reg_ta1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_reg_fb">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_reg_tb">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_reg_fb1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_reg_tb1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_reg_fc">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_reg_tc">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_reg_fd"> 
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_reg_td">
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>Tarif OKE</b></td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" style="text-align: center;" name="oke_a" readonly id="oke_a">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" style="text-align: center;" name="oke_a1" readonly id="oke_a1">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" style="text-align: center;" name="oke_b" readonly id="oke_b">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" style="text-align: center;" name="oke_b1" readonly id="oke_b1">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" style="text-align: center;" name="oke_c" readonly id="oke_c">
                                </td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" style="text-align: center;" name="oke_d" readonly id="oke_d">
                                </td>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                <td style="text-align:center;background-color:#2ECC71;color:#F0F0F0;"><b>ETD OKE</b></td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_oke_fa">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_oke_ta">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_oke_fa1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_oke_ta1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_oke_fb">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_oke_tb">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_oke_fb1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_oke_tb1">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_oke_fc">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_oke_tc">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="From" style="text-align: center; width:80px;" name="etd_oke_fd">
                                </td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">
                                    <input type="number" min="1" class="form-control" placeholder="Thru" style="text-align: center; width:80px;" name="etd_oke_td">
                                </td>
                              </tr>
                              </tbody>
                            </div>
                        </table>
                        <div style="text-align:center">
                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-lg" title="Save">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

