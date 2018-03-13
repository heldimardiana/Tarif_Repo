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
    function bp_after_1st(id){
        var a       = $("#bp_after_1st_kilo_"+id).val();
        var hasil   = a.replace(".","");

        $("#bp_after_1st_kilo_"+id).val(hasil);
    }
</script>

<script type="text/javascript">
    function bp_after_next(id)
    {
        var a       = $("#bp_after_next_kilo_"+id).val();
        var hasil   = a.replace(".","");

        $("#bp_after_next_kilo_"+id).val(hasil);
    }
</script>

<script>
    function bt_after(id)
    {
        var a       = $("#bt_after_"+id).val();
        var hasil   = a.replace(".","");

        $("#bt_after_"+id).val(hasil);
    }
</script>

<script>
    function oke_after(id){
        var a       = $("#bd_oke_after_"+id).val();
        var hasil   = a.replace(".","");

        $("#bd_oke_after_"+id).val(hasil);
    }
</script>

<script>
    function reg_after(id){
        var a       = $("#bd_reg_after_"+id).val();
        var hasil   = a.replace(".","");

        $("#bd_reg_after_"+id).val(hasil);
    }
</script>

<script>
    function yes_after(id){
        var a       = $("#bd_yes_after_"+id).val();
        var hasil   = a.replace(".","");

        $("#bd_yes_after_"+id).val(hasil);
    }
</script>

<script>
    function bd_sps_1st(id){
        var a       = $("#bd_sps_1st_kilo_after_"+id).val();
        var hasil   = a.replace(".","");

        $("#bd_sps_1st_kilo_after_"+id).val(hasil);
    }
</script>

<script>
    function bd_sps_next(id){
        var a       = $("#bd_sps_next_kilo_after_"+id).val();
        var hasil   = a.replace(".","");

        $("#bd_sps_next_kilo_after_"+id).val(hasil);
    }
</script>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_update_btbp_mpa')?>" enctype="multipart/form-data">
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
                                  <input type="text" class="form-control" required name="cabang" id="cabang" value="<?php echo $cabang ?>" readonly>
                                  <input type="text" name="no_urut_btbp" id="no_urut_btbp" readonly="" class="form-control" style="width:90px;color:red;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                <button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process">Save</button>
                                <a href="<?php echo site_url('update_btbp_mpa')?>">
                                <button type="button" class="btn btn-danger waves-effect waves-light" title="Cancel Process">Cancel</button>
                                </a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <table id="myTable" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
                        <div style="margin:0;">
                            <thead>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Origin</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Destination</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">3Code</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kota / Kabupaten</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kecamatan</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Zona</th>
                                <th colspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BP</th>
                                <th colspan="2" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BT</th>
                                <th colspan="10" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">BD</th>
                              
                              <tr>
                                <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Before</td>
                                <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">After</td>
                                <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Before</td>
                                <td rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">After</td>
                                <td rowspan="3" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">Before</td>
                                <td rowspan="3" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">After</td>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">OKE</td>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">REG</td>
                                <td colspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">YES</td>
                                <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">SPS</td>
                              </tr>
                              <tr>
                                <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td rowspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
                              </tr>
                              <tr>
                                <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">1st Kilo</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Next Kilo</td>
                              </tr>
                            <tbody>
                            <?php 
                            $n=1;
                                foreach($generate as $gt) {

                            ?>
                              <tr>
                                <td>
                                    <input type="text" class="form-control" readonly name="origin[]" id="origin" value="<?php echo $gt['ORIGIN']?>" style="width:100px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="city_zone_code[]" id="city_zone_code" readonly value="<?php echo $gt['CITY_ZONE_CODE']?>" style="width:120px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="city_zone_3code[]" id="city_zone_3code" readonly style="width:70px;" value="<?php echo $gt['CITY_ZONE_3CODE']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="city_zone_kabkota[]" id="city_zone_kabkota" readonly value="<?php echo $gt['CITY_ZONE_KABKOTA']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="city_zone_kecamatan[]" id="city_zone_kecamatan" readonly value="<?php echo $gt['CITY_ZONE_KECAMATAN']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="city_zone_id[]" id="city_zone_id" readonly style="width:50px;" value="<?php echo $gt['CITY_ZONE_ID']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="bp_before_1st_kilo[]" id="bp_before_1st_kilo" readonly style="width:100px;" value="<?php echo $gt['LINEHAUL']?>">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="bp_after_1st_kilo[]" id="bp_after_1st_kilo_<?php echo $n ?>" style="width:100px;" onchange="bp_after_1st(<?php echo $n ?>)" placeholder="BP 1st Kilo" required> 
                                    <!--required -->
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="bp_before_next_kilo[]" id="bp_before_next_kilo" readonly style="width:100px;" value="<?php echo $gt['LINEHAUL_NEXT']?>">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="bp_after_next_kilo[]" id="bp_after_next_kilo_<?php echo $n ?>" style="width:120px;" onchange="bp_after_next(<?php echo $n ?>)" placeholder="BP Next Kilo" required>
                                    <!--required -->
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="bt_before[]" id="$bt_before" readonly style="width:100px;" value="<?php echo $gt['TRANSIT']?>">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="bt_after[]" id="bt_after_<?php echo $n ?>" style="width:100px;" onchange="bt_after(<?php echo $n ?>)" placeholder="BT" required> <!--required -->
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="bd_oke_before[]" id="bd_oke_before" readonly style="width:100px;" value="<?php echo $gt['DL_BEFORE_OKE']?>">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="bd_oke_after[]" id="bd_oke_after_<?php echo $n ?>" style="width:100px;" onchange="oke_after(<?php echo $n ?>)" placeholder="BD Oke" required> <!--required -->
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="bd_reg_before[]" id="bd_reg_before" readonly style="width:100px;" value="<?php echo $gt['DL_BEFORE_REG']?>">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="bd_reg_after[]" id="bd_reg_after_<?php echo $n ?>" style="width:100px;" onchange="reg_after(<?php echo $n ?>)" placeholder="BD Reg" required> <!--required -->
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="bd_yes_before[]" id="bd_yes_before" readonly style="width:100px;" value="<?php echo $gt['DL_BEFORE_YES']?>">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="bd_yes_after[]" id="bd_yes_after_<?php echo $n ?>" style="width:100px;" onchange="yes_after(<?php echo $n ?>)" placeholder="BD Yes" required> <!--required -->
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="bd_sps_1st_kilo_before[]" id="bd_sps_1st_kilo_before" readonly style="width:100px;" value="<?php echo $gt['DL_BEFORE_SPS']?>">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="bd_sps_1st_kilo_after[]" id="bd_sps_1st_kilo_after_<?php echo $n ?>" style="width:100px;" onchange="bd_sps_1st(<?php echo $n ?>)" placeholder="BD SPS 1st" required> 
                                    <!--required -->
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="bd_sps_next_kilo_before[]" id="bd_sps_next_kilo_before" readonly style="width:100px;" value="<?php echo $gt['DL_BEFORE_NEXT_SPS']?>">
                                </td>
                                <td>
                                    <input type="number" min="0" class="form-control" name="bd_sps_next_kilo_after[]" id="bd_sps_next_kilo_after_<?php echo $n ?>" style="width:120px;" onchange="bd_sps_next(<?php echo $n ?>)" placeholder="BD SPS Next" required> 
                                    <!--required -->
                                    <input type="hidden" name="drourate_service[]" id="drourate_service" value="<?php echo $gt['DROURATE_SERVICE']?>">
                                </td>
                              </tr>
                            <?php $n++; } ?>
                            </tbody>
                            </thead>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>