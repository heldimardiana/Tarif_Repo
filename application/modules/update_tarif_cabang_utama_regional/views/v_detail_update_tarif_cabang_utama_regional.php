<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <div class="row">
        <form class="form-horizontal" method="post" action="<?php echo site_url('save_detail_update_tarif_cabang_utama_regional');?>" enctype="multipart/form-data">
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
           
            <div class="form-group">
                <label class="col-md-4 control-label">Service</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" required readonly value="<?php echo $d['SERVICE']?>" name="cabang"> 
                </div>
            </div> 
          </div>
          
          <div class="col-md-5">    
            <?php } ?>
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
                    <input type="file" title="Attachment" name="attachment">
                    <p style="color:red;">File xls/xlsx/jpg/png max:4mb</p>
                </div>
            </div> 
          </div>

          <div class="col-md-2">
            <button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process" onclick="return confirm('Yakin Untuk Melakukan Save Proses?')">Save</button>
                        <a href="<?php echo site_url('update_tarif_cabang_utama_regional')?>">
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
    <form action="<?php echo site_url().'update_tarif_cabang_utama_regional/c_update_tarif_cabang_utama_regional/export_detail'?>" method="post" enctype="multipart/form-data">
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
    <div class="card-box table-responsive" style="padding: 0 auto">
      <table id="mydatas" style="width:100% !important;padding: 0;margin: 0; display:block;" class="table table-bordered table-hover table-responsive">
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
                <?php foreach($tdetail as $gt) {
                ?>
                <tr>
                  <td>
                    <input type="text" class="form-control" name="kab_kotamadya" value="<?php echo $gt['KAB_KOTA'] ?>" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="code" value="<?php echo $gt['CODE'] ?>" readonly="" style="width:70px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="city_code" id="city_code" value="<?php echo $gt['DESTINATION'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_before_zona_a" value="<?php echo $gt['TARIF_BEFORE_ZONA_A'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="tarif_after_zona_a" value="<?php echo $gt['TARIF_AFTER_ZONA_A'] ?>" required style="width:100px;" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_from_before_zona_a" value="<?php echo $gt['ETD_FROM_BEFORE_ZONA_A'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_thru_before_zona_a" value="<?php echo $gt['ETD_THRU_BEFORE_ZONA_A'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_from_after_zona_a" value="<?php echo $gt['ETD_FROM_AFTER_ZONA_A'] ?>" style="width:50px;" maxlength="2" required readonly>
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_thru_after_zona_a" value="<?php echo $gt['ETD_THRU_AFTER_ZONA_A'] ?>" style="width:50px;" maxlength="2" required readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bd_nama_service_zona_a" value="<?php echo $gt['BD_NAMA_SERVICE_ZONA_A'] ?>" readonly style="width:100px;" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_before_zona_b" value="<?php echo $gt['TARIF_BEFORE_ZONA_B'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="tarif_after_zona_b" value="<?php echo $gt['TARIF_AFTER_ZONA_B'] ?>" required style="width:100px;" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_from_before_zona_b" value="<?php echo $gt['ETD_FROM_BEFORE_ZONA_B'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_thru_before_zona_b" value="<?php echo $gt['ETD_THRU_BEFORE_ZONA_B'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_from_after_zona_b" value="<?php echo $gt['ETD_FROM_AFTER_ZONA_B'] ?>" style="width:50px;" required readonly>
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_thru_after_zona_b" value="<?php echo $gt['ETD_THRU_AFTER_ZONA_B'] ?>" style="width:50px;" required readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bd_nama_service_zona_b" value="<?php echo $gt['BD_NAMA_SERVICE_ZONA_B'] ?>" readonly style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bt_zona_b" value="<?php echo $gt['BT_ZONA_B'] ?>" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_before_zona_c" value="<?php echo $gt['TARIF_BEFORE_ZONA_C'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_after_zona_c" value="<?php echo $gt['TARIF_AFTER_ZONA_C'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_from_before_zona_c" value="<?php echo $gt['ETD_FROM_BEFORE_ZONA_C'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_thru_before_zona_c" value="<?php echo $gt['ETD_THRU_BEFORE_ZONA_C'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_from_after_zona_c" value="<?php echo $gt['ETD_FROM_AFTER_ZONA_C'] ?>" style="width:50px;" required readonly>
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_thru_after_zona_c" value="<?php echo $gt['ETD_THRU_AFTER_ZONA_C'] ?>" style="width:50px;" required readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bd_nama_service_zona_c" value="<?php echo $gt['BD_NAMA_SERVICE_ZONA_C'] ?>" readonly style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bt_zona_c" value="<?php echo $gt['BT_ZONA_C'] ?>" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bp_1_kilo_zona_c" value="<?php echo $gt['BP_1_KILO_ZONA_C'] ?>" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bp_next_kilo_zona_c" value="<?php echo $gt['BP_NEXT_KILO_ZONA_C'] ?>" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_before_zona_d" value="<?php echo $gt['TARIF_BEFORE_ZONA_D'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="tarif_after_zona_d" value="<?php echo $gt['TARIF_AFTER_ZONA_D'] ?>" readonly="" style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_from_before_zona_d" value="<?php echo $gt['ETD_FROM_BEFORE_ZONA_D'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="etd_thru_before_zona_d" value="<?php echo $gt['ETD_THRU_BEFORE_ZONA_D'] ?>" style="width:50px;" readonly="">
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_from_after_zona_d" value="<?php echo $gt['ETD_FROM_AFTER_ZONA_D'] ?>" style="width:50px;" required readonly>
                  </td>
                  <td>
                    <input type="number" class="form-control" name="etd_thru_after_zona_d" value="<?php echo $gt['ETD_THRU_AFTER_ZONA_D'] ?>" style="width:50px;" required readonly> 
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bd_nama_service_zona_d" value="<?php echo $gt['BD_NAMA_SERVICE_ZONA_D'] ?>" readonly style="width:100px;">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bt_zona_d" value="<?php echo $gt['BT_ZONA_D'] ?>" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bp_1_kilo_zona_d" value="<?php echo $gt['BP_1_KILO_ZONA_D'] ?>" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bp_next_kilo_zona_d" value="<?php echo $gt['BP_NEXT_KILO_ZONA_D'] ?>" readonly>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              </thead>
              </div>
            </table>
    </div>
  </div>
</div>