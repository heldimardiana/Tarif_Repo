<script>
    function timbulin(){
        $("#but").hide('fast');
        $("#satu").hide('fast');
        $("#dua").hide('fast');
        $("#tiga").hide('fast');
        $("#tetet").show('slow');
    }
</script>

<div class="row" id="tetet" style="display:none">
    <div class="col-sm-12">
        <div class="card-box table-responsive" style="padding: 0 auto">
            <table id="mydata" class="table table-bordered table-hover table-responsive">
                <thead style="background-color:#1ABC9C;white-space: nowrap">
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL REQUEST</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">REQUEST NO</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">BRANCH</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ORIGIN</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">DESTINATION</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">SERVICE</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TARIF</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS</th>
                    <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">ACTION</th>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($psr as $uc){ 
                    $date = date('d-m-Y',strtotime($uc['CREATED']))
                    ?>
                <tr id="data_row_<?php echo$n; ?>">
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $n ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['NO_REQUEST'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['BRANCH_CODE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['ORIGIN'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['DESTINATION'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['SERVICE'] ?></td>
                    <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $uc['TARIF'] ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-xs">Approve</button>
                    </td>
                    <?php $session = $uc['SESSION_REQUEST'] ?>
                    <td class="text-center">
                        <a href="<?php echo site_url().'content_dashboard_mpa/c_content_dashboard_mpa/detail_psr/'.$session?>">
                            <button type="button" class="btn btn-warning btn-xs" title="Lihat Detail">Detail</button>
                        </a>
                    </td>
                </tr>
                    <?php $n++; } ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>

<div>
    <!--<a href="<?php echo site_url('utcr')?>">-->
      <button type="button" class="btn btn-danger waves-effect waves-light" title="Back" id="but" onclick="timbulin()"><< Back</button>
    <!--</a>-->
</div>
<br/>

<div class="row" id="satu">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('save_detail_penambahan_service_mpa');?>" enctype="multipart/form-data">
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
                            <label class="col-md-4 control-label">Branch</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" readonly value="<?php echo $d['BRANCH_CODE']?>" name="branch">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-4 control-label">Origin</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['ORIGIN']?>" name="origin"> 
                            </div>
                        </div>
                        
					</div>
					
					<div class="col-md-5">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Destination</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['DESTINATION']?>" name="destination"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Service</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['SERVICE']?>" name="service"> 
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tarif</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required readonly value="<?php echo $d['TARIF']?>" name="tarif"> 
                            </div>
                        </div>
                        <?php } ?> 
					</div>

					<div class="col-md-2">
	
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-12" id="dua">
    <div class="panel panel-border panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title" align="center">Notice Regional</h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive" style="padding: 0 auto">
                        <table class="table table-bordered table-hover table-responsive">
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
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REQUEST'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_REGIONAL'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
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
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">STATUS APPROVAL</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">PIC</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL APPROVAL</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">NOTICE</th>
                                <th class="text-center" style="font-size: 13px;color:white;font-family:"Times New Rowman,Times";">TANGGAL PENAMBAHAN SERVICE</th>
                            <tbody>
                                <?php 
                                $n=1;
                                foreach ($mpa as $ut){ 
                                    $date = date('d-m-Y',strtotime($ut['UPDATE_STATUS_MPA']));
                                    $dates = date('d-m-Y',strtotime($ut['TGL_PENAMBAHAN_SERVICE']));
                                ?>
                            <tr>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['STATUS_REQUEST'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['PIC_MPA'] ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $date ?></td>
                                <td class="text-center" style="font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $ut['NOTICE_MPA'] ?></td>
                                <td class="text-center" style="background-color: #09C2FF;color:white;font-size: 11px;font-family:"Times New Rowman,Times";"><?php echo $dates ?></td>
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