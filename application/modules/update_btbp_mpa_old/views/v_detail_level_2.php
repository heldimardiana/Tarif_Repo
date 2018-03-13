<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_btbp_level_2');?>" enctype="multipart/form-data">
                    <?php foreach($detail as $d) { ?>
					<div class="col-md-5">
						                                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">No. Request</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['NO_REQUEST']?>" name="no_request">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Requester</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['USER_ID']?>" name="requester">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Origin</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['ORIGIN']?>" name="cabang_utama">
                            </div>
                        </div>

                          
					</div>
					
					<div class="col-md-5">    
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-8">
                                <select class="form-control" title="Pilih Status" required name="status">
                                    <option value="" disabled selected>Choose</option>
                                    <?php foreach($statuss as $s) { ?>
                                    <option value="<?php echo $s['ID_STATUS_REQUEST']?>"> <?php echo $s['STATUS_REQUEST']?>
                                        
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Notice</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="notice" title="Input Notice"></textarea>
                            </div>
                        </div> 
					</div>

					<div class="col-md-2">
						<button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process" onclick="return confirm('Yakin Untuk Melakukan Save Proses?')">Save</button>
                        <a href="<?php echo site_url('update_btbp_mpa')?>">
						  <button type="button" class="btn btn-danger waves-effect waves-light" title="Cancel Process" onclick="return confirm('Yakin Untuk Melakukan Cancel Proses ?')">Cancel</button>
                        </a>
					</div>

				</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive" style="padding: 0 auto">
            <table id="mydata" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
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
                        foreach($detail_btbp as $gt) {

                    ?>
                      <tr>
                        <td>
                            <input type="text" class="form-control" readonly name="origin[]" id="origin" value="<?php echo $gt['ORIGIN']?>" style="width:100px;">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="city_zone_code[]" id="city_zone_code" readonly value="<?php echo $gt['DESTINATION']?>" style="width:120px;">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="city_zone_3code[]" id="city_zone_3code" readonly style="width:70px;" value="<?php echo $gt['BTBP_3CODE']?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="city_zone_kabkota[]" id="city_zone_kabkota" readonly value="<?php echo $gt['KOTA_KABUPATEN']?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="city_zone_kecamatan[]" id="city_zone_kecamatan" readonly value="<?php echo $gt['KECAMATAN']?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="city_zone_id[]" id="city_zone_id" readonly style="width:50px;" value="<?php echo $gt['ZONA']?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bp_before_1st_kilo[]" id="bp_before_1st_kilo" readonly style="width:100px;" value="<?php echo $gt['BP_1ST_KILO_BEFORE']?>">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="bp_after_1st_kilo[]" id="bp_after_1st_kilo_<?php echo $n ?>" style="width:100px;" value="<?php echo $gt['BP_1ST_KILO_AFTER']?>" readonly> 
                            <!--required -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bp_before_next_kilo[]" id="bp_before_next_kilo" readonly style="width:100px;" value="<?php echo $gt['BP_NEXT_KILO_BEFORE']?>">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="bp_after_next_kilo[]" id="bp_after_next_kilo_<?php echo $n ?>" style="width:120px;" value="<?php echo $gt['BP_NEXT_KILO_AFTER']?>" readonly>
                            <!--required -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bt_before[]" id="$bt_before" readonly style="width:100px;" value="<?php echo $gt['BT_BEFORE']?>">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="bt_after[]" id="bt_after_<?php echo $n ?>" style="width:100px;" value="<?php echo $gt['BT_AFTER']?>" readonly> <!--required -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bd_oke_before[]" id="bd_oke_before" readonly style="width:100px;" value="<?php echo $gt['OKE_BEFORE']?>">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="bd_oke_after[]" id="bd_oke_after_<?php echo $n ?>" style="width:100px;" value="<?php echo $gt['OKE_AFTER']?>" readonly> <!--required -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bd_reg_before[]" id="bd_reg_before" readonly style="width:100px;" value="<?php echo $gt['REG_BEFORE']?>">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="bd_reg_after[]" id="bd_reg_after_<?php echo $n ?>" style="width:100px;" value="<?php echo $gt['REG_AFTER']?>" readonly> <!--required -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bd_yes_before[]" id="bd_yes_before" readonly style="width:100px;" value="<?php echo $gt['YES_BEFORE']?>">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="bd_yes_after[]" id="bd_yes_after_<?php echo $n ?>" style="width:100px;" value="<?php echo $gt['YES_AFTER']?>" readonly> <!--required -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bd_sps_1st_kilo_before[]" id="bd_sps_1st_kilo_before" readonly style="width:100px;" value="<?php echo $gt['SPS_1ST_KILO_BEFORE']?>">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="bd_sps_1st_kilo_after[]" id="bd_sps_1st_kilo_after_<?php echo $n ?>" style="width:100px;" value="<?php echo $gt['SPS_1ST_KILO_AFTER']?>" readonly> 
                            <!--required -->
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bd_sps_next_kilo_before[]" id="bd_sps_next_kilo_before" readonly style="width:100px;" value="<?php echo $gt['SPS_NEXT_KILO_BEFORE']?>">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="bd_sps_next_kilo_after[]" id="bd_sps_next_kilo_after_<?php echo $n ?>" style="width:120px;" value="<?php echo $gt['SPS_NEXT_KILO_AFTER']?>" readonly> 
                            <!--required -->
                        </td>
                      </tr>
                    <?php $n++; } ?>
                    </tbody>
                    </thead>
                </div>
            </table>
        </div>
    </div>
</div>
     
			

