<div>
    <a href="<?php echo site_url('utcu_reg')?>">
        <button type="button" class="btn btn-danger waves-effect waves-light" title="Back"><< Back</button>
    </a>
</div>
<br/>
<div class="row">
  <div class="col-sm-12">
    <div class="card-box">
      <div class="row">
        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_detail_update_tarif_cabang_utama_regional');?>" enctype="multipart/form-data">
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
            
          </div>

          <div class="col-md-2">
            
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach($detail as $jokowi){?>
    <form action="<?php echo site_url().'content_dashboard_regional/c_content_dashboard_regional/export_detail'?>" method="post">
      <input type="hidden" value="<?php echo $jokowi['NO_REQUEST']?>" name="no_request">
      <button type="submit" class="btn btn-success" style="float:right;">Export to Excel</button>
    </form>
  <?php } ?>
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

<div class="col-lg-12">
    <div class="panel panel-border panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" align="center">Notice Regional</h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive" style="padding: 0 auto">
                        <table id="mydata" class="table table-bordered table-hover table-responsive">
                            <thead style="background-color:#1ABC9C;white-space: nowrap">
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS APPROVAL</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE</th>
                            <tbody>
                                <?php 
                                $n=1;
                                foreach ($regional as $ut){ 
                                    $date = date('d-m-Y',strtotime($ut['UPDATE_STATUS_REGIONAL']))
                                ?>
                            <tr>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REQUEST'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_REGIONAL'] ?></td>
                            </tr>
                                <?php $n++; } ?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-12" id="tiga">
    <div class="panel panel-border panel-success">
        <div class="panel-heading">
            <h3 class="panel-title" align="center">Notice MPA</h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive" style="padding: 0 auto">
                        <table class="table table-bordered table-hover table-responsive">
                            <thead style="background-color:#1ABC9C;white-space: nowrap">
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL REQUEST</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL REQUEST</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">APPROVAL TESTING</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL LIVE</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE LIVE</th>
                            <tbody>
                                <?php 
                                $n=1;
                                foreach ($mpa as $ut){ 
                                    $date = date('d-m-Y',strtotime($ut['UPDATE_STATUS_MPA']));
                                    $dates = date('d-m-Y',strtotime($ut['TGL_UPDATE_TARIF_CABANG_UTAMA']));
                                    $tgl_live = date('d-m-Y',strtotime($ut['TGL_LIVE_UTCU']));
                                    
                                ?>
                            <tr>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REQUEST'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $dates ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_MPA'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_TESTING'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_LIVE'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $tgl_live ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_LIVE'] ?></td>
                            </tr>
                                <?php $n++; } ?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>