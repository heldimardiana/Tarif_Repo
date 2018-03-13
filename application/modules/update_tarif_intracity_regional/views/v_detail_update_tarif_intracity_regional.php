<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <div class="row">
        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_detail_update_tarif_intracity_regional');?>" enctype="multipart/form-data">
            <?php foreach($detail as $d) {
            ?>
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
            <?php } ?>
            <div class="col-md-5">    
            
            <div class="form-group">
                <label class="col-md-4 control-label">Status</label>
                <div class="col-md-8">
                    <select class="form-control" title="Pilih Status" name="status" required>
                        <option value="" disabled selected>Choose</option>
                        <?php foreach($stat as $s) { ?>
                        <option value="<?php echo $s['ID_STATUS_REQUEST']?>"> <?php echo $s['STATUS_REQUEST']?>
                            
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Notice</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="notice" title="Input Notice" maxlength="480"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Attachment</label>
                <div class="col-md-8">
                    <input type="file" name="attachment" title="Attachment" class="form-control">
                    <p style="color:red;">File .xls/.xlsx/.jpg/.png</p>
                </div>
            </div> 
            </div>

            <div class="col-md-2">
            <button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process" onclick="return confirm('Yakin Untuk Melakukan Save Proses?')">Save</button>
                        <a href="<?php echo site_url('update_tarif_intracity_regional')?>">
              <button type="button" class="btn btn-danger waves-effect waves-light" title="Cancel Process" onclick="return confirm('Yakin Untuk Melakukan Cancel Proses ?')">Cancel</button>
                        </a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div>
  <?php foreach($detail as $jokowi){?>
    <form action="<?php echo site_url().'update_tarif_intracity_regional/c_update_tarif_intracity_regional/export_detail'?>" method="post" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $jokowi['NO_REQUEST']?>" name="no_request">
      <button type="submit" class="btn btn-success" style="float:right;">Export to Excel</button>
    </form>
  <?php } ?>
</div>
<br/>
<div>
  <br/>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12 turun" id="table_bawah">
                    <table id="mydata" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
                        <div style="margin:0;">
                        <thead>
                            <tr>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Destination</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kota / Kabupaten</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Kecamatan</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">City Code</th>
                                <th rowspan="4" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">Zona</th>
                                <th colspan="6" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">YES</th>
                                <th colspan="6" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">REG</th>
                                <th colspan="6" style="text-align:center;vertical-align:middle;background-color:#1ABC9C;color:#F0F0F0;">OKE</th>
                              </tr>
                              <tr>
                                <td colspan="2" rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">TARIF</td>
                                <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">ETD</td>
                                <td colspan="2" rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">TARIF</td>
                                <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">ETD</td>
                                <td colspan="2" rowspan="2" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">TARIF</td>
                                <td colspan="4" style="text-align:center;background-color:#2ECC71;color:#F0F0F0;">ETD</td>
                              </tr>
                              <tr>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td colspan="2" style="text-align:center;background-color:#99ffff;color:black;">After</td>
                              </tr>
                              <tr>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">Before</td>
                                <td style="text-align:center;background-color:#99ffff;color:black;">After</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                                <td style="text-align:center;">From</td>
                                <td style="text-align:center;">Thru</td>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($bdetail as $bd){ 
                            ?>
                              <tr>
                                <td>
                                    <input type="text" class="form-control" name="coding" id="coding" readonly value="<?php echo $bd['DROURATE_CODE']?>" style="width:120px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="kota" id="kota" readonly value="<?php echo $bd['CITY_ZONE_KABKOTA']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" readonly value="<?php echo $bd['CITY_ZONE_KECAMATAN']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="city_code" id="city_code" readonly value="<?php echo $bd['CITY_ZONE_3CODE']?>" style="width:100px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="zona" id="zona" readonly value="<?php echo $bd['CITY_ZONE_ID']?>" style="width:60px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="yes_tarif_before" id="yes_tarif_before" readonly="" value="<?php echo $bd['BEFORE_YES']?>" style="width:100px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="yes_tarif_after" id="yes_tarif_after" readonly value="<?php echo $bd['AFTER_YES']?>" style="width:100px;">
                                </td>
                                <td>
                                <input type="text" class="form-control" name="etd_yes_before_from" id="etd_yes_before_from" readonly="" style="width:60px;" value="<?php echo $bd['ETD_BEFORE_FROM_YES']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_yes_before_thru" id="etd_yes_before_thru" readonly="" style="width:60px;" value="<?php echo $bd['ETD_BEFORE_THRU_YES']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_yes_after_from" id="etd_yes_after_from" style="width:60px;" readonly="" value="<?php echo $bd['ETD_AFTER_FROM_YES']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_yes_after_thru" id="etd_yes_after_thru" style="width:60px;" readonly="" value="<?php echo $bd['ETD_AFTER_THRU_YES']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="reg_tarif_before" id="reg_tarif_before" readonly="" value="<?php echo $bd['BEFORE_REG']?>" style="width:100px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="reg_tarif_after" id="reg_tarif_after" readonly="" value="<?php echo $bd['AFTER_REG']?>" style="width:100px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_reg_before_from" id="etd_reg_before_from" readonly="" style="width:60px;" value="<?php echo $bd['ETD_BEFORE_FROM_REG']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_reg_before_thru" id="etd_reg_before_thru" readonly="" style="width:60px;" value="<?php echo $bd['ETD_BEFORE_THRU_REG']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_reg_after_from" id="etd_reg_after_from" style="width:60px;" readonly="" value="<?php echo $bd['ETD_AFTER_FROM_REG']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_reg_after_thru" id="etd_reg_after_thru" style="width:60px;" readonly="" value="<?php echo $bd['ETD_AFTER_THRU_REG']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="oke_tarif_before" id="oke_tarif_before" readonly="" value="<?php echo $bd['BEFORE_OKE']?>" style="width:100px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="oke_tarif_after" id="oke_tarif_after" readonly="" value="<?php echo $bd['AFTER_OKE']?>" style="width:100px;">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_oke_before_from" id="etd_oke_before_from" readonly="" style="width:60px;" value="<?php echo $bd['ETD_BEFORE_FROM_OKE']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_oke_before_thru" id="etd_oke_before_thru" readonly="" style="width:60px;" value="<?php echo $bd['ETD_BEFORE_THRU_OKE']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_oke_after_from" id="etd_oke_after_from" style="width:60px;" readonly="" value="<?php echo $bd['ETD_AFTER_FROM_OKE']?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="etd_oke_after_thru" id="etd_oke_after_thru" style="width:60px;" readonly="" value="<?php echo $bd['ETD_AFTER_THRU_OKE']?>">
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>