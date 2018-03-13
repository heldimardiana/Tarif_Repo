<script>
    function Getstatus(elem){
        if(elem.value == 1){
            $("#tut").show('fast');
        }   
        else
        {
            $("#tut").hide('fast');
        }
    }
</script>

<script>
    function hapus(){
        document.getElementById("tanggal").value = "";
    }
</script>

<script>
    function set_Required(){
        var status = $("#status").val();
        var tanggal = $("#tanggal");

        if(status == "1"){
            tanggal.attr('required', true);
        }
        else{
            tanggal.attr('required', false);
        }
    }
</script>

<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_detail_ubah_coding_mpa');?>" enctype="multipart/form-data">
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
                        <!--
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cabang Utama</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['BRANCH_CITY']?>" name="cabang_utama">
                            </div>
                        </div>-->
                        <!--
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Code</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['CURRENT_CITY_CODE']?>" name="cabang"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Modif Code</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['MODIF_CITY_CODE']?>" name="perubahan"> 
                            </div>
                        </div>
                        -->
                        <?php } ?>  
					</div>
					
					<div class="col-md-5">    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-8">
                                <select class="form-control" title="Pilih Status" required name="status" id="status" onChange="Getstatus(this);set_Required();">
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
                                <textarea class="form-control" name="notice" title="Input Notice" maxlength="480"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Attachment</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="attachment" title="Attachment">
                                <p style="color:red;">File .xls/.xlsx/.jpg/.png & Max 4mb</p>
                            </div>
                        </div>
                        <div class="form-group" id="tut" style="display: none;">
                            <label class="col-md-4 control-label">Tanggal Testing</label>
                            <div class="col-md-8">
                                <!-- Untuk Testing Id before = 'date_1'  -->
                                <input type="text" class="form-control" id="tanggal" name="tgl_ubah_coding" onkeyup="hapus()">
                            </div>
                        </div>  
					</div>

					<div class="col-md-2">
						<button type="submit" class="btn btn-primary waves-effect waves-light" title="Save Process" onclick="return confirm('Yakin Untuk Melakukan Save Proses?')">Save</button>
                        <a href="<?php echo site_url('ubah_coding_mpa')?>">
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
    <form action="<?php echo site_url().'ubah_coding_mpa/c_ubah_coding_mpa/export_detail'?>" method="post" enctype="multipart/form-data">
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
            <table id="mydata" class="table table-bordered table-hover table-responsive">
                <thead style="background-color:#1ABC9C;white-space: nowrap">
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">CURRENT CODE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">MODIF CODE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">USE TARIF</th>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($tdetail as $uc){ 
                    $date = date('d-m-Y',strtotime($uc['CREATED']));
                    $tarif = $uc['USE_TARIF'];
                    if($tarif == 1)
                    {
                        $use_tarif = "CURRENT CODE";   
                    }
                    else
                    {
                        $use_tarif = "MODIF CODE";
                    }
                    ?>
                <tr id="data_row_<?php echo$n; ?>">
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['CURRENT_CITY_CODE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['MODIF_CITY_CODE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $use_tarif ?></td>
                </tr>
                    <?php $n++; } ?>
                </tbody>
                </thead>
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