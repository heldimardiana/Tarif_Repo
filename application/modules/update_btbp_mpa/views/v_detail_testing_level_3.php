<script>
    function Getstatus(elem){
        if(elem.value == 1){
            $("#tut").show('fast');
            $("#tuts").show('fast');
        }   
        else
        {
            $("#tut").hide('fast');
            $("#tuts").hide('fast');
        }
    }
</script>
<script>
    function hapus(){
        document.getElementById("date_1").value = "";
    }
</script>
<script>
    function hapuss(){
        document.getElementById("date_2").value = "";
    }
</script>
<script>
    function set_Required(){
        var status = $("#status").val();
        var tanggal = $("#date_1");
        var tanggal_2 = $("#date_2");

        if(status == "1"){
            tanggal.attr('required', true);
            tanggal_2.attr('required', true);
        }
        else{
            tanggal.attr('required', false);
            tanggal_2.attr('required', false);
        }
    }
</script>


<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_testing_level_3');?>" enctype="multipart/form-data">
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
                            <label class="col-md-4 control-label">Status Testing</label>
                            <div class="col-md-8">
                                <select class="form-control" title="Pilih Status" required id="status" name="status" onChange="Getstatus(this);set_Required();">
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
                        <div class="form-group">
                            <label class="col-md-4 control-label">Attachment</label>
                            <div class="col-md-8">
                                <input type="file" name="attachment" title="Attachment" class="form-control">
                                <p style="color:red;">File .xls/.xlsx/.jpg/.png & Max 4mb</p>
                            </div>
                        </div>
                        <div class="form-group" id="tut" style="display: none;">
                            <label class="col-md-4 control-label">Tanggal Live</label>
                            <div class="col-md-8">
                                <!-- Untuk Testing Id before = 'date_1'  -->
                                <input type="text" class="form-control" id="date_1" name="tgl_live_btbp" onkeyup="hapus()">
                            </div>
                        </div>
                        <div class="form-group" id="tuts" style="display: none;">
                            <label class="col-md-4 control-label">Tanggal Close</label>
                            <div class="col-md-8">
                                <!-- Untuk Testing Id before = 'date_1'  -->
                                <input type="text" class="form-control" id="date_2" name="tgl_close" onkeyup="hapuss()">
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

<div class="col-lg-12">
    <div class="panel panel-border panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" align="center">Notice Approval 1</h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive" style="padding: 0 auto">
                        <table class="table table-bordered table-hover table-responsive">
                            <thead style="background-color:#1ABC9C;white-space: nowrap">
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS APPROVAL</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE</th>
                            <tbody>
                                <?php 
                                $n=1;
                                foreach ($notice as $ut){ 
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
            <h3 class="panel-title" align="center">Notice Approval 2</h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive" style="padding: 0 auto">
                        <table  class="table table-bordered table-hover table-responsive">
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
                                    $dates = date('d-m-Y',strtotime($ut['TGL_UPDATE_BTBP']));
                                ?>
                            <tr>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REQUEST'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $dates ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_MPA'] ?></td>
                                <td class="text-center" style="background-color: #778899;color:white;font-size: 11px;font-family:"Times New Rowman,Times";">-</td>
                                <td class="text-center" style="background-color: #778899;color:white;font-size: 11px;font-family:"Times New Rowman,Times";">-</td>
                                <td class="text-center" style="background-color: #778899;color:white;font-size: 11px;font-family:"Times New Rowman,Times";">-</td>
                                <td class="text-center" style="background-color: #778899;color:white;font-size: 11px;font-family:"Times New Rowman,Times";">-</td>
                                
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
			

